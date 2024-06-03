#include <stdio.h>

int main(){
    int n = 10;
    int i;
    int data[n];

    // data[0] = 1;
    // data[1] = 2;
    // data[2] = 3;
    // data[3] = 4;
    // data[4] = 5;
    // data[5] = 6;
    // data[6] = 7;
    // data[7] = 8;
    // data[8] = 9;
    // data[9] = 10;

    // for (i = 0; i < n; i++){
    //     data[i] = i+1;
    // }
    i = 0;
    for (;;){
        if (i == n) break;
        data[i] = i + 1;
        i++;
    }
    // printf("nilai idx. 1 = %d\n", data[0]);
    // printf("nilai idx. 2 = %d\n", data[1]);
    // printf("nilai idx. 3 = %d\n", data[2]);
    // printf("nilai idx. 4 = %d\n", data[3]);
    // printf("nilai idx. 5 = %d\n", data[4]);
    // printf("nilai idx. 6 = %d\n", data[5]);
    // printf("nilai idx. 7 = %d\n", data[6]);
    // printf("nilai idx. 8 = %d\n", data[7]);
    // printf("nilai idx. 9 = %d\n", data[8]);
    // printf("nilai idx. 10 = %d\n", data[9]);

    for (i = 0; i < n; i++){
        printf("nilai idx. %2d = %2d\n", i+1, data[i]);
    }

    printf("akses array data via pointer p: \n");
    
    int *p = &data[0];

    for (i = 0; i < n; i++){
        printf("idx. %2d = %2d\n", i+1, *p);
        p++;
    }
    return 0;
}