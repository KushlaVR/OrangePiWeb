#include "jsonProcessor.h"


JSonProcessor::JSonProcessor(const char * s)
{
	str = s;
}


void JSonProcessor::appendComa() {
	if (hasEnding(str, "\"") || hasEnding(str, "}") || hasEnding(str, "]")) str += ",";
}

void JSonProcessor::AddValue(std::string name, std::string value)
{
	appendComa();
	str += "\"" + name + "\":" + "\"" + value + "\"";
}

void JSonProcessor::beginObject()
{
	appendComa();
	str += "{";
}

void JSonProcessor::endObject()
{
	str += "}";
}


void JSonProcessor::beginArray(std::string arrayName)
{
	appendComa();
	str += "\"" + arrayName + "\":[";
}

void JSonProcessor::endArray()
{
	str += "]";
}

std::string JSonProcessor::getValue(const char * key)
{
	std::string fullKeyName;
	fullKeyName = key;
	if (indexOf("\"") != 0) fullKeyName = "\"" + fullKeyName + "\"";
	int p = indexOf(fullKeyName.c_str());
	if (p > 0) {
		p = indexOf(":", p + 1);
		//console.printf("p=%d\n", p);
		if (p > 0) {
			//console.printf("p=%d\n", p);
			int startIndex = indexOf("\"", p + 1);
			if (startIndex > 0) {
				startIndex++;
				//console.printf("startIndex=%d\n", startIndex);
				int endIndex = indexOf("\"", startIndex);
				//console.printf("endIndex=%d\n", endIndex);
				if (endIndex > 0) {
					return substring(startIndex, endIndex);
				}
			}
		}
	}
	return "";
}

std::string JSonProcessor::getValue(std::string const &key)
{
	return getValue(const_cast<const char*>(key.c_str()));
}

std::string JSonProcessor::substring(int startIndex, int endIndex)
{
	return str.substr(startIndex, endIndex - startIndex);
}

int JSonProcessor::indexOf(const char* key)
{
	return str.find(key);
}

int JSonProcessor::indexOf(const char* key, int pos)
{
	return str.find(key, pos);
}

bool JSonProcessor::hasEnding (std::string const &fullString, std::string const &ending) {
    if (fullString.length() >= ending.length()) {
        return (0 == fullString.compare (fullString.length() - ending.length(), ending.length(), ending));
    } else {
        return false;
    }
}