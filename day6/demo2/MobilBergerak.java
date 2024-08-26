package day6.demo2;

public class MobilBergerak {
    private String merek;

    // Constructor
    public MobilBergerak(String m) {
        this.merek = m;
        System.out.println(this.merek + " adalah kendaraan beroda 4");
    }

    // Method bergerak (overloaded)
    public void bergerak(String arah) {
        System.out.println(this.merek + " melaju ke arah " + arah);
    }

    // Method bergerak (overloaded)
    public void bergerak(String arah, int jarak) {
        System.out.println(this.merek + " melaju ke arah " + arah + " sejauh " + jarak + " km");
    }

}
