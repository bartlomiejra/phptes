

<?php
admin_autoryzacja();
naglowek("Zarządzanie użytkownikami");
?>
<!-- <form method='POST' action='' >
	<input type='text' name='search' >
	<a href='index.php?akcja=admin&admin=user&user=wyszukaj&wyszukaj=".$id."'> Wyszukaj </a>
	
	</form> -->

<?php
//  htmlspecialchars($_POST['search']); 
	

// if(isset($_POST['search']))
// {
	// $searchq=$_POST[$search];
	// $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
	
// 	$query = mysqli_query($conn, "SELECT * FROM members WHERE firstname LIKE '%$searchq%' OR lastname LIKE '%$searchq%'") or die ("could not search");
// 	$count = mysql_num_rows($query);
// 	if($count ==0) 
// 	{
// 		$output = 'Nic nie znaleziono';
// 	}
// 		else
// 		{
// 			while($row = mysql_fetch_array($query)) 
// 			{
// 			$fname = $row['firstname'];
// 			$lname = $row['lname'];
// 			$id = $row['id'];
// 		        $output .='<div>'.$fname.' '.$lname.'</div>';
// 			}
// 		}
// 	}

?>

<?php

@$user=$_GET['user'];
Switch ($user)
{


case ("zapisz"):
$id=$_POST['id'];
$imie=$_POST['imie']; $nazwisko=$_POST['nazwisko'];
$email=$_POST['email'];$album=$_POST['album'];
$tytul=$_POST['tytul']; $data_rej=$_POST['data_rej'];
$status=$_POST['status']; $typ=$_POST['typ'];

if ($_POST['haslo']<>'') 
{
$haslo=md5($_POST['haslo']);
$zapytanie="update users set imie='$imie', nazwisko='$nazwisko', email='$email', album='$album', tytul='$tytul', haslo='$haslo', data_rej='$data_rej', status='$status', typ='$typ' where id='$id'"; 
}
else
{
$zapytanie="update users set imie='$imie', nazwisko='$nazwisko', email='$email', album='$album', tytul='$tytul', data_rej='$data_rej', status='$status', typ='$typ' where id='$id'"; 
}

if (mysqli_query($conn , $zapytanie)) 
{
komentarz("OK","Zapis danych", "Dane zostały poprawnie zapisane do bazy danych");
header ("refresh: 2; index.php?akcja=admin&admin=user");
}
else komentarz ("blad","Problem z zapisem danych","Coś poszło nie tak");
break;

case ("usun"):
$id=$_GET['usun'];

$zapytanie="delete from users where id='$id'";
if (mysqli_query($conn , $zapytanie))
komentarz ("OK","Usunięcie danych konta", "Dane zostały usunięte z bazy danych");
else
komentarz("blad","Problem z usunięciem danych","Coś poszło nie tak");
header ("refresh: 2; index.php?akcja=admin&admin=user");
break;


case("edycja"):
@$id=$_GET['edycja'];
$zapytanie=mysqli_query($conn , "select * from users where id='$id'");
$wynik=mysqli_fetch_array($zapytanie);

echo "<form action='index.php?akcja=admin&admin=user&user=zapisz' method='POST'>";

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
echo "Opcja zmiana hasła: <input type='text' name='haslo'><p>";
echo "Data Rejestracji: <input type='text' name='data_rej' value='".$wynik['d_rej']."'><p>";
echo "Status: <select name='status'>";
echo "<option>".$wynik['status']."</option>";
echo "<option>aktywne</option>";
echo "<option>nieaktywne</opition>";
echo "</select> <p>";
echo "Typ: <select name='typ'>";
echo "<option>".$wynik['typ']."</option>";
echo "<option>Student</option>";
echo "<option>Pracownik</opition>";
echo "<option>Admin</opition>";
echo "</select> <p>";
echo "<hr>";
echo "<input type='submit' value='Zapisz'>";
echo "</form>";
echo "<div style='text-align: right; color: red; font-weight: bold;'><a href='index.php?akcja=admin&admin=user&user=usun&usun=".$id."'> USUŃ KONTO </a></div>";
break;

// case("wyszukaj"):
// 	// @$id=$_GET['edycja'];
// 	@$id=$_GET['wyszukaj'];
	
// 	echo "<form method='POST' action='' >
// <input type='text' name='search' >
// <a href='index.php?akcja=admin&admin=user&user=wyszukaj&wyszukaj'> Wyszukaj </a>

// </form>";
// print_r("działa");
// $searchq=$_POST['search'];

// 	if(isset($_POST['search'])){
// 		$searchq=$_POST['search'];

// 	}else {
// 		echo("mechh");
		
// 	}
// 		$searchq=$_POST['search'];


// 	$zapytanie=mysqli_query($conn ,  "select * from users where id = 2");

// 	// print_r("Działa to ");
// echo "<table style='width: 100%;'>";
// while ($wynik=mysqli_fetch_array($zapytanie))
// {
// echo "<tr>";
// echo "<td>".$wynik['id']."</td>";
// echo "<td>".$wynik['imie']." ".$wynik['nazwisko']."</td>";
// echo "<td>email: ".$wynik['email']."<br>album: ".$wynik['album']."</td>";
// echo "<td>".$wynik['tytul']."</td>";
// echo "<td>".$wynik['d_rej']."</td>";
// echo "<td>".$wynik['status']."<br>".$wynik['typ']."</td>";
// $id=$wynik['id'];
// echo "<td><a href='index.php?akcja=admin&admin=user&user=edycja&edycja=".$id."'> EDYCJA </a>";

// echo "</tr>";
// }
// break;

// case("wyszukasj"):


	
// 	$str = $_POST["search"];
// 	$zapytanie=mysqli_query($conn ,  "SELECT * FROM `search` WHERE Name = '$str'");
// 	echo "<table style='width: 100%;'>";
// 	while ($wynik=mysqli_fetch_array($zapytanie))

// 	$sth->setFetchMode(PDO:: FETCH_OBJ);
// 	$sth -> execute();
// break;

default: 
echo "<form method='POST' action='index.php?akcja=admin&admin=user&user=wyszukaj&wyszukaj' >
<input type='text' name='search' >
<a href='index.php?akcja=admin&admin=user&user=wyszukaj&wyszukaj'> Wyszukaj </a>

</form>";
$zapytanie=mysqli_query($conn ,  "select * from users");
echo "<table style='width: 100%;'>";
while ($wynik=mysqli_fetch_array($zapytanie))
{
echo "<tr>";
echo "<td>".$wynik['id']."</td>";
echo "<td>".$wynik['imie']." ".$wynik['nazwisko']."</td>";
echo "<td>email: ".$wynik['email']."<br>album: ".$wynik['album']."</td>";
echo "<td>".$wynik['tytul']."</td>";
echo "<td>".$wynik['d_rej']."</td>";
echo "<td>".$wynik['status']."<br>".$wynik['typ']."</td>";
$id=$wynik['id'];
echo "<td><a href='index.php?akcja=admin&admin=user&user=edycja&edycja=".$id."'> EDYCJA </a>";
echo "</tr>";
}
echo "</table>";
}
?>