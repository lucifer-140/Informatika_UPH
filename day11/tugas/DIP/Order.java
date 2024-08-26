package day11.tugas.DIP;

import java.util.List;

public interface Order {
    void addItem(Item item);
    void deleteItem(Item item);
    int getItemCount();
    List<Item> getItems();
    double calculateTotalSum();
}
