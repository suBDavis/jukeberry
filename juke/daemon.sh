#!/bin/bash
rm /tmp/fifo
mkfifo /tmp/fifo
chown www-data /tmp/fifo
cd /usr/share/nginx/www/juke
while true;
do
line=$(head -n 1 /usr/share/nginx/www/juke/list)
if [ -n "$line" ] && [ "$line" != "." ] ; then
        mplayer -slave -input file=/tmp/fifo playlist/$line

	echo "$(tail -n +2 list)" > list
	echo "list not empty" 
	rm playlist/$line
else
	echo "$(tail -n +2 list)" > list
fi
sleep 1
done
