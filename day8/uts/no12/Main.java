package day8.uts.no12;



abstract class BangunDatar  {

    
    public abstract void cariLuas();
}

class Trapesium extends BangunDatar {
    private double a, b, t;

    public Trapesium(double a, double b, double t) {
        this.a = a;
        this.b = b;
        this.t = t;
    }

    @Override
    public void cariLuas(){
        System.out.println("Luas trapesium: "+((a+b)*(t/2)));
    }
}

class Kubus extends BangunDatar {
    private double s;

    public Kubus(double s) {
        this.s = s;
    }

    @Override
    public void cariLuas(){
        System.out.println("Luas Kubus: "+(6*s*s));
    }
}




public class Main {
    public static void main(String[] args) {
        Trapesium trapesium = new Trapesium(2, 2, 2);
        Kubus kubus = new Kubus(2);

        trapesium.cariLuas();
        kubus.cariLuas();
        
    }
}

