package day12.demoGUI;

public class HitungVolume {
    private int panjang, lebar, tinggi;

    public HitungVolume() {
        this.panjang = 0;
        this.lebar = 0;
        this.tinggi = 0;
    }

    
    public void setPanjang(int panjang) {
        this.panjang = panjang;
    }

    public void setLebar(int lebar) {
        this.lebar = lebar;
    }

    public void setTinggi(int tinggi) {
        this.tinggi = tinggi;
    }

    
    public int getPanjang() {
        return panjang;
    }

    public int getLebar() {
        return lebar;
    }

    public int getTinggi() {
        return tinggi;
    }

    
    public int hitungVolume() {
        return panjang * lebar * tinggi;
    }
}
