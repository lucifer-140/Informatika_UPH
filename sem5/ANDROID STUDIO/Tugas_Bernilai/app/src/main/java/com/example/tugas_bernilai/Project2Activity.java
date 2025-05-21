package com.example.tugas_bernilai;

import android.os.Bundle;
import android.view.View;
import android.widget.*;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import java.util.ArrayList;

public class Project2Activity extends AppCompatActivity {
    private CheckBox cbNasi, cbAyam, cbSayur;
    private CheckBox cbAir, cbJus, cbKopi;
    private Button btnPesan, btnKosongkan;
    private TextView tvReceipt;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_project2);

        // Inisialisasi checkbox dan tombol
        cbNasi = findViewById(R.id.cbNasi);
        cbAyam = findViewById(R.id.cbAyam);
        cbSayur = findViewById(R.id.cbSayur);
        cbAir = findViewById(R.id.cbAir);
        cbJus = findViewById(R.id.cbJus);
        cbKopi = findViewById(R.id.cbKopi);
        btnPesan = findViewById(R.id.btnPesan);
        btnKosongkan = findViewById(R.id.btnKosongkan);
        tvReceipt = findViewById(R.id.tvReceipt);

        // Tambahkan listener untuk setiap checkbox
        cbNasi.setOnCheckedChangeListener((buttonView, isChecked) -> updateReceipt());
        cbAyam.setOnCheckedChangeListener((buttonView, isChecked) -> updateReceipt());
        cbSayur.setOnCheckedChangeListener((buttonView, isChecked) -> updateReceipt());
        cbAir.setOnCheckedChangeListener((buttonView, isChecked) -> updateReceipt());
        cbJus.setOnCheckedChangeListener((buttonView, isChecked) -> updateReceipt());
        cbKopi.setOnCheckedChangeListener((buttonView, isChecked) -> updateReceipt());

        // Event tombol Pesan
        btnPesan.setOnClickListener(view -> {
            new AlertDialog.Builder(this)
                    .setTitle("Kasir")
                    .setMessage("Pesanan telah dibuat!")
                    .setPositiveButton("OK", null)
                    .show();
        });

        // Event tombol Kosongkan
        btnKosongkan.setOnClickListener(view -> {
            cbNasi.setChecked(false);
            cbAyam.setChecked(false);
            cbSayur.setChecked(false);
            cbAir.setChecked(false);
            cbJus.setChecked(false);
            cbKopi.setChecked(false);
        });
    }

    private void updateReceipt() {
        ArrayList<String> makanan = new ArrayList<>();
        ArrayList<String> minuman = new ArrayList<>();

        // Cek makanan yang dipilih
        if (cbNasi.isChecked()) makanan.add(cbNasi.getText().toString());
        if (cbAyam.isChecked()) makanan.add(cbAyam.getText().toString());
        if (cbSayur.isChecked()) makanan.add(cbSayur.getText().toString());

        // Cek minuman yang dipilih
        if (cbAir.isChecked()) minuman.add(cbAir.getText().toString());
        if (cbJus.isChecked()) minuman.add(cbJus.getText().toString());
        if (cbKopi.isChecked()) minuman.add(cbKopi.getText().toString());

        // Update struk di TextView
        String struk = "Makanan:\n----------------\n" +
                (makanan.isEmpty() ? "Tidak ada\n" : String.join("\n", makanan) + "\n") +
                "\nMinuman:\n----------------\n" +
                (minuman.isEmpty() ? "Tidak ada\n" : String.join("\n", minuman));

        tvReceipt.setText(struk);
    }
}
