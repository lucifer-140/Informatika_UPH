package day9.demo1;

public class bebek {
    private int size;
    private static int bebekCount = 0;

    public bebek (int size){
        this.size = size;
        bebekCount++;
    }

    public int getSize(){
        return size;
    }

    public static int getCount(){
        return bebekCount;
    }
}