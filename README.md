# phpysical
code used with the presentation "Let's get PHPysical"

slides for the presentation can be found here https://drive.google.com/open?id=1tFpfDAn5X1sHpHWyRTJFJwIvzwvhd6RZgojvbgKmtQE

INSTALLATION:

you will need to install phpSerial in a dir 'phpSerial' on the same level as the Arduino and Raspberry dirs
you will need to install php-gpio in a dir 'php-gpio' on the same level as the Arduino and Raspberry dirs
both can be installed via Composer, will try to add composer file later

code for the combination of computer and Arduino are in the Arduino dir
code for Raspberry (with or without Arduino) are in the Raspberry dir

the files called 'connections.txt' contain wiring info for the demo

the php code was installed on a Raspberry Pi with Apache, PHP, WiringPi and ServoBlaster installed.
Running ServoBlaster does block the use of WiringPi GPIO, so you have to start ServoBlaster only for the analogueOutputExamples and kill it for the others!!!!


