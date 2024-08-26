package kasir;

public class KasirController {
    public int hitungJumlahHarga(int harga, int jumlahBeli) {
        if (harga < 0 || jumlahBeli < 0) {
            throw new IllegalArgumentException("Harga dan jumlah beli harus positif.");
        }
        return harga * jumlahBeli;
    }

    public int hitungKembalian(int jumlahHarga, int jumlahBayar) {
        if (jumlahHarga < 0 || jumlahBayar < 0) {
            throw new IllegalArgumentException("Jumlah harga dan jumlah bayar harus positif.");
        } else if (jumlahBayar < jumlahHarga) {
            throw new IllegalArgumentException("Jumlah bayar tidak mencukupi.");
        }
        return jumlahBayar - jumlahHarga;
    }
}
