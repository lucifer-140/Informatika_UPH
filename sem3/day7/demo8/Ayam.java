package day7.demo8;

public class Ayam extends Hewan implements MakhlukHidup { 
    
    private boolean bisaTerbang;

    
    public Ayam(boolean bisaTerbangAwal) {
        this.bisaTerbang = bisaTerbangAwal;
    }

    
    public boolean isTerbang() {
        return this.bisaTerbang;
    }

    
    public void setTerbang(boolean bisaTerbangBaru) {
        this.bisaTerbang = bisaTerbangBaru;
    }

    
    @Override
    public void bernapas() {
        System.out.println("Aku bernapas"); 
        
    }

    @Override
    public boolean isHidup() {
        return true; 
    }

    public static void main(String[] args) {
        Ayam kutuk = new Ayam(false); 
        kutuk.setBisaTerbang(true); 
        System.out.println("Apakah bisa terbang: " + kutuk.isBisaTerbang());
        kutuk.bernapas();
        System.out.println("Apakah benda hidup: " + kutuk.isHidup());
    }
}
