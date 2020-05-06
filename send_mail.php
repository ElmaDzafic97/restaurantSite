<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$name = $fname." ".$lname;
$email = $_POST['email'];
$comment = $_POST['comment'];
$toEmail = "";
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$showMessage = '';
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {	
	if(filter_var($fname))
	$subject = "Contact us email";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();	
	$message = 'Hello,<br/>'
	. 'Name:' . $name . '<br/>'	
	. 'Message:' . $comment . '<br/><br/>';		
	mail($toEmail, $subject, $message, $headers);
	$showMessage = "Your Query has been received, We will contact you soon.";	
} else {
	$showMessage =  "Invalid email";
}
$jsonData = array(
	"message"	=> $showMessage
);
echo json_encode($jsonData); //znaci $jsonData je rezultaat od php i ti pomocu json_encode saljes u js?
//da, json_encode pretvori ti php varijable u JSON, i JSON javasript razumije i nema potrebe da se povezuju linkovima jer js vidi ovo message 
// da, kao {'message':'showMessage'} ahaa a nema nigdje returna?, echo json_encode ti radi na principu
// da sve sto je enkodovano (i ponekad ono sto nije, ovo ako imas neki error se desi) ispise u <html> JSON </html>
// I onda ti citas sa tog html </html> i pretvoris iz json u varijablu ako ti treba
?>