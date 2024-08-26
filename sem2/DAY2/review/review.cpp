#include <stdio.h>
#include <string.h>

int main(){
    int var_1, var_2, var_3;
    var_1 = 1;
    var_2 = 2;
    var_3 = 3;

    printf("Nilai pada var_1 = %d\n", var_1);
    printf("var_1 disimpan di alamat = %p\n", &var_1);
    printf("ukuran variabel var_1 = %lu\n", sizeof(var_1));
    printf("Nilai pada var_2 = %d\n", var_2);
    printf("var_2 disimpan di alamat = %p\n", &var_2);
    printf("ukuran variabel var_2 = %lu\n", sizeof(var_2));
    printf("Nilai pada var_2 = %d\n", var_3);
    printf("var_3 disimpan di alamat = %p\n", &var_3);
    printf("ukuran variabel var_3 = %lu\n", sizeof(var_3));

    char k = 'A';
    printf("karakter = %c\n", k);
    printf("karakter %d\n", k);
    printf("memory addr dari var k = %s\n", &k);
    printf("ukuran variabel k = %lu\n", sizeof(k));

    
    return 0;
}