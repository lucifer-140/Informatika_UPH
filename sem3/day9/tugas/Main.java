package day9.tugas;

import java.util.Scanner;

class Penjualan {

    static class Transaksi { 
        private int jml; 
        private int hrg; 
        private static String barang; 

		public void nama(String barang){
            this.barang = barang;
		}

        public void nilai(int jml, int hrg) {
            this.jml = jml;
            this.hrg = hrg;
        }

        public void total() { 
            System.out.println("Nama : " + barang);
            System.out.println("Total : " + jml * hrg);
        }
    }
}

public class Main {

    public static void main(String[] args) {

        Penjualan penjualan = new Penjualan(); 

        Penjualan.Transaksi transaksi = new Penjualan.Transaksi(); 


        Scanner scanner = new Scanner(System.in);

        System.out.print("Nama Barang ? ");
        String nama = scanner.nextLine();

        System.out.print("Jumlah Barang ? ");
        int jumlah = scanner.nextInt();

        System.out.print("Harga Barang ? ");
        int harga = scanner.nextInt();

        transaksi.nama(nama); 
        transaksi.nilai(jumlah, harga); 
        transaksi.total();
        

    }
}
