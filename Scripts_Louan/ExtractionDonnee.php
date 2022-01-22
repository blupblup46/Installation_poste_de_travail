#!/usr/local/bin/php

enlever les "" dans la date_format

<?php

    $config="config";
    $dossier_de_travail="finC1";
    $dir_out="Separation";
    $DataNorm="donnees";
    $DataTemp="donneesVrac";
    $dirCSV="$dossier_de_travail/$dir_out/CSV";

    while(true){
        if(is_dir("$dossier_de_travail/$dir_out")){
            echo "fopen\n";
            fopen("$dossier_de_travail/$dir_out/$DataTemp", "w");
            fopen("$dossier_de_travail/$dir_out/$DataNorm", "w");
            
            echo "scandir\n";
            $CSV= scandir($dirCSV);

            echo "print_r\n";
            print_r($CSV);
            
            echo"\n";

            echo"foreach 1\n";
            foreach($CSV as $nomFic){

                echo"if 1\n";
                if ("${nomFic}" != "." && "${nomFic}" != ".."){

                    echo "explode 1\n";
                    $parts= explode(".",$nomFic);
                    print_r("$parts");

                    echo"if 2\n";
                    if("$parts[1]"=="csv"){
                        $contenuFicCSV=file("$dirCSV/$nomFic");
                        print_r("$contenuFicCSV");

                        echo"foreach 2\n";
                        foreach($contenuFicCSV as $ligne){
                            echo "$ligne\n";
                            $ligne= explode(";", $ligne);
                            $date= explode(" ", $ligne[2]);

                            echo"\n";
                            echo "****************\n";
                            echo "****************\n";
                            echo "numero ligne= $numeroLigne\n";
                            echo "ligne = $ligne[0]\n";
                            echo "date= $date[0]\n";
                            echo "****************\n";
                            echo "****************\n";
                            echo"\n";

                            $ligne[0]= str_replace('"', '', $ligne[0]);
                            $date[0]= str_replace('"', '', $date[0]);
                            file_put_contents("$dossier_de_travail/$dir_out/$DataTemp", "$ligne[0] $date[0]\n", FILE_APPEND);
                        } 
                    }
                }
                
            }

            $DataTempLog= file("$dossier_de_travail/$dir_out/$DataTemp");

            echo "///////////////////////tri//////////////////////////\n";
            foreach($DataTempLog as $indice => $ligne){
                echo "indice= $indice\n";
                foreach($DataTempLog as $test => $compare){
                    echo "test= $test\n";
                    if($test>$indice){
                        echo "if passé\n";
                        $parts1= explode(" ", $ligne);
                        $parts2= explode(" ", $compare);
                        if (strcmp($parts1[1],$parts2[1])>=0){
                            $IndiceLignePlusPetite=$test;
                            echo "indice petite= $test\n";
                        } 
                    }
                    
                }
                $temp=$DataTempLog[$indice];
                $DataTempLog[$indice]=$DataTempLog[$IndiceLignePlusPetite];
                $DataTempLog[$IndiceLignePlusPetite]=$temp;
            }
            file_put_contents("$dossier_de_travail/$dir_out/$DataTemp", $DataTempLog);

            echo "///////////////////////comptage///////////////////////\n";
            $DataTempLog= file("$dossier_de_travail/$dir_out/$DataTemp");
            $nbLigne= count($DataTempLog);
            $date=0;
            $numeroLigne=1;

            echo "data temp log= \n";
            print_r($DataTempLog);

            for($init=0; $init<$nbLigne; $init+=1){
                echo"init= $init\n";
                $compteurConnexion[$init]=0;
            }

            for($boucle=0; $boucle<$nbLigne; $boucle+=1){
                echo "boucle= $boucle\n";
                $ligne1= explode(" ", $DataTempLog[$boucle]);
                $ligne2= explode(" ", $DataTempLog[$boucle+1]);
                if($ligne1[1]==$ligne2[1]){
                    $compteurConnexion[$date]+=1;
                    echo "compteur connexion= $compteurConnexion[$date]\n";
                }else{
                    $compteurConnexion[$date]+=1;
                    echo "compteur connexion= $compteurConnexion[$date]\n";
                    file_put_contents("$dossier_de_travail/$dir_out/$DataNorm", "$numeroLigne $compteurConnexion[$date] $ligne1[1]\n", FILE_APPEND);
                    $date+=1;
                    $numeroLigne+=1;
                }
            }
            
            
            rename("$dossier_de_travail", "finC2");
        }  
    }
   
    
?>