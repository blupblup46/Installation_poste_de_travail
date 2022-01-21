#!/usr/local/bin/php

enlever les "" dans la date_format

<?php

    $config="config";
    $dossier_de_travail="Fichiers_de_travail";
    $dir_out="Separation";
    $nomFicCSV="donneesCSV";
    $dirCSV='$dossier_de_travail/$dir_out/CSV';

    while(true){
        if(is_dir($dossier_de_travail)){
            fopen($dirCSV/${nomFicCSV}, "w");
            echo "readdir\n";

            $numeroLigne=0;
            $CSV= scandir($dirCSV);
            print_r($CSV);
            
            echo"\n";
            foreach($CSV as $nomFic){
                if ($nomFic!="." && $nomFic!=".."){
                    $parts= explode(".",$nom);
                    print_r("$parts");
                    if($parts[1]=="csv"){
                        $contenuFicCSV=file($nomFic);
                        print_r("$contenuFicCSV");
                        foreach($contenuFicCSV as $ligne){
                            echo "$ligne\n";
                            $ligne= explode(";", $ligne);
                            $date= explode(" ", $ligne[2]);
                            file_put_contents("$dossier_de_travail/$dir_out/CSV/${nomFicCSV}", "$numeroLigne $ligne[0] $date[0]\n", FILE_APPEND);
                            $numeroLigne+=1;
                        } 
                    }
                }
                
            }
        }  
    }
   
    
?>