#include <stdlib.h>
#include <stdio.h>
#include <stdbool.h>
#include <string.h>

void afficheTab(char tab[4][4]);
void echange (char a[4], char b[4]);
void Tri_bulle_Croissant(char t[4][4]);

int main(){
    char tab[4][4]={
        {'a', 'b', 'c'},
        {'d', 'f', 'g'},
        {'c', 'z', 'g'},
        {'f', 'b', 'a'}
    };
    afficheTab(tab);
    Tri_bulle_Croissant(tab);
    printf("\n");
    afficheTab(tab);
}

void afficheTab(char tab[4][4]){
    int ligne;
    
    for (ligne=0; ligne<4; ligne++){
        printf("%s\n", tab[ligne]);
    }
    
}

void Tri_bulle_Croissant(char t[4][4])
{
    int i, j;
    bool permut;
    permut=false;

    for (i=0;i<10-1;i++)
    {
        while(j<10 && permut==false)
        {
            if (t[i][j]>t[i+1][j])
            {
                echange(&t[i][j],&t[i+1][j]);
                permut=true;
            }
            j++;
        }
    }
}

void echange (char a[4], char b[4]){
    char temp[4];
    strcpy(temp,a);
    strcpy(a,b);
    strcpy(b,temp);
}