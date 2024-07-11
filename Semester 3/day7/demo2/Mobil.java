package day7.demo2;

class Kendaraan {
    private String merk;
    private int tahunPembuatan;

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
}

public class Mobil {
    public static void main(String[] args) {
        Kendaraan mobilku = new Kendaraan();
        mobilku.setDataMobil("Rocky", 2022);
        System.out.println("Merk Mobil: " + mobilku.getMerk());
        System.out.println("Tahun Mobil: " + mobilku.getTahun());
    }
}
