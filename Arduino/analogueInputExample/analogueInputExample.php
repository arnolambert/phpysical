<?php
/**
 * read switch attached to an Arduino
 * php code for the analogue input example
 */

//hide the errors from phpSerial!!
error_reporting(0);

$status = 'no status found';

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

$status = $serial->readPort();
$status = explode("\n", $status);
$status = $status[0];
$serial->deviceClose();

if ($status < 200) {
    $image = 'stop.jpg';
} elseif ($status < 400) {
    $image = 'slow.jpg';
} elseif ($status < 600) {
    $image = 'car.jpg';
} elseif ($status < 800) {
    $image = 'fastcar.jpg';
} elseif ($status < 1000) {
    $image = 'zoef.jpg';
} else {
    $image = 'rocket.jpg';
}
?>
<html>
<head>
    <title>Arduino input example</title>
    <meta http-equiv="refresh" content="2" />
</head>
<body>
input value : <?php print $status;?><br />
<div style="text-align: center;">
<img src="<?php print $image?>" alt="how fast"/>
</div>
</body>
</html>
