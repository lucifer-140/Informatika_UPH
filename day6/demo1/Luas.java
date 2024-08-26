package day6.demo1;

public class Luas {
    double panjang; 
    double lebar;  
    double tinggi; 

    public Luas(double pj) {
        this.panjang = pj;
        this.lebar = 1; 
        this.tinggi = 1; 
    }

    public Luas(double pj, double lb) {
        this.panjang = pj;
        this.lebar = lb;
        this.tinggi = 1; 
    }

    public Luas(double pj, double lb, double tg) {
        this.panjang = pj;
        this.lebar = lb;
        this.tinggi = tg;
    }
}
