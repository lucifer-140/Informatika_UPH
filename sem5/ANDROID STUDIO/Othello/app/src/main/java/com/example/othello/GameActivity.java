package com.example.othello;

import android.content.Intent;
import android.os.Bundle;
import android.widget.ImageView;
import android.widget.TextView;
import androidx.appcompat.app.AppCompatActivity;
import com.google.android.material.button.MaterialButton; // Import MaterialButton

public class GameActivity extends AppCompatActivity {
    private BoardView boardView;
    private TextView turnIndicator;
    private boolean isVsCPU;
    private int playerColor;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_game);

        // Initialize views
        boardView = findViewById(R.id.boardView);
        turnIndicator = findViewById(R.id.turnIndicator);

        // Get intent extras
        String mode = getIntent().getStringExtra("mode");
        playerColor = getIntent().getIntExtra("playerColor", 1);
        isVsCPU = mode.equals("1vCPU");

        // Set up the board
        boardView.setGameMode(isVsCPU, playerColor);
        boardView.setTurnIndicator(turnIndicator);

        // Trigger CPU move if necessary
        if (isVsCPU && playerColor == 2) {
            boardView.postDelayed(() -> boardView.triggerCpuMove(), 250);
        }

        // Initialize buttons as MaterialButton
        MaterialButton btnBack = findViewById(R.id.btnBack); // Use MaterialButton
        btnBack.setOnClickListener(v -> {
            Intent intent = new Intent(GameActivity.this, MainActivity.class);
            intent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP | Intent.FLAG_ACTIVITY_NEW_TASK);
            startActivity(intent);
            finish();
        });

        MaterialButton btnRestart = findViewById(R.id.btnRestart); // Use MaterialButton
        btnRestart.setOnClickListener(v -> boardView.resetGame());

//        // Initialize game over image
//        ImageView gameOverImage = findViewById(R.id.gameOverImage);
//        boardView.setGameOverImage(gameOverImage);
    }
}