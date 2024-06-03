#include <stdio.h>

int main(){
	
	// Create Variabel a
	int a = 10;
	
	printf("Isi nilai pada var.a = %d\n",a);
	printf("Var. a tersimpan di memori pada alamat = %p\n", &a);
	
	// Create alias
	
	int &r = a;
	printf("Isi nilai pada var. r = %d\n",r);
	
	r = 20; // ubah nilai pada var. r
	
	printf("Isi nilai pada var. a = %d\n",a);
	printf("Isi nilai pada var. r = %d\n",r);
	printf("Var. r tersimpan di memori pada alamat = %p\n", &r);
	
	return 0;
}
