<?php


naglowek("Edytuj  ");

$id = 2;


	$zapytanie=mysqli_query($conn , "SELECT  * from galeria  where id = '$id'" );

// $zapytanie= "SELECT  * from galeria  where id = '$id'" ;
// $result = $conn->query($zapytanie);
$wynik_t=mysqli_fetch_array($zapytanie);





?>
<form 
method="POST">
<label for="nazwa">id</label>
<li>
<input  class="inputphoto"type="" name="<?php echo $wynik_t['id']; ?>" value="<?php echo $wynik_t['id']; ?>">
</li>
<label for="nazwa">nazwa</label>
<li>
<input  class="inputphoto" 
value="<?php echo $wynik_t['nazwa']; ?>">
</li>
<label for="opis">opis</label>
<li>
<input  class="inputphoto"  value="<?php echo $wynik_t['opis'];?>">
</li>
<label for="link">Link</label>
<li>
<input class="inputphoto"  type="" value="<?php echo $wynik_t['link']; ?>">
</li>
<label for="rok">Rok</label>
<li>
<input class="inputphoto"  type="" value="<?php echo $wynik_t['rok']; ?>">
</li>
<button name="edytujzdj" class ="edytujzdj">Edytuj</button>


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