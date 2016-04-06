<?php
/**
 * ask the Twitter API how many tweets contain the tag #phpwestvlaanderen
 * show this result on a refreshing page
 * php code for the analogue output example
 *
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
$response = $twitter
    ->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();

$response = json_decode($response);
$response = $response->statuses;
$numberOfTweets = count($response);

$servoBlaster = fopen('/dev/servoblaster', 'w');
//use GPIO 4 (1-4 of P1-7)
$servoPort = 0;

if ($numberOfTweets > 99) {
    $numberOfTweets = 100;
}

$cmd = $servoPort . '=' . $numberOfTweets . "%\n";
fwrite($servoBlaster, $cmd);
?>

<html>
<head>
<title>Raspberry analogue output example</title>
<meta http-equiv="refresh" content="20" />
</head>
<body>
number of tweets : <?php print $numberOfTweets;?>
</body>
</html>

