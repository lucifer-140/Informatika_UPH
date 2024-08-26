package day7.demo6;

public class MahasiswaEnkapsulasi {
    private String nim;
    private String nama;
    private String alamat;
    private double ipk;

    public MahasiswaEnkapsulasi() {
        this.nim = "";
        this.nama = "";
        this.alamat = "";
        this.ipk = 0.0;
    }

    public MahasiswaEnkapsulasi(String nimBaru) {
        this.nim = nimBaru;
        this.nama = "";
        this.alamat = "";
        this.ipk = 0.0;
    }

    public MahasiswaEnkapsulasi(String nimBaru, String namaBaru, String alamatBaru, double ipkBaru) {
        this.nim = nimBaru;
        this.nama = namaBaru;
        this.alamat = alamatBaru;
        this.ipk = ipkBaru;
    }

    public void setNim(String nim) {
        this.nim = nim;
    }

    public String getNim() {
        return this.nim;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getNama() {
        return this.nama;
    }

    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }

    public String getAlamat() {
        return this.alamat;
    }

    public void setIpk(double ipk) {
        this.ipk = ipk;
    }

    public double getIpk() {
        return this.ipk;
    }

    public String predikat() {
        if (this.ipk >= 3.51) {
            return "Dengan Pujian";
        } else if (this.ipk >= 3.01) {
            return "Sangat Baik";
        } else if (this.ipk >= 2.51) {
            return "Baik";
        } else if (this.ipk >= 2.00) {
            return "Cukup";
        } else {
            return "Tidak Lulus";
        }
    }

    public void cetak() {
        System.out.println("Nama: " + this.nama);
        System.out.println("Alamat: " + this.alamat);
        System.out.println("NIM: " + this.nim);
        System.out.println("IPK: " + this.ipk);
        System.out.println("Predikat: " + predikat());
    }

    public static void main(String[] args) {
        MahasiswaEnkapsulasi mahasiswa = new MahasiswaEnkapsulasi("0105048702", "Ronald Belferik", "Medan", 3.87);
        mahasiswa.cetak();
    }
}
