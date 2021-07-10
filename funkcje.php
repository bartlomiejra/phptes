
<?php



function naglowek($tresc)
{
echo "<h2>".$tresc."</h2>";
echo "<hr><p>";
}

function komentarz($typ,$tytul,$tresc)
{
if ($typ=='blad') $kolor='red'; else $kolor='green';

echo "<fieldset><legend style=' color: ".$kolor."; font-weight: bold;'>".$tytul."</legend>";
echo "<div style='color: ".$kolor."'><h3>".$tresc."</h3></div>";
echo "</fieldset>";
}

function baza()
{
	$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,  "dyplom" );
}

		
	
	

	
function formlogin()
{
?>
<form action="index.php?akcja=logowanie"  method="POST">
E-mail: <input type="text" name="email" size="12">
Hasło: <input type="password" name="haslo" size="10">
<input type="submit" value="Logowanie">
</form>

<form method="POST" action="http://127.0.0.1/dyplomy/index.php?akcja=error">
    <button class="error" type="submit">Zgłoś Problem </button>
</form>

<?php
}









function admin_autoryzacja()
{
if (@!$_SESSION['typ'] || @$_SESSION['typ']<>'Admin') 
{
komentarz ("blad","Problem z autoryzacją","Nie jesteś administratorem. Ta część serwisu nie jest dla Ciebie !");
include("stopka.php");
exit;
}
}

function autoryzacja()
{
if (@!$_SESSION['typ']) 
{
komentarz ("blad","Problem z autoryzacją","Nie jesteś użytkownikiem serwisu. Ta część serwisu nie jest dla Ciebie !");
include("stopka.php");
exit;
}
}

function prac_autoryzacja()
{
if (@$_SESSION['typ']<>'Admin' && @$_SESSION['typ']<>'Pracownik') 
{
komentarz ("blad","Problem z autoryzacją","Nie jesteś użytkownikiem serwisu. Ta część serwisu nie jest dla Ciebie !");
include("stopka.php");
exit;
}
}


?>




