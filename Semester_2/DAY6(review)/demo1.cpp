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

void insert_item(ArrayList &list, int index, int item) { // kompleksitas/operation cost : O(n)
	if (index >= 0 && index < list.count) {
		if (is_full(list)) {
  		list.capacity += INIT_SIZE;
	  	list.data = (int *)realloc(list.data, sizeof(int) * list.capacity);
	  }
		for (int i = list.count; i > index; i--) {
			list.data[i] = list.data[i-1];
		}
		list.data[index] = item;
		list.count++;
	}
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

int get_item(ArrayList list, int index) { // kompleksitas/operation cost : O(1)
	// get item data pada index dari dalam list
	// return item data tsb jika berhasil get item datanya
	// jika index tidak valid, return -1
	// tambahkan validasi untuk cek nilai index
	if (index >= 0 && index < list.count) {
        return list.data[index];
    }
	return -1;
}

bool find_list_item(ArrayList list, int item) { // kompleksitas/operation cost : O(n)
	// return true jika item ada di dalam list
	// return false jika item tidak ada di dalam list
	for (int i = 0; i < list.count; i++) {
        if (list.data[i] == item) {
            return true;
        }
    }

	return false;
}

int index_of(ArrayList list, int item) { // kompleksitas/operation cost : O(n)
	// mencari dan return nilai index dari item dimaksud di dalam list 
	// return -1 jika item tidak ditemukan di dalam list
	// tambahkan validasi untuk cek nilai index
	for (int i = 0; i < list.count; i++) {
        if (list.data[i] == item) {
            return i;
        }
    }
	return -1;
}

void update_list_item(ArrayList &list, int item, int newItem) { // kompleksitas/operation cost : O(n)
	// temukan semua item pada list, 
	// ubah dengan newItem
	for (int i = 0; i < list.count; i++) {
		if (list.data[i] == item) {
			list.data[i] = newItem;
		}
	}
}

void update_list_item_at(ArrayList &list, int index, int newItem) { // kompleksitas/operation cost : O(1)
	// update item data pada index termaksud dengan newItem
	// tambahkan validasi untuk cek nilai index
	for (int i = 0; i < list.count; i++) {
		if (i == index) {
			list.data[i] = newItem;
		}
	}
}

bool remove_at(ArrayList &list, int index) { // kompleksitas/operation cost : O(1)
	// hapus item data pada index termaksud dari dalam list 
	// return true jika ada data yang dihapus
	// return false jika tidak ada data yang dihapus
	// tambahkan validasi untuk cek nilai index
	if (index >= 0 && index < list.count) {
        for (int i = index; i < list.count - 1; i++) {
            list.data[i] = list.data[i + 1];
        }
        list.count--;
        return true;
    }

	return false;
}

bool remove_list_item(ArrayList &list, int item) { // kompleksitas/operation cost : O(n)
	// hapus semua item data yg sama dari dalam list
	// return true jika ada item data yang dihapus 
	// return false jika tidak ada item data yang dihapus
	
	/*
	// kompleksitas O(n^2)
	// cara 1
	int removedCount = 0;
    
    for (int i = 0; i < list.count; i++) {
        if (list.data[i] == item) {
            for (int j = i; j < list.count - 1; j++) {
                list.data[j] = list.data[j + 1];
            }
            list.count--;
            removedCount++;
            i--;  
        }
    }

    if (removedCount == 0) {
		return false;
	}
	else{
		return true;
	}
	*/

	/*
	// dengan arraylist baru
	// cara 2
	ArrayList newList;
    inisialisasi(newList);

    for (int i = 0; i < list.count; i++) {
        if (list.data[i] != item) {
            add_item(newList, list.data[i]);
        }
    }
    free(list.data);
    list = newList;

	return 0;
	*/

	int n = 0, removeCount = 0;
    for (int i = 0; i < list.count; i++) {
        if (list.data[i] == item) {
            removeCount++;
        }
        else {
            list.data[n++] = list.data[i];
        }
    }
    
    list.count -= removeCount;
    if (removeCount == 0) {
        return false;
    }
    else {
        return true;
	}
}

void remove_all_list_items(ArrayList &list) { // kompleksitas/operation cost : O(1)
	// hapus semua item data dalam list
	// resize array to initial size
	free(list.data);
	inisialisasi(list);
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

	// if (find_list_item(list, 10)){
	// 	printf("item ada di list");
	// }
	// else{
	// 	printf("item tidak ada di list");
	// }


	// printf("\nprint info\n");
	// print_list_items(list);

	// printf("\ninsert item 1 at index 2\n");
	// insert_item(list, 2, 1);
	// print_list_items(list);

	// printf("\nindex of number 1\n");
	// int found = index_of(list, 1);
	// printf("\n");
	// printf("index of number 1 : %d\n", found);
	
	// printf("\nremove at index 11\n");
	// remove_at(list, 11);
	// print_list_items(list);

	// printf("\nupdate item from 10 to 0\n");
	// update_list_item(list, 10, 0);
	// print_list_items(list);

	// printf("\nupdate index at index 5 to 4\n");
	// update_list_item_at(list, 5, 4);
	// print_list_items(list);

	// printf("\nremove item at index 2\n");
	// remove_at(list, 4);
	// print_list_items(list);

	// printf("\nremove all item 0\n");
	// remove_list_item(list, 0); // <<---- fungsi yang harus diimplementasikan
	// print_list_items(list);

	printf("\nremove all item\n");
	remove_all_list_items(list);
	print_list_items(list);

	return 0;	
}
