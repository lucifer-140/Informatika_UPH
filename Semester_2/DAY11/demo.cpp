#include <ctype.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#include "myutils.cpp"

typedef struct node {
  int items;
  struct node *next;

} node;

int main() {
  int pil; 
  while (true) {
    system("cls");
    printf("M - E - N - U \n");
    printf("-------------------\n");
    printf("1. Print Queue\n");
    printf("2. Enqueue New Item\n");
    printf("3. Check First Item\n");
    printf("4. Check Last Item\n");
    printf("5. Dequeue Item\n");
    printf("6. End Program\n");
    printf("-------------------\n");
    pil = get_int("Pilihan [ 0 .. 5 ]");
  }

  return 0;
}
