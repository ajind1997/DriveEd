package com.example.pratisthasthapit.adla;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;

import java.util.ArrayList;

public class PracticeActivity extends AppCompatActivity {

    ArrayList<String> selection = new ArrayList<String>();
    CheckBox answer1;
    CheckBox answer2;
    CheckBox answer3;
    Button practiceBtn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_practice);
        answer1 = (CheckBox)findViewById(R.id.answer1);
        answer2 = (CheckBox)findViewById(R.id.answer2);
        answer3 = (CheckBox)findViewById(R.id.answer3);
        practiceBtn = (Button)findViewById(R.id.practiceBtn);
    }


    public void selectAnswer(View view) {
        boolean checked = ((CheckBox) view).isChecked();
        switch (view.getId())
        {
            case R.id.answer1: {
                if (checked) {
                    selection.add(answer1.getText().toString());
                    answer2.setEnabled(false);
                    answer3.setEnabled(false);
                } else {
                    selection.remove(answer1.getText().toString());
                    answer2.setEnabled(true);
                    answer3.setEnabled(true);
                }
                break;
            }
            case R.id.answer2: {
                if (checked) {
                    selection.add(answer2.getText().toString());
                    answer1.setEnabled(false);
                    answer3.setEnabled(false);
                } else {
                    selection.remove(answer2.getText().toString());
                    answer1.setEnabled(true);
                    answer3.setEnabled(true);
                }
                break;
            }
            case R.id.answer3: {
                if (checked) {
                    selection.add(answer3.getText().toString());
                    answer1.setEnabled(false);
                    answer2.setEnabled(false);
                } else {
                    selection.remove(answer3.getText().toString());
                    answer1.setEnabled(true);
                    answer2.setEnabled(true);
                }
                break;
            }
        }
    }

    public void onPracticeButtonClick(View view) {
    }
}
