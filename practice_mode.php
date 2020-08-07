<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Practice Mode</title>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
          integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
          crossorigin="anonymous"></script>
  <style>
    body {
      font-family: Calibri, sans-serif;
      margin: 0;
      overflow: hidden;
      width: 100%;
      position: fixed;
      height: 100%;
    }

    .topnav {
      overflow: hidden;
      background-color: white;
      height: 140px;
    }

	.logo{
      float:left;
      margin:15px;
    }

    .topnav a {
      float: left;
      display: block;
      color: #000000;
      text-align: center;
      padding: 70px 16px;
      text-decoration: none;
      font-size: 25px;
    }

    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    .topnav a.active {
      background-color: #4CAF50;
      color: white;
    }

    .topnav .icon {
      display: none;
    }

    h1 {
      font-size: 35pt;
      margin-bottom: 0;
    }

    p {
      font-size: 14pt;
    }

    #header {
      display: flex;
    }

    #main-banner {
      background-color: #729d39;
      height: 100%;
      position: absolute;
      width: 100%;
    }

    .btn-transition {
      transition: padding 0.2s ease-in-out;
    }

    .banner-heading {
      margin: 0;
      padding-top: 50px;
      font-size: 45pt;
      color: white;
      margin-bottom: 70px;
    }

    .begin-btn {
      cursor: pointer;
      border: 3px solid white;
      color: white;
      font-size: 22pt;
      padding: 5px 50px;
      display: table;
      font-weight: 600;
      margin: auto;
      margin-bottom: 60px;
    }

    .begin-btn:hover {
      padding: 5px 60px;
    }

    .begin-btn:active {
      padding: 5px 40px;

    }

    .banner-select td {
      padding: 25px 50px;
      color: white;
    }

    #navigation a {
      color: #231f20;;
      text-decoration: none;
      font-size: 22pt;
      border-bottom: 2px solid #729d39;
      text-align: center;
      padding: 14px 16px;
      float: left;
      width: auto;
      display: block;
      outline: 0;
    }

    #navigation {
      width: 80%;
      max-width: 1200px;
    }

    .answerDiv
    {
      background-color: #729d39;
      border: solid #729d39 1px;
      border-radius: 20px;
      padding: 2px;


    }
    .answerDivWithImage
    {
      background-color: #729d39;
      border: solid #729d39 1px;
      border-radius: 20px;
      padding: 2px;
      width: 50%;


      }
    #answerTable
    {
      position: relative;
      left: 50%;
      border-spacing: 35px;
      }
    #answerTableWithoutImage
    {
      position: relative;
      left: 15%;
      border-spacing: 35px;
    }
    #questionIMG
    {

      right: 50%;
      position: relative;
      height: 20vh;
    }
    #question
    {
      font-size: 3vh !important;
      text-align: center;
    }
    .buttonDiv
    {
      position: relative;
      top: 85%;
      left: 30%;
    }


    .main-content {
      padding: 30px;
      max-width: 1200px;
      width: 80%;
      margin: auto;
      background-color: white;
    }



    #questionContainer {
      max-height: 95%;
    }

    #questionContainer-wrapper {
      background: white;
      padding: 30px;
      border-radius: 10px;
      width: 80%;
      position: absolute;
      left: 50%;
      transform: translate(-50%,60px);
      max-height: calc(85% - 200px);
      height: 3000px;
    }

    h2 {
    margin: 0;
    padding-bottom: 10px;
    font-size:3vh;
    }

    h3{
        font-size:25px;
        position:absolute;
        left:42%;
        top:200px;
    }

    #count{
        position: relative;
        width:100%;
        top:-10px;
        display: flex;
    }

    #langSelect {
          position: absolute;
          height: 30px;
          width: 100px;
          right: 10px;
          top: 50px;
        }

    .answer {
      padding: 2px 2px;
      font-size: 2vh;
      color: white;
      text-shadow: 0.5px 0.5px black;
    }

    input[type="radio"] {
      margin-right: 5px;
      vertical-align: middle;
      height: 1.5em;
      width: 50px;
      margin-top: 9px;
    }

    .quizBtns {
      height: 3vh;
      border-radius: 15px;
      background-color: #729d39;
      color: white;
      border: white;
      font-weight: 600;
      font-size: 2vh;
      padding: 0 1.5vh;
      margin-top: 32px;
      margin-right:30px;
      cursor: pointer;
    }

    /* @media (max-width: 1200px) {
      #navigation a {
        font-size:18pt;
      }
      #navigation {
        width: 100%;
      }
      #questionContainer
      {
        padding: 0px;
      }
      #question
      {
        font-size: 1.8em;
      }
      #questionIMG
      {
        height: 200px;
      }
      .answer
      {
        font-size: 20px;
      }
      input[type="radio"]
      {
        height: 1.1em;
        margin-top: 8px;
      }
      .quizBtns
      {
        font-size: 18px;
      }
      .buttonDiv
      {
        bottom: 18px;
        left: 18%;
      }

    }
    @media (max-width:1000px)
    {
      #questionContainer
      {
        padding: 0px;
      }
      #question
      {
        font-size: 1.5em;
      }
      #questionIMG
      {
        height: 200px;
      }
      .answer
      {
        font-size: 18px;
      }
      input[type="radio"]
      {
        height: 1.1em;
        margin-top: 8px;
      }
      .quizBtns
      {
        font-size: 18px;
      }
      .buttonDiv
      {
        bottom: 18px;
        left: 28%;
      }
    } */
    @media screen and (max-width: 600px) {
      .topnav a:not(:first-child) {display: none;}
      .topnav a.icon {
        float: right;
        display: block;
      }
        .topnav.responsive {position: relative;}
        .topnav.responsive .icon {
          position: absolute;
          right: 0;
          top: 0;
        }
        .topnav.responsive a {
          float: none;
          display: block;
          text-align: left;
          clear:left;
        }

        .topnav a {
          padding: 14px 16px;
        }

      }
      /* @media (max-height: 620px)
      {
        #questionContainer
        {
          padding: 0px;
        }
        #question
        {
          font-size: 1.8em;
        }
        #questionIMG
        {
          height: 200px;
        }
        .answer
        {
          font-size: 20px;
        }
        input[type="radio"]
        {
          height: 1.1em;
          margin-top: 8px;
        }
        .quizBtns
        {
          font-size: 18px;
        }
        .buttonDiv
        {
          bottom: 18px;
          left: 28%;
        }
      } */
      .progress-bar {
        background-color: #729d39;
        float: left;
        width: 0%;
        height: 100%;
        font-size: 12px;
        line-height: 20px;
        color: #fff;
        text-align: center;
        -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
        box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
        -webkit-transition: width .6s ease;
        -o-transition: width .6s ease;
        transition: width .6s ease;
      }
      .progress {
        width: 80%;
        height: 20px;
        margin-bottom: 20px;
        overflow: hidden;
        background-color: #f5f5f5;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
        box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
        display:flex
      }
  </style>
</head>
<body>
  <?php
  include 'db_connection.php';
  $mysqli = OpenCon();
  if($mysqli === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  $sSQL= 'SET CHARACTER SET utf8';
  mysqli_query($mysqli,$sSQL)
  or die ('Can\'t charset in DataBase');

  $table = "SELECT * FROM Questions";
  $fullTable = mysqli_query($mysqli, $table);

    $jsonObj;
     $query= "SELECT Answers.answerID,Answers.answerENG,Answers.answerARAB,Answers.answerCorrect,Questions.questionENG,Questions.questionARAB,Questions.questionID,Questions.questionImage FROM Answers INNER JOIN Questions ON Answers.questionID = Questions.questionID";

     $result = mysqli_query($mysqli,$query);
     $row = mysqli_fetch_array($result);
     $newQuestion = true;

     $questionLength;
     $list = array();

     if($result = $mysqli->query($query)){
       $i = 0;
         while ($row = $result->fetch_assoc())
         {
           $jsonObj[] = $row;
         }
     }
  ?>
<div class="topnav responsive" id="myTopnav">
  <a href="javascript:void(0);" class="icon" onclick="myFunctionSideMenu()">
    <i class="fa fa-bars"></i>
  </a>
  <img class="logo" id ="logo" src="img/logo.png" style="height:100px; padding:10px"/>
  <div id='navi'>
  <a class='nav' href="index.html" >Home</a>
  <a class='nav' href="practice.html">Practice</a>
  <a class='nav' href="about.html">About</a>
  <a class='nav' href="contact-us.html">Contact Us</a>
</div>
</div>

<select id="langSelect">
    <option value="English">English</option>
    <option value="Arabic">عربى</option>
</select>


<div id="main-banner">
  <div id="title"> </div>
  <div id='questionContainer-wrapper'>
    <div id='questionContainer'>
      <div id="count"></div>
      <h2 id="question"></h2>
    </div>
  </div>
</div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
          integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
          crossorigin="anonymous"></script>
<script src='lib.js'></script>
<script type='text/javascript'>
  var fullTable = '<?php echo mysqli_num_rows($fullTable); ?>'; //Gets total number of questions
  var questionLength = isNullOrEmpty(fullTable) ? 100 : parseInt(fullTable); // If result is empty, return default length of 100.

  var o =<?php echo json_encode($jsonObj); ?>; //Grabs PHP jsonObj and converts to JSON.
  var questions = getQuestions(o);
  console.log(questions);

  var quizState = getCookie('quizState-practice');
  if(isNullOrEmpty(quizState)) {
    quizState = generateNewQuizState(questions);
    setCookie('quizState-practice', JSON.stringify(quizState));
  } else {
    try{
      quizState = JSON.parse(quizState);
    } catch(e) {

    }
  }
  console.log('QuizState...');
  console.log(quizState);
  var index = quizState.currentQuestion;
  var currentQuestion = quizState.questions[index];

  console.log('Index: ' + index);
  console.log('currentQuestion: ' + currentQuestion);


  buildQuizHTML(quizState, questions, currentQuestion, questionLength); // Build quiz and append to page

  var pageContent = getPageLanguage(); //Defines translation for each element
  var nagivation = $('#navi').find('a'); //Navigation bar
  var heading = $('.banner-heading'); // banner heading
  var questionContainer = $('#questionContainer').find('.answer');

 $(document).ready(function() {
   var cookie = getCookie('arabic-dla');
   cookie = handleCookie(cookie);
   console.log(cookie);
   setLanguage(questions[currentQuestion]); //Initialise language based on select value on page load


   // Triggers change of language when language select is changed
   $('#langSelect').on('change', function() {
     cookie.language = $(this).val();
     setCookie('arabic-dla', JSON.stringify(cookie), 365);
     setLanguage(questions[currentQuestion]);
   });
  });

function generateNewQuizState() {
  var obj = {};
  obj.questions = [];
  var i = 0;
  //var quizLength = questions.length < 32 ? questions.length : 32;
  var quizLength = 5;
  while(i < quizLength) {
    var number = Math.floor(Math.random() * questions.length);
    if (obj.questions.indexOf(number) == -1) {
      obj.questions.push(number);
      i++;
    }
  }
  obj.correct = [];
  obj.incorrect = [];
  obj.currentQuestion = 0;
  obj.quizLength = quizLength;
  console.log(obj);
  return obj;
}
function buildQuizHTML(quizState, questions, currentQuestion, length) {
  console.log('START buildQuizHTML....');
  $('#title').append('<h3>Practice Mode</h3>');

  //console.log(questions[currentQuestion]);
  var htmlString = '';
  if(quizState.quizLength == quizState.currentQuestion) {
    htmlString+= getResultsPage(quizState, questions, currentQuestion, length);
  } else {
    var counter = index+1;
    $('#count').append('<div class="progress">'+
  '<div class="progress-bar" role="progressbar" aria-valuenow="'+counter+' aria-valuemin="0" aria-valuemax="'+quizState.quizLength+'" style="width:'+counter/quizState.quizLength * 100+'%">' +
    '</div></div>');  //add counting number of questions
    $('#count').append('<p style="width: max-content; margin: 0; padding-left: 10px; right: 0; position: absolute">'+ counter +' of '+ quizState.quizLength+'</p></div>');  //add counting number of questions



    //checking if the current question has an image
    //If the current question has an image the class will be set to answerTable, if not it will be set to answerTableWithoutImage
    if(questions[currentQuestion].questionImage != null)
    {
      console.log("Has image");
      htmlString += '<div style="display: flex" ><table style="width: 70%" id="answerTable">';
      for(var i = 0; i < questions[currentQuestion].answers.length; i++)
      {
          htmlString += '<tr id="answerTR"><td style="display: flex" class="answerDivWithImage"><input name="answer" type="radio" style="padding-right: 10px"><div class="answer" id="answer'+i+'"></div></tr></td>';
      }
    }
    else
    {
      htmlString += '<div style="display: flex" ><table style="width: 70%" id="answerTableWithoutImage">';
      for(var i = 0; i < questions[currentQuestion].answers.length; i++)
      {
          htmlString += '<tr id="answerTR"><td style="display: flex" class="answerDiv"><input name="answer" type="radio" style="padding-right: 10px"><div class="answer" id="answer'+i+'"></div></tr></td>';
      }
    }




    htmlString += '</table>';
    if(questions[currentQuestion].questionImage != null) htmlString += '<img style=" border: 1px solid black" src="'+questions[currentQuestion].questionImage+'" id="questionIMG"/>';
    htmlString += '</div>';
    htmlString += '<div class="buttonDiv">';
    // htmlString += '<input type="button" id="submitBtn" class="quizBtns" onclick="validateAnswer()" value="Submit"></input>';
    htmlString += '<input type="button" id="nextBtn" class="quizBtns" onclick="getNextQuestion()" value="Next Question"></input>';
    htmlString += '<input type="button" class="quizBtns" onclick="retryQuiz(true)" value="Restart Quiz"></input>';
    htmlString += '</div>';
  }
  $('#questionContainer').append(htmlString);
}
function getResultsPage(quizState, questions, currentQuestion, length) {
  $('#questionContainer').css('overflow-y', 'scroll');
  $('#questionContainer').css('height', '3000px');
  var results = quizState.correct.concat(quizState.incorrect);
  console.log(results);
  var htmlString = '';
  htmlString += '<div style="margin-bottom: 30px"><h2>Quiz Complete</h2>';
  htmlString += '<br/>Score: ' + quizState.correct.length +'/'+ quizState.questions.length;
  htmlString += '<br/><input type="button" id="retryBtn" class="quizBtns" onclick="retryQuiz()" value="Retry"></input>';
  htmlString += '</div>';
  for(var x=0; x < quizState.questions.length; x++) {
    var questionResult = findObjectByKey(results, 'index', x);
    console.log(questionResult);
    var currentQuestion = quizState.questions[x];
    htmlString +='<h2 style="font-size: 25px">'+ questions[currentQuestion].questionENG +'</h2>';
    htmlString += '<div style="display: flex; margin-bottom: 30px"><table style="width: 70%">';
    for(var i = 0; i < questions[currentQuestion].answers.length; i++) {
      var answerText = i+1 + '. ' + questions[currentQuestion].answers[i].answerENG;
      if(questions[currentQuestion].answers[i].answerCorrect == 1) {
        htmlString += '<tr><td style="display: flex; color: green"><div class="answer" id="answer'+i+'">'+ answerText +'</div>';
        htmlString += '<img src="img/tick.JPG" style="width:15px; height:15px;"/>';
        htmlString += '</tr></td>';
      }
      if(questionResult.selection == i && questions[currentQuestion].answers[i].answerCorrect == 0) {
        htmlString += '<tr><td style="display: flex; color: red"><div class="answer" id="answer'+i+'">'+ answerText +'</div>';
        htmlString += '<img src="img/cross.JPG" style="width:15px; height:15px;"/>';
        htmlString += '</tr></td>';
      } else if(questions[currentQuestion].answers[i].answerCorrect == 0){
        htmlString += '<tr><td style="display: flex;"><div class="answer" id="answer'+i+'">'+ answerText +'</div></tr></td>';
      }
    }
    htmlString += '</table>';
    if(questions[currentQuestion].questionImage != null) htmlString += '<img style="width: 30%; border: 1px solid black; max-width: 170px" src="'+questions[currentQuestion].questionImage+'"/>';
    htmlString += '</div>';
  }
  return htmlString;
}
function findObjectByKey(array, key, value) {
    for (var i = 0; i < array.length; i++) {
        if (array[i][key] === value) {
            return array[i];
        }
    }
    return null;
}

function getQuestions(o) {
  var questions = [];
  o.forEach(function(mainLine) {
    mainLine.answers = [
      {
        answerENG: mainLine.answerENG,
        answerARAB: mainLine.answerARAB,
        answerCorrect: mainLine.answerCorrect
      }
    ];
    mainLine.answerENG = null;
    mainLine.answerARAB = null;
    mainLine.answerCorrect = null;
    mainLine.answerID = null;

    var match = false;
    questions.forEach(function(question) {
      if (mainLine.questionID == question.questionID) {
        question.answers.push(mainLine.answers[0]);
        match = true;
      }
    });

    if (!match || isNullOrEmpty(questions)) {
      questions.push(mainLine);
    }
  });

  questions.sort(function(a, b) {
    return a.questionID - b.questionID;
  });
  return questions;
}


   //Calls the relevant function based on which language is selected
function setLanguage(obj) {
  var language = $('#langSelect').val();
  try{
  switch(language) {
    case 'Arabic':
      arabic(obj);
      break;
    case 'English':
      english(obj);
      break;
    default:
      english(obj);
    }
    } catch(e) {
      console.log(e);
    }
  }

//Sets elements to Arabic translations
function arabic(obj) {
  heading.text(pageContent.bannerHeading.ar);
  nagivation.each(function(index) {
    $(this).text(pageContent.navigation.ar[index]);
  });
  $('#question').text(obj.questionARAB);
  questionContainer.each(function(index) {
    $(this).text(obj.answers[index].answerARAB);
  });
}

//Sets elements to English translations
function english(obj) {
  heading.text(pageContent.bannerHeading.en);
  nagivation.each(function(index) {
    $(this).text(pageContent.navigation.en[index]);
  });
  $('#question').text(obj.questionENG);
  questionContainer.each(function(index) {
    $(this).text(obj.answers[index].answerENG);
  });
}

function getPageLanguage() {
  return {
    bannerHeading: {
      en: 'Get on the road with confidence',
      ar: 'السيارة مع الثقة'
    },
    startBtn: {
      en: 'Click to Begin',
      ar: 'انقر لتبدأ'
    },
    navigation: {
      en: ['Home', 'Practice', 'About', 'Contact Us'],
      ar: ['منزل', 'الدروس', 'معلومات عنا', 'اتصل بنا']
    }
  };
 }
  function retryQuiz(ask) {
    if(ask == true){
      var result = confirm('Are you sure you want to restart?');
      if(result == true) {
        deleteCookie('quizState-practice');
        var url =  window.location.href;
        window.open(url, '_self');
      }
    } else {
      deleteCookie('quizState-practice');
      var url =  window.location.href;
      window.open(url, '_self');
    }
  }

  function getNextQuestion(length) {
    var radioSelect = $("input[name='answer']");
    var answerDiv = $('.answer');
    var k=0;

    for(var i = 0; i < questions[currentQuestion].answers.length;i++ ) {
      if(radioSelect[i].checked == false)k++;
    }
    //if user has not chosen anything,show pop up window
    if(k==questions[currentQuestion].answers.length) {
        alert("Please choose an answer");
        return;
      } else {
      next=true;
      // go through all options
      for(var i = 0; i < radioSelect.length; i++) {
      if(questions[currentQuestion].answers[i].answerCorrect == 1)
        {
          if(radioSelect[i].checked == true) quizState.correct.push({index: index, selection: i});
        }
      //the option is wrong
      if(radioSelect[i].checked == true && questions[currentQuestion].answers[i].answerCorrect == 0 )
        {
          quizState.incorrect.push({index: index, selection: i});
        }
      }
      quizState.currentQuestion++;
      setCookie('quizState-practice', JSON.stringify(quizState));
    }

    var url =  window.location.href;
    window.open(url, '_self');
  }

  var next=false;
  var clicked = false;
  function validateAnswer() {
    if(clicked == true)
    {
      return;
    }
    clicked = true;
    var radioSelect = $("input[name='answer']");
    var answerDiv = $('.answer');
    var k=0;

    for(var i = 0; i < questions[currentQuestion].answers.length;i++ )
    {
      if(radioSelect[i].checked == false)k++;
    }
    //if user has not chosen anything,show pop up window
    if(k==questions[currentQuestion].answers.length)
        alert("Please choose an answer");
    else//else show answer
    {
      next=true;
      // go through all options
      for(var i = 0; i < radioSelect.length; i++)
      {
      //if answer is right
      if(questions[currentQuestion].answers[i].answerCorrect == 1)
        {
          $('#answer'+i).append('<img src="img/tick.png" style="width:15px; height:15px;"/>'); //append image
          $('#answer'+i).css('color', 'green');
          $('#answer'+i).css('font-weight', 'bolder');
          if(radioSelect[i].checked == true) quizState.correct.push({index: index, selection: i});

        }
      //the option is wrong
      if(radioSelect[i].checked == true && questions[currentQuestion].answers[i].answerCorrect == 0 )
        {
          $('#answer'+i).css('color', 'red');
          $('#answer'+i).append('<img src="img/cross.png" style="width:15px; height:15px;"/>'); //append image
          quizState.incorrect.push({index: index, selection: i});
        }
      }
      quizState.currentQuestion++;
      setCookie('quizState-practice', JSON.stringify(quizState));
    }
  }

</script>
