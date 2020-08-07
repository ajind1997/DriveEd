<?php

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$subject = $_POST["subject"];


$to = "iahmad@deakin.edu.au";
$subject ="Feedback from Customers";
$txt = "$firstname,$lastname,$email,$subject ";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";
mail($to,$subject,$txt,$headers);

header("Location: Submission_form.html")
?>