package day7.demo1;

public class Mobil {
    public String merk;
    public int tahunPembuatan;

    public void setDataMobil(String merk, int tahunPembuatan) {
        this.merk = merk;
        this.tahunPembuatan = tahunPembuatan;
    }

    public String getMerk() {
        return merk;
    }

    public int getTahun() {
        return tahunPembuatan;
    }

    public static void main(String[] args) {
        Mobil mobilku = new Mobil();
        mobilku.setDataMobil("Innova", 2000);
        System.out.println("Merk Mobil: " + mobilku.getMerk());
        System.out.println("Tahun Mobil: " + mobilku.getTahun());
    }
}
