<?php
/**
 * read switch attached to an Arduino
 * php code for the input example
 */

$status = 'no status found';

include '/var/www/html/phpSerial/phpSerial.php';

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

//read one character
$status = $serial->readPort(1);
$serial->deviceClose();

if (strstr($status, 'L')) {
    $status = 'low';
} elseif (strstr($status, 'H')) {
    $status = 'high';
}

?>
<html>
<head>
    <title>Arduino input example</title>
</head>
<body>
status : <?php print $status;?>
</body>
</html>
