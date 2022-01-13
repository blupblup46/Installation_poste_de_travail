#!/usr/local/bin/php
<?php
    $config="fichier_configuration";
    $dossier_de_travail="Fichiers_de_travail";
    $dir_in="Transmis";
    $dir_out="Separation";

    echo "Creation des dossiers de travail...\n";
    if(!is_dir($dir_in)){
        mkdir($dir_in);
    }

    if(!is_dir($dir_out)){
        mkdir($dir_out);
    }
    
    echo "En attente de $dossier_de_travail\n";
    while(true){
        if(is_file($dir_in/$dossier_de_travail/$config)){
            echo "$config trouve !\n";
            $conf= file($dir_in/$dossier_de_travail/$config);
            foreach($conf as $line){
                $extension=explode(".", $line);
                if ($extension[1]==".csv"){
                    copy($line, $dir_out/CSV);
                } else if($extension[1]==".apache"){
                    copy($line, $dir_out/APACHE);
                }else if($extension[1]==".json"){
                    copy($line, $dir_out/JSON);
                }
            }
        }
        rmdir($dossier_de_travail); //Pour eviter de traiter deux fois les mêmes données
    }
?>