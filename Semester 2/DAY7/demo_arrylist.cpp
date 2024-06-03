#include <stdio.h>
#include <stdlib.h>
#define INIT_SIZE 10

typedef struct ArrayList {
	int *data;
	int  count;
	int  capacity;

    ArrayList(){ // prepared the list // kompleksitas/operation cost : O(1)
        data = (int *)malloc(sizeof(int) * INIT_SIZE);
        count = 0;
        capacity = INIT_SIZE;
    }

    int get_count(){
        return count;
    }

    bool is_empty(){
        return get_count() == 0;
    }
    
    bool is_full(){
        return count == capacity;
    }

    void add_item(int item){
        if (is_full()){
            capacity += INIT_SIZE;
            data = (int *)realloc(data, sizeof(int) * capacity);
        }
        data[count++] = item;
    }

    void insert_item(int index, int item){
        if (index >=0 && index < count){
            if (is_full()){
                capacity += INIT_SIZE;
                data = (int *)realloc(data, sizeof(int) * capacity);
            }
            for (int i = count; i > index; i--){
                data[i] = data[i-1];
            }
            data[index] = item;
            count++;
        }
    }

    void print_list_item(){
        printf("\n");
        printf("data items:\n");
        for (int i = 0; i < count; i++){
            printf("%d ", data[i]);
        }
        printf("\n\n");
    }

    int get_item(int index){
        if (index >=0 && index < count){
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

    void update_all_list_item(int item, int newItem){
        for (int i = 0; i < count; i++){
            if (data[i] == item){
                data[i] = newItem;
            }
        }
    }

    bool remove_at(int index){
        if (index >= 0 && index < count){
            for (int i = index; i < count; i++){
                data[i] = data[i+1];
            }
            count--;
            return true;
        }
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
    }
} ArrayList;


int main(){

    ArrayList mylist;
    
    printf("banyak elemen data : %d\n", mylist.get_count());
    printf("list is empty ? %s\n", mylist.is_empty() ? "ya" : "tidak");
    
    int source[] = {1, 2, 3, 4, 5};

    for (int i = 0; i < sizeof(source)/sizeof(int); i++){
        mylist.add_item(source[i]);
    }
    
    mylist.print_list_item();

    printf("banyak elemen data : %d\n", mylist.get_count());
    printf("list is empty ? %s\n", mylist.is_empty() ? "ya" : "tidak");
    
    mylist.insert_item(1, 2);
    mylist.print_list_item();

    printf("banyak elemen data : %d\n", mylist.get_count());
    printf("list is empty ? %s\n", mylist.is_empty() ? "ya" : "tidak");
    

    return 0;
}