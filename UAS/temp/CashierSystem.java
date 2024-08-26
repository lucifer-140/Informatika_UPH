package UAS.temp;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.HashMap;
import java.util.Map;

public class CashierSystem extends JFrame {

    private JTextField nameField, codeField, priceField, quantityField, totalField;
    private JTextField totalPriceField, discountField, amountPaidField, changeField;
    private JButton addButton, editButton, deleteButton, cancelButton;
    private JTable dataTable;
    private DefaultTableModel tableModel;
    private int selectedRow = -1;
    private JComboBox<String> memberCodeComboBox, productCodeComboBox;
    private Map<String, Member> members;
    private Map<String, Product> products;

    public CashierSystem() {
        setTitle("Cashier System");
        setSize(800, 600);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setLayout(new BorderLayout(10, 10));

        // Initialize member and product data
        initializeMembers();
        initializeProducts();

        // Header
        JPanel headerPanel = new JPanel();
        headerPanel.setBackground(new Color(0, 123, 255)); // Header background color
        JLabel headerLabel = new JLabel("Cashier System", SwingConstants.CENTER);
        headerLabel.setFont(new Font("Arial", Font.BOLD, 24));
        headerLabel.setForeground(Color.WHITE);
        headerPanel.add(headerLabel);
        add(headerPanel, BorderLayout.NORTH);

        // Main Panel
        JPanel mainPanel = new JPanel();
        mainPanel.setLayout(new BorderLayout(10, 10));

        // Customer Details Card
        JPanel customerPanel = new JPanel();
        customerPanel.setLayout(new GridLayout(4, 2, 10, 10));
        customerPanel.setBorder(BorderFactory.createTitledBorder("Customer Details"));
        customerPanel.setBackground(Color.WHITE);

        customerPanel.add(new JLabel("Name:"));
        nameField = new JTextField();
        nameField.setEditable(false); // Make Name field non-editable
        customerPanel.add(nameField);

        customerPanel.add(new JLabel("Code:"));
        codeField = new JTextField();
        codeField.setEditable(false); // Make Code field non-editable
        customerPanel.add(codeField);

        customerPanel.add(new JLabel("Membership Status:"));
        JComboBox<String> membershipComboBox = new JComboBox<>(new String[]{"Member", "Non-Member"});
        membershipComboBox.setEnabled(false); // Disable Membership Status field
        customerPanel.add(membershipComboBox);

        customerPanel.add(new JLabel("Member Code:"));
        memberCodeComboBox = new JComboBox<>(members.keySet().toArray(new String[0]));
        memberCodeComboBox.addActionListener(e -> updateMemberDetails());
        customerPanel.add(memberCodeComboBox);

        mainPanel.add(customerPanel, BorderLayout.NORTH);

        // Product Details Card
        JPanel productPanel = new JPanel();
        productPanel.setLayout(new GridLayout(4, 2, 10, 10));
        productPanel.setBorder(BorderFactory.createTitledBorder("Product Details"));
        productPanel.setBackground(Color.WHITE);

        productPanel.add(new JLabel("Code:"));
        productCodeComboBox = new JComboBox<>(products.keySet().toArray(new String[0]));
        productCodeComboBox.addActionListener(e -> updateProductDetails());
        productPanel.add(productCodeComboBox);

        productPanel.add(new JLabel("Name:"));
        JTextField productNameField = new JTextField();
        productNameField.setEditable(false); // Make Name field non-editable
        productPanel.add(productNameField);

        productPanel.add(new JLabel("Price:"));
        priceField = new JTextField();
        priceField.setEditable(false); // Make Price field non-editable
        productPanel.add(priceField);

        productPanel.add(new JLabel("Quantity:"));
        quantityField = new JTextField();
        productPanel.add(quantityField);

        productPanel.add(new JLabel("Total:"));
        totalField = new JTextField();
        totalField.setEditable(false);
        productPanel.add(totalField);

        mainPanel.add(productPanel, BorderLayout.CENTER);

        // Calculation Area Card
        JPanel calculationPanel = new JPanel();
        calculationPanel.setLayout(new GridLayout(4, 2, 10, 10));
        calculationPanel.setBorder(BorderFactory.createTitledBorder("Calculation Area"));
        calculationPanel.setBackground(Color.WHITE);

        calculationPanel.add(new JLabel("Total Price:"));
        totalPriceField = new JTextField();
        totalPriceField.setEditable(false);
        calculationPanel.add(totalPriceField);

        calculationPanel.add(new JLabel("Discount:"));
        discountField = new JTextField();
        calculationPanel.add(discountField);

        calculationPanel.add(new JLabel("Amount Paid:"));
        amountPaidField = new JTextField();
        calculationPanel.add(amountPaidField);

        calculationPanel.add(new JLabel("Change:"));
        changeField = new JTextField();
        changeField.setEditable(false);
        calculationPanel.add(changeField);

        mainPanel.add(calculationPanel, BorderLayout.SOUTH);

        add(mainPanel, BorderLayout.WEST);

        // Buttons Panel
        JPanel buttonPanel = new JPanel();
        buttonPanel.setLayout(new GridLayout(1, 4, 10, 10));
        buttonPanel.setBorder(BorderFactory.createEmptyBorder(10, 10, 10, 10));
        buttonPanel.setBackground(Color.WHITE);

        addButton = createButton("Add", new Color(0, 123, 255), Color.WHITE);
        buttonPanel.add(addButton);

        editButton = createButton("Edit", new Color(0, 123, 255), Color.WHITE);
        buttonPanel.add(editButton);

        deleteButton = createButton("Delete", new Color(220, 53, 69), Color.WHITE); // Red for delete
        buttonPanel.add(deleteButton);

        cancelButton = createButton("Cancel", new Color(108, 117, 125), Color.WHITE); // Gray for cancel
        buttonPanel.add(cancelButton);

        add(buttonPanel, BorderLayout.SOUTH);

        // Data Table
        JPanel tablePanel = new JPanel();
        tablePanel.setLayout(new BorderLayout(10, 10));
        tablePanel.setBorder(BorderFactory.createEmptyBorder(10, 10, 10, 10));
        tablePanel.setBackground(Color.WHITE);

        tableModel = new DefaultTableModel(new Object[]{"Name", "Code", "Product", "Qty", "Price", "Total"}, 0);
        dataTable = new JTable(tableModel);
        dataTable.setRowHeight(25);
        dataTable.setFont(new Font("Arial", Font.PLAIN, 14));
        dataTable.setSelectionBackground(new Color(0, 123, 255));
        dataTable.setSelectionForeground(Color.WHITE);

        JScrollPane scrollPane = new JScrollPane(dataTable);
        tablePanel.add(scrollPane, BorderLayout.CENTER);

        add(tablePanel, BorderLayout.EAST);
    }

    private void initializeMembers() {
        members = new HashMap<>();
        members.put("M001", new Member("John Doe", true));
        members.put("M002", new Member("Jane Smith", false));
        members.put("M003", new Member("Emily Johnson", true));

        // Optionally add more members here
    }

    private void initializeProducts() {
        products = new HashMap<>();
        products.put("P001", new Product("Product 1", 10.0));
        products.put("P002", new Product("Product 2", 20.0));
        products.put("P003", new Product("Product 3", 30.0));

        // Optionally add more products here
    }

    private void updateMemberDetails() {
        String selectedCode = (String) memberCodeComboBox.getSelectedItem();
        Member member = members.get(selectedCode);
        if (member != null) {
            nameField.setText(member.getName());
            codeField.setText(selectedCode);
            // You can set membership status if needed
        } else {
            nameField.setText("");
            codeField.setText("");
        }
    }

    private void updateProductDetails() {
        String selectedCode = (String) productCodeComboBox.getSelectedItem();
        Product product = products.get(selectedCode);
        if (product != null) {
            priceField.setText(String.valueOf(product.getPrice()));
            // Assuming you have a productNameField to set the product name
            // productNameField.setText(product.getName());
        } else {
            priceField.setText("");
            // Clear productNameField if needed
            // productNameField.setText("");
        }
    }

    private JButton createButton(String text, Color bgColor, Color fgColor) {
        JButton button = new JButton(text);
        button.setBackground(bgColor);
        button.setForeground(fgColor);
        button.setFocusPainted(false);
        button.setFont(new Font("Arial", Font.BOLD, 14));
        button.setPreferredSize(new Dimension(100, 40));
        button.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                handleButtonAction(text);
            }
        });
        return button;
    }

    private void handleButtonAction(String action) {
        switch (action) {
            case "Add":
                addItem();
                break;
            case "Edit":
                editItem();
                break;
            case "Delete":
                deleteItem();
                break;
            case "Cancel":
                clearFields();
                break;
        }
    }

    private void addItem() {
        String name = nameField.getText();
        String code = codeField.getText();
        String product = (String) productCodeComboBox.getSelectedItem();
        int qty = Integer.parseInt(quantityField.getText());
        double price = Double.parseDouble(priceField.getText());
        double total = price * qty;

        tableModel.addRow(new Object[]{name, code, product, qty, price, total});
        clearFields();
    }

    private void editItem() {
        if (selectedRow >= 0) {
            tableModel.setValueAt(nameField.getText(), selectedRow, 0);
            tableModel.setValueAt(codeField.getText(), selectedRow, 1);
            tableModel.setValueAt(productCodeComboBox.getSelectedItem(), selectedRow, 2);
            tableModel.setValueAt(Integer.parseInt(quantityField.getText()), selectedRow, 3);
            tableModel.setValueAt(Double.parseDouble(priceField.getText()), selectedRow, 4);
            tableModel.setValueAt(Double.parseDouble(totalField.getText()), selectedRow, 5);
            clearFields();
        }
    }

    private void deleteItem() {
        if (selectedRow >= 0) {
            tableModel.removeRow(selectedRow);
            clearFields();
        }
    }

    private void clearFields() {
        nameField.setText("");
        codeField.setText("");
        priceField.setText("");
        quantityField.setText("");
        totalField.setText(""); 
        totalPriceField.setText("");
        discountField.setText("");
        amountPaidField.setText("");
        changeField.setText("");
        selectedRow = -1;
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> {
            CashierSystem frame = new CashierSystem();
            frame.setVisible(true);
        });
    }

    // Inner class to represent a Member
    private static class Member {
        private final String name;
        private final boolean isMember;

        public Member(String name, boolean isMember) {
            this.name = name;
            this.isMember = isMember;
        }

        public String getName() {
            return name;
        }

        public boolean isMember() {
            return isMember;
        }
    }

    // Inner class to represent a Product
    private static class Product {
        private final String name;
        private final double price;

        public Product(String name, double price) {
            this.name = name;
            this.price = price;
        }

        public String getName() {
            return name;
        }

        public double getPrice() {
            return price;
        }
    }
}