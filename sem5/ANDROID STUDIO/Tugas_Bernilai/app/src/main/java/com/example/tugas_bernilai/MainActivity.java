package com.example.tugas_bernilai;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_main);

        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });

        Button btnProject1 = findViewById(R.id.btnProject1);
        Button btnProject2 = findViewById(R.id.btnProject2);
        Button btnProject3 = findViewById(R.id.btnProject3);
        Button btnProject4 = findViewById(R.id.btnProject4);
        Button btnProject5 = findViewById(R.id.btnProject5);

        btnProject1.setOnClickListener(view -> startActivity(new Intent(MainActivity.this, Project1Activity.class)));
        btnProject2.setOnClickListener(view -> startActivity(new Intent(MainActivity.this, Project2Activity.class)));
        btnProject3.setOnClickListener(view -> startActivity(new Intent(MainActivity.this, Project3Activity.class)));
        btnProject4.setOnClickListener(view -> startActivity(new Intent(MainActivity.this, Project4Activity.class)));
    }
}
