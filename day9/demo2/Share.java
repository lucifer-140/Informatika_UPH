package day9.demo2;

public class Share {
    private int privateInt;
    private static int staticInt;

    public Share (int pr, int st){
        privateInt = pr;
        staticInt = st;
    }
    
    public String toString(){
        return privateInt + " " + staticInt;
    }
}
