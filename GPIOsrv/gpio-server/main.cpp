// Server side C/C++ program to demonstrate Socket programming
#include <unistd.h>
#include <stdio.h>
#include <sys/socket.h>
#include <stdlib.h>
#include <netinet/in.h>
#include <string.h>
#include <wiringPi.h>
#include <Board.h>
#include <jsonProcessor.h>

#define PORT 8001


Board * board;


char *hello = "OK";
int server_fd;
struct sockaddr_in address;
int addrlen = sizeof(address);
char buffer[1024] = {0};

void handle();
void test();

int main(int argc, char const **argv)
{
    test();
	printf("GPIO server started\n");
	
	board = new Board(0x27, 0x25);
	
    printf("Board initialized\n");
  
    int opt = 1;
    
    
      
    // Creating socket file descriptor
    if ((server_fd = socket(AF_INET, SOCK_STREAM, 0)) == 0)
    {
        perror("socket failed");
        exit(EXIT_FAILURE);
    }
	printf("Socket file descryptor created\n");
    // Forcefully attaching socket to the port 8001
    if (setsockopt(server_fd, SOL_SOCKET, SO_REUSEADDR | SO_REUSEPORT,
                                                  &opt, sizeof(opt)))
    {
        perror("setsockopt");
        exit(EXIT_FAILURE);
    }
    address.sin_family = AF_INET;
    address.sin_addr.s_addr = INADDR_ANY;
    address.sin_port = htons( PORT );
      
    // Forcefully attaching socket to the port 8080
    if (bind(server_fd, (struct sockaddr *)&address, 
                                 sizeof(address))<0)
    {
        perror("bind failed");
        exit(EXIT_FAILURE);
    }
 
    printf("Binding comleted\n");
	
    if (listen(server_fd, 3) < 0)
    {
        perror("listen");
        exit(EXIT_FAILURE);
    }
	printf("Listen star\n");
	handle();
    return 0;
}

void test(){
	//std::string str = "{\"cmd\":\"demo\"}";
	//printf(str.c_str());
	//printf("\n");
	
	//JSonProcessor s = JSonProcessor(str.c_str());
	
	//printf("indexOf = ");
	//printf("%d",s.indexOf("cmd"));
	//printf("\n");
	
	
	//printf("cmd = ");
	//printf(s.getValue("cmd").c_str());
	//printf("\n");
	//printf(buffer);
}


void handle(){
	printf("Handle cliens\n");
	int new_socket, valread;
	while (true){
		if ((new_socket = accept(server_fd, (struct sockaddr *)&address, (socklen_t*)&addrlen))<0)
		{
			perror("accept");
			exit(EXIT_FAILURE);
		}
		printf("New socket\n");
		
		valread = read( new_socket , buffer, 1024);
		buffer[valread] = 0;
		
		printf("in buffer = ");printf(buffer);printf("\n");
		board->handle(buffer);
		printf("out buffer = ");printf(buffer);printf("\n");
		
		send(new_socket , buffer , strlen(buffer) , 0 );
		int ret = close(new_socket);
		printf("close result = %d\n", ret);
		printf("OK sent\n");
		
	}
}
