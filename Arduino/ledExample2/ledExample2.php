<?php
/**
 * control a led attached to an Arduino
 * php code for the led example 2 (with input)
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

if (isset($status)) {
    include '/var/www/html/phpSerial/phpSerial.php';

    try {
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

        $serial->sendMessage($status);
        $serial->deviceClose();
    } catch (Exception $e) {
        print 'no serial connection!!!';
    }
}

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
