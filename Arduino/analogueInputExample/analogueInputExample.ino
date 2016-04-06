/*  
 * read pot meter attached to an Arduino
 * Arduino code for the analogue input example
 
 * turns on and off a light emitting diode(LED) connected to digital  
 * pin 13. The amount of time the LED will be on and off depends on
 * the value obtained by analogRead(). In the easiest case we connect
 * a potentiometer to analog pin 2.
 *
 *
 */

//use analogue pin 2 as input
const int analogInputPin = 2;

//use pin 13 for led ( or use board led)
const int ledLedPin =  13;

// variable for reading the pot status
int analogueVal = 0;

void setup() 
{
    // initialize serial communication                   
    Serial.begin(9600);
  
    // initialize the LED pins as an output:
    pinMode(ledLedPin, OUTPUT);
  
}

void loop() 
{
	// read the analogueValue from the sensor 
	// and print to serial
    analogueVal = analogRead(analogInputPin);    
    Serial.println(analogueVal);
    
    // turn LED on:
    digitalWrite(ledLedPin, HIGH);
    delay(analogueVal); 
    
    // turn LED off:
    digitalWrite(ledLedPin, LOW);   
    delay(analogueVal);

    Serial.flush();
}
