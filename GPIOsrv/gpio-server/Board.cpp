#include <stdio.h>
#include <wiringPi.h>
#include <wiringPiI2C.h>
#include <Board.h>
#include "Json.h"

Board::Board(const int dev1Id = 0x25, const int dev2Id = 0x27)
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
	STD::String str = STD::String(buffer);
	JsonString s = JsonString(str);
	printf(buffer);
}