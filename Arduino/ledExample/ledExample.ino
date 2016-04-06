/*
* control a led attached to an Arduino
* Arduino part of the led example
*
* connect led + resistor between digital pin 13 and GND
*/

//use pin 13 for led ( or use board led)
const int ledLedPin =  13;

// variable for reading the incoming serial data
int ledIncomingByte;

/*
* run this code once
*/                          
void setup() 
{ 
 	// initialize the LED pins as an output:
    pinMode(ledLedPin, OUTPUT);
    pinMode(inputLedPin, OUTPUT);
    
    //set pin 13 to low, led off
 	digitalWrite(ledLedPin, LOW); 
  
    //begin serial communication
    Serial.begin(9600);           
}

/*
* main loop
*/
void loop() 
{
	// see if there's incoming serial data:
	if (Serial.available() > 0) {          
	
	    // read the oldest byte in the serial buffer:  
		ledIncomingByte = Serial.read(); 
		       
        if (ledIncomingByte == 'H') { 
        	// if it's a capital H (ASCII 72), turn on the LED:           
            digitalWrite(ledLedPin, HIGH);
        }
        
        if (ledIncomingByte == 'L') { 
        	// if it's an L (ASCII 76) turn off the LED:           
			digitalWrite(ledLedPin, LOW);
        }
	}
}