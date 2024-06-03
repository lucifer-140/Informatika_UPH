#include <stdio.h>

int main() {
    char nama[80];
    int nilai_1, nilai_2;

    printf("input your name ? ");

    scanf("%[^\n]", nama);

    fflush(stdin);
    
    printf("\n");
    printf("Nilai-1 ? "); scanf("%d", &nilai_1);
    printf("Nilai-2 ? "); scanf("%d", &nilai_2);

    int result = nilai_1 + nilai_2;
	
	printf("Hello, %s.\n",nama);
	printf("%d + %d = %d\n",nilai_1,nilai_2,result);
	
	return 0;
}