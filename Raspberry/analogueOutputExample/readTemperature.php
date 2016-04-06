<?php
/**
 * read the temperature over Arduino
 * show the result via servo
 * php code for the analogue output example/read temperature
 *
 * we are using a G9 micro servo
 * for wire colours see
 * https://www.pololu.com/blog/16/electrical-characteristics-of-servos-and-introduction-to-the-servo-control-interface
 * connect the contol wire (yellow/orange) of servo to GPIO pin 4 (1-4 of P1-7)
 * connect the power wire (red) of servo to 5V (2-2 or P1-4)
 * connect the GND wire (brown) of servo to GND (2-3 or P1-6)
 *
 * servoBlaster daemon must be running for the soft pwm
 * (could be done with php-gpio also)
 *
 */
include '/var/www/html/phpSerial/phpSerial.php';

//initialize the serial connection via phpSerial
$serial = new phpSerial;
$serial->deviceSet('/dev/ttyACM0');
$serial->confBaudRate(9600);
$serial->confParity('none');
$serial->confCharacterLength(8);
$serial->confStopBits(1);
$serial->deviceOpen();

//Arduino requires a 2 second delay in order to receive the message
sleep(2);

/*
 * show the information
 */
print "\nstart\n";
$servoBlaster = fopen('/dev/servoblaster', 'w');
//use GPIO 4 (1-4 of P1-7)
$servoPort = 0;

while (1) {
    $temp = $serial->readPort(20);
    print $temp . "\n";

    //we'll show temp as percentage
    //this means we can have max 100%
    $temp = $temp; //@todo calculation depends on max value temp sensor
    if ($temp > 99) {
        $temp = 100;
    }

    $cmd = $servoPort . '=' . $temp . "%\n";
    print "this is wat happens : $cmd \n";
    fwrite($servoBlaster, $cmd);
}


