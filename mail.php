<?php



if (!isset($_POST['email'])) 
{
?>




<?php



}
if(isset($_POST['send_message_btn'])){
	$to = "administrator@gmail.com";
	$subject = $_POST['subject'];
	$body = $_POST['body'];
	$usermail = $_POST['usermail'];
	
	$headers = "Od: '${usermail}' email";

	$to = "administrator@gmail.com";
	$subject;
	$body;
	$headers = "Od: '${usermail}' email";
	 
	if( mail($to, $body, $subject,  $headers)) {
// echo "Email  sent to ...";
naglowek('<p class="mailOk">' ."Mail Wysłany!" . '</p>');
echo  "tu jest body: " . $body . "do kogo: " . $to . "temat: " . "$subject" . "Od Kogo: " . $headers;
header( "refresh:10;url=index.php" );

	} else {
		naglowek('<p class="mailError">' ."Błąd przy wysyłaniu wiadomości!" . '</p>');


	}
		
	
}




?> 