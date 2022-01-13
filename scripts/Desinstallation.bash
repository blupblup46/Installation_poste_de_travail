#!/bin/bash

docker container stop Transmetteur
docker container rm Transmetteur

docker container stop Extracteur
docker container rm Extracteur

docker volume rm Log2Graph