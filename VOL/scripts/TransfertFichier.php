#!/usr/local/bin/php

<?php
    $config="config";
    $dossier_de_travail="Fichiers_de_travail";
    $dir_out="Separation";
    $nomDir= "C1";

    echo "Creation des dossiers de travail...\n";
    
    echo "En attente de $dossier_de_travail\n";
    while(true){
        if(is_file("$dossier_de_travail/$config")){

            mkdir("$dossier_de_travail/$dir_out");
            mkdir("$dossier_de_travail/$dir_out/CSV");
            mkdir("$dossier_de_travail/$dir_out/APACHE");
            mkdir("$dossier_de_travail/$dir_out/JSON");

            echo "$config trouve !\n";
            $conf = file("$dossier_de_travail/$config");
            print_r ($conf);

            echo "foreach\n";
            foreach($conf as $nomFic){
                echo "explode\n";
                $extension=explode(".", trim($nomFic));
                echo "tests\n";
                print_r($extension);
                $nomFic= trim($nomFic);
                if ("$extension[1]" == "csv"){
                    fopen("$dossier_de_travail/$dir_out/CSV/${nomFic}", "w");
                    rename("$dossier_de_travail/$nomFic", "$dossier_de_travail/$dir_out/CSV/${nomFic}");
                    echo "test 1: ${nomFic}\n";
                }else if("$extension[1]" == "apache"){
                    fopen("$dossier_de_travail/$dir_out/APACHE/${nomFic}", "w");
                    rename("$dossier_de_travail/$nomFic", "$dossier_de_travail/$dir_out/APACHE/${nomFic}");
                    echo "test 2: ${nomFic}\n";

                }else if("$extension[1]" == "json"){
                    fopen("$dossier_de_travail/$dir_out/JSON/${nomFic}", "w");

                    rename("$dossier_de_travail/$nomFic", "$dossier_de_travail/$dir_out/JSON/${nomFic}");
                    echo "test 3:  ${nomFic}\n";

                }
            //rmdir("$dossier_de_travail"); //Pour eviter de traiter deux fois les mêmes données
            }
        sleep(5);
        }
    }
?>
