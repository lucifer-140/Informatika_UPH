package day5.demo1;

public final class Pesawat extends Udara {
    private int muatan;  // Corrected variable name

    // Constructors (Overloading)
    public Pesawat() {
        // Default constructor
    }

    public Pesawat(String nama, int tahunProduksi, boolean mesin, int muatan) {
        super(nama, tahunProduksi, mesin); // Call the parent (Udara) constructor
        this.muatan = muatan;
    }

    // Getter and Setter for 'muatan'
    public int getMuatan() {
        return muatan;
    }

    public void setMuatan(int muatan) {
        this.muatan = muatan;
    }

    // Method to reset Pesawat details
    public void reset(String nama, int tahunProduksi, boolean mesin, int muatan) {
        setNama(nama);
        setTahunProduksi(tahunProduksi);
        setMesin(mesin);
        setMuatan(muatan);
    }

    // Method to categorize Pesawat based on 'muatan'
    public String kategori(int muatan) {
        if (muatan <= 100) {
            return "Mini";
        } else if (muatan <= 200) {
            return "Sedang";
        } else {
            return "Besar";
        }
    }

    // Overridden cetak method
    @Override
    public void cetak() {
        super.cetak(); // Call the parent's cetak method
        System.out.println("Muatan\t\t: " + muatan + " orang");
        System.out.println("Kategori\t: " + kategori(muatan));
    }
}
