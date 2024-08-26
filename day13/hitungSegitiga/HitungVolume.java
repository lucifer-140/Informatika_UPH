package hitungSegitiga;


public class HitungVolume {
    private int alas, tinggi;

    public HitungVolume() {
        this.alas = 0;
        this.tinggi = 0;
    }

    
    public void setalas(int alas) {
        this.alas = alas;
    }

    public void setTinggi(int tinggi) {
        this.tinggi = tinggi;
    }

    
    public int getalas() {
        return alas;
    }

    public int getTinggi() {
        return tinggi;
    }

    
    public int hitungVolume() {
        return alas * tinggi /2;
    }
}
