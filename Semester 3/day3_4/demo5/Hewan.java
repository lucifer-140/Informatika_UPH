package day3_4.demo5;


public abstract class Hewan {
    private boolean terbang = false; 
    public void bisaTerbang(boolean terbang) {
        this.terbang = terbang;
    }

    public boolean isTerbang() {
        return this.terbang;
    }

    public abstract void bernapas();
}
