<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Aimee's Design Portfolio</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Clicker+Script" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/playground.css" rel="stylesheet">
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
      <a class="nav-link" href="https://aimeefenech.com/permaculture/">Permaculture</a>
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
<footer class="page-footer font-small">
  <div class="footer-copyright text-center py-3">Website by Aimee Fenech is licensed under a <a class="links" target="_blank" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License.</a>
  </div>
</footer>
</div>
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
</body>
