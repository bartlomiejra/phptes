<?php
autoryzacja();
naglowek("Edycja danych konta");

@$email=$_SESSION['email'];
@$dane=$_GET['dane'];
switch($dane)
{

	case("zapisz"):
		$id=$_POST['id'];
		$imie=$_POST['imie']; $nazwisko=$_POST['nazwisko'];
		$email=$_POST['email'];$album=$_POST['album'];
		$tytul=$_POST['tytul']; $haslo1=$_POST['haslo1']; $haslo2=$_POST['haslo2'];
		$conn = mysqli_connect("localhost","root","","dyplomy");

if ($imie=='' || $nazwisko ==''|| $email=='' || $album=='' || $tytul=='' || $haslo1<>$haslo2 || $haslo1=='')
komentarz ("blad","Problem z wypełnieniem formularza","Dane w formularzu zostały źle wypełnione. Powtórz etap edycji danych");
else 
{
$zapytanie=mysqli_query($conn, "select * from users where email='$email' or album='$album'");

if (mysqli_num_rows($zapytanie)>1)
komentarz ("blad","Problem z potórzeniem danych"," W bazie danych istnieje już użytkownik z proponowanymi danymi e-mail lub album.");
else
{
@$haslo=md5($haslo1);
$zapytanie="update users set imie='$imie', nazwisko='$nazwisko', email='$email', album='$album', tytul='$tytul', haslo='$haslo' where id='$id'";
if (mysqli_query($conn, $zapytanie))
komentarz ("OK","Poprawny zapis danych"," Dane konta zostały uaktualnione");
else
komentarz ("blad","Problem z zapisem danych"," Coś poszło nie tak");

}}

//header ("refresh: 2; index.php?akcja=dane");
break;



default:
$zapytanie=mysqli_query($conn, "select * from users where email='$email'");
$wynik=mysqli_fetch_array($zapytanie);

echo "<form action='index.php?akcja=dane&dane=zapisz' method='POST'>";
echo "<input type='hidden' name='id' value='".$wynik['id']."'><p>";
echo "Imię: <input type='text' name='imie' value='".$wynik['imie']."'><p>";
echo "Nazwisko: <input type='text' name='nazwisko' value='".$wynik['nazwisko']."'><p>";
echo "E-mail: <input type='text' name='email' value='".$wynik['email']."'><p>";
echo "Album: <input type='text' name='album' value='".$wynik['album']."'><p>";
echo "Tytuł: <select name='tytul'>";
echo "<option>".$wynik['tytul']."</option>";
echo "<option>student</option>";
echo "<option>inż</opition>";
echo "<option>mgr inż. </option>";
echo "<option>dr </opition>";
echo "<option>dr inż. </option>";
echo "<option>dr hab. inż. </option>";
echo "<option>prof. dr hab. inż. </opition>";
echo "</select> <p>";
echo "Opcja zmiana hasła: <input type='password' name='haslo1'> Powtórz: <input type='password' name='haslo2'><p>";
echo "Data rejestracji: ".$wynik['d_rej']."<p>";
echo "Status: ".$wynik['status']."<p>";
echo "Typ: ".$wynik['typ']."<p>";
echo "<hr>";
echo "<input type='submit' value='Zapisz'>";
echo "</form>";
}
?>