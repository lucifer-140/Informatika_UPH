package com.example.tugas_bernilai;

import android.app.DatePickerDialog;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Locale;

public class Project3Activity extends AppCompatActivity {

    private Spinner spinnerDate;
    private Button btnAmbilTanggal, btnUpdateDate;
    private EditText etDay, etMonth, etYear;
    private TextView tvShortDate;
    private ArrayList<String> dateList;
    private ArrayAdapter<String> adapter;
    private Calendar selectedCalendar = Calendar.getInstance();
    private SimpleDateFormat fullFormat = new SimpleDateFormat("EEEE, dd MMMM yyyy", Locale.getDefault());
    private SimpleDateFormat shortFormat = new SimpleDateFormat("dd MMMM yyyy", Locale.getDefault());

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_project3);

        spinnerDate = findViewById(R.id.spinnerDate);
        btnAmbilTanggal = findViewById(R.id.btnAmbilTanggal);
        btnUpdateDate = findViewById(R.id.btnUpdateDate);
        etDay = findViewById(R.id.etDay);
        etMonth = findViewById(R.id.etMonth);
        etYear = findViewById(R.id.etYear);
        tvShortDate = findViewById(R.id.tvShortDate);

        dateList = new ArrayList<>();
        adapter = new ArrayAdapter<>(this, android.R.layout.simple_spinner_dropdown_item, dateList);
        spinnerDate.setAdapter(adapter);

        updateDropdown(Calendar.getInstance());

        spinnerDate.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                String selectedDate = dateList.get(position);
                tvShortDate.setText(selectedDate);
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {
                tvShortDate.setText("");
            }
        });

        btnAmbilTanggal.setOnClickListener(view -> {
            String selectedDate = (String) spinnerDate.getSelectedItem();
            if (selectedDate != null) {
                Toast.makeText(this, "Tanggal: " + selectedDate, Toast.LENGTH_SHORT).show();
            }
        });

        btnUpdateDate.setOnClickListener(view -> {
            if (validateInput()) {
                int day = Integer.parseInt(etDay.getText().toString());
                int month = Integer.parseInt(etMonth.getText().toString()) - 1;
                int year = Integer.parseInt(etYear.getText().toString());

                selectedCalendar.set(year, month, day);
                updateDropdown(selectedCalendar);
            }
        });

        spinnerDate.setOnTouchListener((v, event) -> {
            showDatePicker();
            return true;
        });
    }

    private void updateDropdown(Calendar calendar) {
        String fullDate = fullFormat.format(calendar.getTime());
        if (!dateList.contains(fullDate)) {
            dateList.add(fullDate);
            adapter.notifyDataSetChanged();
            spinnerDate.setSelection(dateList.size() - 1);
        }
    }

    private void showDatePicker() {
        Calendar calendar = Calendar.getInstance();

        DatePickerDialog datePickerDialog = new DatePickerDialog(this, (view, year, month, dayOfMonth) -> {
            selectedCalendar.set(year, month, dayOfMonth);
            updateDropdown(selectedCalendar);
        }, calendar.get(Calendar.YEAR), calendar.get(Calendar.MONTH), calendar.get(Calendar.DAY_OF_MONTH));

        datePickerDialog.setOnDismissListener(dialog -> {
            if (datePickerDialog.isShowing()) {
                datePickerDialog.dismiss();
            }
        });

        datePickerDialog.show();
    }

    private boolean validateInput() {
        String dayStr = etDay.getText().toString();
        String monthStr = etMonth.getText().toString();
        String yearStr = etYear.getText().toString();

        if (dayStr.isEmpty() || monthStr.isEmpty() || yearStr.isEmpty()) {
            Toast.makeText(this, "Harap isi semua kolom tanggal!", Toast.LENGTH_SHORT).show();
            return false;
        }

        int day = Integer.parseInt(dayStr);
        int month = Integer.parseInt(monthStr);
        int year = Integer.parseInt(yearStr);

        if (month < 1 || month > 12) {
            Toast.makeText(this, "Bulan tidak valid!", Toast.LENGTH_SHORT).show();
            return false;
        }

        Calendar tempCal = Calendar.getInstance();
        tempCal.set(year, month - 1, 1);
        int maxDays = tempCal.getActualMaximum(Calendar.DAY_OF_MONTH);

        if (day < 1 || day > maxDays) {
            Toast.makeText(this, "Tanggal tidak valid!", Toast.LENGTH_SHORT).show();
            return false;
        }

        return true;
    }
}
