package com.example.othello;

import android.content.Intent;
import android.os.Bundle;
import androidx.appcompat.app.AppCompatActivity;
import com.google.android.material.button.MaterialButton;

public class CPUSelectionActivity extends AppCompatActivity {
    private MaterialButton btnPlayAsBlack, btnPlayAsWhite; // Use MaterialButton instead of Button

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cpu_selection);

        // Initialize buttons
        btnPlayAsBlack = findViewById(R.id.btnPlayAsBlack);
        btnPlayAsWhite = findViewById(R.id.btnPlayAsWhite);

        // Set click listeners
        btnPlayAsBlack.setOnClickListener(v -> startGameWithCPU(1)); // Player is Black (1)
        btnPlayAsWhite.setOnClickListener(v -> startGameWithCPU(2)); // Player is White (2)
    }

    private void startGameWithCPU(int playerColor) {
        Intent intent = new Intent(CPUSelectionActivity.this, GameActivity.class);
        intent.putExtra("mode", "1vCPU");
        intent.putExtra("playerColor", playerColor);
        startActivity(intent);
    }
}