package day7.demo5;

public class Siswa {
    private int nilai;
    public String nama;

    public void setNilai(int n) {
        if (n >= 0 && n <= 100) {
            nilai = n;
        } else {
            System.out.println("Error...!!");
        }
    }

    public int getNilai() {
        return nilai;
    }

    public void info() {
        System.out.println("Saya Mhs UPH");
    }
}
