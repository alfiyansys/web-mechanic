#!/bin/bash

minicom -b 9600 -o -D /dev/ttyAMA* &
sleep 10
