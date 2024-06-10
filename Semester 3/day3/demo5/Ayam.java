package day3.demo5;

public class Ayam extends Hewan {
    @Override
    public void bernapas() {
        System.out.println("Aku bernapas"); 
    }

    public static void main(String[] args) {
        Ayam kutuk = new Ayam();
        kutuk.bisaTerbang(true); 
        System.out.println("Apakah bisa terbang: " + kutuk.isTerbang());
        kutuk.bernapas();
    }
}
