#include <stdio.h>

//void swap_value(int *, int *); //mau tulis int *x, int*y juga bole

// void swap_value_byvalue(int x, int y){
//     int temp = x;
//     x = y;
//     y = temp;
// }
// // calling: swap_value_byvalue(a,b);

// void swap_value_bypointer(int *x, int *y) {
//     int temp = *x;
//     *x = *y;
//     *y = temp;
// }
// // calling swap_value_bypointer(&a, &b);

void swap_value_byref(int &x, int &y){
    int temp = x;
    x = y;
    y = temp;
}
// calling: swap_value_byref(a, b);

int jumlahkan (int a, int b){
    int hasil = a + b;
    return hasil;
}
int main() {
    int a = 10, b = 20;
    int hasil = jumlahkan(a,b);
    printf("A + B = %d + %d = %d\n", a, b, hasil);
    printf("Awal:\n");
    printf("A = %d, B = %d\n", a, b);
    printf("Swap nilai a dengan B:\n");
    swap_value_byref(a, b);
    printf("Setelah swap:\n");
    printf("A = %d, B = %d\n", a, b);
    return 0;
}