<?php



if (!isset($_POST['email'])) 
{




}
if(isset($_POST['send_message_btn'])){
	$subject = $_POST['subject'];
	$body = $_POST['body'];
	$usermail = $_POST['usermail'];
	
	$headers = "Od: '${usermail}' email";

	$to = "elcebula@gmail.com";
	$subject;
	$body;
	$headers = "Od: '${usermail}' ";
	 
	if( mail($to, $body, $subject,  $headers)) {
// echo "Email  sent to ...";
naglowek('<p class="mailOk">' ."Mail Wysłany 📧 " . '</p>');
// echo  "tu jest body: " . $body . "do kogo: " . $to . "temat: " . "$subject" . "Od Kogo: " . $headers;
header( "refresh:5;url=index.php" );

	} else {
		naglowek('<p class="mailError">' ."Błąd przy wysyłaniu wiadomości " . '</p>');
		header( "refresh:5;url=index.php" );



	}
		
	
}



// if(isset($_POST['send_message_btn'])){
// 	require("/PHPMailer-master/src/PHPMailer.php");
//     require("/PHPMailer-master/src/SMTP.php");
//     require("/PHPMailer-master/src/Exception.php");


//     $mail = new PHPMailer\PHPMailer\PHPMailer();
//     $mail->IsSMTP(); 

//     $mail->CharSet="UTF-8";
//     $mail->Host = "smtp.gmail.com";
//     $mail->SMTPDebug = 1; 
//     $mail->Port = 465 ; //465 or 587

//      $mail->SMTPSecure = 'ssl';  
//     $mail->SMTPAuth = true; 
//     $mail->IsHTML(true);

//     //Authentication
//     $mail->Username = "foo@gmail.com";
//     $mail->Password = "*******";

//     //Set Params
//     $mail->SetFrom("foo@gmail.com");
//     $mail->AddAddress("bar@gmail.com");
//     $mail->Subject = "Test";
//     $mail->Body = "hello";


//      if(!$mail->Send()) {
//         echo "Mailer Error: " . $mail->ErrorInfo;
//      } else {
//         echo "Message has been sent";
//      }

// }
// }

?> 