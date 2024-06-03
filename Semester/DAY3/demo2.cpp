#include<stdlib.h>
#include<stdio.h>
//memesan size memori sendiri
int main(){
	
	int *p;
	
	p = (int *)malloc(sizeof(int)); //(int *) untuk casting ; request memori secara mandiri
	
	*p = 100; //assign sebuah nilai ke alamat yg sudah direq
	
	printf("Nilai pada pointer p = %d\n", *p);
	
	free(p);
	
	return 0;
}
