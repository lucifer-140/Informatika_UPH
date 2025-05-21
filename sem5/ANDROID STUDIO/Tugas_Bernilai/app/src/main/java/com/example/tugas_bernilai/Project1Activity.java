package com.example.tugas_bernilai;

import android.os.Bundle;
import android.view.View;
import android.widget.*;
import androidx.appcompat.app.AppCompatActivity;
import java.util.ArrayList;
import java.util.HashMap;

public class Project1Activity extends AppCompatActivity {
    private EditText edtPosisi, edtData, edtJumlah;
    private Button btnTambah, btnSisip, btnUbah, btnHapus;
    private ListView listView;
    private Spinner spinner;
    private ArrayAdapter<String> adapter;
    private ArrayList<String> dataList;
    private HashMap<String, Integer> dataCount;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_project1);

        edtJumlah = findViewById(R.id.edtJumlah);
        edtPosisi = findViewById(R.id.edtPosisi);
        edtData = findViewById(R.id.edtData);
        btnTambah = findViewById(R.id.btnTambah);
        btnSisip = findViewById(R.id.btnSisip);
        btnUbah = findViewById(R.id.btnUbah);
        btnHapus = findViewById(R.id.btnHapus);
        listView = findViewById(R.id.listView);
        spinner = findViewById(R.id.spinner);

        dataList = new ArrayList<>();
        dataCount = new HashMap<>();
        adapter = new ArrayAdapter<>(this, android.R.layout.simple_list_item_1, dataList);
        listView.setAdapter(adapter);
        spinner.setAdapter(adapter);

        btnTambah.setOnClickListener(view -> addData());
        btnSisip.setOnClickListener(view -> copyData());
        btnUbah.setOnClickListener(view -> updateData());
        btnHapus.setOnClickListener(view -> deleteData());

        listView.setOnItemClickListener((parent, view, position, id) -> selectData(position));
    }

    private void addData() {
        String data = edtData.getText().toString().trim();
        if (!data.isEmpty()) {
            dataList.add(data);
            dataCount.put(data, dataCount.getOrDefault(data, 0) + 1);
            adapter.notifyDataSetChanged();
        }
    }

    private void copyData() {
        int pos;
        try {
            pos = Integer.parseInt(edtPosisi.getText().toString().trim());
        } catch (NumberFormatException e) {
            return;
        }

        if (pos >= 0 && pos < dataList.size()) {
            String data = dataList.get(pos);
            dataList.add(data);
            dataCount.put(data, dataCount.getOrDefault(data, 0) + 1);
            adapter.notifyDataSetChanged();
        }
    }

    private void updateData() {
        int pos;
        try {
            pos = Integer.parseInt(edtPosisi.getText().toString().trim());
        } catch (NumberFormatException e) {
            return;
        }

        String newData = edtData.getText().toString().trim();
        if (pos >= 0 && pos < dataList.size() && !newData.isEmpty()) {
            String oldData = dataList.get(pos);
            dataCount.put(oldData, dataCount.get(oldData) - 1);
            dataCount.put(newData, dataCount.getOrDefault(newData, 0) + 1);
            dataList.set(pos, newData);
            adapter.notifyDataSetChanged();
        }
    }

    private void deleteData() {
        int pos;
        try {
            pos = Integer.parseInt(edtPosisi.getText().toString().trim());
        } catch (NumberFormatException e) {
            return;
        }

        if (pos >= 0 && pos < dataList.size()) {
            String data = dataList.remove(pos);
            int count = dataCount.get(data) - 1;
            if (count <= 0) {
                dataCount.remove(data);
            } else {
                dataCount.put(data, count);
            }
            adapter.notifyDataSetChanged();
        }
    }

    private void selectData(int position) {
        if (position >= 0 && position < dataList.size()) {
            String data = dataList.get(position);
            edtData.setText(data);
            edtPosisi.setText(String.valueOf(position));
            int count = dataCount.getOrDefault(data, 1);
            edtJumlah.setText(String.valueOf(count));  // Display "Jumlah" in the field
        }
    }

}
