/*
	NIM  : 03082230031
	NAMA : Jonathan Alexander
*/

#include <stdio.h>
#include <stdlib.h>
#include <time.h>

typedef struct Node { 
	int item;
	struct Node *next;
} Node;

typedef struct LinkedList {
	
	Node *head;
	Node *tail;
	
	LinkedList() {
		head = tail = NULL; 
	}
	
	void add_item(int x) {
		Node *node = (Node *)malloc(sizeof(Node));
		node->item = x;
		node->next = NULL;
		if (head == NULL) {
			head = node;
			tail = node;
		}
		else {
			tail->next = node;
			tail = node;
		}
	}
	
	void print_items() {
		Node *p = head;
		bool first = true;
		while (p != NULL) {
			if (first) {
				printf("%d ", p->item);	
				first = !first;
			}
			else {
				printf("- %d ", p->item);	
			}
			p = p->next;
		}
		printf("\n");
	}
	
	void swap_ganjil_genap() {
		Node *p = head;

		while (p   != NULL && p->next != NULL) {
			int temp = p->item;
			p->item = p->next->item;
			p->next->item = temp;
			p = p->next->next; 
		}
	}


} SinglyLinkedList;

SinglyLinkedList inisialisasi_data() {
	SinglyLinkedList result;
	for (int i = 1; i <= 20; i++) {
		result.add_item(i);
	}
	return result;
}

// fungsi main : readonly
// jangan ubah kode program yang ada di fungsi main ini !!!

int main() {
	SinglyLinkedList mylist = inisialisasi_data();
	printf("data awal:\n");
	mylist.print_items();
	printf("proses swap data pada index ganjil dan genap  ...\n");
	mylist.swap_ganjil_genap();
	printf("data setelah operasi swap data pada index ganjil dan genap:\n");
	mylist.print_items();


	clock_t start, end;
    double cpu_time_used;

    start = clock();
    mylist.swap_ganjil_genap();
    end = clock();

    cpu_time_used = ((double) (end - start)) / CLOCKS_PER_SEC;
    printf("Waktu yang dibutuhkan: %f detik\n", cpu_time_used);

	return 0;
}
