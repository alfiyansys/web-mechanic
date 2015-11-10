#!/bin/bash

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
fi
