<?php
prac_autoryzacja();
naglowek("Zarządzanie tematami prac");

echo "<a href='index.php?akcja=tematy&tematy=edycja'> Dodaj temat pracy </a><p>";

@$tematy=$_GET['tematy'];
switch ($tematy)
{

case ("usun"):
@$id=$_GET['usun'];
$zapytanie="delete from tematy where id='$id'";
if (mysqli_query($zapytanie))
komentarz ("OK","Usunięcie tematu","Temat został porawnie usunięty z bazy danych");
else
komentarz("blad","Problem z usunięciem","Coś poszło nie tak.");
header("refresh: 2; index.php?akcja=tematy");
break;


case ("zapisz"):
$temat=$_POST['temat']; $promotor=$_POST['promotor'];
$typ=$_POST['typ']; $r_ak=$_POST['r_ak'];$dyscyplina=$_POST['dyscyplina'];
$katedra=$_POST['katedra'];$opis=$_POST['opis'];$slowa_klucz=$_POST['slowa_klucz'];
$d_rej=$_POST['d_rej'];$autor=$_POST['autor'];$recenzent=$_POST['recenzent'];
$obrona=$_POST['obrona'];$akceptacja=$_POST['akceptacja'];
$aktywna=$_POST['aktywna'];

if (@$_POST['id'])
{
$id=$_POST['id'];
$zapytanie="update tematy set temat='$temat', promotor='$promotor', typ='$typ', r_ak='$r_ak', dyscyplina='$dyscyplina', katedra='$katedra', opis='$opis', slowa_klucz='$slowa_klucz', d_rej='$d_rej', autor='$autor', recenzent='$recenzent', obrona='$obrona', akceptacja='$akceptacja',aktywna='$aktywna' where id='$id'";

if (mysqli_query($zapytanie))
{ 
komentarz ("OK","Poprawa danych tematu pracy", "Dane zostały poprawnie zapisane do bazy tematów");
header ("refresh: 2; index.php?akcja=tematy");
}
else
komentarz("blad","Problem z zapisaniem danych","Coś poszło nie tak.");
break;
}
else 
{

$zapytanie=mysqli_query("select * from tematy where tytul='$temat'");

if (@mysqli_num_rows($zapytanie)>'0')
{
komentarz ("blad","Powtórzenie tematu pracy","Taki temat pracy jest już zarejestrowany w bazie tematów");
break;
}
else
{
$zapytanie="insert into tematy values('','$temat','$promotor','$typ','$r_ak','$dyscyplina','$katedra','$opis','$slowa_klucz','$d_rej','$autor','$recenzent','$obrona','$akceptacja','$aktywna')";
if (mysqli_query($zapytanie))
{
komentarz("OK","Wprowadzenie danych do bazy","Temat został przyjęty i zapisany do bazy danych");
header ("refresh: 2; index.php?akcja=tematy");
}
else
komentarz ("blad","Błąd zapisu w bazie danych.","Coś poszło nie tak");
}
}

break;


case ("edycja"):
if (@$_GET['edycja'])
{
@$id=$_GET['edycja'];
$zapytanie_t=mysqli_query("select * from tematy where id='$id'");
$wynik_t=mysqli_fetch_array($zapytanie_t);
}

?>
<form action="index.php?akcja=tematy&tematy=zapisz" method="POST">
<?php if (@$id) echo "<input type='hidden' name='id' value='".$id."'>"; ?>

Tytuł: <input type="text" name="temat" size="73" value="<?php echo @$wynik_t['temat']; ?>"><p>
Promotor: <input type="text" name="promotor" value="<?php echo $_SESSION['email']; ?>" size="73"><p>
Typ: <select name="typ">
<option><?php echo @$wynik_t['typ']; ?></option>
<option> Licencjacka </option>
<option> Inżynierska </option>
<option> Magisterska</option>
</select><p>
Rok akademicki: <select name="r_ak">
<option><?php echo @$wynik_t['r_ak']; ?></option>
<option> <?php echo DATE('Y'),"/",DATE('y')+1; ?> </option>
<option><?php echo DATE('Y')+1,"/",DATE('y')+2; ?> </option>
<option><?php echo DATE('Y')+2,"/",DATE('y')+3; ?></option>
</select><p> 
Dyscyplina: <select name="dyscyplina">
<option><?php echo @$wynik_t['dyscyplina']; ?></option>
<?php
$zapytanie_d=mysqli_query("select * from dyscyplina");
while ($wynik_d=mysqli_fetch_array($zapytanie_d))
{ echo "<option>".$wynik_d['nazwa']."</option>"; }
?>
</select><p> 
Katedra: <select name="katedra">
<option><?php echo @$wynik_t['katedra']; ?></option>
<?php
$zapytanie_k=mysqli_query("select * from katedra");
while ($wynik_k=mysqli_fetch_array($zapytanie_k))
{ echo "<option>".$wynik_k['nazwa']."</option>"; }
?>
</select><p> 
Opis pracy: <textarea rows="10" cols="75" name="opis"><?php echo @$wynik_t['opis']; ?></textarea><p>
Słowa Kluczowe: <input type="text" name="slowa_klucz" size="73" value="<?php echo @$wynik_t['slowa_klucz']; ?>"><br>
<small> Słowa kluczowe przedzielone przecinkami </small>
<p>
Data rejestracji: <input type="text" name="d_rej" placeholder="YYYY-MM-DD" value="<?php 
 if (@$_GET['edycja']) echo @$wynik_t['d_rej']; else echo DATE('Y-m-d'); ?>"><p>
Autor: <input type="text" name="autor" size="73"><p>
Recenzent: <select name="recenzent">
<option><?php echo @$wynik_t['recenzent']; ?></option>
<?php
$zapytanie_r=mysqli_query("select * from users where typ='Pracownik' or typ='Admin'");
while ($wynik_r=mysqli_fetch_array($zapytanie_r))
{ 
echo "<option value=".$wynik_r['email'].">".$wynik_r['imie']." ".$wynik_r['nazwisko']." </option>"; }
?>
</select><p>
Obrona: <input type="text" name="obrona" placeholder="YYYY-MM-DD" ><p>
Akceptacja: <select name="akceptacja">
<option><?php echo @$wynik_t['akceptacja']; ?></option>
<option> NIE </option>
<option> TAK </option>

</select>
Aktywna: <select name="aktywna">
<option><?php echo @$wynik_t['aktywna']; ?></option>
<option> NIE </option>
<option> TAK </option>

</select><p>
<hr>
<input type="submit" value="ZAPISZ">
</form>
<div style='text-align: right; color: red; font-weight: bold;'><a href='index.php?akcja=tematy&tematy=usun&usun=<?php echo $id; ?>'> USUŃ TEMAT </a></div>
<?php
break;


default:
$promotor=$_SESSION['email'];

echo "<fieldset><Legend>Lista <b>AKTYWNYCH</b> tematów prac </legend>";
$zapytanie=mysqli_query("select * from tematy where aktywna='TAK' and promotor='$promotor'");

echo "<table style='width: 100%;'>";
while ($wynik=mysqli_fetch_array($zapytanie))
{
echo "<tr>";
$id=$wynik['id'];
echo "<td><a href='index.php?akcja=tematy&tematy=edycja&edycja=".$id."'>".$wynik['temat']."</a></td>";
echo "<td>".$wynik['typ']."</td>";
echo "<td>".$wynik['r_ak']."</td>";
}
echo "</table></fieldset><p>";

echo "<fieldset><Legend>Lista <b> NIE AKTYWNYCH</b> tematów prac </legend>";
$zapytanie=mysqli_query("select * from tematy where aktywna='NIE' and promotor='$promotor'");

echo "<table style='width: 100%;'>";
while ($wynik=mysqli_fetch_array($zapytanie))
{
echo "<tr>";
$id=$wynik['id'];
echo "<td><a href='index.php?akcja=tematy&tematy=edycja&edycja=".$id."'>".$wynik['temat']."</a></td>";
echo "<td>".$wynik['typ']."</td>";
echo "<td>".$wynik['r_ak']."</td>";


echo "</tr>";
}
echo "</table></fieldset>";

}
?>
