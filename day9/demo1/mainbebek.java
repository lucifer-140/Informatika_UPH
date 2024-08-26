package day9.demo1;

public class mainbebek {
    public static void main(String[] args) {
        int bbk[] = new int[]{5, 11, 17, 6};

        for (int i = 0; i < bbk.length; i++) {
            new bebek(bbk[i]);
        }

        System.out.println("Total bebek yang dibuat: " + bebek.getCount());

        for  (int i = 0; i < bbk.length; i++){
            System.out.println("Nilai bebek"+(i+1)+": "+bbk[i]);
        }
        
    }
}