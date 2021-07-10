<?php
naglowek("Edytuj  ");



	$zapytanie=mysqli_query($conn , "SELECT  * from galeria  where id = '$id'" );

// $zapytanie= "SELECT  * from galeria  where id = '$id'" ;
// $result = $conn->query($zapytanie);
$wynik_t=mysqli_fetch_array($zapytanie);





?>
<form action="index.php?akcja=admin&admin=dyscypliny&dyscypliny=zapisz" method="POST">
<h1>Edycja</h1>
<label for="nazwa">nazwa</label>
<li>
<input type="" value="<?php echo @$wynik_t['nazwa']; ?>">
</li>
<label for="opis">opis</label>
<li>
<input type="" value="<?php echo @$wynik_t['opis']; ?>">
</li>
<label for="link">Link</label>
<li>
<input type="" value="<?php echo @$wynik_t['link']; ?>">
</li>
<label for="rok">Rok</label>
<li>
<input type="" value="<?php echo @$wynik_t['rok']; ?>">
</li>
<button>Edytuj</button>