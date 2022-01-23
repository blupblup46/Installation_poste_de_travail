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
            
            echo "Scan du dossier $dirCSV\n";
            $CSV= scandir($dirCSV);
            echo"Recuperation des donnees\n";

            foreach($CSV as $nomFic){

                
                if ("${nomFic}" != "." && "${nomFic}" != ".."){

                    
                    $parts= explode(".",$nomFic);
                    print_r("$parts");

                    if("$parts[1]"=="csv"){
                        $contenuFicCSV=file("$dirCSV/$nomFic");

                        foreach($contenuFicCSV as $ligne){
                            echo "$ligne\n";
                            $ligne= explode(";", $ligne);
                            $date= explode(" ", $ligne[2]);
                            $ligne[0]= trim($ligne[0]);
                            $date[0]= trim($date[0]);
                            echo"\n";
                            echo "****************\n";
                            echo "****************\n";
                            echo "numero ligne= $numeroLigne\n";
                            echo "ligne = $ligne[0]\n";
                            echo "date= $date[0]\n";
                            echo "****************\n";
                            echo "****************\n";
                            echo"\n";
                            if ("$ligne[0]"!=""){
                                $ligne[0]= str_replace('"', '', $ligne[0]);
                                
                                $date[0]= str_replace('"', '', $date[0]);
                               
                                file_put_contents("$dossier_de_travail/$dir_out/$DataTemp", "$ligne[0] $date[0]\n", FILE_APPEND);
                            }
                            
                        } 
                    }
                }
                
            }
            echo "Donnees CSV recuperees\n";

            

            $DataTempLog= file("$dossier_de_travail/$dir_out/$DataTemp");

            echo "fichier avant tri:\n";
            print_r($DataTempLog);
            $nbLignes=count($DataTempLog);

            echo "///////////////////////tri//////////////////////////\n";
            for($i=0; $i<$nbLignes-1; $i+=1){
                for($j=0; $j<$nbLignes-1-$i; $j++){
                    $parts1= explode(" ", $DataTempLog[$j]);
                    $parts2= explode(" ", $DataTempLog[$j+1]);
                    if (strcmp($parts1[1],$parts2[1])>=0){

                        $temp=$DataTempLog[$j];
                        $DataTempLog[$j]=$DataTempLog[$j+1];
                        $DataTempLog[$j+1]=$temp;
                    } 
                }
            }


            echo "fichier apres tri:\n";
            print_r($DataTempLog);
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
