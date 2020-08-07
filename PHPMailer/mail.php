<?php 
// ini_set('display_errors','1');

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require './src/Exception.php'; 
require './src/PHPMailer.php'; 
require './src/SMTP.php'; 

$arr = array();

$fn = $_POST['firstname'];
$ln = $_POST['lastname'];
$email = $_POST['email'];
$subject = $_POST['subject'];

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions 
try { 
    //Server configuration
    $mail->CharSet ="UTF-8";                     //Set message code
    $mail->SMTPDebug = 0;                        // Debug mode output 
    $mail->isSMTP();                             // Use SMTP 
    $mail->Host = 'smtp.qq.com';                // SMTP server 
    $mail->SMTPAuth = true;                      // Allow SMTP authentication 
    $mail->Username = '594115018@qq.com';                // SMTP user name is the user name of the mailbox
    $mail->Password = 'vwwpebimcbirbchh';             // SMTP password part of the mailbox is the authorization code (e.g. 163 mailbox) 
    $mail->SMTPSecure = 'ssl';                    // Allow TLS or SSL Protocol 
    $mail->Port = 465;                            // Server port 25 or 465 depends on mailbox server support

    $mail->setFrom('594115018@qq.com','DriveED<2011004193@qq.com>');  //From 
    $mail->addAddress('Phone.acces.786@gmail.com', '');  // addressee 
    //$mail->addAddress('ellen@example.com');  // Multiple recipients can be added 
    $mail->addReplyTo('594115018@qq.com', 'info'); //When replying, which email should I reply to? Suggestions are consistent with the sender 
    

    
    //Content 
    $mail->isHTML(true);                                  // Whether to send in HTML document format and the client can directly display the corresponding HTML content 
    $mail->Subject = 'DriveED Message'; 
    $mail->Body    =  
 $mail->Body    =  "Contact Email(".$email."):".$fn." ".$ln. " Message: ".$subject; 
    $mail->AltBody = $email; 

    $mail->send();
    
    echo '<script>alert("Message success");window.location.href="../Submission_form.html"</script>'; 
} catch (Exception $e) { 
    echo '<script>alert("Message failed,$mail->ErrorInfo");window.location.href="../Submission_form.html"</script>'; 
    
}