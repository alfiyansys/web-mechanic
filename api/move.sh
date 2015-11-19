#!/bin/bash
# API-Shell Servo Controller by Muhammad Alfiyan Syamsuddin,
# International Exchange Program, Anan National College of Technology
# Control servo motor movement using serial connection

if [ "$1" == "d" ]; then
	echo "d" > /dev/ttyACM*
elif [ "$1" == "u" ]; then
	echo "u" > /dev/ttyACM*
elif [ "$1" == "l" ]; then
        echo "l" > /dev/ttyACM*
elif [ "$1" == "r" ]; then
        echo "r" > /dev/ttyACM*
elif [ "$1" == "U" ]; then
        echo "U" > /dev/ttyACM*
elif [ "$1" == "D" ]; then
        echo "D" > /dev/ttyACM*
elif [ "$1" == "L" ]; then
        echo "L" > /dev/ttyACM*
elif [ "$1" == "R" ]; then
        echo "R" > /dev/ttyACM*
elif [ "$1" == "S" ]; then
        echo "S" > /dev/ttyACM*
elif [ "$1" == "s" ]; then
        echo "s" > /dev/ttyACM*
fi
