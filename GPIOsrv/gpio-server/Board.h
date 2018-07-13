#include <stdio.h>
#include <wiringPi.h>
#include <wiringPiI2C.h>

class Board
{
private:
	int fd_white, fd_yellow;
	char val_white = 0xFF, val_yellow = 0xFF;
public:
	Board(const int dev1Id, const int dev2Id);
	void setPort(int port, bool value);
	bool getPort(int port);
	void demo();
	void handle(char * buffer);
	void printValues();
	void read();
	void write();
};