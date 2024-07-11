//Dave Jansen Ongkaputra
//Harry Owen

import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class Kasir extends JPanel {

    private JLabel namaBarangLabel;
    private JLabel hargaBarangLabel;
    private JLabel jumlahBeliLabel;
    private JLabel jumlahHargaLabel;
    private JLabel jumlahBayarLabel;
    private JLabel jumlahKembalianLabel;
    private JComboBox<String> namaBarangField;
    private JTextField hargaBarangField;
    private JTextField jumlahBeliField;
    private JTextField jumlahHargaField;
    private JTextField jumlahBayarField;
    private JTextField jumlahKembalianField;
    private JButton hitungJumlahHargaButton;
    private JButton hitungJumlahKembalianButton;
    private JButton keluarButton;
    private JButton batalButton;

    public Kasir() {
        initComponents();
    }

    private void initComponents() {
        namaBarangLabel = new JLabel("Nama Barang:");
        hargaBarangLabel = new JLabel("Harga Barang:");
        jumlahBeliLabel = new JLabel("Jumlah Beli:");
        jumlahHargaLabel = new JLabel("Jumlah Harga:");
        jumlahBayarLabel = new JLabel("Jumlah Bayar:");
        jumlahKembalianLabel = new JLabel("Jumlah Kembalian:");

        namaBarangField = new JComboBox<>(new String[]{"Item 1", "Item 2", "Item 3", "Item 4"});
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

        hitungJumlahHargaButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try {
                    int harga = Integer.parseInt(hargaBarangField.getText());
                    int jumlahBeli = Integer.parseInt(jumlahBeliField.getText());
                    int jumlahHarga = harga * jumlahBeli;
                    jumlahHargaField.setText(String.valueOf(jumlahHarga));
                } catch (NumberFormatException ex) {
                    JOptionPane.showMessageDialog(Kasir.this, "Input tidak valid.", "Error", JOptionPane.ERROR_MESSAGE);
                }
            }
        });

        hitungJumlahKembalianButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                try {
                    int jumlahHarga = Integer.parseInt(jumlahHargaField.getText());
                    int jumlahBayar = Integer.parseInt(jumlahBayarField.getText());
                    int kembalian = jumlahBayar - jumlahHarga;
                    jumlahKembalianField.setText(String.valueOf(kembalian));
                } catch (NumberFormatException ex) {
                    JOptionPane.showMessageDialog(Kasir.this, "Input tidak valid.", "Error", JOptionPane.ERROR_MESSAGE);
                }
            }
        });

        keluarButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                System.exit(0);
            }
        });

        batalButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                namaBarangField.setSelectedIndex(0);
                hargaBarangField.setText("");
                jumlahBeliField.setText("");
                jumlahHargaField.setText("");
                jumlahBayarField.setText("");
                jumlahKembalianField.setText("");
            }
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