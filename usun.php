



<?php	
$conn = mysqli_connect("localhost","root","","dyplomy");

if(isset($_POST['usunzdj'])){
	$selectwartosc = $_POST['owner'];
	
	$usunzdj="DELETE FROM galeria WHERE nazwa='$selectwartosc'";

	if (mysqli_query($conn, $usunzdj)){
		naglowek ("Usunięto Pomyślnie");

	  } else {
		naglowek ("Błąd Podczas usuwania" . $conn->error);

	  }

	  $result = $conn->query($usunzdj);
	


	
}
?>

