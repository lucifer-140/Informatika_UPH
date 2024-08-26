package day11.tugas.DIP;

import java.util.Date;

public class DetailedOrderViewer implements OrderPrinter, OrderDisplayer {
    private Order order;
    private Date date;

    public DetailedOrderViewer(Order order) {
        this.order = order;
        this.date = new Date();
    }

    @Override
    public void printOrder() {
        System.out.println("Detailed Order Date: " + date); 
        System.out.println("Items:"); 
        for (Item item : order.getItems()) {
            long itemTotal = Math.round(item.getPrice() * item.getQuantity());
            System.out.println("  Item: " + item.getName()); 
            System.out.println("  Quantity: " + item.getQuantity()); 
            System.out.println("  Price per unit: " + item.getPrice()); 
            System.out.println("  Total: " + itemTotal); 
            System.out.println("------------------------"); 
        }
        System.out.println("Total: " + Math.round(order.calculateTotalSum())); 
    }

    @Override
    public void showOrder() {
        System.out.println("Detailed Order Date: " + date); 
        System.out.println("Items:"); 
        for (Item item : order.getItems()) {
            System.out.println("  Item: " + item.getName()); 
            System.out.println("  Quantity: " + item.getQuantity()); 
            System.out.println("  Price per unit: " + item.getPrice()); 
            System.out.println("------------------------"); 
        }
    }
}
