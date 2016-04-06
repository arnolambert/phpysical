/**
 * read switch attached to an Arduino
 * Arduino code for the input example
 *
 *
 * Turns on and off a light emitting diode(LED) connected to digital pin 12
 * when closing a switch attached to digital pin 8.
 *
 *sends 'H' when switch is closed
 *sends 'L' when switch is open
 *
 *
 * LED attached from digital pin 12 to ground
 * switch attached between digital pin 8 and 5V
 * 10K pull down resistor attached between pin 8 and GND
 */

//use digital pin 8 as input
const int inputSwitchPin = 8;

//use pin 12 for led
const int inputLedPin =  12;

// variable for reading the switch status
int switchState = 0;

/*
* run only once
*/
void setup() 
{
    // initialize the LED pin as an output:
    pinMode(inputLedPin, OUTPUT);
  
    // initialize the switch pin as an input:
    pinMode(inputSwitchPin, INPUT);
  
    //begin serial communication
    Serial.begin(9600);
}

/*
* main loop
*/
void loop() 
{
    // read the state of the switch value:
    switchState = digitalRead(inputSwitchPin);

    // check if the switch is closed.
    // if it is, the switchState is HIGH:
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
}
