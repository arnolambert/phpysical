<?php
/**
 * blink a led attached to an Arduino
 * php code for the led example
 */

include '/var/www/html/phpSerial/phpSerial.php';

try {
    //initialize the serial connection via phpSerial
    $serial = new phpSerial;
    $serial->deviceSet('/dev/ttyACM1');
    $serial->confBaudRate(9600);
    $serial->confParity('none');
    $serial->confCharacterLength(8);
    $serial->confStopBits(1);
    $serial->deviceOpen();

    //Arduino requires a 2 second delay in order to receive the message
    sleep(2);

} catch (Exception $e) {
    print 'no serial connection!!!';
}

?>
<html>
<head>
    <title>Arduino led example</title>
</head>
<body>
<?php
for ($count = 0; $count < 5; $count ++) {

    //turn the led on (set pin High)
    print 'led on<br />';
    $serial->sendMessage('H');
    sleep(2);

    //turn the led off again (set pin Low)
    print 'led off<br />';
    $serial->sendMessage('L');
    sleep(2);

}

//close the serial port
$serial->deviceClose();
?>
</body>
</html>
