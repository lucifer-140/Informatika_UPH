#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct  {
	char nama[128];
	char hp[15];
} contact;

void clear_input_buffer() {
	int c;
	while ( (c = getchar()) != '\n' && c != EOF) {}
}

int main() {
	int n = 10;
	printf("N ?"); scanf("%d", &n); clear_input_buffer();
	contact phonebook[n];
	
	printf("\n");
	for (int i = 0; i < n; i++) {
		printf("Data contact ke - %2d:\n", i+1);
		printf("Nama       ?"); scanf("%[^\n]", phonebook[i].nama);
		clear_input_buffer();
		printf("Nomor Hp   ?"); scanf("%[^\n]", phonebook[i].hp);
		clear_input_buffer(); printf("\n");
	}

	for (int i = 0; i < n; i++) {
		printf("%15s %15s", phonebook[i].nama, phonebook[i].hp);
	}
	
	return 0;
}
