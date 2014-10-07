#!/bin/bash
cd /usr/share/nginx/www/juke
search="$*"
loadType=$(cat sel)
if [ "$loadType" = "youtube" ] ; then
	url="http://youtube.com/watch?v=$search"
	youtube-dl -x $url
	rename "s/ /_/g" *
	echo $(ls | grep .m4a) >> list
        echo $(ls | grep .m4a) >> history
        echo "added successfully"
        mv *.m4a playlist/
else
	echo "$search" > input
	cat sel >> input
	python ./groove.py < input > /dev/null
	rename "s/ /_/g" *
	echo $(ls | grep .mp3) >> list
	echo $(ls | grep .mp3) >> history
	echo "added successfully"
	mv *.mp3 playlist/
fi
