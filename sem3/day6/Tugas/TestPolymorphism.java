package day6.Tugas;



public class TestPolymorphism {
    public static void main(String[] args) {
        Kotak persegi = new Kotak();
        persegi.setColor("Blue");

        ObjekGeometri bentukSembarang = new ObjekGeometri();
        bentukSembarang.setColor("Black");

        Lingkaran lingkaran = new Lingkaran(); 
        lingkaran.setColor("Red");

        displayObject(persegi);           
        displayObject(lingkaran);          
        displayObject(bentukSembarang);    
    }

    public static void displayObject(ObjekGeometri obj) {
        System.out.println(obj.getColor());
    }

}
