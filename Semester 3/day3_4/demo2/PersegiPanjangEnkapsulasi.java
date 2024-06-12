package day3_4.demo2;

public class PersegiPanjangEnkapsulasi {
    // Private fields for encapsulation
    private int panjang;
    private int lebar;
    private static int jumlahObjek = 0; 

    // Default constructor
    public PersegiPanjangEnkapsulasi() {
        jumlahObjek++;
    }

    // Constructor with parameters
    public PersegiPanjangEnkapsulasi(int panjangBaru, int lebarBaru) {
        panjang = panjangBaru;
        lebar = lebarBaru;
        jumlahObjek++;
    }

    // Setter for panjang
    public void setPanjang(int panjangBaru) {
        panjang = panjangBaru;
    }

    // Getter for panjang
    public int getPanjang() {
        return panjang;
    }

    // Setter for lebar
    public void setLebar(int lebarBaru) {
        lebar = lebarBaru; // Use "this" to disambiguate
    }

    // Getter for lebar
    public int getLebar() {
        return lebar;
    }

    // Static getter for jumlahObjek
    public static int getJumlahObjek() {
        return jumlahObjek;
    }

    // Method to calculate area (luas)
    public int getLuas() {
        return panjang * lebar;
    }

    // Method to calculate perimeter (keliling)
    public int getKeliling() {
        return 2 * (panjang + lebar); 
    }
}

