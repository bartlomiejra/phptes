



<?php	
autoryzacja();

$conn = mysqli_connect("localhost","root","","dyplomy");
$selectwartosc = $_POST['owners'];

if(isset($_POST['usunzdj'])){
	$selectwartosc = $_POST['owners'];
	$selectid = "DELETE FROM `dyplomy`.`galeria` WHERE `galeria`.`nazwa` = '$selectwartosc' 
	";

	$resultat = $conn->query($selectid);
	$usunzdj="DELETE FROM
	 galeria
	where
	   Id = 	'$resultat'   ";
$result = $conn->query($usunzdj);

	if (mysqli_query($conn, $usunzdj)){
		naglowek ("Usunięto Pomyślnie");
		header( "refresh:3;index.php?akcja=galeria" );


	  } else {
		naglowek ("Błąd Podczas usuwania" . $conn->error);
		header( "refresh:3;index.php?akcja=galeria" );



	  }
	  

	
	


	
}
?>

