package demo3;

public class Pinherit_Ortu {
    public static void main(String[] args) {

        Ortu o = new Ortu();
        Anak a = new Anak();
        
        System.out.println(o.methodParent());
        System.out.println(a.methodParent()); // this is method parent using extends
        System.out.println(a.methodChild());
        //System.out.println(o.methodChild());
    }
}
