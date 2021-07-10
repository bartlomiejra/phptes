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

	<form    class="galeria zdjec" method="POST" action="http://127.0.0.1/dyplomy/index.php?akcja=usun" >
<div class="przyciski">
	<button class="usun" name="<?php echo $zapytanieZdj['id']; ?>"
	
	 id="<?php echo $zapytanieZdj['id']; ?>">Usun
	</button>
</form>
<form  method="POST"
<?php
$id =$zapytanieZdj['id'];
print_r($id);
?>
	action="http://127.0.0.1/dyplomy/index.php?akcja=edytuj"


 >
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



// if(isset($_POST['send_message_btn'])){
// 	$subject = $_POST['subject'];
// 	$txt = $_POST['txt'];
// 	$headers = $_POST['headers'];
// 	$msg = $_POST['msg'];
// 	$usermail = $_POST['usermail'];
// print_r($msg);

// 	$to = "administrator@gmail.com";
// 	$subject;
// 	$txt ;
// 	$headers = "Od: '${usermail}' email";
	 
// 	 mail($to, $subject,  $headers) ;
// 		echo "Email  sent to ...";
// 		echo"Mail wysłany";
	
// }




?> 
<form action="http://127.0.0.1/dyplomy/index.php?akcja=dodanozdj" method="POST">

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
<?php

if(isset($_POST['dodajzdj
']))
{		
	
	print_r("działa");
	echo "działa";
	
    // $fullname = $_POST['fullname'];
    // $age = $_POST['age'];

    // $insert = mysqli_query($db,"INSERT INTO `tblemp`(`fullname`, `age`) VALUES ('$fullname','$age')");

    // if(!$insert)
    // {
    //     echo mysqli_error();
    // }
    // else
    // {
    //     echo "Records added successfully.";
    // }
}
// mysqli_close($db); // Close connection


?>