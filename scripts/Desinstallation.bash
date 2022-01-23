#!/bin/bash

docker container stop Transmetteur
docker container rm Transmetteur

docker container stop Extracteur
docker container rm Extracteur

docker container stop Gnuplot
docker container rm Gnuplot

docker volume rm Log2Graph

rm -r FinC1
rm -r FinC2