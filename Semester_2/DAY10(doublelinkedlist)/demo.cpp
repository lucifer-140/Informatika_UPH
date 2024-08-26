/* demo: implementasi double linked list
	 list: 
  	- tipe data yang bisa dikelola : int 
 	 data operation: 
		- add item (value) : void
		- insert item (index, value) : void
		- print_forward : void
		- print_backward : void
		- delete_first : void
		- delete_last : void
		- delete_at (index) : void
		- index_at (value) : int -> return -1 if not found, return index if found
*/

#include <stdio.h>
#include <stdlib.h>

typedef struct node{
    int item;
    struct node *prev;
    struct node *next;
} node;
typedef struct linkedlist {
    node *head;
    node *tail;
    int count;

    linkedlist(){ // constructor jalan secara otomatis ketika objek dipanggil
        head = NULL;
        tail = NULL;
        count = 0;
    }
    bool is_empty(){
        return count == 0;
    }
    void add_item(int value) {
        node *newNode = (node *)malloc(sizeof(node));
        newNode->item = value;
        newNode->prev = NULL;
        newNode->next = NULL;
        if (is_empty()) {
            head = newNode;
            tail = newNode;
        }
        else{
            tail->next = newNode;
            newNode->prev = tail;
            tail = newNode;
        }
        count++;
        
    }
    void print_forward() {
        printf("list items forward\n");
        if (head != NULL) {
            node *p = head;
            bool first = true;
            while (p != NULL) {
                if (first) {
                    printf("%d ", p->item);
                    first = false;
                }
                else{
                    printf("- %d ", p->item);
                }
                p = p->next;
            }
            printf("\n");
        }
    }
    void print_backward() {
        printf("list items backward\n");
        if (head != NULL) {
            node *p = tail;
            bool first = true;
            while (p != NULL) {
                if (first) {
                    printf("%d ", p->item);
                    first = false;
                }
                else{
                    printf("- %d ", p->item);
                }
                p = p->prev;
            }
            printf("\n");
        }
    }
    bool index_is_valid(int index){
        if (index >= 0 && index < count){
            return true;
        }
        return false;
    }

    void insert_item(int index, int value) {
        if (index_is_valid(index)) {
            node *newNode = (node *)malloc(sizeof(node));
            newNode->item = value;
            newNode->prev = NULL;
            newNode->next = NULL;
            if (index == 0) {
                newNode->next = head;
                head->prev = newNode;
                head = newNode;
            }
            else{
                node *p = head;
                for (int i = 0; i < index - 1; i++) {
                    p = p->next;
                }
                newNode->next = p->next;
                newNode->prev = p;
                p->next = newNode;
                newNode->next->prev = newNode;
            }
            count++;
        }
    }

    void delete_at(int index) {
        if (index_is_valid(index)) {
            if (index == 0) {
                // delete first node
                node *temp = head;
                head = temp->next;
                head->prev = NULL;
                temp->next = NULL;
                free(temp);
                count--;
            }
            else if (index == count-1) {
                // delete last node
                node *temp = tail;
                tail = temp->prev;
                tail->next = NULL;
                temp->prev = NULL;
                free(temp);
                count--;
            }
            else {
                node *p = head;
                for (int i = 0; i < index-1; i++) {
                    p = p->next;
                }
                node *temp = p->next;
                p->next = temp->next;
                temp->next->prev = p;
                temp->next = NULL;
                temp->prev = NULL;
                free(temp);
                count--;

            }
        }
    }

    int index_at(int value) {
        if (head != NULL) {
            node *p = head;
            for (int i = 0; i < count; i++) {
                if (p->item == value) {
                    return i;
                }
                p = p->next;
            }
        }
        return -1;
    }
} DoubleLinkedList;

int main() {
    DoubleLinkedList mylist;

    for (int i = 1; i <= 10; i++) {
        mylist.add_item(i);
    }

    mylist.print_forward();
    mylist.print_backward();

    mylist.insert_item(0, 100);
    mylist.insert_item(10, 100);
    mylist.insert_item(2,100);
    mylist.print_forward();

	// delete item at 
	int idx;
	
	// idx = 0
	idx = 0;
	mylist.delete_at(idx);
	printf("after delete item at index %d\n", idx);
	mylist.print_forward();
	
	// idx = 11
	idx = 11;
	mylist.delete_at(idx);
	printf("after delete item at index %d\n", idx);
	mylist.print_forward();
	
	// idx = 1
	idx = 1;
	mylist.delete_at(idx);
	printf("after delete item at index %d\n", idx);
	mylist.print_forward();
	
	// uji fungsi : index_at

	int search_values[] = {1, 3, 100, 10};
	
	printf("cari item data:\n");
	
	for (int i = 0; i < 4; i++) {
		int r = mylist.index_at(search_values[i]);
		if (r >= 0) {
			printf("   item: %-3d ? ditemukan pada index: %d\n", search_values[i], r);
		}
		else {
			printf("   item: %-3d ? tidak ditemukan di dalam list\n", search_values[i]);
		}
	}


	return 0;	
}