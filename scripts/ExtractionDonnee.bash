#!/bin/bash

cd ~/Document/VOL/TRAITEMENT

rm dataNorm

cd ~/Document/VOL/TRAITEMENT/CSV

cut -d ';' -f 1,2 < *.csv >> ~/Document/VOL/TRAITEMENT/dataNorm 

cd ~/Document/VOL/TRAITEMENTjson

egrep "date|ip" < *.json | cut -d '"' -f 4 >> /Document/VOL/TRAITEMENT/dataNorm

cd ~/Document/VOL/TRAITEMENTapache

