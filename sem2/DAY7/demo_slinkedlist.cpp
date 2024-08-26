#include <stdio.h>
#include <stdlib.h>

typedef struct Node {
    int data;
    struct Node *next;
} Node;

typedef struct LinkedList {
    Node *head;
    Node *tail;
    int count;

    LinkedList() {
        head = NULL;
        count = 0;
    }

    bool is_empty() {
        return count == 0;
    }

    void add(int item) {
        Node *newNode = (Node *)malloc(sizeof(Node));
        newNode->data = item;
        newNode->next = NULL;
        if (is_empty()) {
            head = newNode;
        }
        else {
            tail->next = newNode;
        }
        tail = newNode;
        count++;
    }

    void print_items() {
        printf("list items: ");
        if (is_empty()) {
            printf("empty ...\n");
        }
        else {
            Node *p = head;
            while (p != NULL) {
                printf("%d ", p->data);
                p = p->next;
            }
            printf("\n");
        }
        printf("banyak item data = %d\n", get_count());
    }

    int get_count() {
        return count;
    }

    bool index_is_valid(int index) {
        if (index >= 0 && index < count) return true;
        return false;
    }

    bool find_item(int item) {
        Node *p = head;
        while (p != NULL) {
            if (p->data == item) return true;
            p = p->next;
        }
        return false;
    }

    int get_item_at(int index) {
        if (index_is_valid(index)) {
            Node *p = head;
            for (int i = 0; i < index; i++) {
                p = p->next;
            }
            return p->data;
        }
        return -1;
    }

    int index_of(int item) {
		Node *p = head;
		for (int i = 0; i < count; i++){
			if (p->data == item){
				return i;
			}
			p = p->next;
		}
		return -1;
	}

    int last_index_of(int item) {
		Node *p = head;
		int idx = 0;
		for (int i = 0; i < count; i++){
			if (p->data == item){
				idx = i;
			}
			p = p->next;
		}

		if (idx != 0) return idx; else return -1;
	}


    LinkedList get_all_index_of(int item){
        struct LinkedList resultList;
        Node *p = head;
        int idx = 0;
        while (p != NULL){
            if (p->data == item){
                resultList.add(idx);
            }
            p = p->next;
            idx++;
        }
        return resultList;
    }

    void update_item(int newItem) {
        Node *p = head;

        p->data = newItem;
    }

    void update_all_items(int item, int newItem) {
        Node *p = head;
        while (p != NULL) {
            if (p->data == item) {
                p->data = newItem;
            }
            p = p->next;
        }
    }

    void update_at(int index, int newItem) {
        if (index_is_valid(index)) {
            Node *p = head;
            for (int i = 0; i < index; i++) {
                p = p->next;
            }
            p->data = newItem;
        }
    }

    void swap_items_at_indices(int index1, int index2) {
        if (index_is_valid(index1) && index_is_valid(index2) && index1 != index2) {
        
            Node *node1 = head;
            Node *node2 = head;

            for (int i = 0; i < index1; i++) {
                node1 = node1->next;
            }

            for (int i = 0; i < index2; i++) {
                node2 = node2->next;
            }

            int temp;
            temp = node1->data;
            node1->data = node2->data;
            node2->data = temp;
        }
    }


    void insert_at(int index, int item) {
        if (index_is_valid(index)) {
            Node *newNode = (Node *)malloc(sizeof(Node));
            newNode->data = item;
            newNode->next = NULL;

            if (index == 0) {
                newNode->next = head;
                head = newNode;
            }
            else {
                Node *next = head;
                for (int i = 0; i < index - 1; i++) {
                    next = next->next;
                }
                newNode->next = next->next;
                next->next = newNode;
            }

            count++;
        }
    }

    void bubble_sort() {
        if (count <= 1) {
            // If the list has 0 or 1 element, it is already sorted
            return;
        }

        int swapped = 1;  // Initialize swapped to enter the loop
        Node *p;
        Node *nextNode;

        while (swapped) {
            swapped = 0;
            p = head;

            while (p->next != NULL) {
                nextNode = p->next;

                if (p->data > nextNode->data) {
                    // Swap data if the p node is greater than the next node
                    int temp = p->data;
                    p->data = nextNode->data;
                    nextNode->data = temp;
                    swapped = 1;
                }
                p = nextNode;
            }
        }
    }

    void remove_at(int index) {
        if (index_is_valid(index)) {
            Node *temp = head;
            if (index == 0) {
                head = head->next;
            }
            else {
                Node *p = head;
                for (int i = 0; i < index - 1; i++) {
                    p = p->next;
                }
                temp = p->next;
                p->next = temp->next;
            }
            free(temp);
            count--;
        }
    }

    void remove_all_items(int item) {
        while (head != NULL && head->data == item) {
            Node *temp = head;
            head = head->next;
            free(temp);
            count--;
        }

        Node *p = head;
        while (p != NULL && p->next != NULL) {
            if (p->next->data == item) {
                Node *temp = p->next;
                p->next = temp->next;
                free(temp);
                count--;
            } else {
                p = p->next;
            }
        }
    }

    void clear_list() {
        while (head != NULL) {
            Node *temp = head;
            head = head->next;
            free(temp);
        }
        count = 0;
    }

} SinglyLinkedList;

int main() {

    SinglyLinkedList mylist;

    mylist.print_items();
    printf("\n");

    int source[] = {10, 10, 1, 10, 2, 3, 4, 10, 5, 6, 7, 8, 9, 10, 10, 10, 10};

    printf("source: ");
    for (int i = 0; i < sizeof(source)/sizeof(int); i++) {
		printf("%d ", source[i]);
	}
	printf("\n\n");


    for (int i = 0; i < sizeof(source) / sizeof(int); i++) {
        // printf("add item %2d to list.\n", source[i]);
        mylist.add(source[i]);
    }
    printf("\n");

    mylist.print_items();
    printf("\n");

    // printf("index 5 is valid ? %s\n", mylist.index_is_valid(5) ? "YA" : "TIDAK");
    // printf("index 20 is valid ? %s\n", mylist.index_is_valid(20) ? "YA" : "TIDAK");
    // printf("apakah item 5 ada di dalam list ? %s\n", mylist.find_item(5) ? "YA" : "TIDAK");
    // printf("apakah item 11 ada di dalam list ? %s\n", mylist.find_item(11) ? "YA" : "TIDAK");

    // printf("isi dari index 5 adalah %d\n",mylist.get_item_at(5));
    // printf("index dari angka 7 adalah %d\n", mylist.index_of(7));
    mylist.bubble_sort();
    mylist.print_items();
    // printf("last index of 10 is %d\n", mylist.last_index_of(100));

    // SinglyLinkedList resultList = mylist.get_all_index_of(10);
    // resultList.print_items();
    
    // mylist.update_item(0);
    // mylist.print_items();
    // mylist.update_all_items(10, 0);
    // mylist.print_items();
    // mylist.update_at(2, 5);
    // mylist.print_items();
    // mylist.insert_at(2, 3);
    // mylist.print_items();
    return 0;
}
