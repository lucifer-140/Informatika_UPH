package demo1;
import java.util.Scanner;

public class Manusia {
    private String nama;
    private String jKelamin;
    private int umur;

    public void setNama (String a) {
        nama=a;
    }

    public String getNama () {
        return nama;

    }
   
    public void setJkelamin (String jk) {
        jKelamin = jk;
    }

    public String getJkelamin () {
        return jKelamin;
    }


    public void setUmur (int a) {
        umur=a; 
    }

    public int setUmur() {
        return umur;
    }

    public void isiParam (String nama, int umur) {
        this.nama = nama;
        this.umur = umur;
    }

    public void cetakKlayar () {
        System.out.println("Nama : "+ nama +", Umur "+ umur);
    }

    public static void main(String[] arga) {
        
        Scanner scanner = new Scanner(System.in);

        Manusia orang = new Manusia(); 

        System.out.print("Nama ? ");
        orang.setNama(scanner.nextLine());

        System.out.print("Jenis kelamin (L/P) ? ");
        orang.setJkelamin(scanner.nextLine()); 

        System.out.print("Umur ? ");
        orang.setUmur(scanner.nextInt());

        orang.cetakKlayar(); 
        scanner.close();

    }

}