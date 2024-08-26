package day15;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class NilaiMahasiswaGUI extends JFrame {
    private JTextField namaField, nilaiTugasField, nilaiKuisField, nilaiAkhirField, gradeField, statusField;
    private JTextField nimField, nilaiUtsField, nilaiUasField, nilaiKehadiranField;

    public NilaiMahasiswaGUI() {
        super("Nilai Mahasiswa");
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(600, 450);
        setLayout(new BorderLayout(10, 10));

        JLabel titleLabel = new JLabel("Nilai Mahasiswa", SwingConstants.CENTER);
        titleLabel.setFont(new Font("Arial", Font.BOLD, 24));
        add(titleLabel, BorderLayout.NORTH);

        JPanel inputPanel = new JPanel(new GridBagLayout());
        inputPanel.setBorder(BorderFactory.createEmptyBorder(10, 10, 10, 10));
        GridBagConstraints gbc = new GridBagConstraints();
        gbc.insets = new Insets(5, 5, 5, 5);
        gbc.fill = GridBagConstraints.HORIZONTAL;

        // Left column
        gbc.gridx = 0;
        gbc.gridy = 0;
        inputPanel.add(new JLabel("Nama:"), gbc);
        gbc.gridy++;
        inputPanel.add(new JLabel("NIM:"), gbc);
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

        // Right column
        gbc.gridx = 1;
        gbc.gridy = 0;
        inputPanel.add(namaField = new JTextField(15), gbc);
        gbc.gridy++;
        inputPanel.add(nimField = new JTextField(15), gbc);
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

        JPanel resultPanel = new JPanel(new GridLayout(3, 2, 10, 10));
        resultPanel.setBorder(BorderFactory.createTitledBorder("Hasil"));

        resultPanel.add(new JLabel("Nilai Akhir:"));
        resultPanel.add(nilaiAkhirField = new JTextField());
        nilaiAkhirField.setEditable(false);

        resultPanel.add(new JLabel("Grade:"));
        resultPanel.add(gradeField = new JTextField());
        gradeField.setEditable(false);

        resultPanel.add(new JLabel("Status:"));
        resultPanel.add(statusField = new JTextField());
        statusField.setEditable(false);

        add(resultPanel, BorderLayout.EAST);

        JButton hitungButton = new JButton("Hitung");
        hitungButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                hitungNilai();
            }
        });

        JPanel buttonPanel = new JPanel();
        buttonPanel.add(hitungButton);
        add(buttonPanel, BorderLayout.SOUTH);

        setLocationRelativeTo(null);
        setVisible(true);
    }

    private void hitungNilai() {
        try {
            double tugas = Double.parseDouble(nilaiTugasField.getText());
            double kuis = Double.parseDouble(nilaiKuisField.getText());
            double uts = Double.parseDouble(nilaiUtsField.getText());
            double uas = Double.parseDouble(nilaiUasField.getText());
            double kehadiran = Double.parseDouble(nilaiKehadiranField.getText());

            double nilaiAkhir = (tugas * 0.15) + (kuis * 0.10) + (uts * 0.30) + (uas * 0.35) + (kehadiran * 0.10);
            nilaiAkhirField.setText(String.format("%.2f", nilaiAkhir));

            String grade;
            String status;
            if (nilaiAkhir >= 85) {
                grade = "A";
                status = "Lulus";
            } else if (nilaiAkhir >= 70) {
                grade = "B";
                status = "Lulus";
            } else if (nilaiAkhir >= 55) {
                grade = "C";
                status = "Lulus";
            } else if (nilaiAkhir >= 40) {
                grade = "D";
                status = "Tidak Lulus";
            } else {
                grade = "E";
                status = "Tidak Lulus";
            }
            gradeField.setText(grade);
            statusField.setText(status);
        } catch (NumberFormatException ex) {
            JOptionPane.showMessageDialog(this, "Masukkan nilai yang valid.", "Error", JOptionPane.ERROR_MESSAGE);
        }
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(NilaiMahasiswaGUI::new);
    }
}
