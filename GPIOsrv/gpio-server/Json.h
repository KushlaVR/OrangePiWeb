#ifndef STRING_H
#define STRING_H
 
#include <iostream>

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
	bool endsWith(const String& suffix);
	bool startsWith(const String& prefix);
	
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
 
private:
    char* str;
};
 
String::String(char* _str)
{
    str = new char[StrLen(_str)+1];
    StrCpy(str, _str);
}
 
String::String(const String& rhs)
{
    str = new char[StrLen(rhs.str)+1];
    StrCpy(str, rhs.str);
}
 
String::~String()
{
    delete str;
}
 
 
int String::size(){
	return StrLen(str);
}


bool String::endsWith(const STD::String& suffix)
{

    return false;//str.size() >= suffix.size() && 0 == str.compare(str.size()-suffix.size(), suffix.size(), suffix);
}

bool String::startsWith(const STD::String& prefix)
{
    return false;//str.size() >= prefix.size() && 0 == str.compare(0, prefix.size(), prefix);
}

// ---
 
String& String::operator=(const String& rhs)
{
    if (this != &rhs)
    {
        delete[] this->str;
        this->str = new char[StrLen(rhs.str)+1];
        StrCpy(this->str, rhs.str);
    }
 
    return *this;
}
 
String& String::operator+=(const String& rhs)
{
    int sz = StrLen(this->str) + StrLen(rhs.str);
 
    char* ts = new char[sz+1];
 
    for (int i = 0; i < StrLen(this->str); i++)
        ts[i] = this->str[i];
    for (int ii = StrLen(this->str), j = 0; ii <= sz; ii++, j++)
        ts[ii] = rhs.str[j];
 
    delete this->str;
    this->str = ts;
 
    return *this;
}
 
String operator+(const String& lhs, const String& rhs)
{
    String ts = lhs;
 
    return ts += rhs;
}
 
// --
 
bool operator==(const String& lhs, const String& rhs)
{
    return StrCmp(lhs.str, rhs.str);
}
 
bool operator!=(const String& lhs, const String& rhs)
{
    return !(StrCmp(lhs.str, rhs.str));
}
 
bool operator>(const String& lhs, const String& rhs)
{
    return (StrLen(lhs.str) > StrLen(rhs.str)) ? true : false;
}
 
bool operator>=(const String& lhs, const String& rhs)
{
    return (StrLen(lhs.str) >= StrLen(rhs.str)) ? true : false;
}
 
bool operator<(const String& lhs, const String& rhs)
{
    return (StrLen(lhs.str) < StrLen(rhs.str)) ? true : false;
}
 
bool operator<=(const String& lhs, const String& rhs)
{
    return (StrLen(lhs.str) <= StrLen(rhs.str)) ? true : false;
}
 
// ---
 
const char& String::operator[](int i) const
{
    //std::cerr << "Index out of range. \n";
    return (i >= 0 && i < StrLen(this->str)) ? this->str[i] : 0;
}
 
char& String::operator[](int i)
{
    static char DUMMY = '\0';
    //std::cerr << "Index out of range. \n";
    return (i >= 0 && i < StrLen(this->str)) ? this->str[i] : DUMMY;
}
 
// ---
 
std::ostream& operator<<(std::ostream& os, const String& obj)
{
    return os << obj.str;
}
 
std::istream& operator>>(std::istream& is, String& obj)
{
    char BUFF[2048];
 
    is.getline(BUFF, sizeof BUFF);
    obj = BUFF;
 
    return is;
}
 
// ---
 
int StrLen(char* _str)
{
    int size = 0;
 
    for (; _str[size] != 0; size++);
 
    return size;
}
 
void StrCpy(char* in_str, char* src_str)
{
    for (int i = 0; i < StrLen(in_str); i++)
        in_str[i] = src_str[i];
}
 
bool StrCmp(char* str_f, char* str_s)
{
    int i = 0;
 
    for (; str_f[i] == str_s[i] && i < StrLen(str_f); i++);
 
    return (i == StrLen(str_f)) ? true : false;
}
 
}
 
#endif


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

