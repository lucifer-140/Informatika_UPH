package day5.Tugas;

// Abstract Class:
// An abstract class in java is a list of variables and methods that help you make other classes. Abstract methods don't have code in them. 
// KDrama -> Blueprint untuk semua jenis drama Korea, dengan properti/atribut yg umum kek: (judul, tahun rilis) dan method untuk menampilkan info

// Class:
// KDramaInfo -> Inherit dari KDrama, menjelaskan detail khusus drama romantis (pemeran utama pria dan wanita)

// Method:
// displayInfo() -> Tidak mengembalikan nilai maka "void", menampilkan informasi tentang drama (judul, tahun, pemeran)

// Konstruktor:
// KDrama(String title, int yearReleased) -> Digunakan untuk membuat objek KDrama dengan judul dan tahun rilis.
// KDramaInfo(String title, int yearReleased, String leadActor, String leadActress) -> Sama seperti konstruktor KDrama but ada tambahan informasi pemeran utama

// Main Class:
// Membuat objek KDramaInfo dengan detail drama tertentu..
// Memanggil method displayInfo() untuk menampilkan informasi lengkap tentang drama tersebut


abstract class KDrama {
    protected String title;
    protected int yearReleased;

    public KDrama(String title, int yearReleased) {
        this.title = title;
        this.yearReleased = yearReleased;
    }

    
    public abstract void displayInfo();
}


class KDramaInfo extends KDrama {
    private String leadActor;
    private String leadActress;

    public KDramaInfo(String title, int yearReleased, String leadActor, String leadActress) {
        super(title, yearReleased);
        this.leadActor = leadActor;
        this.leadActress = leadActress;
    }

    @Override
    public void displayInfo() {
        System.out.println("K-Drama Title: " + title);
        System.out.println("Released: " + yearReleased);
        System.out.println("Lead Actor: " + leadActor);
        System.out.println("Lead Actress: " + leadActress);
    }
}


public class tugasAbstrak {
    public static void main(String[] args) {
        KDramaInfo drama = new KDramaInfo("Crash Landing on You", 2019, "Hyun Bin", "Son Ye-jin");
        drama.displayInfo();
    }
}

