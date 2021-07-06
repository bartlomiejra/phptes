<?php
autoryzacja();
naglowek("Pliki mojej pracy dyplomowej");


@$pliki=$_GET['pliki'];
switch($pliki)
{

case ("usun"):
$plik=$_GET['usun'];
$zapytanie="delete from pliki where plik='$plik'";
if (!mysqli_query($zapytanie) || !unlink($plik))
{
Komentarz("blad","Problem z usunieciem pliku","Cos poszło nie tak");
header("Refresh: 2, index.php?akcja=pliki");
}
header("location: index.php?akcja=pliki");
break;



case ("zapisz"):
$autor=$_SESSION['email'];
$praca=$_POST['praca'];
$opis=$_POST['opis'];
$plik="pliki/".$praca."-".date('Y-m-d-H-i').".rar";
if (move_uploaded_file($_FILES['plik']['tmp_name'],$plik))
{

$zapytanie="insert into pliki values('','$autor','$praca','$plik','$opis')";
if (mysqli_query($zapytanie))
komentarz("OK","Plik został zapisany w bazie danych","Wszystko OK");
else
komentarz("blad","Problem z zapisem pliku","Coś poszło nie tak");
}
else
komentarz("blad","Problem z zapisem pliku","Coś poszło nie tak");
header("Refresh: 2, index.php?akcja=pliki");
break;


default:

echo "<form action='index.php?akcja=pliki&pliki=zapisz' method='POST' enctype='multipart/form-data'>";
$autor=$_SESSION['email'];
$zapytanie=mysqli_query("select * from tematy where autor='$autor'");
echo "Praca: <select name='praca'>";
while ($wynik=mysqli_fetch_array($zapytanie))
echo "<option value='".$wynik['id']."'>".$wynik['temat']."</option>";
echo "</select> ";
echo " <input type='file' name='plik' accept='.rar' ><p>";
echo "Opis: <input type='text' name='opis' size='85'>";
echo "<hr><input type='submit' value='ZAPISZ' >";
echo "</form>";
echo "<hr>";

$zapytanie=mysqli_query("select * from tematy where autor='$autor'");
while ($wynik=mysqli_fetch_array($zapytanie))
{
echo "<h2>".$wynik['temat']."</h2>";
$id_praca=$wynik['id'];
$zapytanie_pliki=mysqli_query("select * from pliki where praca='$id_praca'");
echo "<table width='100%'>";
while ($wynik_pliki=mysqli_fetch_array($zapytanie_pliki)) 
{
echo "<tr>";
echo "<td><a href='".$wynik_pliki['plik']."'>".$wynik_pliki['plik']."</a></td>";
echo "<td>".$wynik_pliki['opis']."</td>";
echo "<td><a href='index.php?akcja=pliki&pliki=usun&usun=".$wynik_pliki['plik']."'>USUŃ</a></td>";
echo "</tr>";
}
echo "</table>";
}


}
?>