package day11.tugas.SRP;

import java.util.Date;

public class OrderViewer {
    private Order order;
    private Date date;

    public OrderViewer(Order order) {
        this.order = order;
        this.date = new Date();
    }

    public void printOrder() {
        System.out.println("Order Date: " + date);
        System.out.println("Items:");
        for (Item item : order.getItems()) {
            long itemTotal = Math.round(item.getPrice() * item.getQuantity());
            System.out.println("  " + item.getName() + " x " + item.getQuantity() + " = " + itemTotal);
        }
        System.out.println("Total: " + Math.round(order.calculateTotalSum()));
    }

    public void showOrder() {
        System.out.println("Order Date: " + date);
        System.out.println("Items:");
        for (Item item : order.getItems()) {
            System.out.println("  " + item.getName() + " x " + item.getQuantity());
        }
    }
}
