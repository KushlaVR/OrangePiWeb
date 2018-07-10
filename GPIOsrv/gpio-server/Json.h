#pragma once
 
#include <iostream>
#include <stdio.h>
#include <string.h>

namespace STD
{
 
int StrLen(char*);
void StrCpy(char*, char*);
bool StrCmp(char*, char*);
 
class String
{
public:
    String(char* _str = "");
    String(const String&);
 
    ~String();
	
    int size();
    unsigned char startsWith( const String &s2 ) const;
    unsigned char startsWith( const String &s2, unsigned int offset ) const;
    
    unsigned char endsWith( const String &s2 ) const;

    int indexOf(char c) const;
    int indexOf(char ch, unsigned int fromIndex ) const;
    int indexOf(const String &s2) const;
    int indexOf(const String &s2, unsigned int fromIndex) const;
    String substring(unsigned int left, unsigned int right) const;
	
	
    String& operator=(const String&);
    friend String operator+(const String&, const String&);
    String& operator+=(const String&);
 
    friend bool operator==(const String&, const String&);
    friend bool operator!=(const String&, const String&);
    friend bool operator>(const String&, const String&);
    friend bool operator>=(const String&, const String&);
    friend bool operator<(const String&, const String&);
    friend bool operator<=(const String&, const String&);
 
    const char& operator[](int) const;
    char& operator[](int);
 
    friend std::ostream& operator<<(std::ostream&, const String&);
    friend std::istream& operator>>(std::istream&, String&);
 
//private:
    char* str;
};
}//STD


// Json.h
#ifndef _JSON_h
#define _JSON_h


class JsonString: STD::String {
private:
public:
	JsonString(char *cstr = "");
	JsonString(String &str);
	void appendComa();
	void AddValue(String name, String value);
	void beginObject();
	void endObject();
	void beginArray(String arrayName);
	void endArray();
	String getValue(char* key);
};

#endif

