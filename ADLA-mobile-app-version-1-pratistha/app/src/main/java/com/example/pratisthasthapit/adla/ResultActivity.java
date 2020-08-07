package com.example.pratisthasthapit.adla;

import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;

public class ResultActivity extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener {

    DrawerLayout drawerLayout;
    NavigationView navigationView;
    android.support.v7.widget.Toolbar toolbar;
    TextView resultText;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_result);

        drawerLayout = (DrawerLayout)findViewById(R.id.drawer_layout);
        navigationView = (NavigationView) findViewById(R.id.nav_view);
        toolbar = (android.support.v7.widget.Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayShowTitleEnabled(false);
        toolbar.setTitle("");
        toolbar.setSubtitle("");
        navigationView.bringToFront();
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(this, drawerLayout, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawerLayout.addDrawerListener(toggle);
        toggle.syncState();
        navigationView.setNavigationItemSelectedListener(this);
        navigationView.setCheckedItem(R.id.nav_home);

        //Getting the values from feedback activity
        Intent intent = getIntent();
        int correctAnsCount = intent.getIntExtra("correctAnsCount", 0);
        int numQuestions = intent.getIntExtra("numQuestions", 0);

        resultText = findViewById(R.id.resultText);
        resultText.setText(correctAnsCount + "/" + numQuestions);
    }

    public void retryBtnClick(View view) {
        Intent intent = new Intent(ResultActivity.this, FeedbackActivity.class);
        startActivity(intent);
    }

    public void homeBtnClick(View view) {
        Intent intent = new Intent(ResultActivity.this, StartActivity.class);
        startActivity(intent);
    }

    public void contactBtnClick(View view) {
        Intent intent = new Intent(ResultActivity.this, ContactActivity.class);
        startActivity(intent);
    }

    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {
        switch (menuItem.getItemId()){
            case R.id.nav_home: {
                Intent intent = new Intent(ResultActivity.this, StartActivity.class);
                startActivity(intent);
                break;
            }

            case R.id.nav_about: {
                Intent intent = new Intent(ResultActivity.this, AboutActivity.class);
                startActivity(intent);
                break;
            }
            case R.id.nav_contact: {
                Intent intent = new Intent(ResultActivity.this, ContactActivity.class);
                startActivity(intent);
                break;
            }
        }

        drawerLayout.closeDrawer(GravityCompat.START);
        return true;
    }
}
