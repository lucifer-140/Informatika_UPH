#include <stdio.h>
#include <string.h>

struct Player{
    char name[15];
    int score;
}l;

int main(){
    
    struct Player player1;
    struct Player player2;

    strcpy(player1.name, "Raveline");
    strcpy(player2.name, "Misellin");

    player1.score = 4;
    player2.score = 5;

    printf("Player 1: %s\n", player1.name);
    printf("Player 2: %s\n", player2.name);
    printf("Player 1 score: %d\n", player1.score);
    printf("Player 2 score: %d\n", player2.score);

    return 0;
}