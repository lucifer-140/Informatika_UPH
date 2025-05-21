package com.example.othello;

import android.content.Intent;
import android.os.Bundle;
import androidx.appcompat.app.AppCompatActivity;
import com.google.android.material.button.MaterialButton;

public class MainActivity extends AppCompatActivity {

    private MaterialButton btn1v1, btn1vCPU;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Initialize buttons
        btn1v1 = findViewById(R.id.btn1v1);
        btn1vCPU = findViewById(R.id.btn1vCPU);

        // Set click listeners
        btn1v1.setOnClickListener(v -> {
            Intent intent = new Intent(MainActivity.this, GameActivity.class);
            intent.putExtra("mode", "1v1");
            startActivity(intent);
        });

        btn1vCPU.setOnClickListener(v -> {
            Intent intent = new Intent(MainActivity.this, CPUSelectionActivity.class);
            startActivity(intent);
        });
    }
}