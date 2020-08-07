package com.example.pratisthasthapit.adla;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.drawable.Drawable;
import android.net.Uri;
import android.support.v4.content.ContextCompat;
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

import static com.example.pratisthasthapit.adla.R.drawable.button_light_green;

public class PracticeActivity extends AppCompatActivity {

    ArrayList<String> selection = new ArrayList<String>();
    ArrayList<String> QAList = new ArrayList<String>();
    TextView question;
    ImageView questionImage;
    ImageView image1;
    ImageView image2;
    ImageView image3;
    CheckBox answer1;
    CheckBox answer2;
    CheckBox answer3;
    Button practiceBtn;
    RequestQueue requestQueue;
    int correctAnsCount = 0;
    int select;
    int correctAns;
    //change number of questions here
    int numQuestions = 2;
    int questionCount = 0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_practice);
        image1 = (ImageView)findViewById(R.id.image1);
        image2 = (ImageView)findViewById(R.id.image2);
        image3 = (ImageView)findViewById(R.id.image3);
        answer1 = (CheckBox)findViewById(R.id.answer1);
        answer2 = (CheckBox)findViewById(R.id.answer2);
        answer3 = (CheckBox)findViewById(R.id.answer3);
        question = (TextView) findViewById(R.id.question);
        questionImage = (ImageView) findViewById(R.id.questionImage);

        practiceBtn = (Button)findViewById(R.id.practiceBtn);

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

    public void onPracticeButtonClick(View view) {
        switch (practiceBtn.getText().toString()){
            case "View answer":
            {
                if (selection.size() == 0)
                {
                    Toast.makeText(this, "Please select an answer", Toast.LENGTH_SHORT).show();
                }
                else
                {
                    if (select == correctAns){
                        correctAnsCount ++;
                    }
//                    if (correctAns == 0){
//                        answer1.setTextColor(ContextCompat.getColor(this, R.color.colorLightGreen));
//                        image1.setBackgroundResource(R.drawable.tick);
//                    }
//                    else if (correctAns == 1){
//                        answer2.setTextColor(ContextCompat.getColor(this, R.color.colorLightGreen));
//                        image2.setBackgroundResource(R.drawable.tick);
//                    }
//                    else
//                    {
//                        answer3.setTextColor(ContextCompat.getColor(this, R.color.colorLightGreen));
//                        image3.setBackgroundResource(R.drawable.tick);
//                    }

                    if (select != correctAns)
                    {
                        Toast.makeText(this, "incorrect answer", Toast.LENGTH_SHORT).show();
                    }
                }
                practiceBtn.setText("Next question");

                if (questionCount >= numQuestions) {
                    practiceBtn.setText("View result");
                }
                break;
            }
            case "Next question":
            {
                answer1.setChecked(false);
                answer2.setChecked(false);
                answer3.setChecked(false);

                answer1.setTextColor(ContextCompat.getColor(this, R.color.colorAccent));
                answer2.setTextColor(ContextCompat.getColor(this, R.color.colorAccent));
                answer3.setTextColor(ContextCompat.getColor(this, R.color.colorAccent));

                selection.remove(0);

                answer1.setEnabled(true);
                answer2.setEnabled(true);
                answer3.setEnabled(true);
                practiceBtn.setText("View answer");

                parseData();
                break;
            }
            case "View result":{
                Intent intent = new Intent(PracticeActivity.this, ResultActivity.class);
                intent.putExtra("correctAnsCount", correctAnsCount);
                intent.putExtra("numQuestions", numQuestions);

                startActivityForResult(intent, 1);
                break;
            }
        }
    }

    private void parseData() {
        questionCount += 1;
        String selectedQuestionLang = "questionENG";
        String selectedAnswerLang = "answerENG";
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
                    question.setText(jsonObject.getString(selectedQuestionLang));
                    JSONArray answerArray = jsonObject.getJSONArray("answers");

                    int id = getResources().getIdentifier("com.example.pratisthasthapit.adla:drawable/img_" + jsonObject.getString("questionID"), null, null);
                    questionImage.setImageResource(id);

                    answer1.setText(answerArray.getJSONObject(0).getString(selectedAnswerLang));
                    answer2.setText(answerArray.getJSONObject(1).getString(selectedAnswerLang));
                    answer3.setText(answerArray.getJSONObject(2).getString(selectedAnswerLang));

                    if (answerArray.getJSONObject(0).getString("answerCorrect").equals("1")){
                        correctAns = 0;
                    }
                    else if (answerArray.getJSONObject(1).getString("answerCorrect").equals("1"))
                    {
                        correctAns = 1;
                    }
                    else{
                        correctAns = 3;
                    }
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
