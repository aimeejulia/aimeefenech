<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
if(isset($_POST['email'])) {

  // EDIT THE 2 LINES BELOW AS REQUIRED
  $email_to = "mail@aimeefenech.com";
  $email_subject = "web contact";

  $name = $_POST['name']; // required
  $email_from = $_POST['email']; // required
  $message = $_POST['message']; // required

  $error_message = error_get_last();

  $email_message = "Information. \n\n";

  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }

  $email_message .= "Name: ".clean_string($name)."\n";
  $email_message .= "Email: ".clean_string($email_from)."\n";
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
