#!/bin/bash
# Capture script by Muhammad Alfiyan Syamsuddin, 
# International Exchange Program, Anan National College of Technology, Anan, Tokushima, Japan
# make sure root has passwordless SSH access to server

# run raspistill from cron with this crontab :
# */3 * * * * /usr/bin/raspistill -vf -hf -w 1024 -h 768 -rot 270 -o "/var/www/current.jpg" && /home/pi/scripts/capture.sh

#DATE=$(date +"%Y-%m-%d_%H%M")
DATE=$(date +"%Y%m%d-%H%M")
DEVICE="Kitagawa"
SAVE="/var/www/current.jpg"
#/usr/bin/raspistill -vf -hf -w 1024 -h 768 -rot 270 -o $SAVE
#make sure target directory exists
#FNAME=$DEVICE-$DATE
FNAME=$DATE
scp $SAVE root@reenergy.info:/var/www/images/kg/$FNAME.jpg
ssh root@reenergy.info cp /var/www/images/kg/$FNAME.jpg /var/www/html/img/current.jpg