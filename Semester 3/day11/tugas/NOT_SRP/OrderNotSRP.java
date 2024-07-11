package day11.tugas.NOT_SRP;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

public class OrderNotSRP {
    private List<Item> items;
    private Date date;

    public OrderNotSRP() {
        this.items = new ArrayList<>();
        this.date = new Date();
    }

    public void addItem(Item item) {
        items.add(item);
    }

    public void deleteItem(Item item) {
        items.remove(item);
    }

    public int getItemCount() {
        return items.size(); 
    }

    public List<Item> getItems() {
        return items;
    }

    public double calculateTotalSum() {
        double total = 0;
        for (Item item : items) {
            total += item.getPrice() * item.getQuantity();
        }
        return total;
    }

    public void printOrder() {
        System.out.println("Order Date: " + date);
        System.out.println("Items:");
        for (Item item : items) {
            System.out.println("  " + item.getName() + " x " + item.getQuantity() + " - " + item.getPrice() * item.getQuantity()); // Fixed formatting
        }
        System.out.println("Total: " + calculateTotalSum());
    }
    
    public void showOrder() {
        System.out.println("Order Date: " + date);
        System.out.println("Items:");
        for (Item item : items) {
            System.out.println("  " + item.getName() + " x " + item.getQuantity()); 
        }
    }
    
    public List<OrderNotSRP> getDailyHistory() {
        return new ArrayList<>(); 
    }
    
    public List<OrderNotSRP> getMonthlyHistory() {
        return new ArrayList<>();
    }
    
    
    
}
