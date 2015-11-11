#!/bin/bash

# This script used for firewall access on mother raspberry pi devices
# Gives internet access for child and port forwarding from mother to child
# Mother 8080 ~ Child 80
# Mother 2222 ~ Child 22

echo "1" > /proc/sys/net/ipv4/ip_forward
iptables -F
iptables -F -nat
iptables -t nat -A POSTROUTING -i eth0 -o ppp0 -j MASQUERADE
