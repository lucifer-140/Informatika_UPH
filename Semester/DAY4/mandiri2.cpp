#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main(){

    srand(time(0));

    int number1 = (rand() % 6) + 1;

    for (int i = 0; i < 3; i++){
        printf("%d\n", number1);
    }

    return 0;
}