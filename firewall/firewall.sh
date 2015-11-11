#!/bin/bash

# This script used for firewall access on mother raspberry pi devices
# Gives internet access for child and port forwarding from mother to child
# Mother 8080 ~ Child 80
# Mother 2222 ~ Child 22

# make sure its enabled
echo "1" > /proc/sys/net/ipv4/ip_forward

# flush all tables
iptables -F
iptables -F -t nat

# provide internet connection
iptables -t nat -A POSTROUTING -o ppp0 -j MASQUERADE

# gives SSH to child
iptables -t nat -A PREROUTING -p tcp -i ppp0 --dport 2222 -j DNAT --to-destination 192.168.1.10:22
iptables -A FORWARD -p tcp -d 192.168.1.10 --dport 22 -m state --state NEW,ESTABLISHED,RELATED -j ACCEPT