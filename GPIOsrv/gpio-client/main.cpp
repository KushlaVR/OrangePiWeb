// Client side C/C++ program to demonstrate Socket programming
#include <unistd.h>
#include <stdio.h>
#include <iostream>
#include <string>
#include <sys/socket.h>
#include <stdlib.h>
#include <netinet/in.h>
#include <string.h>
#include <arpa/inet.h>
#include "jsonProcessor.h"

#define PORT 8001

int main(int argc, char const *argv[])
{
    struct sockaddr_in address;
    int sock = 0, valread;
    struct sockaddr_in serv_addr;
	
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
			
			JSonProcessor cmd = JSonProcessor("");
			cmd.beginObject();
			cmd.AddValue("cmd","set");
			cmd.AddValue("p1", i==1?"1":"0");
			cmd.AddValue("p2", i==2?"1":"0");
			cmd.AddValue("p3", i==3?"1":"0");
			cmd.AddValue("p4", i==4?"1":"0");
			cmd.AddValue("p5", i==5?"1":"0");
			cmd.AddValue("p6", i==6?"1":"0");
			cmd.AddValue("p7", i==7?"1":"0");
			cmd.AddValue("p8", i==8?"1":"0");
	
			cmd.AddValue("p9", i==9?"1":"0");
			cmd.AddValue("p10", i==10?"1":"0");
			cmd.AddValue("p11", i==11?"1":"0");
			cmd.AddValue("p12", i==12?"1":"0");
			cmd.AddValue("p13", i==13?"1":"0");
			cmd.AddValue("p14", i==14?"1":"0");
			cmd.AddValue("p15", i==15?"1":"0");
			cmd.AddValue("p16", i==16?"1":"0");
			cmd.endObject();
			if (i>=16) i = 0;
			
		    send(sock, (cmd.str + "\n\0").c_str(), cmd.str.length()+2, 0);
		    printf(cmd.str.c_str());
		    valread = read(sock , buffer, 1024);
		    printf("%s\n",buffer);
		}
		int ret = close(sock);
		printf("close result = %d\n", ret);
		printf("\nNext i = %d... \n", i);
		sleep(1);
		i++;
	};
    return 0;
}