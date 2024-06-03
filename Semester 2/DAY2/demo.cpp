#include <stdio.h>
#include <string.h>
// #define MAX_VAL 1000

int main(){
    int var_1 = 1, var_2 = 2, var_3 = 3;
    var_1 = var_2 = var_3 = 100;

    const int MAX_VALUE = 1000;

    printf("nilai var_1 = %d", var_1);
    printf("nilai var_1 di simpan pada alamt memori: %p\n", &var_1);
    printf("ukuran variable var_1 = %lu byte\n", sizeof(var_1));
    printf("nilai var_2 = %d\n", var_2);
    printf("nilai var_1 di simpan pada alamt memori: %p\n", &var_2);
    printf("ukuran variable var_2 = %lu byte\n", sizeof(var_2));
    printf("nilai var_3 = %d\n", var_3);
    printf("nilai var_1 di simpan pada alamt memori: %p\n", &var_3);
    printf("ukuran variable var_3 = %lu byte\n", sizeof(var_3));
    
    char k = 'A';
    printf("karakter = %c\n", k);
    printf("karakter = %d\n", k);
    printf("memory addr dari var k = %s\n", &k);
    printf("ukuran variable k = %lu byte\n", sizeof(k));
    
    double dbl = 12.5;
    printf("nilai var. dbl = %lf\n", dbl);
    printf("nilai var. dbl = %.2lf\n", dbl);
    printf("nilai var. dbl = %15.2lf\n", dbl);
    printf("memory addr var. dbl = %d\n", &dbl);
    printf("ukuran var. dbl = %lu byte\n", sizeof(dbl));

    char str[5] = {'B', 'U', 'D', 'I', '\0'};
	printf("Isi var. str = %s\n", str);
	printf("terdiri dari huruf : \n");
	for (int i = 0; i < strlen(str); i++) {
		printf("%c ", str[i]);
	}
	printf("\n");
	printf("Ukuran Variabel str = %d byte\n\n", sizeof(str));
	

	char strr[25];
	strcpy(strr, "Rudi Hartono");
    for (int i = 0; i < strlen(strr); i++) {
		printf("%c ", strr[i]);
	}
    printf("\n");
	printf("Ukuran Variabel str = %d byte\n\n", sizeof(strr));

    // char str[25];
    
    // strcpy(str, "Rudi Hartono");

    // printf("isi var. str = %s\n", str);
    // printf("terdiri dari huruf: \n");
    // for (int i = 0; i < strlen(str); i++){
    //     printf("%c", str[i]);
    //     printf("\n");
    // }
    return 0;
}