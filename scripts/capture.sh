#!/bin/bash
#make sure root has passwordless SSH access to server

DATE=$(date +"%Y-%m-%d_%H%M")
DEVICE="Iwakura-Mother" #example
SAVE="/var/www/current.jpg"
raspistill -vf -hf -w 640 -h 480 -o $SAVE
#make sure target directory exists
scp $SAVE root@reenergy.info:/var/www/images/$DEVICE-$DATE.jpg
ssh root@reenergy.info cp /var/www/images/$DEVICE-$DATE.jpg /var/www/html/img/current.jpg