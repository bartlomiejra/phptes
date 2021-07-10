<?php
autoryzacja();



$conn = mysqli_connect("localhost","root","","dyplomy");

if(isset($_POST['dodajzdj']) and  (!empty($_POST['nazwa'])) and (!empty($_POST['opis'])) and (!empty($_POST['link'])) and (!empty($_POST['rok'])) ){
	$nazwa = $_POST['nazwa'];
	$opis = $_POST['opis'];
	$link = $_POST['link'];
	$rok = $_POST['rok'];

	$zapytanie="INSERT INTO galeria ( nazwa, opis, link, rok)
	VALUES
	('" . $_POST["nazwa"] . "',
 '" . $_POST["opis"] . "',
 '" . $_POST["link"] . "',
'" . $_POST["rok"] . "') ";
$result = $conn->query($zapytanie);

if ($result == TRUE) {
	naglowek  ("Dodano zdjęcie");
} else {
	naglowek  ("Błąd przy dodawaniu' .  $conn->error");
}
header( "refresh:5;index.php?akcja=galeria" );
}
else{
	naglowek ("Niepoprawnie wypełniony formularz! ");
	echo "Użytkowniku, najwidoczniej masz problem z wypełnieniem prostego formularza, spróbuj jeszcze raz :) ";
	header( "refresh:3;index.php?akcja=galeria" );

}

?>