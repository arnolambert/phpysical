#!/usr/bin/php
<?php
/**
 * blink a led attached to Raspberry Pi
 * php code for the led example via sudo on CLI
 *
 * connect led between GPIO 17 (1-6 or P1-11) en GND (2-3 or P1-6)
 *
 */

require '/var/www/html/php-gpio/vendor/autoload.php';

use PhpGpio\Gpio;

$gpio = new GPIO();
$gpio->setup(17, 'out');

for ($count = 0; $count < 10; $count ++) {

    //turn the led on (set pin High)
    print "led on\n";
    $gpio->output(17, 1);
    sleep(2);

    //turn the led off again (set pin Low)
    print "led off\n";
    $gpio->output(17, 0);
    sleep(2);
}
