#include <stdio.h>
#include <ctype.h> //cek tipe data (isdigit, isnumeric,isisalpha, isalnum, islower, isupper, isspace, ispunct, isprint, iscntrl, isgraph, isxdigit)
#include <stdlib.h> // (malloc)
#include <string.h>
#define INIT_SIZE 50

typedef struct Peserta {
    char nama[255];
} Peserta;

typedef struct ArrayList {

    Peserta *data;
    int count;
    int capacity;

    ArrayList() {
        data = (Peserta *)malloc(sizeof(Peserta) * INIT_SIZE);
        count = 0;
        capacity = INIT_SIZE;
    }

    void add_item(const char *item) {
        Peserta peserta;
        strcpy(peserta.nama, item);
        data[count++] = peserta;
        if (count == capacity) {
            capacity += INIT_SIZE;
            data = (Peserta *)realloc(data, sizeof(Peserta) * capacity);
        }
    }

    void print_list_items() {
        if (count > 0) {
            for (int i = 0; i < count; i++) {
                printf("%2d. %s\n", i + 1, data[i].nama);
            }
        } else {
            printf("list is empty ...\n");
        }
    }

    void edit_item(int index, char *newName) {
        if (index >= 0 && index < count) {
            strcpy(data[index].nama, newName);
            printf("Data edited successfully.\n");
        } else {
            printf("Invalid index. Editing failed.\n");
        }
    }

    void delete_item(int index) {
        if (index >= 0 && index < count) {
            for (int i = index; i < count - 1; i++) {
                data[i] = data[i + 1];
            }
            count--;
            printf("Data deleted successfully.\n");
        } else {
            printf("Invalid index. Deletion failed.\n");
        }
    }

    void search_item(char *name) {
        for (int i = 0; i < count; i++) {
            if (strcmp(data[i].nama, name) == 0) {
                printf("Data found at index %d.\n", i + 1);
                return;
            }
        }
        printf("Data not found.\n");
    }

} ArrayList;

void clear_input_buffer() {
    int c;
    while ((c = getchar()) != '\n' && c != EOF) {}
}

bool input_is_numeric(char *str) {
    for (int i = 0; i < strlen(str); i++) {
        if (!isdigit(str[i])) return false;
    }
    return true;
}

int main() {

    char input[50];
    int pilihan, index;
    ArrayList list;

    system("cls");
    printf("Hi, Welcome ...\n\n");
    system("pause");

    while (true) {
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
        if (input_is_numeric(input)) {
            pilihan = atoi(input);
            clear_input_buffer();
            switch (pilihan) {
                case 1:
                    // Tampil Data
                    system("cls");
                    printf("List data items:\n");
                    list.print_list_items();
                    system("pause");
                    break;
                case 2:
                    // Tambah Data
                    system("cls");
                    printf("Add new item\n");
                    printf("------------\n");
                    printf("Nama ? ");
                    scanf("%[^\n]", &input);
                    if (strlen(input) > 0) {
                        list.add_item(input);
                        printf("New item added.\n");
                    } else {
                        printf("Sorry, nama tidak boleh kosong ...\n");
                    }
                    system("pause");
                    break;
                case 3:
                    // Edit Data
                    system("cls");
                    printf("Edit item\n");
                    printf("---------\n");
                    printf("Item no ? ");
                    scanf("%d", &index);
                    clear_input_buffer();
                    printf("New Nama ? ");
                    scanf("%[^\n]", &input);
                    if (strlen(input) > 0) {
                        list.edit_item(index - 1, input);
                    } else {
                        printf("Sorry, nama tidak boleh kosong ...\n");
                    }
                    system("pause");
                    break;
                case 4:
                    // Hapus Data
                    system("cls");
                    printf("Hapus item\n");
                    printf("---------\n");
                    printf("Item no ? ");
                    scanf("%d", &index);
                    clear_input_buffer();
                    list.delete_item(index - 1);
                    system("pause");
                    break;
                case 5:
                    // Cari Data
                    system("cls");
                    printf("Cari data berdasarkan nama\n");
                    printf("--------------------------\n");
                    printf("Nama ? ");
                    scanf("%[^\n]", &input);
                    list.search_item(input);
                    system("pause");
                    break;
                case 0:
                    system("cls");
                    printf("Thanks & Bye ...\n");
                    system("pause");
                    exit(0);
                default:
                    system("cls");
                    printf("Pilihan tidak valid ...\n");
                    system("pause");
            }
        } else {
            system("cls");
            printf("Input harus berupa numeric. Pilihan tidak valid ...\n");
            system("pause");
        }
    }

    return 0;
}
