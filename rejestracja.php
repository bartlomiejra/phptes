<?php
naglowek("Rejestracja nowego użytkownika");


if (!isset($_POST['email'])) 
{
?>

<form action="index.php?akcja=rej" method="POST">
Imię: <input type="text" name="imie" size="50"> <p>
Nazwisko: <input type="text" name="nazwisko" size="50"><p>
E-mail: <input type="text" name="email" size="50"><p>
Nr albumu: <input type="text" name="album" size="50"><p>
Tytuł: <select name="tytul">
<option>student</option>
<option>inż</opition>
<option>mgr inż. </option>
<option>dr </opition>
<option>dr inż. </option>
<option>dr hab. inż. </option>
<option>prof. dr hab. inż. </opition>
</select> <p>
<fieldset>
Hasło: <input type="password" name="haslo1"> Powtórz: <input type="password" name="haslo2">
</fieldset>
<hr>
Tekst foruły RODO
<hr>
Weryfikacja: wpisz drugi znak hasła <input type="password" name="ver" size="3">
<input type="submit" value="Zapisz">
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
$conn = mysqli_connect("localhost","root","","dyplomy");
// print_r($album);
$zapyt=mysqli_query($conn, "select * from users where album='$album'");

$zapytanie= $zapyt;
// print_r("elo" . $zapytanie);


if ($zapytanie == '0')
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