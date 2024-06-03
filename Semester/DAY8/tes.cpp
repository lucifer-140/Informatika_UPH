#include <stdio.h>

void clear_input_buffer() {
    int c;
    while ((c = getchar()) != '\n' && c != EOF) {}
}

int main() {
    printf("Masukkan beberapa karakter: ");
    
    // Contoh penggunaan fungsi clear_input_buffer()
    clear_input_buffer();

    // printf("Masukan setelah membersihkan buffer: ");

    // // Menunjukkan bahwa buffer sudah bersih
    // char input;
    // scanf("%c", &input);
    // printf("Anda memasukkan: %c\n", input);

    return 0;
}