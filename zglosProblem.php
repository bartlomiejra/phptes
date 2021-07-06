<?php
naglowek("Zgłoś Problem do administratora serwisu  ");


if (!isset($_POST['email'])) 
{
?>

<form action="index.php?akcja=error" class="errorform" method="POST">
<ul class="errorul">


<li>
Kategoria Problemu:</br> <select  name="errortype" id="errortype">
<option value="log" >Błąd z Logowaniem</option>
  <option value="rej">Rejestracja</option>
  <option value="askAdmin">Pytanie do Administratora</option>
  <option value="inne">Inne</option>
</select>
</li>


<li>
Opisz problem:</br> 
<textarea type="text" name="msg"  placeholder="Opisz swój problem..."></textarea>
</li>
<li>
<label  class="labelerror" for="myfile">Wybierz Plik:</br> </label>
<input type="file" id="myfile" name="myfile">
</li>
<li>
Twój E-mail:</br>  <input type="text" name="email" size="50">
</li>
<li>
<button type="submit" class="mesbtn" name="send_message_btn">Wyślij</button>

</li>

</ul>
 




</form>


<?php

}



?>