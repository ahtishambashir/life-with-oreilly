<?php

if(!$_POST) exit;

// Email verification, do not edit.
function isEmail($customizeEmail ) {
	return(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$customizeEmail ));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$customizeName     = $_POST['customizeName'];
$customizeEmail    = $_POST['customizeEmail'];
$customizePhone   = $_POST['customizePhone'];
$customizeAdult    = $_POST['customizeAdult'];
$customizeChild    = $_POST['customizeChild'];
$customizeRoom    = $_POST['customizeRoom'];
$customizeDays    = $_POST['customizeDays'];
$customizeCity    = $_POST['customizeCity'];
$customizeDate    = $_POST['customizeDate'];
$customizeTripType    = $_POST['customizeTripType'];
$customizeLocation    = $_POST['customizeLocation'];
$customizeUserMassage = $_POST['customizeUserMassage'];
$customizaVerify   = $_POST['customizaVerify'];

if(trim($customizeName) == '') {
	echo '<div class="error_message">You must enter your Name.</div>';
	exit();
} else if(trim($customizeAdult ) == '') {
	echo '<div class="error_message">You must enter no. Adults.</div>';
	exit();
}  else if(trim($customizeChild ) == '') {
	echo '<div class="error_message">You must enter no. Childrens.</div>';
	exit();
} else if(trim($customizeRoom ) == '') {
	echo '<div class="error_message">You must enter no. Rooms.</div>';
	exit();
} else if(trim($customizeDays ) == '') {
	echo '<div class="error_message">You must enter no. Days.</div>';
	exit();
} else if(trim($customizeCity) == '') {
	echo '<div class="error_message">You must enter departure city.</div>';
	exit();
} else if(trim($customizeDate) == '') {
	echo '<div class="error_message">You must enter departure date.</div>';
	exit();
} else if(trim($customizeTripType) == '') {
	echo '<div class="error_message">You must select trip type.</div>';
	exit();
} else if(trim($customizeLocation) == '') {
	echo '<div class="error_message">You must select loction.</div>';
	exit();
} else if(trim($customizeEmail) == '') {
	echo '<div class="error_message">Please enter a valid email address.</div>';
	exit();
} else if(!isEmail($customizeEmail)) {
	echo '<div class="error_message">You have enter an invalid e-mail address, try again.</div>';
	exit();
	} else if(trim($customizePhone) == '') {
	echo '<div class="error_message">Please enter a valid phone number.</div>';
	exit();
} else if(!is_numeric($customizePhone)) {
	echo '<div class="error_message">Phone number can only contain numbers.</div>';
	exit();
} else if(trim($customizeUserMassage) == '') {
	echo '<div class="error_message">Please enter your message.</div>';
	exit();
} else if(!isset($customizaVerify) || trim($customizaVerify) == '') {
	echo '<div class="error_message"> Please enter the verification number.</div>';
	exit();
} else if(trim($customizaVerify) != '4') {
	echo '<div class="error_message">The verification number you entered is incorrect.</div>';
	exit();
}

if(get_magic_quotes_gpc()) {
	$customizeUserMassage = stripslashes($customizeUserMassage);
}


//$address = "HERE your email address";
$address = "info@7thstreettravelers.com";


// Below the subject of the email
$e_subject = 'You\'ve been contacted by ' . $customizeName . '.';

// You can change this if you feel that you need to.
$e_body = "You have been contacted by $customizeName with additional message is as follows." . PHP_EOL . PHP_EOL;
$e_content = "\"$customizeUserMassage\"" . PHP_EOL . PHP_EOL;
$e_reply = "You can contact $customizeAdult via email, $customizeEmail or via phone $customizePhone Adults: $customizeAdult Childerens: $customizeChild Rooms: $customizeRoom
  Days: $customizeDays City: $customizeCity Date: $customizeDate Trip type: $customizeTripType Location: $customizeLocation";

$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From: $customizeEmail" . PHP_EOL;
$headers .= "Reply-To: $customizeEmail" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

$user = "$customizeEmail";
$usersubject = "Thank You";
$userheaders = "From: info@7thstreettravelers.com\n";
$usermessage = "Thank you for contact 7th Street Travelers. We will reply shortly!";
mail($user,$usersubject,$usermessage,$userheaders);

if(mail($address, $e_subject, $msg, $headers)) {

	// Success message
	echo "<div id='success_page' style='padding:25px 0'>";
	echo "<strong >Thank You.</strong><br>";
	echo "Thank you <strong>$customizeName</strong>,<br> your message has been submitted. We will contact you shortly.";
	echo "</div>";

} else {

	echo 'ERROR!';

}
