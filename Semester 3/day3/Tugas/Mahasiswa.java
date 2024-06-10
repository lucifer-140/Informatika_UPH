package day3.Tugas;

// void -> menandakan bahwa method-nya tidak return nilai apa pun
//
// Setter -> setNim
//        -> setIpk
//        -> setNama
//        -> setAlamat
//
// Getter -> getNim
//        -> getIpk
//        -> getNama
//        -> getAlamat
//
// public -> menandakan bahwa method atau atribut bisa diakses dari mana saja
//
// private -> menandakan bahwa method atau atribut hanya bisa diakses dari dalam kelas itu sendiri

// parameter ->  String nim;
//           -> String nama;
//           -> String alamat;
//           -> double ipk;
//
// this -> referensi ke objek itu sendiri
//
// Konstruktor -> Mahasiswa() -> default konstruktor
//             -> Mahasiswa(String nim) -> kontruktor with only parameter 'String nim'
//             -> Mahasiswa(String nimBaru, String namaBaru, String alamatBaru) -> kontruktor dgn semua paramter kecuali nilai ipk
//             -> Mahasiswa(String nimBaru, String namaBaru, String alamatBaru, double ipkBaru) -> konstruktor dgn semua paramter yang telah terdeclare
//
// Overloading -> ada tiga konstruktor dgn nama yang sama dibawah...
//                dibawah oe gunakan overloading untuk agar bisa memiliki beberapa kontruktor dengan 
//                nama yang sama tapi dengan paramter berbeda2...
// 
//                overall...same same but differenttt
//                same name different parameter, different result :v
// 



public class Mahasiswa {

    private String nim;
    private String nama;
    private String alamat;
    private double ipk;

    public Mahasiswa(){

    }

    public Mahasiswa(String nim){
        this.nim = nim;
    }

    public Mahasiswa(String nimBaru, String namaBaru, String alamatBaru){
        this.nim = nimBaru;
        this.nama = namaBaru;
        this.alamat = alamatBaru;
    }

    public Mahasiswa(String nimBaru, String namaBaru, String alamatBaru, double ipkBaru){
        this.nim = nimBaru;
        this.nama = namaBaru;
        this.alamat = alamatBaru;
        this.ipk = ipkBaru;
    }

    public void setNim(String nim){
        this.nim = nim;
    }

    public String getNim(){
        return nim;
    }

    public void setNama(String nama){
        this.nama = nama;
    }

    public String getNama(){
        return nama;
    }

    public void setAlamat(String alamat){
        this.alamat = alamat;
    }

    public String getAlamat(){
        return alamat;
    }

    public void setIpk(double ipk){
        this.ipk = ipk;
    }

    public double getIpk(){
        return ipk;
    }

    public String predikat(){
        if (ipk >= 2.0 && ipk <= 2.75){
            return "Memuaskan";
        } 
        else if (ipk >= 2.76 && ipk <= 3.5){
            return "Sangat memuaskan";
        } 
        else if (ipk >= 3.51 && ipk <= 4.0){
            return "Dengan pujian";
        } 
        else {
            return "-";
        }
    }

    public void cetak(){
        System.out.println("nim : " + nim);
        System.out.println("nama : " + nama);
        System.out.println("alamat : " + alamat);
        System.out.println("ipk : " + ipk);
        System.out.println("predikat : " + predikat());
    }



}
