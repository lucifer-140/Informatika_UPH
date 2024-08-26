package day9.demo2;

public class mainShare {
    public static void main (String[] args){
        Share s1 = new Share(5, 5);
        System.out.println(s1.toString());

        System.out.println();

        Share s2 = new Share(9, 3);
        System.out.println(s1.toString());
        System.out.println(s2.toString());

        System.out.println();

        Share s3 = new Share(7, 23);
        System.out.println(s1.toString());
        System.out.println(s2.toString());
        System.out.println(s3.toString());
    }
}