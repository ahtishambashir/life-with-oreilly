<?php

if(!$_POST) exit;

// Email verification, do not edit.
function isEmail($main_email_input ) {
	return(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$main_email_input ));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$main_input_name     = $_POST['main_input_name'];
$main_phone_input    = $_POST['main_phone_input'];
$main_email_input    = $_POST['main_email_input'];
$main_destination_input   = $_POST['main_destination_input'];
$dates = $_POST['dates'];
$adult_main_input   = $_POST['adult_main_input'];
$main_child_input   = $_POST['main_child_input'];

if(trim($main_input_name) == '') {
	echo '<div class="error_message">You must enter your Name.</div>';
	exit();
} else if(trim($main_destination_input ) == '') {
	echo '<div class="error_message">You must enter a location.</div>';
	exit();
} else if(trim($main_email_input) == '') {
	echo '<div class="error_message">Please enter a valid email address.</div>';
	exit();
} else if(!isEmail($main_email_input)) {
	echo '<div class="error_message">You have enter an invalid e-mail address, try again.</div>';
	exit();
	} else if(trim($main_destination_input) == '') {
	echo '<div class="error_message">Please enter a valid phone number.</div>';
	exit();
} else if(!is_numeric($main_phone_input)) {
	echo '<div class="error_message">Phone number can only contain numbers.</div>';
	exit();
} else if(trim($dates) == '') {
	echo '<div class="error_message">Please enter your message.</div>';
	exit();
}

if(get_magic_quotes_gpc()) {
	$main_destination_input = stripslashes($main_destination_input);
}


//$address = "HERE your email address";
$address = "info@7thstreettravelers.com";


// Below the subject of the email
$e_subject = 'You\'ve been contacted by ' . $main_input_name . '.';

// You can change this if you feel that you need to.
$e_body = "You have been contacted by $main_input_name  with destination $main_input_name wants to go" . PHP_EOL . PHP_EOL;
$e_content = "\"$main_destination_input\"" . PHP_EOL . PHP_EOL;
$e_reply = "You can contact $main_phone_input via email, $main_email_input or via phone $main_phone_input  $main_input_name selected the date $dates in these dates $main_input_name
            wants to go the destination $main_destination_input and adullts are  $adult_main_input with children $main_child_input please contact with $main_input_name";

$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From: $main_email_input" . PHP_EOL;
$headers .= "Reply-To: $main_email_input" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

$user = "$main_email_input";
$usersubject = "Thank You";
$userheaders = "From: info@7thstreettravelers.com\n";
$usermessage = "Thank you for contact 7th Street Travelers. We will reply shortly!";
mail($user,$usersubject,$usermessage,$userheaders);

if(mail($address, $e_subject, $msg, $headers)) {

	// Success message
	echo "<div id='main_form_massage' style='padding:25px 0'>";
	echo "Thank you <strong>$main_input_name</strong>,<br> your message has been submitted. We will contact you shortly.";
	echo "</div>";

} else {

	echo 'ERROR!';

}