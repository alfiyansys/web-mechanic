import subprocess
cmd = ['sudo', '/home/pi/scripts/capture.sh']
proc = subprocess.Popen(cmd, shell=True, stdin=subprocess.PIPE, stdout=subprocess.PIPE, stderr=subprocess.PIPE)