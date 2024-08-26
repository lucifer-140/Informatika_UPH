package UAS.No_2;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.JOptionPane;


public class TransaksiController {

    private final BarangController barangController;
    private final KonsumenController konsumenController;
    private final DefaultTableModel tableModel;
    private int selectedRow = -1;

    private final JComboBox<String> kodeBarangComboBox;
    private final JComboBox<String> kodeKonsumenComboBox;
    private final JTextField namaKonsumenField;
    private final JTextField namaBarangField;
    private final JTextField hargaBarangField;
    private final JTextField jumlahField;
    private final JTextField diskonField;
    private final JTextField totalHargaField;
    private final JTextField kembalianField;
    private final JTextField jumlahBayarField;
    private final JTextField keteranganField;
    private final JTextField satuanField;

    public TransaksiController(BarangController barangController, KonsumenController konsumenController) {
        this.barangController = barangController;
        this.konsumenController = konsumenController;
        this.tableModel = new DefaultTableModel(new Object[]{"Nama Konsumen", "Kode Konsumen", "Nama Barang", "Jumlah", "Harga", "Total"}, 0);

        kodeBarangComboBox = new JComboBox<>(barangController.getKodeBarangToNama().keySet().toArray(new String[0]));
        kodeKonsumenComboBox = new JComboBox<>(konsumenController.getKodeKonsumenToNama().keySet().toArray(new String[0]));

        namaKonsumenField = new JTextField(15);
        namaBarangField = new JTextField(15);
        hargaBarangField = new JTextField(15);
        jumlahField = new JTextField(10);
        diskonField = new JTextField(10);
        totalHargaField = new JTextField();
        kembalianField = new JTextField();
        jumlahBayarField = new JTextField();
        keteranganField = new JTextField();
        satuanField = new JTextField(5);

        initializeListeners();
    }

    private void initializeListeners() {
        kodeBarangComboBox.addActionListener(e -> updateNamaBarang());
        kodeKonsumenComboBox.addActionListener(e -> updateNamaKonsumen());
        jumlahField.addActionListener(e -> updateCalculations());
        jumlahBayarField.addActionListener(e -> updateKembalian());
    }

    public JPanel createInputComponents(GridBagConstraints gbc) {
        JPanel inputPanel = new JPanel(new GridBagLayout());
        inputPanel.setBorder(BorderFactory.createEmptyBorder(10, 10, 10, 10));

        gbc.insets = new Insets(5, 5, 5, 5);
        gbc.anchor = GridBagConstraints.WEST;
        gbc.fill = GridBagConstraints.HORIZONTAL;

        gbc.gridx = 0;
        gbc.gridy = 0;
        inputPanel.add(new JLabel("Kode Barang:"), gbc);
        gbc.gridx = 1;
        inputPanel.add(kodeBarangComboBox, gbc);
        gbc.gridx = 2;
        inputPanel.add(new JLabel("Kode Konsumen:"), gbc);
        gbc.gridx = 3;
        inputPanel.add(kodeKonsumenComboBox, gbc);

        gbc.gridx = 0;
        gbc.gridy = 1;
        inputPanel.add(new JLabel("Keterangan:"), gbc);
        gbc.gridx = 1;
        inputPanel.add(keteranganField, gbc);
        gbc.gridx = 2;
        inputPanel.add(new JLabel("Nama Konsumen:"), gbc);
        gbc.gridx = 3;
        inputPanel.add(namaKonsumenField, gbc);

        gbc.gridx = 0;
        gbc.gridy = 2;
        inputPanel.add(new JLabel("Nama Barang:"), gbc);
        gbc.gridx = 1;
        inputPanel.add(namaBarangField, gbc);
        gbc.gridx = 2;
        inputPanel.add(new JLabel("Harga Barang:"), gbc);
        gbc.gridx = 3;
        inputPanel.add(hargaBarangField, gbc);
        gbc.gridx = 4;
        inputPanel.add(new JLabel("Jumlah:"), gbc);
        gbc.gridx = 5;
        inputPanel.add(jumlahField, gbc);
        gbc.gridx = 6;
        inputPanel.add(new JLabel("Satuan:"), gbc);
        gbc.gridx = 7;
        inputPanel.add(satuanField, gbc);
        gbc.gridx = 8;
        inputPanel.add(new JLabel("Diskon:"), gbc);
        gbc.gridx = 9;
        inputPanel.add(diskonField, gbc);

        return inputPanel;
    }

    public JPanel createTable() {
        JPanel tablePanel = new JPanel(new BorderLayout());

        JTable dataTable = new JTable(tableModel);
        dataTable.setRowHeight(20);
        dataTable.setFont(new Font("Arial", Font.PLAIN, 12));
        dataTable.getSelectionModel().addListSelectionListener(e -> updateFieldsFromSelection());

        JScrollPane scrollPane = new JScrollPane(dataTable);
        tablePanel.add(scrollPane, BorderLayout.CENTER);

        return tablePanel;
    }

    public JPanel createButtonPanel() {
        JPanel buttonPanel = new JPanel(new GridLayout(4, 1, 5, 5));
        buttonPanel.add(createButton("Tambah"));
        buttonPanel.add(createButton("Edit"));
        buttonPanel.add(createButton("Hapus"));
        buttonPanel.add(createButton("Batal"));

        JPanel buttonsWrapper = new JPanel(new BorderLayout());
        buttonsWrapper.add(buttonPanel, BorderLayout.CENTER);

        return buttonsWrapper;
    }

    private JButton createButton(String text) {
        JButton button = new JButton(text);
        button.setFont(new Font("Arial", Font.PLAIN, 14));
        button.setPreferredSize(new Dimension(80, 30));
        button.addActionListener(e -> handleButtonAction(e.getActionCommand()));
        return button;
    }

    private void updateNamaBarang() {
        String kodeBarang = (String) kodeBarangComboBox.getSelectedItem();
        if (kodeBarang != null) {
            namaBarangField.setText(barangController.getKodeBarangToNama().get(kodeBarang));
            hargaBarangField.setText(String.valueOf(barangController.getKodeBarangToHarga().get(kodeBarang)));
            satuanField.setText(barangController.getKodeBarangToSatuan().get(kodeBarang));
            updateCalculations();
        }
    }

    private void updateNamaKonsumen() {
        String kodeKonsumen = (String) kodeKonsumenComboBox.getSelectedItem();
        if (kodeKonsumen != null) {
            namaKonsumenField.setText(konsumenController.getKodeKonsumenToNama().get(kodeKonsumen));
            keteranganField.setText(konsumenController.getKodeKonsumenToIsMember().get(kodeKonsumen) ? "Members" : "Non Members");
            updateCalculations();
        }
    }

    private void updateCalculations() {
        try {
            double harga = Double.parseDouble(hargaBarangField.getText());
            int jumlah = Integer.parseInt(jumlahField.getText());
            double diskon = 0;

            String kodeKonsumen = (String) kodeKonsumenComboBox.getSelectedItem();
            if (kodeKonsumen != null) {
                boolean isMember = konsumenController.getKodeKonsumenToIsMember().get(kodeKonsumen);
                if (isMember && jumlah > 10) {
                    diskon = 10;
                } else if (!isMember && jumlah > 20) {
                    diskon = 5;
                }
            }

            double total = harga * jumlah;
            total = total - (total * diskon / 100);

            diskonField.setText(String.format("%.2f", diskon));
            totalHargaField.setText(String.format("%.2f", total));
            updateKembalian();
        } catch (NumberFormatException e) {
            totalHargaField.setText("0.00");
            diskonField.setText("0.00");
            kembalianField.setText("0.00");
        }
    }

    public JTextField getTotalHargaField() {
        return totalHargaField;
    }

    public JTextField getJumlahBayarField() {
        return jumlahBayarField;
    }

    public JTextField getKembalianField() {
        return kembalianField;
    }

    void updateKembalian() {
        try {
            double totalHarga = Double.parseDouble(totalHargaField.getText());
            double jumlahBayar = Double.parseDouble(jumlahBayarField.getText());

            if (jumlahBayar >= totalHarga) {
                double kembalian = jumlahBayar - totalHarga;
                kembalianField.setText(String.format("%.2f", kembalian));
                keteranganField.setText("Telah Bayar");
            } else {
                kembalianField.setText("Uang Anda Kurang");
                keteranganField.setText(""); 
            }
        } catch (NumberFormatException e) {
            kembalianField.setText("0.00");
            keteranganField.setText(""); 
        }
    }

    private void handleButtonAction(String command) {
        switch (command) {
            case "Tambah":
                addRow();
                break;
            case "Edit":
                editRow();
                break;
            case "Hapus":
                deleteRow();
                break;
            case "Batal":
                clearFields();
                break;
        }
    }

    private void addRow() {
        String namaKonsumen = namaKonsumenField.getText();
        String kodeKonsumen = (String) kodeKonsumenComboBox.getSelectedItem();
        String namaBarang = namaBarangField.getText();
        int jumlah = Integer.parseInt(jumlahField.getText());
        double harga = Double.parseDouble(hargaBarangField.getText());
        double total = Double.parseDouble(totalHargaField.getText());

        if (selectedRow == -1) {
            
            tableModel.addRow(new Object[]{namaKonsumen, kodeKonsumen, namaBarang, jumlah, harga, total});
        } else {
            
            tableModel.setValueAt(namaKonsumen, selectedRow, 0);
            tableModel.setValueAt(kodeKonsumen, selectedRow, 1);
            tableModel.setValueAt(namaBarang, selectedRow, 2);
            tableModel.setValueAt(jumlah, selectedRow, 3);
            tableModel.setValueAt(harga, selectedRow, 4);
            tableModel.setValueAt(total, selectedRow, 5);

            selectedRow = -1;
        }
        clearFields();
        updateTotalHarga(); 
    }

    private void deleteRow() {
        int row = tableModel.getRowCount();
        if (row != -1) {
            tableModel.removeRow(row);
            clearFields();
            updateTotalHarga(); 
        }
    }

    private void editRow() {
        int selectedRow = tableModel.getRowCount();
        if (selectedRow != -1) {
        
            namaKonsumenField.setText((String) tableModel.getValueAt(selectedRow, 0));
            kodeKonsumenComboBox.setSelectedItem((String) tableModel.getValueAt(selectedRow, 1));
            namaBarangField.setText((String) tableModel.getValueAt(selectedRow, 2));
            jumlahField.setText(String.valueOf(tableModel.getValueAt(selectedRow, 3)));
            hargaBarangField.setText(String.valueOf(tableModel.getValueAt(selectedRow, 4)));
            totalHargaField.setText(String.valueOf(tableModel.getValueAt(selectedRow, 5)));
            diskonField.setText("0");

            this.selectedRow = selectedRow;
        } 
    }

    private void clearFields() {
        kodeBarangComboBox.setSelectedIndex(-1);
        kodeKonsumenComboBox.setSelectedIndex(-1);
        namaKonsumenField.setText("");
        namaBarangField.setText("");
        hargaBarangField.setText("");
        jumlahField.setText("");
        diskonField.setText("");
        kembalianField.setText("");
        jumlahBayarField.setText("");
        satuanField.setText("");
        keteranganField.setText("");
        selectedRow = -1; 
    }

    private void updateTotalHarga() {
        double totalHarga = 0.0;
        for (int i = 0; i < tableModel.getRowCount(); i++) {
            double total = (double) tableModel.getValueAt(i, 5);
            totalHarga += total;
        }
        totalHargaField.setText(String.format("%.2f", totalHarga));
    }

    private void updateFieldsFromSelection() {
        selectedRow = tableModel.getRowCount();
        if (selectedRow != -1) {
            namaKonsumenField.setText((String) tableModel.getValueAt(selectedRow, 0));
            kodeKonsumenComboBox.setSelectedItem((String) tableModel.getValueAt(selectedRow, 1));
            namaBarangField.setText((String) tableModel.getValueAt(selectedRow, 2));
            jumlahField.setText(String.valueOf(tableModel.getValueAt(selectedRow, 3)));
            hargaBarangField.setText(String.valueOf(tableModel.getValueAt(selectedRow, 4)));
            totalHargaField.setText(String.valueOf(tableModel.getValueAt(selectedRow, 5)));
            diskonField.setText("0");
            updateCalculations();
        }
    }
}
