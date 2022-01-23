#!/usr/local/bin/php

enlever les "" dans la date_format

<?php

    $config="config";
    $dossier_de_travail="finC1";
    $dir_out="Separation";
    $DataNorm="donnees";
    $DataTemp="donneesVrac";
    $dirCSV="$dossier_de_travail/$dir_out/CSV";
    $dirJSON="$dossier_de_travail/$dir_out/JSON";
    $dirAPACHE="$dossier_de_travail/$dir_out/APACHE";


    while(true){
        if(is_dir("$dossier_de_travail/$dir_out")){
            echo "création des fichiers de travail\n";
            fopen("$dossier_de_travail/$dir_out/$DataTemp", "w");
            fopen("$dossier_de_travail/$dir_out/$DataNorm", "w");
            
            echo "Scan du dossier $dirAPACHE\n";
            $APACHE = scandir($dirAPACHE);
            echo"Recuperation des donnees\n";

            echo "APACHE= \n";
            print_r($APACHE);

            foreach ($APACHE as $nomFic){

                $contenuFicAPACHE=file("$dirAPACHE/$nomFic");

                foreach($contenuFicAPACHE as $ligne){

                    $ligne = explode(" ",$ligne);

                    $date = explode(":",$ligne[3]);

                    $date = str_replace("/","-", $date[0]);
                    $date = str_replace("[","", $date);;
                    $date = str_replace("Dec", "12", $date);

                    file_put_contents("$dossier_de_travail/     $dir_out/$DataTemp", "$ligne[0] $date\n", FILE_APPEND);
                }
            }
        }
    }
?>