package day3_4.Tugas;


// static -> shows that method/atribut tsb milik class itu, bukan milik objek dari class tsb


public class Main {
    public static void main(String[] args) {

        Mahasiswa mahasiswa = new Mahasiswa("03082230030", "Dave", "Jl. Bapak kau", 4);
        Mahasiswa mahasiswa2 = new Mahasiswa("03082230030", "Dave", "Jl. Bapak kau");
        
        
        mahasiswa.cetak();
        mahasiswa2.cetak();

    }
    
}
