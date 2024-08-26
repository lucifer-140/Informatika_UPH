package day8.uts.no11;


abstract class Film  {
    protected String judul;
    protected int durasi;

    public Film(String judul, int durasi) {
        this.judul = judul;
        this.durasi = durasi;
    }

    
    public abstract void displayInfo();
}


class Drama extends Film {
    private String genre;

    public Drama(String judul, int durasi) {
        super(judul, durasi);
        this.genre = "Drama";
    }

    @Override
    public void displayInfo() {
        System.out.println("Judul Film: " + judul);
        System.out.println("Genre: " + genre);
        System.out.println("Durasi: " + durasi);
        System.out.println("----------------------------");
    }
}

class Horor extends Film {
    private String genre;

    public Horor(String judul, int durasi) {
        super(judul, durasi);
        this.genre = "Horor";
    }

    @Override
    public void displayInfo() {
        System.out.println("Judul Film: " + judul);
        System.out.println("Genre: " + genre);
        System.out.println("Durasi: " + durasi);
        System.out.println("----------------------------");
    }
}

class Komedi extends Film {
    private String genre;

    public Komedi(String judul, int durasi) {
        super(judul, durasi);
        this.genre = "Komedi";
    }

    @Override
    public void displayInfo() {
        System.out.println("Judul Film: " + judul);
        System.out.println("Genre: " + genre);
        System.out.println("Durasi: " + durasi);
        System.out.println("----------------------------");
    }
}





public class MainFilm {
    public static void main(String[] args) {
        Drama drama = new Drama("Queen of Tears", 1280);
        Horor horor = new Horor("IT", 134);
        Komedi komedi = new Komedi("Shazam! Fury of The Gods", 130);
        drama.displayInfo();
        horor.displayInfo();
        komedi.displayInfo();
    }
}

