package day5.demo1;

public class Udara extends Kendaraan {
    private boolean mesin; // True for jet engine, false for propeller

    // Constructors (overloading)
    public Udara() {
        // Default constructor, could initialize with default values if needed
    }

    public Udara(String nama, int tahunProduksi, boolean mesin) {
        super(nama, tahunProduksi); // Call the parent (Kendaraan) constructor
        this.mesin = mesin;
    }

    // Getter
    public boolean getMesin() {
        return mesin;
    }

    // Setter
    public void setMesin(boolean mesin) {
        this.mesin = mesin;
    }

    // Overridden cetak method
    @Override
    public void cetak() {
        super.cetak(); // Call the parent's cetak method to print basic details
        System.out.print("Mesin\t\t: ");
        if (mesin) {
            System.out.println("Jet");
        } else {
            System.out.println("Baling-baling");
        }
    }
}

