



<?php	
autoryzacja();

$conn = mysqli_connect("localhost","root","","dyplomy");
$selectwartosc = $_POST['owners'];

if(isset($_POST['usunzdj'])){
	
	$selectwartosc = $_POST['owners'];
	// echo $selectwartosc . " wartość";
	$selectid = "DELETE FROM `dyplomy`.`galeria` WHERE `galeria`.`nazwa` = '$selectwartosc' IGNORE CONSTRAINTS
	";

	$resultat = $conn->query($selectid);
	// echo "wynik" ."$selectid";
//  echo $resultat;
//  print_r($resultat);



	// echo  $_POST['owners'];
	$usunzdj="DELETE FROM
	 galeria
	where
	   Id = 	'$resultat'   ";

	// --   nazwa= $selectwartosc ";
// print_r("$usunzdj");
$result = $conn->query($usunzdj);

	if (mysqli_query($conn, $usunzdj)){
		naglowek ("Usunięto Pomyślnie");
		// header( "refresh:3;index.php?akcja=galeria" );


	  } else {
		naglowek ("Błąd Podczas usuwania" . $conn->error);
		// header( "refresh:3;index.php?akcja=galeria" );



	  }
	  

	
	


	
}
?>

