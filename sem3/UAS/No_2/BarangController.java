package UAS.No_2;

import java.util.HashMap;
import java.util.Map;

public class BarangController {

    private final Map<String, String> kodeBarangToNama;
    private final Map<String, Double> kodeBarangToHarga;
    private final Map<String, String> kodeBarangToSatuan;

    public BarangController() {
        kodeBarangToNama = new HashMap<>();
        kodeBarangToHarga = new HashMap<>();
        kodeBarangToSatuan = new HashMap<>();
        initializeData();
    }

    private void initializeData() {
        kodeBarangToNama.put("PCL", "Pencil");
        kodeBarangToNama.put("PEN", "Pulpen");
        kodeBarangToNama.put("BUK", "Buku");
        kodeBarangToNama.put("TIP", "Tipex");
        kodeBarangToNama.put("KERA4", "Kertas A4");
        kodeBarangToNama.put("KERAHV", "Kertas HVS");
        kodeBarangToNama.put("PGR", "Penggaris");

        kodeBarangToHarga.put("PCL", 2000.0);
        kodeBarangToHarga.put("PEN", 3000.0);
        kodeBarangToHarga.put("BUK", 15000.0);
        kodeBarangToHarga.put("TIP", 2500.0);
        kodeBarangToHarga.put("KERA4", 10000.0);
        kodeBarangToHarga.put("KERAHV", 12000.0);
        kodeBarangToHarga.put("PGR", 5000.0);

        kodeBarangToSatuan.put("PCL", "pcs");
        kodeBarangToSatuan.put("PEN", "pcs");
        kodeBarangToSatuan.put("BUK", "pcs");
        kodeBarangToSatuan.put("TIP", "pcs");
        kodeBarangToSatuan.put("KERA4", "rim");
        kodeBarangToSatuan.put("KERAHV", "rim");
        kodeBarangToSatuan.put("PGR", "pcs");
    }

    public Map<String, String> getKodeBarangToNama() {
        return kodeBarangToNama;
    }

    public Map<String, Double> getKodeBarangToHarga() {
        return kodeBarangToHarga;
    }

    public Map<String, String> getKodeBarangToSatuan() {
        return kodeBarangToSatuan;
    }
}
