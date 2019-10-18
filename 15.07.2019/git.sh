#!/bin/bash

CONT=1
while [$CONT > 0]; do
  CONT=$(($CONT + 1))
done

cd /home/developer/Scrivania/TEMP/myrepo
git add .
git commit -m "new add files$CONT"
git push -u origin master
exit 0
