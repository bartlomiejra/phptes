<?php
naglowek("Zgłoś Problem do administratora serwisu  ");


if (!isset($_POST['email'])) 
{
?>

<form action="index.php?akcja=error" class="errorform" method="POST">
<ul class="errorul">


<li>
Kategoria Problemu:</br> <select name="errortype" id="errortype">
<option value="log" name="subject">Błąd z Logowaniem</option>
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
<button type="submit" name="send_message_btn">Wyślij</button>

</li>

</ul>
 




</form>

<?php
}
else
{
$imie=$_POST['imie']; $nazwisko=$_POST['nazwisko'];$email=$_POST['email'];
$album=$_POST['album'];$tytul=$_POST['tytul']; 
$haslo1=$_POST['haslo1']; $haslo2=$_POST['haslo2'];
$ver=$_POST['ver'];  

if ($ver<>substr($haslo1,1,1)) 
komentarz("blad","Błąd weryfikacji formularza", "Dane z pola weryfikacyjnego nie są poprawne");
else
{
if ($imie=='' || $nazwisko=='' || $email=='' || $album=='' || $haslo1=='')
komentarz("blad","Źle wypełniony formularz","Niektóre pola w formularzu są puste. Proszę uzupelnić formularz poprawnie");
else
{
$data_rej=date('Y-m-d');
if ($tytul<>"student") $typ="pracownik"; else $typ="student";

// Kontrola czy użytkownik nie ma już konta w bazie danych
baza();
$zapytanie=mysqli_query($conn, "select * from users where album='$album'");
if (mysqli_num_rows($zapytanie)<>'0')
komentarz ("blad","Duplikat danych","Użytkownik o takim numerze albumu jest już zarejestrowany w bazie danych");
else 
{

//zapianie danych do bazy

$haslo=md5($haslo1);
$zapytanie=mysqli_query($conn, "insert into users value('','$imie','$nazwisko','$email','$album','$tytul','$haslo','$data_rej','nieaktywne','$typ')");

if ($zapytanie) komentarz("OK","Zapisanie danych","Dane zostały poprawnie zapiane do bazy danych");
else komentarz ("blad","Problem!"," Problem z zapisaniem danych do bazy. Skontaktuj się z administratorem serwisu");


}
}
}
}
?>