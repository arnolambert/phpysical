#!/usr/bin/php
<?php
/**
 * read a switch attached to Raspberry Pi
 * php code for the input example via sudo on CLI
 *
 * connect switch between GPIO 18 (2-6 or P1-12) en 5V (2-2 or P1-4)
 */

require '/var/www/html/php-gpio/vendor/autoload.php';

use PhpGpio\Gpio;

$gpio = new GPIO();
$gpio->setup(18, 'in');

print "\nstatus of switch: " . $gpio->input(18) . "\n";
