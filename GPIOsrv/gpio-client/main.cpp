// Client side C/C++ program to demonstrate Socket programming
#include <unistd.h>
#include <stdio.h>
#include <sys/socket.h>
#include <stdlib.h>
#include <netinet/in.h>
#include <string.h>
#include <arpa/inet.h>

#define PORT 8001

int main(int argc, char const *argv[])
{
    struct sockaddr_in address;
    int sock = 0, valread;
    struct sockaddr_in serv_addr;
    char *cmd = "{\"cmd\": \"demo\"}\n";
    char buffer[1024] = {0};

  
    memset(&serv_addr, '0', sizeof(serv_addr));
  
    serv_addr.sin_family = AF_INET;
    serv_addr.sin_port = htons(PORT);
      

	printf("\nPress Enter... \n");
	getchar();
	int i = 0;
	while (true){
		if ((sock = socket(AF_INET, SOCK_STREAM, 0)) < 0)
        {
            printf("\n Socket creation error \n");
            //return -1;
        }
		    // Convert IPv4 and IPv6 addresses from text to binary form
        if(inet_pton(AF_INET, "127.0.0.1", &serv_addr.sin_addr)<=0) 
        {
            printf("\nInvalid address/ Address not supported \n");
            //return -1;
        } else 
	
        if (connect(sock, (struct sockaddr *)&serv_addr, sizeof(serv_addr)) < 0)
        {
            printf("\nConnection Failed \n");
            //return -1;
        } else {
		    send(sock, cmd, strlen(cmd), 0);
		    printf(cmd);
		    valread = read(sock , buffer, 1024);
		    printf("%s\n",buffer);
		}
		printf("\nNext i = %d... \n", i);
		sleep(1);
		i++;
	};
    return 0;
}