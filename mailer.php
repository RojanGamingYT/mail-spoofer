<?php

$to = $_POST['r_email'];
$subject = $_POST['subject'];
$message = $_POST['message'];  

$sender_name = $_POST['s_name'];
$sender_email = $_POST['s_email'];

$random_hash = md5(date('r', time())); 

$headers = "From: " . $sender_name . "<" . $sender_email . ">";

$headers .= "\r\nContent-Type: text/html; boundary=\"PHP-mixed-".$random_hash."\""; 

$message = preg_replace('/(?<!\r)\n/', "\r\n", $message);
$headers = preg_replace('/(?<!\r)\n/', "\r\n", $headers);
$message = str_replace("\r\n", "\n", $message);
$headers = str_replace("\r\n", "\n", $headers);

$mail_sent = mail( $to, $subject, $message, $headers );

if($mail_sent)
	{
	echo "
	
<html>
<head>
	<title>Success : )</title>
</head>
	
<body>
<script>
	alert(\"Email Sended Successfully!\");
	window.location.replace(\"https://mail-spoof.rojansapkota.com.np\");
</script>
</body>
</html>  ";
	}
	
else {
	echo "
	
<html>
<head>
	<title>Failed : (</title>
</head>
	
<body>
<script>
	alert(\"Failed to Send Email !\");
	window.location.replace(\"https://mail-spoof.rojansapkota.com.np\");
</script>
</body>
</html>  ";
}

?>
