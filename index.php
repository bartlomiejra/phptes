<?php
session_start();
include("funkcje.php");
include("naglowek.php");
include("menu.php");
baza();
echo "<div id='tresc'>";

if (@$_SESSION['email'])
{
echo "<div>";
$email=$_SESSION['email'];
$zapytanie=mysqli_query($conn , "select * from users where email='$email'");
$wynik=mysqli_fetch_array($conn , $zapytanie);
echo "Sesja dla użytkownika: <b>".$wynik['imie']." ".$wynik['nazwisko']."</b><hr>"; 
echo"</div>";
}


@$akcja=$_GET['akcja'];
switch($akcja)
{

//--------------------ADMINISTRACJA

case ("admin"):
$admin=$_GET['admin'];
Switch($admin)
{
case("user"):
include("a_uzytkownicy.php");
break;

case("katedry"):
include("a_katedry.php");
break;

case("dyscypliny"):
include("a_dyscypliny.php");
break;

}
break;

// -----------------CZĘŚĆ UŻYTKOWNIKA

case ("dane"):
include ("dane.php");
break;

case ("lista_tematow"):
include ("lista_tematow.php");
break;

case ("pliki"):
include ("pliki.php");
break;

// ------------------ CZĘŚĆ PROMOTORA/RECENZENTA

case ("tematy"):
include ("tematy.php");
break;



//--------------------CZĘŚĆ GŁÓWNA

case("rej"):
include("rejestracja.php");
break;

case("error"):
	include("zglosProblem.php");
	break;

case("inf_stud"):
include("informacje.php");
break;

case("logowanie"):
$email=$_POST['email']; $haslo=$_POST['haslo'];
$conn = mysqli_connect("localhost","root","");

$zapytanie=mysqli_query($conn  ,"select * from users where email='$email' and haslo='$haslo' and status='aktywne'");
//echo "select * from users where email='$email' and haslo='$haslo' and status='aktywne'";
echo $zapytanie;
print_r($zapytanie);
if (mysqli_num_rows($zapytanie) > 0)
{
$wynik=mysqli_fetch_array($zapytanie);
$_SESSION['email']=$wynik['email'];
$_SESSION['typ']=$wynik['typ'];
header("location: index.php");
}
else
komentarz("blad","Problem z logowaniem","Złe lub błędne frazy logowania. <br>Konto użytkownika może nie być aktywne");
break;

case ("wylogowanie"):
session_destroy();
header("location: index.php");
break;

default:
include("home.php");
}

echo "</div>";
include("stopka.php");
?>