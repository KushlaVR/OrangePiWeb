#include "Json.h"





JsonString::JsonString(char * cstr) :String(cstr) {}
JsonString::JsonString(String &str) :String(str) {}

void JsonString::appendComa() {
	if (endsWith("\"") || endsWith("}") || endsWith("]")) *this += ",";
}

void JsonString::AddValue(String name, String value)
{
	appendComa();
	*this += "\"" + name + "\":" + "\"" + value + "\"";
}

void JsonString::beginObject()
{
	appendComa();
	*this += "{";
}

void JsonString::endObject()
{
	String s = *static_cast<String*> (this);
	*this += "}";
}


void JsonString::beginArray(String arrayName)
{
	appendComa();
	*this += "\"" + arrayName + "\":[";
}

void JsonString::endArray()
{
	*this += "]";
}

STD::String JsonString::getValue(char * key)
{
	int p = indexOf(key);
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
