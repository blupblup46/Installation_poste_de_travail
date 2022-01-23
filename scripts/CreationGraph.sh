#!/bin/bash


echo "en attente du fichier"
while ( true ) 
do
    if [ -e "finC2/Separation/donnees" ]
    then
        echo 'generation graphique...' 
        echo 'reset' >> gnuScript
        echo 'set terminal png' >> gnuScript
        echo 'set output "finC2/graph.png"' >> gnuScript
        echo 'set grid' >> gnuScript
        echo 'set yrange [0:]' >> gnuScript
        echo 'set style fill solid' >> gnuScript
        echo 'set xlabel "Dates"' >> gnuScript
        echo 'set ylabel "Nombre de connexions"' >> gnuScript
        echo 'set key outside below' >> gnuScript
    
       
        echo 'set boxwidth 0.5' >> gnuScript
   
        echo 'set title "graph"' >> gnuScript
        
        echo 'plot "finC2/Separation/donnees" using 3:2:xtic(3) title "Connexions par jour" with boxes lc rgb"blue"' >> gnuScript 

        gnuplot gnuScript

        rm gnuScript
        mv "finC2" "Graph"
        echo "generation finie"
    fi
done    

