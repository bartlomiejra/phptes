<?php
naglowek("Zgłoś Problem do administratora serwisu  ");


if (!isset($_POST['email'])) 
{
?>

<form   action="http://127.0.0.1/dyplomy/index.php?akcja=mail"  class="errorform" method="POST">
<ul class="errorul">


<li>
Kategoria Problemu:</br> <select  name="subject" id="errortype">
<option value="Błąd z Logowaniem" >Błąd z Logowaniem</option>
  <option value="Rejestracja">Rejestracja</option>
  <option value="Pytanie do Administratora">Pytanie do Administratora</option>
  <option value="Inne">Inne</option>
</select>
</li>


<li>
Opisz problem:</br> 
<textarea type="text" name="body"  placeholder="Opisz swój problem..."></textarea>
</li>
<li>
<label  class="labelerror" for="myfile">Wybierz Plik:</br> </label>
<input type="file" id="myfile" name="myfile">
</li>
<li>
Twój E-mail:</br>  <input type="text" name="usermail" size="50">
</li>
<li>
<button  action="http://127.0.0.1/dyplomy/index.php?akcja=mail" type="submit" class="mesbtn" name="send_message_btn">Wyślij</button>

</li>

</ul>
 




</form>


<?php



}
// if(isset($_POST['send_message_btn'])){
// 	$subject = $_POST['subject'];
// 	$txt = $_POST['txt'];
// 	$headers = $_POST['headers'];
// 	$msg = $_POST['msg'];
// 	$usermail = $_POST['usermail'];
// print_r($msg);

// 	$to = "administrator@gmail.com";
// 	$subject;
// 	$txt ;
// 	$headers = "Od: '${usermail}' email";
	 
// 	 mail($to, $subject,  $headers) ;
// 		echo "Email  sent to ...";
// 		echo"Mail wysłany";
	
// }




?> 

