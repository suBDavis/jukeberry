#!/bin/bash
cd /usr/share/nginx/www/juke
echo "$*" > searchin
echo "q" >> searchin
python groove.py < searchin > /usr/share/nginx/www/juke/searchOut
echo "$(tail -n 10 /usr/share/nginx/www/juke/searchOut)" > /usr/share/nginx/www/juke/searchOut
