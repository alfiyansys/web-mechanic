#!/bin/bash
# Servo init script by Muhammad Alfiyan Syamsuddin, 
# International Exchange Program, Anan National College of Technology
# minicom -b 9600 -o -D /dev/ttyAMA* &
stty -F /dev/ttyACM* 9600 cs8 cread clocal # serial initialization
sleep 10
