package day3.demo3;


class Mahluk {
    public void info() {
        System.out.println("Informasi class Mahluk");
    }
}

class Mamalia extends Mahluk {
    @Override
    public void info() {
        System.out.println("Info() pada Mamalia");
    }
}

class Sapi extends Mahluk {
    @Override
    public void info() {
        System.out.println("Info() pada Sapi");
    }
}

public class Polymorphism01 {
    public static void main(String[] args) {
        Mahluk m = new Mahluk();
        Mamalia mamalia = new Mamalia();
        Sapi sapiSumba = new Sapi();

        m.info(); 
        
        m = mamalia; 
        m.info(); 

        m = sapiSumba;
        m.info(); 
    }
}


