#!/bin/bash
ls Fichiers_de_travail > Fichiers_de_travail/config
docker container cp Fichiers_de_travail Transmetteur:/data/
