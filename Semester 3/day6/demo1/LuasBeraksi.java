package day6.demo1;

public class LuasBeraksi {
    public static void main(String[] args) {
        System.out.println("Panggil konstruktor pertama");
        Luas bentuk1 = new Luas(3.5);
        System.out.println("Panjang = " + bentuk1.panjang);
        System.out.println("Lebar = " + bentuk1.lebar);
        System.out.println("Tinggi = " + bentuk1.tinggi);

        System.out.println("Panggil konstruktor kedua");
        Luas bentuk2 = new Luas(7.2, 2.3);
        System.out.println("Panjang = " + bentuk2.panjang);
        System.out.println("Lebar = " + bentuk2.lebar);
        System.out.println("Tinggi = " + bentuk2.tinggi);

        System.out.println("Panggil konstruktor ketiga");
        Luas bentuk3 = new Luas(5.2, 3.5, 2.1);
        System.out.println("Panjang = " + bentuk3.panjang);
        System.out.println("Lebar = " + bentuk3.lebar);
        System.out.println("Tinggi = " + bentuk3.tinggi);
        
    }
}
