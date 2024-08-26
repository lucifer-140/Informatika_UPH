package UAS.No_1;

import com.formdev.flatlaf.FlatLightLaf;

import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.HashMap;
import java.util.Map;

public class NilaiMahasiswaGUI extends JFrame {
    private JComboBox<String> nimComboBox;
    private JTextField namaField, nilaiTugasField, nilaiKuisField, nilaiUtsField, nilaiUasField, nilaiKehadiranField;
    private JTextField nilaiAkhirField, gradeField, statusField;

    private DefaultTableModel tableModel;
    private JTable table;

    private Map<String, Murid> NimMuridMap;
    private String Nim;
    private String Nama;
    private double NilaiAkhir;

    public NilaiMahasiswaGUI() {
        super("Nilai Mahasiswa");
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(750, 900);
        setLayout(new BorderLayout(10, 10));
        FlatLightLaf.setup(); // Set the FlatLaf look and feel

        NimMuridMap = new HashMap<>();
        DataMurid();

        JLabel titleLabel = new JLabel("NILAI MATA KULIAH PEMROGRAMAN BERORIENTASI OBJEK", SwingConstants.CENTER);
        titleLabel.setFont(new Font("Arial", Font.BOLD, 24));
        titleLabel.setForeground(new Color(0, 123, 255)); // Blue color
        add(titleLabel, BorderLayout.NORTH);

        JPanel inputPanel = new JPanel(new GridBagLayout());
        inputPanel.setBorder(BorderFactory.createEmptyBorder(10, 10, 10, 10));
        GridBagConstraints gbc = new GridBagConstraints();
        gbc.insets = new Insets(5, 5, 5, 5);
        gbc.fill = GridBagConstraints.HORIZONTAL;
        gbc.anchor = GridBagConstraints.WEST;

        gbc.gridx = 0;
        gbc.gridy = 0;
        inputPanel.add(new JLabel("NIM:"), gbc);
        gbc.gridy++;
        inputPanel.add(new JLabel("Nama:"), gbc);
        gbc.gridy++;
        inputPanel.add(new JLabel("Nilai Tugas:"), gbc);
        gbc.gridy++;
        inputPanel.add(new JLabel("Nilai Kuis:"), gbc);
        gbc.gridy++;
        inputPanel.add(new JLabel("Nilai UTS:"), gbc);
        gbc.gridy++;
        inputPanel.add(new JLabel("Nilai UAS:"), gbc);
        gbc.gridy++;
        inputPanel.add(new JLabel("Nilai Kehadiran:"), gbc);

        gbc.gridx = 1;
        gbc.gridy = 0;
        nimComboBox = new JComboBox<>(NimMuridMap.keySet().toArray(new String[0]));
        nimComboBox.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                String selectedNim = (String) nimComboBox.getSelectedItem();
                if (selectedNim != null) {
                    Nim = selectedNim;
                    Nama = NimMuridMap.get(selectedNim).getName();
                    namaField.setText(Nama);
                }
            }
        });
        inputPanel.add(nimComboBox, gbc);

        gbc.gridy++;
        inputPanel.add(namaField = new JTextField(15), gbc);
        namaField.setEditable(false);

        gbc.gridy++;
        inputPanel.add(nilaiTugasField = new JTextField(15), gbc);
        gbc.gridy++;
        inputPanel.add(nilaiKuisField = new JTextField(15), gbc);
        gbc.gridy++;
        inputPanel.add(nilaiUtsField = new JTextField(15), gbc);
        gbc.gridy++;
        inputPanel.add(nilaiUasField = new JTextField(15), gbc);
        gbc.gridy++;
        inputPanel.add(nilaiKehadiranField = new JTextField(15), gbc);

        add(inputPanel, BorderLayout.CENTER);

        JPanel resultPanel = new JPanel(new GridBagLayout());
        resultPanel.setBorder(BorderFactory.createTitledBorder("Hasil"));
        GridBagConstraints gbcResult = new GridBagConstraints();
        gbcResult.insets = new Insets(5, 5, 5, 5);
        gbcResult.fill = GridBagConstraints.HORIZONTAL;
        gbcResult.anchor = GridBagConstraints.WEST;

        gbcResult.gridx = 0;
        gbcResult.gridy = 0;
        resultPanel.add(new JLabel("Nilai Akhir:"), gbcResult);
        gbcResult.gridy++;
        resultPanel.add(new JLabel("Grade:"), gbcResult);
        gbcResult.gridy++;
        resultPanel.add(new JLabel("Status:"), gbcResult);

        gbcResult.gridx = 1;
        gbcResult.gridy = 0;
        resultPanel.add(nilaiAkhirField = new JTextField(15), gbcResult);
        nilaiAkhirField.setEditable(false);

        gbcResult.gridy++;
        resultPanel.add(gradeField = new JTextField(15), gbcResult);
        gradeField.setEditable(false);

        gbcResult.gridy++;
        resultPanel.add(statusField = new JTextField(15), gbcResult);
        statusField.setEditable(false);

        add(resultPanel, BorderLayout.EAST);

        JPanel bottomPanel = new JPanel();
        bottomPanel.setLayout(new BorderLayout());

        JPanel buttonPanel = new JPanel();

        JButton hitungButton = new JButton("Hitung");
        hitungButton.setBackground(new Color(0, 123, 255));
        hitungButton.setForeground(Color.WHITE);
        hitungButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                hitungNilai();
            }
        });

        JButton tambahButton = new JButton("Tambah");
        tambahButton.setBackground(new Color(40, 167, 69));
        tambahButton.setForeground(Color.WHITE);
        tambahButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                tambahHasil();
            }
        });

        JButton batalButton = new JButton("Batal");
        batalButton.setBackground(new Color(255, 193, 7));
        batalButton.setForeground(Color.WHITE);
        batalButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                batal();
            }
        });

        JButton hapusButton = new JButton("Hapus");
        hapusButton.setBackground(new Color(220, 53, 69));
        hapusButton.setForeground(Color.WHITE);
        hapusButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                hapus();
            }
        });

        JButton keluarButton = new JButton("Keluar");
        keluarButton.setBackground(new Color(108, 117, 125));
        keluarButton.setForeground(Color.WHITE);
        keluarButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                System.exit(0);
            }
        });

        buttonPanel.add(hitungButton);
        buttonPanel.add(tambahButton);
        buttonPanel.add(batalButton);
        buttonPanel.add(hapusButton);
        buttonPanel.add(keluarButton);
        bottomPanel.add(buttonPanel, BorderLayout.NORTH);

        String[] columnNames = {"NIM", "Nama", "Nilai Tugas", "Nilai Kuis", "Nilai UTS", "Nilai UAS", "Nilai Kehadiran", "Nilai Akhir", "Grade", "Status"};
        tableModel = new DefaultTableModel(columnNames, 0);
        table = new JTable(tableModel);
        JScrollPane scrollPane = new JScrollPane(table);
        bottomPanel.add(scrollPane, BorderLayout.CENTER);

        add(bottomPanel, BorderLayout.SOUTH);

        setLocationRelativeTo(null);
        setVisible(true);
    }

    private void DataMurid() {
        NimMuridMap.put("03082230020", new Murid("03082230020", "Alshando Phen"));
        NimMuridMap.put("03082230016", new Murid("03082230016", "Anson Aldrino Angkar"));
        NimMuridMap.put("03082230029", new Murid("03082230029", "Anthony Tanoto"));
        NimMuridMap.put("03082230019", new Murid("03082230019", "Bryan Cen"));
        NimMuridMap.put("03082230018", new Murid("03082230018", "Carlos Salim"));
        NimMuridMap.put("03082230010", new Murid("03082230010", "Charlene Tanata"));
        NimMuridMap.put("03082230016", new Murid("03082230016", "Chelsy Chrisella Yanadi"));
        NimMuridMap.put("03082230014", new Murid("03082230014", "Darren Hasnah"));
        NimMuridMap.put("03082230030", new Murid("03082230030", "Dave Jansen Ongkaputra"));
        NimMuridMap.put("03082230017", new Murid("03082230017", "Edward Alexandra"));
        NimMuridMap.put("03082230027", new Murid("03082230027", "Elwin Willis"));
        NimMuridMap.put("03082230015", new Murid("03082230015", "Felicia Alexandra"));
        NimMuridMap.put("03082230022", new Murid("03082230022", "Frederik Setyadharma"));
        NimMuridMap.put("03082230028", new Murid("03082230028", "Harry Owen"));
        NimMuridMap.put("03082230031", new Murid("03082230031", "Jonathan Alexander"));
        NimMuridMap.put("03082230033", new Murid("03082230033", "Kendric Tristan"));
        NimMuridMap.put("03082230025", new Murid("03082230025", "Kevin Maximus Gani"));
        NimMuridMap.put("03082230003", new Murid("03082230003", "Manson Lie"));
        NimMuridMap.put("03082230005", new Murid("03082230005", "Misellin Mindany"));
        NimMuridMap.put("03082230012", new Murid("03082230012", "Patrick Ivander Angkasa"));
        NimMuridMap.put("03082230001", new Murid("03082230001", "Randy Liminson"));
        NimMuridMap.put("03082230009", new Murid("03082230009", "Richard Wibisono"));
        NimMuridMap.put("03082230002", new Murid("03082230002", "Vanessa NG"));
        NimMuridMap.put("03082230021", new Murid("03082230021", "Vincent"));
        NimMuridMap.put("03082230007", new Murid("03082230007", "Vincent Frenando Tan"));
    }

    private void hitungNilai() {
        try {
            double tugas = Double.parseDouble(nilaiTugasField.getText());
            double kuis = Double.parseDouble(nilaiKuisField.getText());
            double uts = Double.parseDouble(nilaiUtsField.getText());
            double uas = Double.parseDouble(nilaiUasField.getText());
            double kehadiran = Double.parseDouble(nilaiKehadiranField.getText());

            NilaiMurid grades = new NilaiMurid(tugas, kuis, uts, uas, kehadiran);
            NilaiAkhir = grades.HitungNilaiAkhir();
            nilaiAkhirField.setText(String.format("%.2f", NilaiAkhir));

            String grade = grades.HitungGrade(NilaiAkhir);
            String status = grades.HitungStatus(NilaiAkhir);

            gradeField.setText(grade);
            statusField.setText(status);

        } catch (NumberFormatException ex) {
            JOptionPane.showMessageDialog(this, "Masukkan nilai yang valid.", "Error", JOptionPane.ERROR_MESSAGE);
        }
    }

    private void tambahHasil() {
        if (Nim == null || Nama == null) {
            JOptionPane.showMessageDialog(this, "Pilih NIM terlebih dahulu.", "Error", JOptionPane.ERROR_MESSAGE);
            return;
        }
    
        for (int i = 0; i < tableModel.getRowCount(); i++) {
            if (tableModel.getValueAt(i, 0).equals(Nim)) {
                JOptionPane.showMessageDialog(this, "Data untuk NIM " + Nim + " sudah ada di tabel.", "Error", JOptionPane.ERROR_MESSAGE);
                return;
            }
        }
    
        try {
            double tugas = Double.parseDouble(nilaiTugasField.getText());
            double kuis = Double.parseDouble(nilaiKuisField.getText());
            double uts = Double.parseDouble(nilaiUtsField.getText());
            double uas = Double.parseDouble(nilaiUasField.getText());
            double kehadiran = Double.parseDouble(nilaiKehadiranField.getText());
    
            Object[] row = {Nim, Nama, tugas, kuis, uts, uas, kehadiran, NilaiAkhir, gradeField.getText(), statusField.getText()};
            tableModel.addRow(row);
    
        } catch (NumberFormatException ex) {
            JOptionPane.showMessageDialog(this, "Masukkan nilai yang valid.", "Error", JOptionPane.ERROR_MESSAGE);
        }
    }

    private void batal() {
        nimComboBox.setSelectedIndex(-1);
        namaField.setText("");
        nilaiTugasField.setText("");
        nilaiKuisField.setText("");
        nilaiUtsField.setText("");
        nilaiUasField.setText("");
        nilaiKehadiranField.setText("");
        nilaiAkhirField.setText("");
        gradeField.setText("");
        statusField.setText("");
        Nim = null;
        Nama = null;
        NilaiAkhir = 0.0;
    }

    private void hapus() {
        int selectedRow = table.getSelectedRow();
        if (selectedRow >= 0) {
            tableModel.removeRow(selectedRow);
        } else {
            JOptionPane.showMessageDialog(this, "Pilih baris yang ingin dihapus.", "Error", JOptionPane.ERROR_MESSAGE);
        }
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(NilaiMahasiswaGUI::new);
    }
}
