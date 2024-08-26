#include <stdio.h>
#include <ctype.h>
#include <string.h>
#include <stdlib.h>
#define INIT_SIZE 50

typedef struct Peserta{
    char nama[255];
} Peserta;

typedef struct ArrayList{
    Peserta *data;
    int count;
    int capacity;

    ArrayList(){
        data = (Peserta *)malloc(sizeof(Peserta) * INIT_SIZE);
        count = 0;
        capacity = INIT_SIZE;
    }

    bool is_full(){
        return count == capacity;
    }

    bool is_empty(){
        return count == 0;
    }

    void add_item(const char *name){
        Peserta anggota;

        if (is_full()){
            capacity += INIT_SIZE;
            data = (Peserta *)realloc(data, sizeof(Peserta) * capacity);
        }

        strcpy(anggota.nama, name);
        data[count++] = anggota;
    }

    void print_list(){
        if (!is_empty()){
            for (int i = 0; i < count; i++){
                printf("%d. %s\n", i+1, data[i]);
            }
        }
        else{
            printf("list kosong ...\n");
        }
    }

} ArrayList;

bool input_is_numeric(char *str) {
    for (int i = 0; i < strlen(str); i++) {
        if (!isdigit(str[i])) return false;
    }
    return true;
}

void clear_input_buffer() {
    int c;
    while ((c = getchar()) != '\n' && c != EOF) {}
}

int main(){

    char input[10];
    int pilihan;
    ArrayList ls;

    system("cls");
    printf("Hi, Welcome ...\n");
    system("cls");
    
    while (true){
        system("cls");
        printf("M E N U\n");
        printf("====================================\n");
        printf("1. Tampil Data\n");
        printf("2. Tambah Data\n");
        printf("3. Edit Data Berdasarkan Nomor Urut\n");
        printf("4. Hapus Data Berdasarkan Nomor Urut\n");
        printf("5. Cari Data Berdasarkan Nama\n");
        printf("0. Exit Program\n");
        printf("====================================\n");
        printf("[ 1..5 (0 = Exit) ] ? ");
        scanf("%s", &input);
        if (input_is_numeric(input)){
            pilihan = atoi(input);
            clear_input_buffer();
            switch(pilihan){
                case 1:
                system("cls");
                printf("List data items:\n");
                ls.print_list();
                system("pause");
                break;
            }
        }
    }
    return 0;
}