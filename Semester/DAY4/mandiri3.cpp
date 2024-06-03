#include <stdio.h>
#include <stdlib.h>
#include <time.h>

typedef struct{
    int *items;
    int n;
} gage;

int *random_data(int n){
    int *angka = (int *)malloc(sizeof(int) * n);
    for (int i = 0; i < n; i++) {
        angka[i] = rand() % 100 + 1;
    }
    return angka;
}

void print_data(int *angka_yg_diprint, int n){
    for (int i = 0; i < n; i++) {
        printf("%3d ", angka_yg_diprint[i]);
        if ((i+1) % 20 == 0) printf("\n");
    } 
}

int main(){
    srand(time(0));
    int *data = random_data(100);
    print_data(data, 100);
    
    return 0;
}