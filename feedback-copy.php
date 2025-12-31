<?php

#Receive user input
$email = $_POST['email_address'];
$message = $_POST['message'];
$feedback = "From: $email \n \n $message";

#Send email
$headers = "From: homepage@cw-accountacy.com";
$sent = mail('charles.whiteman@cw-accountancy.com', 'CW accountancy contact form', $feedback, $headers);

#Thank user or notify them of a problem
if ($sent) {
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex"> <!-- page hiden from search engines -->
<title>Feedback submission - successful</title>

<link href="feedback.css" rel="stylesheet" type="text/css" />
</head>

<style type="text/css">
<!--
-->
</style></head>

<body>

<div class="container">
<div class="fundsubmn1a">

Thank you for your message.<br />
Please click <a href="feedback.html" target="_self">here</a> to send another.

</div>
</div>

</body>
</html>


<?php

} else {

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex"> <!-- page hidden from search engines -->
<title>Feedback submission - unsuccessful</title>

<link href="feedback.css" rel="stylesheet" type="text/css" />
</head>

<style type="text/css">
<!--
-->
</style></head>

<body>

<div class="container">
<div class="fundsubmn1b">

Sorry, there's been a problem.<br />
Please click <a href="feedback.html" target="_self">here</a> and try again.

</div>
</div>

</body>
</html>


<?php
}
?>