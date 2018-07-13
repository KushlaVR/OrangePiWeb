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

    read();
    printValues();
}


void Board::setPort(int port, bool value){
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
}

bool Board::getPort(int port){
	if (port < 8){
		return ((val_white & (1<<port))==0);
    }
    else if (port < 16){
        return ((val_yellow & (1<<(port-8)))==0);
    }
	return false;
}

void Board::read(){
	val_white = wiringPiI2CRead(fd_white);
	val_yellow = wiringPiI2CRead(fd_yellow);
}

void Board::write(){
	wiringPiI2CWrite(fd_white,val_white);
	wiringPiI2CWrite(fd_yellow,val_yellow);
}

void Board::demo(){
	int i;
    while(1){
        setPort(i,false);
        i++;
        if (i==16) i = 0;
        printf("Activated port #%d\n", i );
        setPort(i,true);
        delay(200);
		write();
    };

	return;
}

void Board::handle(char * buffer){
	
	JSonProcessor s = JSonProcessor(buffer);
	printf("cmd = ");
	std::string cmd = s.getValue("cmd");
	printf(cmd.c_str());
	printf("\n");
	buffer[0] = 0;
	if (cmd.find("set")==0){
		std::string v;
		for (int pin = 1; pin <= 16; pin++){
			std::string key = "p" + patch::to_string(pin);
			v = s.getValue(key);
			if (v.length()==1){
				setPort(pin - 1, (v.find("1")==0));
			};
		}
		write();
		s.str = "";
		s.beginObject();
		for (int pin = 1; pin <= 16; pin++){
			std::string key = "p" + patch::to_string(pin);
			s.AddValue(key, getPort(pin-1)?"1":"0");
		}
		s.endObject();
		s.str.copy(buffer,s.str.length(),0);
		printValues();
	}//set
	else if (cmd.find("get")==0){
		s.str = "";
		s.beginObject();
		for (int pin = 1; pin <= 16; pin++){
			std::string key = "p" + patch::to_string(pin);
			s.AddValue(key, getPort(pin-1)?"1":"0");
		}
		s.endObject();
		s.str.copy(buffer,s.str.length(),0);
		printValues();
	}
}

void Board::printValues()
{
	//printf("white = %d; yellow = %d\n", val_white, val_yellow);
	printf("white [");
	for (int i = 0; i<8; i++){
		if ((val_white & (1 << i))==0)
		{
			printf("*");
		} else {
			printf("-");
		}
	}
	printf("]; yellow = [");
	for (int i = 0; i<8; i++){
		if ((val_yellow & (1 << i))==0)
		{
			printf("*");
		} else {
			printf("-");
		}
	}
	printf("]\n");
}