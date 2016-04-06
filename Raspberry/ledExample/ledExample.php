<?php
/**
 * blink a led attached to Raspberry Pi
 * php code for the led example
 *
 * connect led between GPIO 17 (1-6 or P1-11) en GND (2-3 or P1-6)
 *
 */

//user wiringpi to set pin 17 as ouput
shell_exec('/usr/local/bin/gpio -g mode 17 out');

?>
<html>
<head>
    <title>Raspberry Pi led example</title>
</head>
<body>
<?php
for ($count = 0; $count < 3; $count ++) {

    //turn the led on (set pin High)
    print 'led on<br />';
    shell_exec("/usr/local/bin/gpio -g write 17 1");
    sleep(2);

    //turn the led off again (set pin Low)
    print 'led off<br />';
    shell_exec("/usr/local/bin/gpio -g write 17 0");
    sleep(2);
}
?>
</body>
</html>
