package kasirSQL;

import java.sql.*;
import javax.swing.DefaultComboBoxModel; 

public class KasirController {
    private Connection conn;

    public KasirController(String dbUrl, String user, String password) throws SQLException {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver"); 
        } catch (ClassNotFoundException e) {
            throw new SQLException("MySQL JDBC driver not found", e);
        }
        
        this.conn = DriverManager.getConnection(dbUrl, user, password);
    }

    public void loadBarang(DefaultComboBoxModel<Barang> barangModel) throws SQLException {
        String sql = "SELECT id, nama, harga FROM barang";
        try (Statement stmt = conn.createStatement();
            ResultSet rs = stmt.executeQuery(sql)) {
            while (rs.next()) {
                int id = rs.getInt("id");
                String nama = rs.getString("nama");
                int harga = rs.getInt("harga");
                barangModel.addElement(new Barang(id, nama, harga));
            }
        }
    }

    public int hitungJumlahHarga(int harga, int jumlahBeli) {
        if (harga < 0 || jumlahBeli < 0) {
            throw new IllegalArgumentException("Harga dan jumlah beli harus positif.");
        }
        return harga * jumlahBeli;
    }

    public int hitungKembalian(int jumlahHarga, int jumlahBayar) {
        if (jumlahHarga < 0 || jumlahBayar < 0) {
            throw new IllegalArgumentException("Jumlah harga dan jumlah bayar harus positif.");
        } else if (jumlahBayar < jumlahHarga) {
            throw new IllegalArgumentException("Jumlah bayar tidak mencukupi.");
        }
        return jumlahBayar - jumlahHarga;
    }
}
