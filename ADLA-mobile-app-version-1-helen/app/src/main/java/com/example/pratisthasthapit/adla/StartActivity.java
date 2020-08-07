package com.example.pratisthasthapit.adla;

import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.res.Configuration;
import android.support.annotation.NonNull;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;

import java.util.Locale;


public class StartActivity extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener {

    DrawerLayout drawerLayout;
    NavigationView navigationView;
    android.support.v7.widget.Toolbar toolbar;
    Button feedback_mode;
    Button practice_mode;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        loadLocale();
        setContentView(R.layout.activity_start);

        feedback_mode = (Button)findViewById(R.id.feedback_mode);
        practice_mode = (Button)findViewById(R.id.practice_mode);

        drawerLayout = (DrawerLayout)findViewById(R.id.drawer_layout);
        navigationView = (NavigationView) findViewById(R.id.nav_view);
        toolbar = (android.support.v7.widget.Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayShowTitleEnabled(false);
        toolbar.setTitle("");
        toolbar.setSubtitle("");
        toolbar.setLogo(R.drawable.logo);


        navigationView.bringToFront();
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(this, drawerLayout, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawerLayout.addDrawerListener(toggle);
        toggle.syncState();
        navigationView.setNavigationItemSelectedListener(this);
        navigationView.setCheckedItem(R.id.nav_home);

    }

    @Override
    public void onBackPressed() {
        if(drawerLayout.isDrawerOpen(GravityCompat.START)){
            drawerLayout.closeDrawer(GravityCompat.START);
        }
        else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {
        switch (menuItem.getItemId()){
            case R.id.nav_home: {
                break;
            }

            case R.id.nav_about: {
                Intent intent = new Intent(StartActivity.this, AboutActivity.class);
                startActivity(intent);
                break;
            }
            case R.id.nav_contact: {
                Intent intent = new Intent(StartActivity.this, ContactActivity.class);
                startActivity(intent);
                break;
            }
            case R.id.nav_ar:
            {
                LocaleUtils.setSelectedLanguageId("ar");
                Intent i = getBaseContext().getPackageManager().getLaunchIntentForPackage(getBaseContext().getPackageName());
                startActivity(i);
            }
            case R.id.nav_eng:{

            }
        }
        drawerLayout.closeDrawer(GravityCompat.START);
        return true;
    }

    public void selectMode(View view) {
        switch (view.getId()){
            case R.id.feedback_mode:
            {
                Intent intent = new Intent(StartActivity.this, FeedbackActivity.class);
                startActivity(intent);
                break;
            }
            case R.id.practice_mode:
            {
                Intent intent = new Intent(StartActivity.this, PracticeActivity.class);
                startActivity(intent);
                break;
            }

        }
    }
    //set locale for language change
    public void setLocale(String localeCode) {
        Locale locale = new Locale(localeCode);
        Locale.setDefault(locale);
        Configuration conf = new Configuration();
        conf.locale = locale;
        getBaseContext().getResources().updateConfiguration(conf,getBaseContext().getResources().getDisplayMetrics());
        //save data to shared preferences
        SharedPreferences.Editor editor = getSharedPreferences("Settings",MODE_PRIVATE).edit();
        editor.putString("lang",localeCode);
        editor.apply();
    }
    //load language saved in shred preferences
    public void loadLocale(){
        SharedPreferences pref = getSharedPreferences("Settings", Activity.MODE_PRIVATE);
        String language = pref.getString("lang","");
        setLocale(language);
    }
}

