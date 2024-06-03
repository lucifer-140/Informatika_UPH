#include <stdio.h>
#include <stdlib.h>
#define INIT_SIZE 10
/*
cara membuat list 
1. memesan memori terlebih dahulu (menggunakan malloc)
1,1. deklarasi pointer variable (int *data)
2. deklarasi count = 0
3. deklarasi kapasitas = 10
4. include <stdlib.h>
5. define INIT_SIZE 10
*/

typedef struct ArrayList {
    int *data;
    int count;
    int capacity;
} ArrayList;

void inisialisasi(ArrayList &list) {
    list.data = (int *)malloc(sizeof(int)*INIT_SIZE);
    list.count = 0;
    list.capacity = INIT_SIZE;
}

void add_item(ArrayList &list,int y) {
    list.data[list.count] = y;
    list.count++;
}

void print_item(ArrayList list) {
    for (int i = 0; i < list.count; i++) {
        printf("%2.d ", list.data[i]);
    }
}

int main (){
    ArrayList list; 
    inisialisasi (list);
    int x[] = {2, 5, 6, 2, 5, 8, 5, 3, 6, 8};
    for (int i = 0; i < 10; i++) {
        add_item(list, x[i]);
    }

    print_item(list);
    

    return 0;
}