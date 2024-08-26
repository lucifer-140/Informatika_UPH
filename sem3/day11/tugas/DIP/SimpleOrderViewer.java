package day11.tugas.DIP;

import java.util.Date;

public class SimpleOrderViewer implements OrderPrinter, OrderDisplayer {
    private Order order;
    private Date date;

    public SimpleOrderViewer(Order order) {
        this.order = order;
        this.date = new Date();
    }

    @Override
    public void printOrder() {
        System.out.println("Order Date: " + date); 
        System.out.println("Items:"); 
        for (Item item : order.getItems()) {
            long itemTotal = Math.round(item.getPrice() * item.getQuantity());
            System.out.println("  " + item.getName() + " x " + item.getQuantity() + " = " + itemTotal); 
        }
        System.out.println("Total: " + Math.round(order.calculateTotalSum())); 
    }

    @Override
    public void showOrder() {
        System.out.println("Order Date: " + date); 
        System.out.println("Items:"); 
        for (Item item : order.getItems()) {
            System.out.println("  " + item.getName() + " x " + item.getQuantity()); 
        }
    }
}
