#include <stdio.h>
#include <stdlib.h>
#define INIT_SIZE 10

typedef struct ArrayList{
    int *data;
    int count;
    int capacity;

    ArrayList(){
        data = (int *)malloc(sizeof(int) * INIT_SIZE);
        count = 0;
        capacity = INIT_SIZE;
    }
    bool is_full(){
        return count == capacity;
    }
    void add_item(int item){
        if (is_full()){
            capacity = capacity + INIT_SIZE;
            data = (int *)realloc(data, sizeof(int) * capacity);
        }
        data[count++] = item;
    }
    int hitung(){
        return count;
    }
    void insert_item(int index, int value){
        if (index >= 0 && index < count){
            if (is_full()){
                capacity = capacity + INIT_SIZE;
                data = (int *)realloc(data, sizeof(int) * capacity);
            }
            for (int i = count; i > index; i--){
                data[i] = data[i-1];
            }
            data[index] = value;
            count++;
        }
    }

    void print_list_item(){
        for (int i = 0; i < count; i++){
            printf("%2d ", data[i]);
        }
        printf("\n");
    }

    int get_item(int index){
        if (index >= 0 && index < count){
            return data[index];
        }
        return -1;
    }
    
    bool find_list_item(int item){
        for (int i = 0; i < count; i++){
            if (data[i] == item){
                return true;
            }
        }
        return false;
    }

    int index_of(int item){
        for (int i = 0; i < count; i++){
            if (data[i] == item){
                return i;
            }
        }
        return -1;
    }

    void update_list_item(int item, int newItem){
        for (int i = 0; i < count; i++){
            if (data[i] == item){
                data[i] = newItem;
            }
        }
    }

    void update_list_item_at(int index, int newItem){
        for (int i = 0; i < count; i++){
            if (i == index){
                data[i] = newItem;
            }
        }
    }

    bool remove_at(int index){
        for (int i = index; i < count - 1; i++){
            data[i] = data[i + 1];
        }
        count--;
        return false;
    }

    bool remove_list_item(int item){
        int n = 0, removeCount = 0;
        for (int i = 0; i < count; i++) {
            if (data[i] == item) {
                removeCount++;
            }
            else {
                data[n++] = data[i];
            }
        }
        
        count -= removeCount;
        if (removeCount == 0) {
            return false;
        }
        else {
            return true;
        }
    }
    void remove_all_list_items(){
        free(data);
        count = 0;
        capacity = INIT_SIZE;
        data = (int *)malloc(sizeof(int) * INIT_SIZE);
    }

} ArrayList;

int main(){
    ArrayList mylist;

    int source[] = {10, 1, 2, 3, 4, 10, 5, 6, 7, 8, 9, 10, 10, 10, 10};
    for (int i = 0; i < sizeof(source)/sizeof(int); i++) {
        mylist.add_item(source[i]);
    }
    // mylist.insert_item(1, 10);
    // if(mylist.find_list_item(100)){
    //     printf("data itu ketemu");
    // }
    // else{
    //     printf("data tidak ketemu");
    // }
    // printf("index dari angka 2 adalah %d", mylist.index_of(2));
    // mylist.update_list_item(10, 0);
    // mylist.update_list_item_at(5, 5);
    // mylist.remove_at(5);

    // mylist.remove_list_item(10);
    // mylist.print_list_item();
    // printf("banyak data adalah %d", mylist.hitung());
    mylist.remove_all_list_items();
    mylist.print_list_item();
    

    return 0;
}







