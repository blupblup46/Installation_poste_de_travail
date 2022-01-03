cd /data

rm TRAITEMENT/dataNorm

cd TRAITEMENT/CSV

cut -d ';' -f 1,2 < *.csv >> ../TRAITEMENT/dataNorm 

cd ../json

egrep "date|ip" < *.json | cut -d '"' -f 4 >> ../TRAITEMENT/dataNorm

cd ../apache

