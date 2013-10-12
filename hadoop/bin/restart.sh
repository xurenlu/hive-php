#!/bin/sh
rm /home/renlu/hadoop/logs/*.*
hadoop namenode -format
hadoop datanode -format
hstop-all.sh
hstart-all.sh
jps
netstat -nl
