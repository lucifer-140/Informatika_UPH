package day11.tugas.NOT_SRP;

import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        OrderNotSRP order = new OrderNotSRP();
        Scanner scanner = new Scanner(System.in);

        System.out.println("Enter the number of items:");
        int itemCount = scanner.nextInt();
        scanner.nextLine();

        for (int i = 0; i < itemCount; i++) {
            System.out.println("Enter name of item " + (i + 1) + ":");
            String name = scanner.nextLine();
            System.out.println("Enter price of item " + (i + 1) + ":");
            double price = scanner.nextDouble();
            System.out.println("Enter quantity of item " + (i + 1) + ":");
            int quantity = scanner.nextInt();
            scanner.nextLine();

            Item item = new Item(name, price, quantity);
            order.addItem(item);
        }

        order.printOrder();
        scanner.close();
    }
}
