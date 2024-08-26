/*
	NIM  : 03082230031
	NAMA : Jonathan Alexander
*/

#include <stdio.h>
#include <stdlib.h>

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
	
	void hapus_semua_data_ganjil() {
		// your code goes here
		while (head != NULL && (head->item)%2 != 0) {
            Node *temp = head;
            head = head->next;
            free(temp);
        }

		Node *p = head;
        while (p != NULL && p->next != NULL) {
            if ((p->next->item)%2 != 0) {
                Node *temp = p->next;
                p->next = temp->next;
                free(temp);
            } else {
                p = p->next;
            }
        }
	}

} SinglyLinkedList;

SinglyLinkedList inisialisasi_data() {
	SinglyLinkedList result;
	for (int i = 1; i <= 15; i++) {
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
	printf("proses hapus semua data dengan nilai ganjil  ...\n");
	mylist.hapus_semua_data_ganjil();
	printf("data setelah operasi hapus semua data dengan nilai ganjil:\n");
	mylist.print_items();
	return 0;
}
