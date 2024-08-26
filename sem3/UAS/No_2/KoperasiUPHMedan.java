package UAS.No_2;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class KoperasiUPHMedan extends JFrame {

    private final BarangController barangController;
    private final KonsumenController konsumenController;
    private final TransaksiController transaksiController;

    public KoperasiUPHMedan() {
        barangController = new BarangController();
        konsumenController = new KonsumenController();
        transaksiController = new TransaksiController(barangController, konsumenController);

        setTitle("KOPERASI UPH MEDAN");
        setSize(1500, 600);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setLayout(new BorderLayout(10, 10));

        initHeader();
        initInputPanel();
        initTablePanel();
        initSummaryPanel();
    }

    private void initHeader() {
        JPanel headerPanel = new JPanel();
        headerPanel.setLayout(new BorderLayout());
        JLabel headerLabel = new JLabel("KOPERASI UPH MEDAN", SwingConstants.CENTER);
        headerLabel.setFont(new Font("Arial", Font.BOLD, 28));
        headerPanel.add(headerLabel, BorderLayout.CENTER);
        add(headerPanel, BorderLayout.NORTH);
    }
    
    private void initInputPanel() {
        JPanel inputPanel = new JPanel(new GridBagLayout());
        inputPanel.setBorder(BorderFactory.createEmptyBorder(10, 10, 10, 10));

        GridBagConstraints gbc = new GridBagConstraints();
        gbc.insets = new Insets(5, 5, 5, 5);
        gbc.anchor = GridBagConstraints.WEST;
        gbc.fill = GridBagConstraints.HORIZONTAL;

        inputPanel.add(transaksiController.createInputComponents(gbc));
        add(inputPanel, BorderLayout.NORTH);
    }

    private void initTablePanel() {
        JPanel tablePanel = new JPanel(new BorderLayout());

        tablePanel.add(transaksiController.createTable(), BorderLayout.CENTER);
        tablePanel.add(transaksiController.createButtonPanel(), BorderLayout.EAST);
        add(tablePanel, BorderLayout.CENTER);
    }

    private void initSummaryPanel() {
        JPanel summaryPanel = new JPanel(new GridLayout(4, 2, 5, 5));
        summaryPanel.setBorder(BorderFactory.createEmptyBorder(10, 10, 10, 10));

        summaryPanel.add(new JLabel("Total Harga:"));
        summaryPanel.add(transaksiController.getTotalHargaField());

        summaryPanel.add(new JLabel("Jumlah Bayar:"));
        summaryPanel.add(transaksiController.getJumlahBayarField());

        summaryPanel.add(new JLabel("Kembalian:"));
        summaryPanel.add(transaksiController.getKembalianField());

        
        add(summaryPanel, BorderLayout.SOUTH);
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> new KoperasiUPHMedan().setVisible(true));
    }
}
