package demo2;

public class Main {
    public static void main(String[] args) {
        Mobil mobilku = new Mobil ();
        mobilku.merek = "Toyota";
        mobilku.warna = "Merah";
        
        mobilku.nyalakanMesin();
        mobilku.matikanMesin();
    }
}
