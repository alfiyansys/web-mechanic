#!/bin/bash
#make sure root has passwordless SSH access to server

DATE=$(date +"%Y-%m-%d_%H%M")
DEVICE="Iwakura-Mother-"
SAVE="/var/www/current.jpg"
raspistill -vf -hf -w 640 -h 480 -o $SAVE
scp $SAVE root@reenergy.info:/var/www/camera/$DEVICE-$DATE.jpg
