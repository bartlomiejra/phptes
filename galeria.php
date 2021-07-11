<?php
naglowek("Galeria Zdjęć   ");



?>











<?php
baza();
$osk = 3;
$zapytanie=mysqli_query($conn ,  "select * from galeria");
echo "<div class='galeria'>";

while ($zapytanieZdj=mysqli_fetch_array($zapytanie))
{
	?>

	<div class="zdjecie id="<?php echo $zapytanieZdj['id']; ?>">
		
	<img class="obrazek" src="<?php echo $zapytanieZdj['link']; ?>" alt=<?php echo $zapytanieZdj['opis']; ?>"  title="<?php echo $zapytanieZdj['id']; ?>"  >
	<p class="nazwazdj"><?php echo $zapytanieZdj['nazwa']; ?></p>
	<p class="opiszdjecia"><?php echo $zapytanieZdj['opis']; ?></p>
	<p class="data"><?php echo $zapytanieZdj['rok']; ?></p>
</img>

	<form    class="galeria zdjec" method="POST" action="http://127.0.0.1/dyplomy/index.php?akcja=usun?id=<?php echo $zapytanieZdj['id']; ?>">
<div class="przyciski">
	<button class="usun" name="<?php echo $zapytanieZdj['id']; ?>"
	
	 id="<?php echo $zapytanieZdj['id']; ?>">Usun
	</button>
</form>
<td>

<form  method="POST"
<?php
$id =$zapytanieZdj['id'];
print_r($id);
?>
	action="http://127.0.0.1/dyplomy/index.php?akcja=edytuj&?$id=<?php echo $zapytanieZdj['id']; ?>">
	<input type="hidden" value="" name="<?php echo $zapytanieZdj['id']; ?>" />

	<button type="submit" class ="edytuj"
	 name="<?php echo $zapytanieZdj['id']; ?>" value="<?php echo $zapytanieZdj['id']; ?>">Edytuj
	
	 </button>
</form>
	
</div>

	
	
	</div>
	
<?php
}
echo "</div>";






?> 
<div class="crud">
<form action="http://127.0.0.1/dyplomy/index.php?akcja=dodanozdj" class="dodajform" method="POST">

<hr>
<h1>Dodaj zdjęcie</h1>
<li><input class="inputphoto" placeholder="Nazwa Zdjecia" name="nazwa"  type="text">
</li>
<li><input type="text" class="inputphoto text" name="opis" placeholder="Opis zdjęcia"></li>
<li><input type="text"  class="inputphoto"name="link" placeholder="Link, np: https://zdjeci#1.pl  "></li>
<li><input type="text" class="inputphoto" name="rok" placeholder="Rok Wykonania"></li>
<button class="dodajzdj" name="dodajzdj">Dodaj

</button>


</form>
<form action="http://127.0.0.1/dyplomy/index.php?akcja=usun"
  method="POST" 

">

<hr>
<h1>Usuń zdjęcie</h1>
	<select class="owner" name="owner">
<?php 
$sql = mysqli_query($conn, "SELECT nazwa FROM galeria");
while ($row = $sql->fetch_assoc()){
	?>
	 <option value=" <?php echo $row['nazwa'] ?>" > <?php echo  $row['nazwa'] ?> </option>
<?php
}
?>
</select><br>
<button class="dodajzdj"name="usunzdj">Usuń</button>
</form>





<?php	
// $conn = mysqli_connect("localhost","root","","dyplomy");

// if(isset($_POST['usunzdj'])){
// 	$selectwartosc = $_POST['owner'];
// 	// print_r($_POST['owner']);
// 	// print_r($selectwartosc);
// 	// "delete from pliki where plik='$plik'"
// 	// $zp="DELETE FROM galeria WHERE nazwa='jk'";
// 	$usunzdj="DELETE FROM galeria WHERE nazwa='$selectwartosc'";

// 	print_r($usunzdj);
// 	// $conn->query($usunzdj);
// 	if (mysqli_query($conn, $usunzdj)){
// 		echo "Record deleted successfully" .  $conn->error;;
// 	  } else {
// 		echo "Error deleting record: " . $conn->error;
// 	  }

// 	// $zp="DELETE FROM galeria WHERE nazwa='$selectwartosc'";

// 	// $zapytaniees = mysqli_query($conn, $zpdfs);
	 
// 	// $result = $conn->query($zapytaniees);
	

// 	// print_r($zapytaniee);
// 	// print_r($zp);
// 	// print_r($result);
// 	// if ($result == TRUE) {
// 	// 	naglowek ('Pomyślnie edytowano');
		
		
		
// 	// 	} else {
// 	// 		naglowek  ("Błąd przy dodawaniu' .  $conn->error");
		
// 	// 	}

// // $name = $_POST['owner'];
// // echo 'You have chosen: ' . $name;
// }
?>


<?php



	$zapytanie=mysqli_query($conn , "SELECT  * from galeria  where id = '$id'" );

// $zapytanie= "SELECT  * from galeria  where id = '$id'" ;
// $result = $conn->query($zapytanie);
$wynik_t=mysqli_fetch_array($zapytanie);





?>
<form class="dodajform"
method="POST"><hr>
<h1>Edytuj zdjęcie</h1>

<li>
<input  class="inputphoto"type="" name="<?php echo $wynik_t['id']; ?>" value="<?php echo $wynik_t['id']; ?>">
</li>
<li>
<input  class="inputphoto" 
value="<?php echo $wynik_t['nazwa']; ?>">
</li>
<li>
<input  class="inputphoto"  value="<?php echo $wynik_t['opis'];?>">
</li>
<li>
<input class="inputphoto"  type="" value="<?php echo $wynik_t['link']; ?>">
</li>
<li>
<input class="inputphoto"  type="" value="<?php echo $wynik_t['rok']; ?>">
</li>
<button name="edytujzdj" class ="dodajzdj">Edytuj</button>


</form>


<?php
	
if(isset($_POST['edytujzdj'])){

	$link = $wynik_t['link'];
	$nazwa = $wynik_t['nazwa'];
	$opis = $wynik_t['opis'];
	$rok = $wynik_t['rok'];
	$sql = "UPDATE galeria SET
	nazwa = '$nazwa',
	opis = '$opis',
	link = '{$wynik_t["link"]}',
	rok = '{$wynik_t["rok"]}'
	WHERE id = $id";
$result = $conn->query($sql);
if ($result == TRUE) {
naglowek ('Pomyślnie edytowano');
header( "refresh:4;index.php?akcja=galeria" );
naglowek  ("Jakiś blad?' .  $conn->error");


} else {
echo  'Błąd przy edytowaniu: ';
naglowek  ("Błąd przy dodawaniu' .  $conn->error");

}



	//and then execute a sql query here
}
else {
// echo" dhur";
}



?>

</div>