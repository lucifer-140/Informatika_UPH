package day7.demo7;

public class Ayam {
    private boolean bisaTerbang;

    // Constructor
    public Ayam(boolean bisaTerbangAwal) {
        this.bisaTerbang = bisaTerbangAwal;
    }

    // Getter untuk memeriksa apakah ayam bisa terbang
    public boolean isTerbang() {
        return this.bisaTerbang;
    }

    // Setter untuk mengubah status terbang ayam
    public void setTerbang(boolean bisaTerbangBaru) {
        this.bisaTerbang = bisaTerbangBaru;
    }

    // Method untuk ayam bernapas
    public void bernapas() {
        System.out.println("Ayam bernapas dengan paru-paru");
    }

    public static void main(String[] args) {
        Ayam kampung = new Ayam(true);

        System.out.println("Apakah bisa terbang (awal): " + kampung.isTerbang());

        kampung.setTerbang(false);

        System.out.println("Apakah bisa terbang (setelah diubah): " + kampung.isTerbang());

        kampung.bernapas();
    }
}
