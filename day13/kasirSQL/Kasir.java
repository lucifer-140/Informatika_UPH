package kasirSQL;

import javax.swing.*;
import java.awt.event.*;
import java.sql.SQLException;

public class Kasir extends JPanel {
    private JLabel namaBarangLabel, hargaBarangLabel, jumlahBeliLabel, jumlahHargaLabel, jumlahBayarLabel, jumlahKembalianLabel;
    private JComboBox<Barang> namaBarangField;
    private JTextField hargaBarangField, jumlahBeliField, jumlahHargaField, jumlahBayarField, jumlahKembalianField;
    private JButton hitungJumlahHargaButton, hitungJumlahKembalianButton, keluarButton, batalButton;

    private KasirController controller;
    private DefaultComboBoxModel<Barang> barangModel = new DefaultComboBoxModel<>();

    public Kasir() {
        try {
            controller = new KasirController("jdbc:mysql://localhost:3306/KasirSQL", "root", "");
            initComponents();
            controller.loadBarang(barangModel); 
        } catch (SQLException e) {
            JOptionPane.showMessageDialog(this, "Error connecting to database: " + e.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            System.exit(1); 
        }
    }
    
    private void initComponents() {
        namaBarangLabel = new JLabel("Nama Barang:");
        hargaBarangLabel = new JLabel("Harga Barang:");
        jumlahBeliLabel = new JLabel("Jumlah Beli:");
        jumlahHargaLabel = new JLabel("Jumlah Harga:");
        jumlahBayarLabel = new JLabel("Jumlah Bayar:");
        jumlahKembalianLabel = new JLabel("Jumlah Kembalian:");

        namaBarangField = new JComboBox<>();
        hargaBarangField = new JTextField(10);
        jumlahBeliField = new JTextField(10);
        jumlahHargaField = new JTextField(10);
        jumlahHargaField.setEditable(false);
        jumlahBayarField = new JTextField(10);
        jumlahKembalianField = new JTextField(10);
        jumlahKembalianField.setEditable(false);

        hitungJumlahHargaButton = new JButton("Hitung Jumlah Harga");
        hitungJumlahKembalianButton = new JButton("Hitung Jumlah Kembalian");
        keluarButton = new JButton("Keluar");
        batalButton = new JButton("Batal");

        namaBarangField.setModel(barangModel);
        hargaBarangField.setEditable(false);

        namaBarangField.addItemListener(e -> {
            if (e.getStateChange() == ItemEvent.SELECTED) {
                Barang selectedBarang = (Barang) e.getItem();
                hargaBarangField.setText(String.valueOf(selectedBarang.getHarga()));
            }
        });

        hitungJumlahHargaButton.addActionListener(e -> {
            try {
                Barang selectedBarang = (Barang) namaBarangField.getSelectedItem();
                int harga = selectedBarang.getHarga();
                int jumlahBeli = Integer.parseInt(jumlahBeliField.getText());

                int jumlahHarga = controller.hitungJumlahHarga(harga, jumlahBeli);
                jumlahHargaField.setText(String.valueOf(jumlahHarga));
            } catch (IllegalArgumentException ex) {
                JOptionPane.showMessageDialog(this, "Input tidak valid: " + ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            }
        });

        hitungJumlahKembalianButton.addActionListener(e -> {
            try {
                int jumlahHarga = Integer.parseInt(jumlahHargaField.getText());
                int jumlahBayar = Integer.parseInt(jumlahBayarField.getText());

                int kembalian = controller.hitungKembalian(jumlahHarga, jumlahBayar);
                jumlahKembalianField.setText(String.valueOf(kembalian));
            } catch (IllegalArgumentException ex) {
                JOptionPane.showMessageDialog(this, "Input tidak valid: " + ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            }
        });
        
        keluarButton.addActionListener(e -> System.exit(0));
        batalButton.addActionListener(e -> {
            namaBarangField.setSelectedIndex(-1); 
            hargaBarangField.setText("");
            jumlahBeliField.setText("");
            jumlahHargaField.setText("");
            jumlahBayarField.setText("");
            jumlahKembalianField.setText("");
        });


        GroupLayout layout = new GroupLayout(this);
        setLayout(layout);
        layout.setAutoCreateGaps(true);
        layout.setAutoCreateContainerGaps(true);

        layout.setHorizontalGroup(layout.createSequentialGroup()
            .addGroup(layout.createParallelGroup(GroupLayout.Alignment.LEADING)
                .addComponent(namaBarangLabel)
                .addComponent(hargaBarangLabel)
                .addComponent(jumlahBeliLabel)
                .addComponent(jumlahHargaLabel)
                .addComponent(jumlahBayarLabel)
                .addComponent(jumlahKembalianLabel)
                .addComponent(hitungJumlahHargaButton)
                .addComponent(keluarButton) 
            )
            .addGroup(layout.createParallelGroup(GroupLayout.Alignment.LEADING)
                .addComponent(namaBarangField)
                .addComponent(hargaBarangField)
                .addComponent(jumlahBeliField)
                .addComponent(jumlahHargaField)
                .addComponent(jumlahBayarField)
                .addComponent(jumlahKembalianField)
                .addComponent(hitungJumlahKembalianButton)
                .addComponent(batalButton) 
            )
        );

        layout.setVerticalGroup(layout.createSequentialGroup()
            .addGroup(layout.createParallelGroup(GroupLayout.Alignment.BASELINE)
                .addComponent(namaBarangLabel)
                .addComponent(namaBarangField)
            )
            .addGroup(layout.createParallelGroup(GroupLayout.Alignment.BASELINE)
                .addComponent(hargaBarangLabel)
                .addComponent(hargaBarangField)
            )
            .addGroup(layout.createParallelGroup(GroupLayout.Alignment.BASELINE)
                .addComponent(jumlahBeliLabel)
                .addComponent(jumlahBeliField)
            )
            .addGroup(layout.createParallelGroup(GroupLayout.Alignment.BASELINE)
                .addComponent(jumlahHargaLabel)
                .addComponent(jumlahHargaField)
            )
            .addGroup(layout.createParallelGroup(GroupLayout.Alignment.BASELINE)
                .addComponent(jumlahBayarLabel)
                .addComponent(jumlahBayarField)
            )
            .addGroup(layout.createParallelGroup(GroupLayout.Alignment.BASELINE)
                .addComponent(jumlahKembalianLabel)
                .addComponent(jumlahKembalianField)
            )
            .addGroup(layout.createParallelGroup(GroupLayout.Alignment.BASELINE)
                .addComponent(hitungJumlahHargaButton)
                .addComponent(hitungJumlahKembalianButton)
            )
            .addGroup(layout.createParallelGroup(GroupLayout.Alignment.BASELINE)
                .addComponent(keluarButton)
                .addComponent(batalButton)
            )
        );
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> {
            JFrame frame = new JFrame("Aplikasi Kasir");
            frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
            frame.setContentPane(new Kasir());
            frame.pack();
            frame.setVisible(true);
        });
    }
}
