#pragma once
#include <iostream>
#include <string>


class JSonProcessor
{
public:
	JSonProcessor(const char * s);
	
	
	void appendComa();
	void AddValue(std::string name, std::string value);
	void beginObject();
	void endObject();
	void beginArray(std::string arrayName);
	void endArray();
	std::string getValue(const char* key);
	std::string substring(int startIndex, int endIndex);
	int indexOf(char* key);
	int indexOf(char* key, int pos);
	bool hasEnding (std::string const &fullString, std::string const &ending);
//private:
	std::string str;
};