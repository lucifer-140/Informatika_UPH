#include <stdio.h>

int main(){
	int a; //deklarasi a
	 
	a = 10;
	
	printf("Addr of a = %d\n", &a);
	printf("Value of a = %d\n", a);
	
	int *p ;
	
	p = &a;
	
	printf("Alamat memori yg disimpan oleh *p = %d\n",p);
	printf("Nilai yg terimpan di alamat tersebut adalah = %d\n", *p);
	printf("Alamat memori dari pointer p = %d\n",&p);
	
	
	//kita bisa merubah nilai var. a melalui pointer p
	*p = 100;
	
	// cetak nilai a dan p
	printf("Var.a = %d\n", a);
	printf("var. p = %d\n", *p);
	
	return 0;
}
