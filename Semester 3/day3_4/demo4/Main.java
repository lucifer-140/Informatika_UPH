package day3_4.demo4;

class Hewan {
    void bersuara() {
        System.out.println("Hewan bersuara");
    }
}

class Kucing extends Hewan {
    @Override
    void bersuara() {
        System.out.println("Meow");
    }
}

class Anjing extends Hewan {
    @Override
    void bersuara() {
        System.out.println("Guk");
    }
}

public class Main {
    public static void main(String[] args) {
        Hewan[] hewan = new Hewan[] { new Kucing(), new Anjing() };

        for (Hewan h : hewan) {
            h.bersuara(); 
        }
    }
}
