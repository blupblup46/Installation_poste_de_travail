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

            foreach($APACHE as $nomFic){

                $contenuFicAPACHE=file("$dirAPACHE/$nomFic");

                foreach($contenuFicAPACHE as $ligne){

                    $nomFic = explode(" ",$nomFic);

                    $ligne = $nomfic[4];

                    $ligne = explode(":",$ligne);

                    str_replace("/","-");
                    str_replace("[","");
                    str_replace("Dec","12");

                    file_put_contents("$dossier_de_travail/     $dir_out/$DataTemp", "$nomFic[1] $ligne[1]      \n", FILE_APPEND);
                }
            }
?>
