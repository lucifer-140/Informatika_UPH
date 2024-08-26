package day7.demo8;


public abstract class Hewan implements MakhlukHidup {
    private boolean bisaTerbang;

    public Hewan() {
        this.bisaTerbang = false; 
    }

    public void setBisaTerbang(boolean bisaTerbang) {
        this.bisaTerbang = bisaTerbang;
    }

    public boolean isBisaTerbang() {
        return this.bisaTerbang;
    }

    public abstract void bernapas(); 
    
    @Override
    public boolean isHidup() {
        return true; 
    }
}
