package day7.demo3;

class Pelajar {
    private String nim;
    private String nama;
    private double nilai1, nilai2, nilai3;
    double rata;

    protected void setDataSiswa(String nim, String nama) {
        this.nim = nim;
        this.nama = nama;
    }

    public void setNilaiSiswa(double n1, double n2, double n3) {
        nilai1 = n1;
        nilai2 = n2;
        nilai3 = n3;
    }

    public double getNilaiRata() {
        rata = (nilai1 + nilai2 + nilai3) / 3;
        return rata;
    }
}

public class Siswa {
    public static void main(String[] args) {
        Pelajar siswa1 = new Pelajar();
        siswa1.setDataSiswa("0105048702", "Ronald");
        siswa1.setNilaiSiswa(90, 80, 100);
        System.out.println(siswa1.getNilaiRata());
    }
}
