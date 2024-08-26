#include <ctype.h>
#include <stdio.h>
#include <string.h>

#define MAX_SIZE 1000

char stack[MAX_SIZE];
int top = -1;

void push(char x) { stack[++top] = x; }

char pop() { return (top == -1) ? -1 : stack[top--]; }

int priority(char x) {
  if (x == '(')
    return 0;
  if (x == '+' || x == '-')
    return 1;
  if (x == '*' || x == '/')
    return 2;
  if (x == '^')
    return 3;
  return 0;
}

void reverseString(char *str) {
  int length = strlen(str);
  for (int i = 0; i < length / 2; i++) {
    char temp = str[i];
    str[i] = str[length - i - 1];
    str[length - i - 1] = temp;
  }
}

void removeSpaces(char *str) {
  int i, j;
  for (i = 0, j = 0; str[i]; i++)
    if (str[i] != ' ')
      str[j++] = str[i];
  str[j] = '\0';
}

void infixToPrefix(char *exp) {
  char prefix[MAX_SIZE];
  int k = 0;
  reverseString(exp); // Step 1: Reverse the infix string
  push(')');
  strcat(exp, "(");
  for (int i = 0; exp[i] != '\0'; i++) {
    if (exp[i] == ')')
      push(exp[i]);
    else if (isalnum(exp[i]))
      prefix[k++] = exp[i];
    else if (exp[i] == '(') {
      while (stack[top] != ')')
        prefix[k++] = pop();
      pop();
    } else {
      while (priority(stack[top]) >=
             priority(exp[i])) // Step 2: Slight change here
        prefix[k++] = pop();
      push(exp[i]);
    }
  }
  prefix[k] = '\0';
  reverseString(prefix); // Step 3: Reverse the postfix expression to get the
                         // prefix expression
  printf("Prefix Expression: %s\n", prefix);
}

int main() {
  char exp[MAX_SIZE];
  printf("Enter the infix expression: ");
  scanf("%[^\n]", exp);
  removeSpaces(exp);
  infixToPrefix(exp);
  return 0;
}
