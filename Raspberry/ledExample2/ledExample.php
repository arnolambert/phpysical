<?php
/**
 * control a led attached to an Raspberry
 * php code for the led example
 *
 * connect led + resistor between GPIO 17 en GND
 *
 * @link http://www.raspberry-pi-geek.com/Archive/2014/07/PHP-on-Raspberry-Pi
*/

//check if we got some status from the form
if (isset($_REQUEST['status'])
        && $_REQUEST['status'] != ''
) {
    $status =  $_REQUEST['status'];
    $statusOn = 'checked="checked"';
    $statusOff = '';
    if ($status === 'on') {
        $statusOff = 'checked="checked"';
        $statusOn = '';
    }
}

//phpGPIO code here

require 'vendor/autoload.php';

use PhpGpio\Gpio;

$gpio = new GPIO();
$gpio->setup(17, 'out');
if ($status == 'on') {
    $gpio->output(17, 1);
} else {
    $gpio->output(17, 0);
}
sleep(1);

?>
<html>
<head>
    <title>Arduino led example</title>
</head>
<body>
    <form method="POST">
        <input type="radio" name="status" value="on" />on<br />
        <input type="radio" name="status" value="off" />off<br />
        <input type="submit" value="Send" />
    </form>
</body>
</html>