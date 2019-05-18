<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="playground.css"  type="text/css">
<link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
</head>
<body>
  <div id="header">
    <h2>Aimee's contact form</h2>
  </div>
  <nav>
    <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="contact.html">Communicate with me</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.html">Current Projects</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="cv.html">CV</a>
    </li>
  </ul>
    </nav>
    <br />
    <div class="container" id="form-box">

<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
if(isset($_POST['email'])) {

  // EDIT THE 2 LINES BELOW AS REQUIRED
  $email_to = "mail@aimeefenech.com";
  $email_subject = "web contact";

  $email_from = $_POST['email']; // required
  $subject = $_POST['subject']; // required
  $message = $_POST['message']; // required

  $error_message = error_get_last();

  $email_message = "Information. \n\n";

  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }

  $email_message .= "Email: ".clean_string($email_from)."\n";
  $email_message .= "Subject: ".clean_string($subject)."\n";
  $email_message .= "Message: ".clean_string($message)."\n";

  // create email headers
  $headers = 'From: '.$email_from."\r\n".
  'Reply-To: '.$email_from."\r\n" .
  'X-Mailer: PHP/' . phpversion();
  $success = mail($email_to, $email_subject, $email_message, $headers);

  if (isset($success) && $success) { ?>
    <h1>Message sent!</h1>
<?php } else { ?>
  <h1>Ooops, something went wrong. Send me an email instead!</h1>
<?php } } ?>

</div>
<br />
<footer class="footer page-footer font-small mt-auto" style="margin-top:100px;">
    <div class="footer-copyright text-center py-3">Website by Aimee Fenech - licensed under a <a class="links" target="_blank" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License.</a>
    </div>
  </footer>
</body>
