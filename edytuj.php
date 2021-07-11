<?php
autoryzacja();


	
if(isset($_POST['edytujzdj'])){

	$nazwa = $_POST['names'];
	$opis = $_POST['opis'];
	$link = $_POST['link'];
	$rok = $_POST['rok'];

	$update=("UPDATE galeria
	SET opis = '$opis', link = '$link',rok = '$rok'
	WHERE  nazwa= '$nazwa'");
// print_r("$update");
$resultstt = $conn->query($update);

if ($resultstt == TRUE) {
	naglowek ("Edytowano zdjęcie");
	header( "refresh:3;index.php?akcja=galeria" );

} else {
	naglowek  ("Błąd przy edytowaniu' .  $conn->error");
	header( "refresh:3;index.php?akcja=galeria" );

}
}





?>