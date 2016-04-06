/*
* control a led attached to an Arduino
* Arduino part of the led example2 with input
*
* connect led + resistor between digital pin 2 and GND
*/

//what pin will be used for the led
int pin = 2;

//where will we store the status
char status[3];

/*
* run this code once
*/
void setup() 
{
	// initialize serial communications at 9600 bps:
  	Serial.begin(9600);
  	
  	//set pin 2 as digital output
	pinMode(2, OUTPUT);
	
	//set pin 2 to low
 	digitalWrite(2, false);
}

/*
* 'main' loop
*/
void loop() 
{
	
  	readSerial(status);
		
	if (status == "on") { 
		digitalWrite(2, true); //Enables the led on pin 2
	} else if (status == "off") {
		digitalWrite(2, false); //Disables the led on pin 2
	}
	
	delay(100); //Waits 100 ms
}

/*
* read input serial into a var
*/
int readSerial(char result[])
{
	int i = 0;
  
  	//wait till we see input
  	while (1) {
  		//keep trying till we read something
    	while (Serial.available() > 0) {
      		char inChar = Serial.read();
      		//this is the end, store and return
      		if (inChar == '\n') {
        		result[i] = '\0';
        		Serial.flush();
        		return 0;
      		}
      
      		if (inChar != '\r') {
        		result[i] = inChar;
        		i++;
      		}
    	}
  	}
}
