#include <iostream>
#include <string>
using namespace std;

struct node{
    char value;
    node *next;
};

struct stack{
    node *head=NULL;
    
    void push(char data){
        node* node_data=new node();
        node_data->value=data;
        node_data->next=head;
        
        head=node_data;
    }
    
    void pop_kosong(){
        if(head!=NULL){
            node *buff=head;
            head=head->next;
            delete buff;
        }
    }
};

bool cek(string data){
    stack data_stack;
    int n=data.size();
    for(int i=0;i<n;i++){
        if(data[i]=='('){ 
            data_stack.push(data[i]);
        }
        else if(data[i]==')'){
            if(data_stack.head==NULL) return false;
            data_stack.pop_kosong();
        }
    }
    
    if(data_stack.head!=NULL) return false;
    
    return true;
}

int main(){
    int T;      //jumlah test case
    cin >> T;
    cout << endl;
    
    while(T--){
        string S;
        cin >> S;
    
        string result="Input masih salah";
        if(cek(S)) result="Input sudah benar";
    
        cout << result << endl << endl;
    }
    return 0;
}