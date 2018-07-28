<?php
include ('includes/config.php');
function errorMesg() {
	// Error code can go here
	echo "Nous sommes désolés mais votre envoi contient des erreurs.";
	echo "<br /><br />";
	echo "Merci de recommencer en corrigeant les erreurs.<br /><br />";
	exit();
}


function clean_string($string) {
  $bad = array("content-type","bcc:","to:","cc:","href");
  return str_replace($bad,"",$string);
}

	
$name = $_POST['name']; // required
$email_from = $_POST['email']; // required
$mysubject = $_POST['mysubject']; // required
$comments = $_POST['comments']; // required

$email_to = CONTACT_EMAIL;
$email_subject = '[Visionamat web site] '.clean_string($mysubject).' ('.clean_string($name).')';
 
// validation expected data exists
if(!isset($_POST['name']) ||
	!isset($_POST['email']) ||
	!isset($_POST['comments'])) {
	errorMesg();       
}

$email_message .= "Nom : ".clean_string($name)."\n";
$email_message .= "Adresse e-mail: ".clean_string($email_from)."\n";
$email_message .= "Sujet : ".clean_string($mysubject)."\n\n\n";
$email_message .= "".clean_string($comments)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
?>