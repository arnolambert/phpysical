/* 
 * read the temp via a LM35 sensor
 *
 * connect the lm35 Vout to pin 0
 */
 
const int sensorPin = 0;
 
/*
 * run once
 */
void setup()
{
    // initialize serial communication                   
    Serial.begin(9600);
}
 
/*
* main loop
*/
void loop()
{
   //getting the voltage reading from the temperature sensor
   int reading = analogRead(sensorPin);  

   // converting that reading to voltage, for 3.3v arduino use 3.3
   int voltage = (int) reading * 660.0 / 1024; 
 
   // print out the voltage
   Serial.println(voltage); 
   //Serial.println(" volts");
 
   // now print out the temperature
   //float temperatureC = (voltage - 0.5) * 100 ;  //converting from 10 mv per degree wit 500 mV offset
                                               //to degrees ((volatge - 500mV) times 100)
   //Serial.println(temperatureC); 
   //Serial.println(" degress C");
 
   delay(1000);                                     //waiting a second
}
