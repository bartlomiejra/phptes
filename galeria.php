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

<div class="przyciski">
	
</form>
<td>

<?php
$id =$zapytanieZdj['id'];
print_r($id);
?>

	
	
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
<h1 class="mar">Usuń zdjęcie</h1>
	<select class="owner" name="owners">
<?php 
$sql = mysqli_query($conn, "SELECT nazwa FROM galeria");
while ($row = $sql->fetch_assoc()){
	?>
	 <option value="<?php echo $row['nazwa'] ?>" > <?php echo  $row['nazwa'] ?> </option>
<?php
}
?>
</select><br>
<button class="usunzdj"name="usunzdj">Usuń</button>
</form>


<?php
	$zapytanie=mysqli_query($conn , "SELECT  * from galeria  where id = '$id'" );

$wynik_t=mysqli_fetch_array($zapytanie);





?>
<form class="dodajform" 
method="POST"><hr>
<h1>Edytuj zdjęcie</h1>

<li>

<li>
<select class="inputphoto" name="names">
<?php 
$sql = mysqli_query($conn, "SELECT   nazwa FROM galeria");
while ($row = $sql->fetch_assoc()){
	?>
	 <option value="<?php echo $row['nazwa'] ?>" > <?php echo  $row['nazwa'] ?> </option>
<?php
}
?>
</select><br>
</li>
<li>
<input  class="inputphoto" placeholder="Dodaj Nowy Opis" name="opiszdj" 
</li>
<li>
<input class="inputphoto" placeholder="Dodaj Nowy Link"  type="" name="linkzdj">
</li>
<li>
<input class="inputphoto"  placeholder="Edytuj Rok "  type=""name="rokzdj" >
</li>
<button name="edytujzdj" class ="dodajzdj">Edytuj</button>


</form>




</div>


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
	// header( "refresh:3;index.php?akcja=galeria" );


} else {
	naglowek  ("Błąd przy edytowaniu' .  $conn->error");

}
}else{
	naglowek ("NIepoprawnie wypełniony formularz");
	echo "Użytkowniku, najwidoczniej masz problem z wypełnieniem formularza, spróbuj jeszcze raz :) ";
	// header( "refresh:3;index.php?akcja=galeria" );
}





?>