#include <stdio.h>
#include <wiringPi.h>
#include <wiringPiI2C.h>
#include "ToString.h"
#include "jsonProcessor.h"
#include "Board.h"

Board::Board(const int dev1Id, const int dev2Id)
{
	int ret;
    wiringPiSetup();
    printf("Orange Pi tests\n");
    printf("KushlaVR@gmail.com\n");
    printf("wiringPiSetup() = %d\n", ret );

    fd_white = wiringPiI2CSetup (dev1Id);
    fd_yellow = wiringPiI2CSetup (dev2Id);

    write(0,false);
    
}


void Board::write(int port, bool value){
    if (port < 8){
        if (value)
            val_white &= ~(1<<port);
        else
            val_white |= (1<<port);
    }
    else if (port < 16){
        if (value)
            val_yellow &= ~(1<<(port-8));
        else
            val_yellow |= (1<<(port-8));
    }
    wiringPiI2CWrite(fd_white,val_white);
    wiringPiI2CWrite(fd_yellow,val_yellow);
}

void Board::demo(){
	int i;
    while(1){
        write(i,false);
        i++;
        if (i==16) i = 0;
        printf("Activated port #%d\n", i );
        write(i,true);
        delay(200);
    };

	return;
}

void Board::handle(char * buffer){
	//std::string str = buffer;
	JSonProcessor s = JSonProcessor(buffer);
	printf("cmd = ");
	std::string cmd = s.getValue("cmd");
	printf(cmd.c_str());
	printf("\n");
	//printf(buffer);
	if (cmd.find("set")==0){
		std::string v;
		for (int pin = 1; pin <= 16; pin++){
			std::string key = "p" + patch::to_string(pin);
			v = s.getValue(const_cast<const char*>(key.c_str()));
			if (v.length()==1){
				write(pin, (v.find("1")==0));
			};
			//printf("key = %s; v = %s;", key.c_str(), v.c_str());
			
		}
		/*
		v = s.getValue("p1");
		write(0, (v.find("1")==0));
		v = s.getValue("p2");
		write(1, (v.find("1")==0));
		v = s.getValue("p3");
		write(2, (v.find("1")==0));
		v = s.getValue("p4");
		write(3, (v.find("1")==0));
		v = s.getValue("p5");
		write(4, (v.find("1")==0));
		v = s.getValue("p6");
		write(5, (v.find("1")==0));
		v = s.getValue("p7");
		write(6, (v.find("1")==0));
		v = s.getValue("p8");
		write(7, (v.find("1")==0));
		v = s.getValue("p9");
		write(8, (v.find("1")==0));
		v = s.getValue("p10");
		write(9, (v.find("1")==0));
		v = s.getValue("p11");
		write(10, (v.find("1")==0));
		v = s.getValue("p12");
		write(11, (v.find("1")==0));
		v = s.getValue("p13");
		write(12, (v.find("1")==0));
		v = s.getValue("p14");
		write(13, (v.find("1")==0));
		v = s.getValue("p15");
		write(14, (v.find("1")==0));
		v = s.getValue("p16");
		write(15, (v.find("1")==0));*/
		
		printf("white = %d; yellow = %d\n", val_white, val_yellow);
	}
}