#include <stdio.h>

typedef struct{
    char name[25];
    char password[25];
    int id;
}User;

int main(){

    User user1 = {"Raveline", "raveline123", 001};
    User user2 = {"Misellin", "misellin123", 002};

    printf("%s\n", user1.name);
    printf("%s\n", user1.password);
    printf("%d\n", user1.id);
    printf("%s\n", user2.name);
    printf("%s\n", user2.password);
    printf("%d\n", user2.id);

    return 0;
}