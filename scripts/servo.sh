#!/bin/bash
# Servo init script by Muhammad Alfiyan Syamsuddin, 
# International Exchange Program, Anan National College of Technology
minicom -b 9600 -o -D /dev/ttyAMA* &
sleep 10
