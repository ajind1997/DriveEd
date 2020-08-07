package com.example.pratisthasthapit.adla;

import android.graphics.Bitmap;
import android.graphics.drawable.Drawable;
import android.net.Uri;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.io.InputStream;
import java.util.ArrayList;
import java.util.List;
import java.util.Random;

public class FeedbackActivity extends AppCompatActivity {

    ArrayList<String> selection = new ArrayList<String>();
    ArrayList<String> QAList = new ArrayList<String>();
    TextView question;
    ImageView questionImage;
    CheckBox answer1;
    CheckBox answer2;
    CheckBox answer3;
    Button feedbackBtn;
    RequestQueue requestQueue;
    String correctAnswer;
    int select;
    int correctAns;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_feedback);
        answer1 = (CheckBox)findViewById(R.id.answer1);
        answer2 = (CheckBox)findViewById(R.id.answer2);
        answer3 = (CheckBox)findViewById(R.id.answer3);
        question = (TextView) findViewById(R.id.question);
        questionImage = (ImageView) findViewById(R.id.questionImage);

        feedbackBtn = (Button)findViewById(R.id.feedBackBtn);

        requestQueue = Volley.newRequestQueue(this);

        //Load question and answer
        parseData();
    }

    public void selectAnswer(View view) {
        boolean checked = ((CheckBox) view).isChecked();
        switch (view.getId())
        {
            case R.id.answer1: {
                if (checked) {
                    select = 0;
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
                    select = 1;
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
                    select = 2;
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

    public void onFeedbackButtonClick(View view) {
//        switch (feedbackBtn.getText().toString()){
//            case "View answer":
//            {
//                if (selection.size() == 0)
//                {
//                    Toast.makeText(this, "Please select an answer", Toast.LENGTH_SHORT).show();
//                }
//                else
//                {
//                   if (select == correctAns)
//                   {
//                        if (select == 0){
//                            answer1.setBackground(drawable.button_light_green);
//                        }
//
//                   }
//                }
//                feedbackBtn.setText("Next question");
//                break;
//            }
//            case "Next question":
//            {
//                parseData();
//                answer1.setEnabled(true);
//                answer2.setEnabled(true);
//                answer3.setEnabled(true);
//                feedbackBtn.setText("View answer");
//                break;
//            }
//        }
    }

    private void parseData() {
        String json;

        final int min = 1;
        final int max = 125;
        final int random = new Random().nextInt((max - min) + 1) + min;

         try{
             InputStream inputStream = getAssets().open("full_question_answer_set.js");
             int size = inputStream.available();
             byte[] buffer = new byte[size];
             inputStream.read(buffer);
             inputStream.close();

             json = new String(buffer,"UTF-8" );
             JSONArray jsonArray = new JSONArray(json);

             for (int i = 0; i<jsonArray.length(); i++)
             {
                 JSONObject jsonObject = jsonArray.getJSONObject(random);
                 if(jsonObject.getString("questionID").equals(random));
                 {
                     question.setText(jsonObject.getString("questionENG"));
                     JSONArray answerArray = jsonObject.getJSONArray("answers");
                     for (int j = 0; j<answerArray.length(); j++) {
                         QAList.add(answerArray.getJSONObject(j).getString("answerENG"));
                         if (answerArray.getJSONObject(j).getString("answerCorrect") == "1")
                         {
                             correctAns = j;
                             correctAnswer = answerArray.getJSONObject(j).getString("answerENG");
                         }
                     }
                     answer1.setText(QAList.get(0));
                     answer2.setText(QAList.get(1));
                     answer3.setText(QAList.get(2));
                     int id = getResources().getIdentifier("com.example.pratisthasthapit.adla:drawable/img_" + random, null, null);
                     questionImage.setImageResource(id);


                 }
             }
         }
         catch (IOException e)
         {
             e.printStackTrace();
         }
         catch (JSONException e)
         {
             e.printStackTrace();
         }
    }
}
