/**
 * this Arduino sketch unites the sketches for
 *  - inputExample
 *  - outputExample
 * so we don't have to switch between different sketches during presentation
 *
 * analogueInputExample is still a different sketch (another arduino?)
 *
 * digital pin 13 has a led, controlled by reading 'H' or 'L' on serial
 *     there is a 47k resistor in series with the led
 * digital pin 12 has a led, controlled by the switch on digital pin 8
 * digital pin  8 has a switch to +5v , this sends 'H' or 'L' via serial
 *     there is a 10k pull down resistor from pin 8 to GND
 * analogue pin 2 has a pot, this sends a int via serial
 *
 */

//use pin 13 for led ( or use board led)
const int ledLedPin =  13;

//use pin 12 for led
const int inputLedPin =  12;

//use digital pin 8 as input
const int inputSwitchPin = 8;

//use analogue pin 2 as input
//const int analogInputPin = 2;

// variable for reading the switch status
int switchState = 0;

// variable for reading the incoming serial data
int ledIncomingByte;

// variable for reading the pot status
//int analogueVal = 0;

/*
* run only once
*/
void setup() 
{
    // initialize the LED pins as an output:
    pinMode(ledLedPin, OUTPUT);
    pinMode(inputLedPin, OUTPUT);
  
    // initialize the switch an pot pins as an input:
    pinMode(inputSwitchPin, INPUT);
    
    //set pin 13 to low, led off
 	digitalWrite(ledLedPin, LOW); 
 	
 	//set pin 12 to low, led off
 	digitalWrite(inputLedPin, LOW); 
  
    //begin serial communication
    Serial.begin(9600);
}

/*
* main loop
*/
void loop() 
{
    // read the state of the pushswitch value:
    switchState = digitalRead(inputSwitchPin);
    
    // read the analogueValue from the sensor 
	// and print to serial
    //analogueVal = analogRead(analogInputPin);    
    //Serial.println(analogueVal);
    // turn LED on:
    //digitalWrite(ledLedPin, HIGH);
    //delay(analogueVal); 
    
    // turn LED off:
    //digitalWrite(ledLedPin, LOW);   
    //delay(analogueVal);

    // check if the pushswitch is pressed.
    // if it is, the switchState is HIGH
    if (switchState == HIGH) {
        // turn LED on:
        digitalWrite(inputLedPin, HIGH);
        
        //print 'H' to serial communication
        Serial.println("H");
        Serial.flush(); 
    } else {
        // turn LED off:
        digitalWrite(inputLedPin, LOW);
    
        //pint 'L' to serial communication
        Serial.println("L");
        Serial.flush(); 
    }
    
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
