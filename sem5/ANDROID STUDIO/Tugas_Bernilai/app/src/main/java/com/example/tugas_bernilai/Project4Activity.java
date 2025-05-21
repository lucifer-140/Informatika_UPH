package com.example.tugas_bernilai;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ProgressBar;
import android.widget.SeekBar;
import android.widget.TextView;
import androidx.appcompat.app.AppCompatActivity;

public class Project4Activity extends AppCompatActivity {

    private SeekBar seekBar;
    private TextView tvValue;
    private ProgressBar progressBar;
    private Button btnStart, btnStop, btnReset;
    private int progress = 0;
    private boolean isRunning = false;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_project4);

        seekBar = findViewById(R.id.seekBar);
        tvValue = findViewById(R.id.tvValue);
        progressBar = findViewById(R.id.progressBar);
        btnStart = findViewById(R.id.btnStart);
        btnStop = findViewById(R.id.btnStop);
        btnReset = findViewById(R.id.btnReset);

        seekBar.setOnSeekBarChangeListener(new SeekBar.OnSeekBarChangeListener() {
            @Override
            public void onProgressChanged(SeekBar seekBar, int progressValue, boolean fromUser) {
                tvValue.setText("Value: " + progressValue);
            }

            @Override
            public void onStartTrackingTouch(SeekBar seekBar) {}

            @Override
            public void onStopTrackingTouch(SeekBar seekBar) {}
        });

        btnStart.setOnClickListener(v -> {
            isRunning = true;
            new Thread(() -> {
                while (isRunning && progress < 100) {
                    progress++;
                    runOnUiThread(() -> {
                        progressBar.setProgress(progress);
                        seekBar.setProgress(progress);
                        tvValue.setText("Value: " + progress);
                    });
                    try {
                        Thread.sleep(100);
                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    }
                }
            }).start();
        });

        btnStop.setOnClickListener(v -> isRunning = false);

        btnReset.setOnClickListener(v -> {
            isRunning = false;
            progress = 0;
            progressBar.setProgress(0);
            seekBar.setProgress(0);
            tvValue.setText("Value: 0");
        });
    }
}
