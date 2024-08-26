package day5.demo1;

public class PesawatDemo {

    // Method to find the minimum of two integers
    public static int min2(int a, int b) {
        return (a <= b) ? a : b; // Use the ternary operator for conciseness
    }

    // Method to check if two Pesawat objects have the same name (case-insensitive)
    public static boolean isNamaSama(Pesawat p1, Pesawat p2) {
        return p1.getNama().equalsIgnoreCase(p2.getNama()); // Simpler comparison
    }

    public static void main(String[] args) {
        // Array to hold Pesawat objects
        Pesawat[] p = new Pesawat[3];

        // Create Pesawat objects and store them in the array
        p[0] = new Pesawat();
        p[1] = new Pesawat("Garuda Boeing 777", 1990, true, 305);
        p[2] = new Pesawat("Citilink Airbus A320", 1988, true, 150);

        // Reset the details of the first Pesawat
        p[0].reset("Wings Air ATR 72-500", 1988, false, 72); // Corrected model name

        // Print details of each Pesawat
        for (Pesawat pesawat : p) {
            pesawat.cetak();
            System.out.println(); 
        }

        // Compare names of the first and second Pesawat
        System.out.print("Nama pesawat pertama dan kedua ");
        if (isNamaSama(p[0], p[1])) {
            System.out.println("sama");
        } else {
            System.out.println("tidak sama");
        }
        System.out.println();

        // Find the Pesawat with the smallest muatan (capacity)
        int minMuatanIndex = 0; 
        for (int i = 1; i < p.length; i++) {
            if (p[i].getMuatan() < p[minMuatanIndex].getMuatan()) {
                minMuatanIndex = i;
            }
        }
        System.out.println("Muatan paling sedikit = " + p[minMuatanIndex].getNama()); 
    }
}

