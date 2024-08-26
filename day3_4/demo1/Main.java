package day3_4.demo1;

public class Main {
    public static void main(String[] args) {
        Motor motorku = new Motor ();
        motorku.merek = "Supra";
        motorku.warna = "Merah";
        motorku.tahun = 2022;
        
        motorku.merekMotor();
        motorku.warnaMotor();
        motorku.tahunBuatan();
    }
}
