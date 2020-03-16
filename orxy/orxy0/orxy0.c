#include <stdio.h>
#include <stdlib.h>

int main(){
   system("settings put global http_proxy :0");
   for(int i=0; i<5; ++i);
   system("monkey -p com.inetric.orxy -c android.intent.category.LAUNCHER 1");
   //system("input keyevent 66");
   return 0;}