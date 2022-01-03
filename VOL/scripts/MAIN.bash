#!/bin/bash

docker image pull bigpapoo/php-cli74
docker image pull bigpapoo/gnuplot

docker container kill cont1
docker container rm cont1
docker container run --name cont1 -i -v '/Users/louanrobert/Documents/Documents - MacBook Air de Louan/01_BUT/S1/SAés/02_installation_environnement_travail/SAÉ/VOL':/data bigpapoo/php-cli74 ./scripts/container1.bash

docker container kill cont1
docker container rm cont1
docker container run --name cont1 -i -v '/Users/louanrobert/Documents/Documents - MacBook Air de Louan/01_BUT/S1/SAés/02_installation_environnement_travail/SAÉ/VOL':/data bigpapoo/php-cli74 ./scripts/container2.bash

echo "fini"