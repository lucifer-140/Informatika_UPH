#include <stdio.h>
#include <stdlib.h>
#include <time.h>

typedef struct { //struct = struktur (ADI)
	int *items;
	int n;
	
} GaGe; //nama aja struct;

int* random_n_data(int n) {
	int *items = (int *)malloc(sizeof(int) * n);
	for (int i = 0; i < n; i++){
		items[i] = rand() % 100 + 1;
		
	}
	return items;
}

void print_data_items(int *items, int n){
	printf("Data Items: \n");
	for (int i = 0; i < n; i++) {
		printf("%3d ", items[i]);
		if ((i+1) % 20 == 0) printf("\n");
	}
	printf("\n");
}

int sum(int *items, int n){
	int jlh = 0;
	int i;
	for (i = 0; i < n; i++){
		jlh += items[i];
	}
	return jlh;	
}


double average(int *items, int n){
	return 1.0 * sum(items, n) / n;
}

GaGe count_and_get_bilangan(int *items, int n, int tipe){
	///tipe : 1 = ganjil, 2 = genap
}


int main(){
	
	srand(time(NULL));
	int n ;
	
	system("cls");
	printf("N ?"); scanf("%d", &n);
	
	int *data = random_n_data(n);
	
	
	
	printf("\n");
	print_data_items(data, n);
	
	int jlh = sum(data,n);
	double rata = average(data,n);
	
	printf("Jumlah kesuluruhan data = %d\n", jlh);
	printf("Rata - rata data = %.2lg\n", rata);
	return 0;
}
