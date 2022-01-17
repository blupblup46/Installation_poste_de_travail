#!/usr/local/bin/php

<?php
    $config="config";
    $dossier_de_travail="Fichiers_de_travail";
    $dir_out="Separation";

    echo "Creation des dossiers de travail...\n";

    if(!is_dir($dir_out)){
        mkdir($dir_out);
        mkdir("$dir_out/CSV");
        mkdir("$dir_out/APACHE");
        mkdir("$dir_out/JSON");

    }
    
    echo "En attente de $dossier_de_travail\n";
    while(true){
        if(is_file("$dossier_de_travail/$config")){
            echo "$config trouve !\n";
            $conf = file("$dossier_de_travail/$config");
            foreach($conf as $nomFic){
                $extension=explode(".", "trim($nomFic)");
                if ("$extension[1]" == "csv"){
                    copy("$nomFic", $dir_out/"CSV");
                } else if("$extension[1]" == "apache"){
                    copy("$nomFic", $dir_out/"APACHE");
                }else if("$extension[1]" == "json"){
                    copy("$nomFic", $dir_out/"JSON");
                }
            //rmdir("$dossier_de_travail"); //Pour eviter de traiter deux fois les mêmes données
            }
        }
        
    }
?>
