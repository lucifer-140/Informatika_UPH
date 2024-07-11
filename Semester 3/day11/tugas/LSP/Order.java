package day11.tugas.LSP;

import java.util.ArrayList; 
import java.util.List;

public class Order {
    private List<Item> items; 

    public Order() {
        this.items = new ArrayList<>();
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
}
