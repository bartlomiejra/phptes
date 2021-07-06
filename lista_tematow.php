<?php
autoryzacja();
naglowek("Lista tematów prac dyplomowych");


@$lista_tematow=$_GET['lista_tematow'];
switch ($lista_tematow)
{


case("szczegoly");
@$id=$_GET['szczegoly'];
$zapytanie=mysqli_query($conn , "select * from tematy where id='$id'");
$wynik=mysqli_fetch_array($zapytanie);

//identyfikacja promotora
$promotor=$wynik['promotor'];
$zapytanie_p=mysqli_query($conn , "select * from users where email='$promotor'");
$wynik_p=mysqli_fetch_array($zapytanie_p);
echo "Promotor: ".$wynik_p['tytul']." ".$wynik_p['imie']." ".$wynik_p['nazwisko']." - ";

echo "e-mail:".$wynik['promotor']."<p>";

echo "Typ: ".$wynik['typ']."<p>";
echo "Rok akademicki: ".$wynik['r_ak']."<p>";
 
echo "Dyscyplina: ".$wynik['dyscyplina']."<p>";
echo "Katedra: ".$wynik['katedra']."<p>"; 
echo "Opis pracy: ".$wynik['opis']."<p>";
echo "Słowa Kluczowe: ".$wynik['slowa_klucz']."<p>";
echo "Data rejestracji: ".$wynik['d_rej']."<p>";
echo "Recenzent: ".$wynik['recenzent']."<p>";


break;





default:
echo "<fieldset><Legend>Lista tematów prac </legend>";
$zapytanie=mysqli_query($conn , "select * from tematy where aktywna='TAK' and akceptacja='NIE'");

echo "<table style='width: 100%;'>";
while ($wynik=mysqli_fetch_array($zapytanie))
{
echo "<tr>";
$id=$wynik['id'];
echo "<td><a href='index.php?akcja=lista_tematow&lista_tematow=szczegoly&szczegoly=".$id."'>".$wynik['temat']."</a><br>";
//identyfikacja promotora
$promotor=$wynik['promotor'];
$zapytanie_p=mysqli_query($conn , "select * from users where email='$promotor'");
$wynik_p=mysqli_fetch_array($zapytanie_p);
echo $wynik_p['tytul']." ".$wynik_p['imie']." ".$wynik_p['nazwisko'];
echo "</td>";
echo "<td>".$wynik['typ']."<br>".$wynik['r_ak']."</td>";
echo "<td>".$wynik['katedra']."</td>";
}
echo "</table></fieldset><p>";

}
?>

