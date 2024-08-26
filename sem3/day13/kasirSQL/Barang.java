package kasirSQL;

public class Barang {
    private int id;
    private String nama;
    private int harga;

    public Barang(int id, String nama, int harga) {
        this.id = id;
        this.nama = nama;
        this.harga = harga;
    }

    public int getId() {
        return id;
    }

    public String getNama() {
        return nama;
    }

    public int getHarga() {
        return harga;
    }

    @Override
    public String toString() {
        return nama;
    }
}
