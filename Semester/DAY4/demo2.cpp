#include <stdio.h>
#include <stdlib.h>
#include <time.h>

typedef struct {
	int *items;
	int n;
} Gage;

int *random_n_data(int n) {
	int *items = (int *)malloc(sizeof(int) * n);
	for (int i = 0; i < n; i++){
		items[i] = rand() % 100 +1;
	}
	return items;
}

void print_data_items(int* items, int n) {
	printf("Data Items:\n");
	for (int i = 0; i < n; i++) {
		printf("%3d ", items[i]);
		if ((i+1) % 20 == 0) printf("\n");
	}
	printf("\n");
}

int sum(int *items, int n) {
	int jumlah = 0;
	int i;
	for (i = 0; i < n; i++) {
		jumlah += items[i];
	}
	return jumlah;
}

double average(int *items, int n) {
	return 1.0 * sum(items, n) / n;
}

Gage count_and_get_bilangan(int *items, int n, int tipe) {
	// tipe : 1 = ganjil , 2 = genap
	Gage output;
	output.items = (int *)malloc(sizeof(int) * n);
	int c = 0;
	int i;
	for (i = 0; i < n; i++) {
		if (tipe == 1);
			if (items[i] % 2 != 0) {
				output.items[c] = items[i];
				c++;
			// ganjil
		}
		else if (tipe == 2) {
			if (items[i] % 2 == 0) {
				output.items[c] = items[i];
				c++;
			}
		}
	}
	output.n = c;
	return output;
}

int main() {
	
	srand(time(NULL));
	
	int n;
	printf("Masukkan Banyak Angka:"); scanf("%d", &n);
	
	int *data = random_n_data(n); 
	
	printf("\n");
	print_data_items(data, n);
	
	int jumlah = sum(data, n);
	double rata = average(data, n);
	
	printf("Jumlah keseluruhan data = %d\n", jumlah);
	printf("rata - rata data 		= %.2lf\n", rata);
	
	Gage ganjil = count_and_get_bilangan(data, n, 1);
	Gage genap = count_and_get_bilangan(data, n, 2);
	
	printf("Data Ganjil:\n");
	print_data_items(ganjil.items, ganjil.n);
	printf("Banyak Data Ganjil: %d\n", ganjil.n);
	
	printf("Data Genap:\n");
	print_data_items(genap.items, ganjil.n);
	printf("Banyak Data Genap: %d\n", genap.n);
	
	return 0;
}
