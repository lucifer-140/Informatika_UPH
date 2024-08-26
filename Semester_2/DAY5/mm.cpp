#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct Node {
    char name[50];
    char phone[20];
    struct Node* next;
} Node;

typedef struct ContactList {
    Node* head;
    Node* tail;
    int count;
} ContactList;

ContactList* initialize_list() {
    ContactList* list = (ContactList*)malloc(sizeof(ContactList));
    list->head = NULL;
    list->tail = NULL;
    list->count = 0;
    return list;
}

void add_contact(ContactList* list, const char* name, const char* phone) {
    Node* new_node = (Node*)malloc(sizeof(Node));
    strcpy(new_node->name, name);
    strcpy(new_node->phone, phone);
    new_node->next = NULL;

    if (list->count == 0) {
        list->head = new_node;
        list->tail = new_node;
    } else {
        list->tail->next = new_node;
        list->tail = new_node;
    }
    list->count++;
}

int edit_contact(ContactList* list, const char* name, const char* new_name, const char* new_phone) {
    Node* current = list->head;
    while (current != NULL) {
        if (strcmp(current->name, name) == 0) {
            strcpy(current->name, new_name);
            strcpy(current->phone, new_phone);
            return 1;
        }
        current = current->next;
    }
    return 0;
}

int delete_contact(ContactList* list, const char* name) {
    Node* current = list->head;
    Node* previous = NULL;

    while (current != NULL) {
        if (strcmp(current->name, name) == 0) {
            if (previous == NULL) {
                list->head = current->next;
            } else {
                previous->next = current->next;
            }
            if (list->tail == current) {
                list->tail = previous;
            }
            free(current);
            list->count--;
            return 1;
        }
        previous = current;
        current = current->next;
    }
    return 0;
}

void print_list(ContactList* list) {
    printf("\nData:\n");
    printf("--------------------------------------\n");
    printf("%-5s%-20s%-15s\n", "No", "Nama", "Nomor Hp");
    printf("--------------------------------------\n");

    Node* current = list->head;
    int index = 1;

    while (current != NULL) {
        printf("%-5d%-20s%-15s\n", index, current->name, current->phone);
        current = current->next;
        index++;
    }

    printf("--------------------------------------\n");
    printf("%d Records.\n", list->count);
}

int main() {
    ContactList* list = initialize_list();
    int choice;

    while (1) {
        printf("\n[MENU]:\n");
        printf("1. Add data\n");
        printf("2. Edit data\n");
        printf("3. Delete data\n");
        printf("4. Print data\n");
        printf("5. Exit\n");
        printf("Menu ? ");
        scanf("%d", &choice);

        switch (choice) {
            case 1: {
                char name[50];
                char phone[20];
                printf("Enter name: ");
                scanf(" %[^\n]", name);
                printf("Enter phone number: ");
                scanf(" %s", phone);
                add_contact(list, name, phone);
                break;
            }
            case 2: {
                char name[50];
                char new_name[50];
                char new_phone[20];

                printf("Enter the name to be edited: ");
                scanf(" %[^\n]", name);
                printf("Enter the new name: ");
                scanf(" %[^\n]", new_name);
                printf("Enter the new phone number: ");
                scanf(" %s", new_phone);

                if (edit_contact(list, name, new_name, new_phone)) {
                    printf("Data successfully edited.\n");
                } else {
                    printf("Data not found.\n");
                }
                break;
            }
            case 3: {
                char name[50];
                printf("Enter the name to be deleted: ");
                scanf(" %[^\n]", name);

                if (delete_contact(list, name)) {
                    printf("Data successfully deleted.\n");
                } else {
                    printf("Data not found.\n");
                }
                break;
            }
            case 4:
                print_list(list);
                break;
            case 5:
                printf("Exiting the program. Thank you!\n");
                exit(0);
            default:
                printf("Invalid menu. Please try again.\n");
                getchar();
        }
    }
    return 0;
}
