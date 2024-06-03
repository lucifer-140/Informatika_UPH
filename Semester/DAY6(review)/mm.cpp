#include <stdio.h>
#include <stdlib.h>
#define INIT_SIZE 10

typedef struct ArrayList {
	int *data;
	int  count;
	int  capacity;
} ArrayList;

void inisialisasi(ArrayList &list) { // prepared the list // kompleksitas/operation cost : O(1)
	list.data = (int *)malloc(sizeof(int) * INIT_SIZE);
	list.count = 0;
	list.capacity = INIT_SIZE;
}

bool is_full(ArrayList list) { // kompleksitas/operation cost : O(1)
	return list.count == list.capacity;
}

void add_item(ArrayList &list, int item) { // kompleksitas/operation cost : O(1) / O(n) jika array nya growing 
	if (is_full(list)) {
		list.capacity += INIT_SIZE;
		list.data = (int *)realloc(list.data, sizeof(int) * list.capacity);
	}
	list.data[list.count++] = item;
}
void print_list_items(ArrayList list) { // kompleksitas/operation cost : O(n)
	// print semua item data yang ada di dalam list 
	printf("data items:\n\n");
	for (int i = 0; i < list.count; i++) {
		printf("%3d ", list.data[i]);
		if ((i+1) % 20 == 0) printf("\n\n");
	}
	printf("\n\n");
	printf("Banyak elemen data = %d\n", list.count);
}

int main() {

	int i;
	ArrayList list;
	inisialisasi(list);
	
	// add item 1 .. 10 ke dalam list
	int source[] = {10, 1, 2, 3, 4, 10, 5, 6, 7, 8, 9, 10, 10, 10, 10};
	for (i = 0; i < sizeof(source)/sizeof(int); i++) {
		add_item(list, source[i]);	
	}
    
	print_list_items(list);

    return 0;	
}