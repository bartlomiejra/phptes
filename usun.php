



<?php	
autoryzacja();

$conn = mysqli_connect("localhost","root","","dyplomy");

if(isset($_POST['usunzdj'])){
	$selectwartosc = $_POST['owner'];
	
	$usunzdj="DELETE FROM galeria WHERE nazwa='$selectwartosc'";

	if (mysqli_query($conn, $usunzdj)){
		naglowek ("Usunięto Pomyślnie");
		header( "refresh:3;index.php?akcja=galeria" );


	  } else {
		naglowek ("Błąd Podczas usuwania" . $conn->error);
		header( "refresh:3;index.php?akcja=galeria" );



	  }
	  

	  $result = $conn->query($usunzdj);
	


	
}
?>

