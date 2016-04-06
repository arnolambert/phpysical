<?php
/**
 * read a switch attached to Raspberry Pi
 * php code for the input example
 *
 * connect switch between GPIO 18 (2-6 or P1-12) en 5V (2-2 or P1-4)
 *
 */

//user wiringpi to set pin 18 as ouput
shell_exec('/usr/local/bin/gpio -g mode 18 in');
$switchStatus = shell_exec('/usr/local/bin/gpio -g read 18');

if ($switchStatus == 1) {
    $image = "catSlow.jpg";
} else {
    $image = "catFast.jpg";
}

?>
<html>
<head>
    <title>Raspberry Pi led example</title>
    <meta http-equiv="refresh" content="1" />
</head>
<body>

status of switch: <?php print $switchStatus; ?><br />
<div style="text-align: center;">
<img src="<?php print $image?>" alt="how fast"/>
</div>
</body>
</html>
