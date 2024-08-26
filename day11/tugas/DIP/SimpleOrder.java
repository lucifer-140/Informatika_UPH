package day11.tugas.DIP;

import java.util.ArrayList;
import java.util.List;

public class SimpleOrder implements Order {
    private List<Item> items;

    public SimpleOrder() {
        this.items = new ArrayList<>();
    }

    @Override
    public void addItem(Item item) {
        items.add(item);
    }

    @Override
    public void deleteItem(Item item) {
        items.remove(item);
    }

    @Override
    public int getItemCount() { 
        return items.size();
    }

    @Override
    public List<Item> getItems() {
        return items;
    }

    @Override
    public double calculateTotalSum() {
        double total = 0;
        for (Item item : items) {
            total += item.getPrice() * item.getQuantity();
        }
        return total; 
    }
}
