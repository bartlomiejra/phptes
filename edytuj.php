<?php
autoryzacja();


	
if(isset($_POST['edytujzdj']) and (!empty($_POST['linkzdj']))){

	$nazwa = $_POST['names'];
	$opis = $_POST['opiszdj'];
	$link = $_POST['linkzdj'];
	$rok = $_POST['rokzdj'];
	echo  $nazwa;
	echo $opis;


	$update=("UPDATE galeria SET 
	opis = '$opis', 
	link = '$link',
	rok = '$rok'
	WHERE 
	 nazwa= '$nazwa' ");
print_r("$update");
echo $update;
$resultstt = $conn->query($update);

if ($resultstt == TRUE) {
	naglowek ("Edytowano zdjęcie");
	header( "refresh:3;index.php?akcja=galeria" );



} else {
	naglowek  ("Błąd przy edytowaniu' .  $conn->error");
	header( "refresh:3;index.php?akcja=galeria" );


}
}else{
	naglowek ("Niepoprawnie wypełniony formularz");
	echo "Użytkowniku, najwidoczniej masz problem z wypełnieniem formularza, spróbuj jeszcze raz :) ";
		header( "refresh:3;index.php?akcja=galeria" );

}





?>




