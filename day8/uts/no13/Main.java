package day8.uts.no13;

public class Main {
    public static void main(String[] args) {
		
	    double luasAlas;
	    double luasSisiMiring;
	    double luasPermukaanTotal;
	    double volume;
	    double pa;
	    double t;

		
		PiramidaEnkapsulasi piramida = new PiramidaEnkapsulasi(5.0,10.0);
		
        pa = piramida.getPanjangAlas();
        t = piramida.getTinggi();

		luasAlas = pa*pa;
        luasSisiMiring = 0.5 * pa * Math.sqrt((t * t) + (pa * pa));
        luasPermukaanTotal = luasAlas + (4 * luasSisiMiring);
        volume = (1.0/3) * pa * pa * t;

		System.out.println("Informasi Piramida:");
        System.out.println("Panjang Alas: "+pa);
        System.out.println("Tinggi: "+t);
		System.out.println("Luas Permukaan: "+luasPermukaanTotal);
		System.out.println("Volume: "+volume);
    }
}
