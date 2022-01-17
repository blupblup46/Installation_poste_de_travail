#!/bin/bash
echo Recuperation des images...
docker image pull bigpapoo/php-cli74

echo Creation du volume
docker volume create Log2Graph

echo Copie des scripts dans le volume
docker container run -d --name copie-temp -v Log2Graph:/data bigpapoo/php-cli74 tail -f /dev/null
docker cp TransfertFichier.php copie-temp:/data
docker cp ExtractionDonnee.bash copie-temp:/data

echo Fin de la copie
docker container stop copie-temp
docker container rm copie-temp

echo creation du dossier de travail
mkdir Fichiers_de_travail

echo Lancement des conteneurs
docker container run -d --name Transmetteur -w /data -v Log2Graph:/data bigpapoo/php-cli74  ./TransfertFichier.php

docker container run -d --name Extracteur -w /data -v Log2Graph:/data bigpapoo/php-cli74 ./ExtractionDonnee.bash
