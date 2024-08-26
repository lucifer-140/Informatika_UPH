package day5.demo1;



public class Kendaraan {
    private String nama;
    private int tahunProduksi;

    // Constructor (Overloading)
    public Kendaraan() {
        // Default constructor, could initialize with default values if needed
    }

    public Kendaraan(String nama, int tahunProduksi) {
        this.nama = nama;
        this.tahunProduksi = tahunProduksi;
    }

    // Getters
    public String getNama() {
        return nama;
    }

    public int getTahunProduksi() {
        return tahunProduksi;
    }

    // Setters
    public void setNama(String nama) {
        this.nama = nama;
    }

    public void setTahunProduksi(int tahunProduksi) {
        this.tahunProduksi = tahunProduksi;
    }

    // Method to print vehicle details
    public void cetak() { 
        System.out.println("Nama\t\t: " + nama);
        System.out.println("Tahun Produksi: " + tahunProduksi);
    }
}
