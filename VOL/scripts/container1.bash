echo "tri en cours..."

rm -r ./TRAITEMENT/CSV
rm -r ./TRAITEMENT/json
rm -r ./TRAITEMENT/apache

mkdir ./TRAITEMENT/CSV
mkdir ./TRAITEMENT/json
mkdir ./TRAITEMENT/apache

cp *.csv ./TRAITEMENT/CSV
cp *.json ./TRAITEMENT/json
cp *.apache ./TRAITEMENT/apache

echo "tri fini !"