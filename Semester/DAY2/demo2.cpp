#include <stdio.h>

int main(){
	
	int nilai = 100;
	
	if(nilai >= 60 && nilai <= 100){
		printf("Nilai = %d. Anda Lulus.\n", nilai);
	} 
	else if(nilai >= 0 && nilai < 60){
		printf("Nilai = %d. Anda Fail.\n", nilai);
	}
	else {
		printf("Sorry, nilai anda ngaco", nilai);
	}
	
	
	char kar = 'A';
	
	switch (kar) {
		case 'A':
			printf("%c adalah huruf A. ascii = %d\n", kar, kar);
			break;
		case 'E':
		case 'I':
		case 'O':
		case 'U':
		case 'a':
		case 'e':
		case 'i':
		case 'o':
		case 'u':
			printf("%c adalah huruf vokal.\n", kar);
			break;
			
		default:
			printf("%c bukan huruf vokal.\n",kar);
			break;
	}
	
	return 0;
}
