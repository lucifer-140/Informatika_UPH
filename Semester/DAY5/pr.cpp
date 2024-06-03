#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct {
    char name[128];
    char phoneNumber[15];
} Contact;

typedef struct Node {
    Contact data;
    struct Node* next;
} Node;

typedef struct {
    Node* head;
    Node* tail;
    int count;
} SinglyLinkedList;

// Function to clear the input buffer
void clear_input_buffer() {
    int c;
    while ((c = getchar()) != '\n' && c != EOF) {}
}

// Function to create a new node
Node* createNode(char name[], char phoneNumber[]) {
    Node* newNode = (Node*)malloc(sizeof(Node));
    if (newNode == NULL) {
        printf("Memory allocation failure\n");
        exit(EXIT_FAILURE);
    }
    strcpy(newNode->data.name, name);
    strcpy(newNode->data.phoneNumber, phoneNumber);
    newNode->next = NULL;
    return newNode;
}

// Function to add data to the linked list
void addData(SinglyLinkedList* list, char name[], char phoneNumber[]) {
    Node* newNode = createNode(name, phoneNumber);

    if (list->head == NULL) {
        list->head = newNode;
        list->tail = newNode;
    } 
    else {
        list->tail->next = newNode;
        list->tail = newNode;
    }

    list->count++;
}

// Function to find a node by name and edit its data
void editData(SinglyLinkedList* list, char name[]) {
    Node* currentNode = list->head;
    while (currentNode != NULL) {
        if (strcmp(currentNode->data.name, name) == 0) {
            printf("Enter new phone number for %s: ", name);
            scanf("%s", currentNode->data.phoneNumber);
            printf("Data edited successfully!\n");
            return;
        }
        currentNode = currentNode->next;
    }
    printf("Data not found.\n");
}

// Function to find a node by name and delete it
void deleteData(SinglyLinkedList* list, char name[]) {
    Node* currentNode = list->head;
    Node* prevNode = NULL;

    while (currentNode != NULL) {
        if (strcmp(currentNode->data.name, name) == 0) {
            if (prevNode == NULL) {
                list->head = currentNode->next;
                if (list->head == NULL) {
                    list->tail = NULL;
                }
            } else {
                prevNode->next = currentNode->next;
                if (prevNode->next == NULL) {
                    list->tail = prevNode;
                }
            }

            free(currentNode);
            printf("Data deleted successfully!\n");
            list->count--;
            return;
        }

        prevNode = currentNode;
        currentNode = currentNode->next;
    }

    printf("Data not found.\n");
}

// Function to print data in the linked list
void printData(SinglyLinkedList* list) {
    printf("\nData:\n");
    printf("--------------------------------------\n");
    printf("%-5s%-20s%-15s\n", "No", "Nama", "Nomor Hp");
    printf("--------------------------------------\n");

    Node* currentNode = list->head;
    int index = 1;

    while (currentNode != NULL) {
        printf("%-5d%-20s%-15s\n", index, currentNode->data.name, currentNode->data.phoneNumber);
        currentNode = currentNode->next;
        index++;
    }

    printf("--------------------------------------\n");
    printf("%d Records.\n", list->count);
}

// Function to free the memory allocated for the linked list
void freeList(SinglyLinkedList* list) {
    Node* currentNode = list->head;
    Node* nextNode;

    while (currentNode != NULL) {
        nextNode = currentNode->next;
        free(currentNode);
        currentNode = nextNode;
    }

    list->head = NULL;
    list->tail = NULL;
    list->count = 0; 
}

int main() {
    SinglyLinkedList phonebookList = {NULL, NULL, 0};
    int choice;
    char name[50];

    do {
        printf("\nOperasi [MENU]:\n");
        printf("1. Tambah data\n");
        printf("2. Edit data\n");
        printf("3. Hapus data\n");
        printf("4. Print data\n");
        printf("5. Keluar\n");
        printf("Menu ? ");
        scanf("%d", &choice);

        switch (choice) {
            case 1:
                {
                    char phoneNumber[15];
                    printf("Enter name: ");
                    scanf(" %[^\n]", name);
                    clear_input_buffer();
                    printf("Enter phone number: ");
                    scanf("%s", phoneNumber);
                    addData(&phonebookList, name, phoneNumber);
                    printf("Data added successfully!\n");
                    break;
                }
            case 2:
                {
                    printf("Enter name to edit: ");
                    scanf(" %[^\n]", name);
                    clear_input_buffer();
                    editData(&phonebookList, name);
                    break;
                }
            case 3:
                {
                    printf("Enter name to delete: ");
                    scanf(" %[^\n]", name);
                    clear_input_buffer();
                    deleteData(&phonebookList, name);
                    break;
                }
            case 4:
                printData(&phonebookList);
                break;
            case 5:
                freeList(&phonebookList);
                printf("Exiting program.\n");
                break;
            default:
                printf("Invalid choice. Please enter a valid option.\n");
        }
    } while (choice != 5);

    return 0;
}