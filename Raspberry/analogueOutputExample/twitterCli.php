#!/usr/bin/php
<?php
/**
 * ask the Twitter API how many tweets contain the tag #phpwestvlaanderen
 * show this using a servo
 * php code for the analogue output example on cli
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

/*
 * get the information
 */
require_once('TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => '1552656312-c9mI58OxKFzcH15ECqeACbg72t5zA8IbvbrWqjt',
    'oauth_access_token_secret' => 'iJSZAV6dAWb6aet5y7gimBYKWTgDPKFLwkl6oMmueH6LP',
    'consumer_key' => 'aT9Phxu3md3FsY1EAIOHuN4dW',
    'consumer_secret' => 'o8YimqfZ5wdpUAGllzHUxo9fF4EYO3M37aTrSXrhFBTV9NdghK'
);

$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=#phpwestvlaanderen';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);

/*
 * show the information
 */
print "\nstart\n";
$servoBlaster = fopen('/dev/servoblaster', 'w');
//use GPIO 4 (1-4 of P1-7)
$servoPort = 0;

while (1) {
    $response = $twitter
        ->setGetfield($getfield)
        ->buildOauth($url, $requestMethod)
        ->performRequest();

    $response = json_decode($response);
    $response = $response->statuses;

    //we'll show the number of tweets as percentage
    //this means we can have max 100 tweets....= 100%
    $numberOfTweets = count($response);
    if ($numberOfTweets > 99) {
        $numberOfTweets = 100;
    }

    $cmd = $servoPort . '=' . $numberOfTweets . "%\n";
    print "this is wat happens : $cmd \n";
    fwrite($servoBlaster, $cmd);

    sleep(5);

}

