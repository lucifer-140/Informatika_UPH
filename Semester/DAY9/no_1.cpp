/*
	NIM  : 03082230031
	NAMA : Jonathan Alexander
*/

#include <stdio.h>
#include <stdlib.h>
#define N 20

int* inisialisasi_data() {
	int *data = (int *)malloc(sizeof(int) * N); 
	int i;
	for (i = 1; i <= N; i++) 
		data[i-1] = i;
	return data;
}

void print_items(int *data) {
	for (int i = 0; i < N; i++) {
		printf("%d ", data[i]);
	}	
	printf("\n");
}

void reposisi_data(int *data) {
	// your code goes here
	int tengah = N/2;

	for (int i = 0; i < tengah; i++){
		int temp = data[i];
		data[i] = data[tengah + i];
		data[tengah + i] = temp;
	}

}

// fungsi main : readonly
// jangan ubah kode program yang ada di fungsi main ini !!!

int main() {
	int *data = inisialisasi_data();
	printf("data awal:\n");
	print_items(data);
	printf("proses reposisi data ...\n");
	reposisi_data(data);
	printf("data setelah reposisi:\n");
	print_items(data);
	return 0;
}
