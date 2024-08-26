package day7.demo7;

public abstract class Hewan {
    private boolean bisaTerbang;

    // Constructor
    public Hewan() {
        this.bisaTerbang = false; 
    }

    // Setter
    public void setBisaTerbang(boolean bisaTerbang) {
        this.bisaTerbang = bisaTerbang;
    }

    // Getter
    public boolean isBisaTerbang() {
        return this.bisaTerbang;
    }

    // Method abstrak
    public abstract void bernapas(); 
}
