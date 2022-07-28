<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../assets/lib/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$state = $_POST['state'];
$occupation = $_POST['occupation'];
$message = $_POST['message'];
$default_email = 'contact@tecnoframelgs.com';
$default_name = 'Contat Tecnoframe';

try {

  $mail->CharSet = 'UTF-8';
  $mail->Encoding = 'base64';

  $mail->isSMTP();
  $mail->Host = 'email-ssl.com.br';
  $mail->SMTPAuth = true;
  $mail->Port = 587;
  $mail->Username = 'contact@tecnoframelgs.com';
  $mail->Password = 'Grupo@1020';

  //Recipients
  $mail->setFrom($default_email, $default_name);
  $mail->addAddress($default_email, $name);

  //Content
  $mail->isHTML(true);
  $mail->Subject = 'Contact by site: '.$subject;

  $mail->Body = '<p>Hello!</p>'.'<p>I am contacting you through Tecnoframe website .</p>'
  .'<p><b>Name: </b></p>'.$name
  .'<p><b>Subject: </b></p>'.$subject
  .'<p><b>Phone Number: </b></p>'.$phone
  .'<p><b>E-mail: </b></p>'.$email
  .'<p><b>City: </b></p>'.$city
  .'<p><b>State: </b></p>'.$state
  .'<p><b>Profession: </b></p>'.$occupation
  .'<p><b>Message:</b></p>'.$message
  .'<p></p>'.'<p></p>'.'<img src="http://tecnoframelgs.com/assets/img/logo.png" alt="Tecnoframe Logo"/>';

  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>