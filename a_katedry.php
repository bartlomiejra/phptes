<?php
admin_autoryzacja();
naglowek("Zarządzanie Katedrami (słowniki)");

echo "<a href='index.php?akcja=admin&admin=katedry&katedry=edycja'> Dodaj nową katedrę</a><p>";

@$katedry=$_GET['katedry'];
switch ($katedry)
{

case ("usun"):
@$id=$_GET['usun'];
$zapytanie="delete from katedry where id='$id'";
if (mysqli_query($zapytanie))
komentarz ("OK","Usunięcie katedry","Katedra została porawnie usunięta z bazy danych");
else
komentarz("blad","Problem z usunięciem","Coś poszło nie tak.");
header("refresh: 2; index.php?akcja=admin&admin=katedry");
break;


case ("zapisz"):
$nazwa=$_POST['nazwa'];$opis=$_POST['opis'];

if (@$_POST['id'])
{
$id=$_POST['id'];
$zapytanie="update katedra set nazwa='$nazwa', opis='$opis'where id='$id'";

if (mysqli_query($zapytanie))
{ 
komentarz ("OK","Poprawa danych katedry", "Dane zostały poprawnie zapisane do bazy katedr");
header ("refresh: 2; index.php?akcja=admin&admin=katedry");
}
else
komentarz("blad","Problem z zapisaniem danych","Coś poszło nie tak.");
break;
}
else 
{

$zapytanie=mysqli_query("select * from katedra where nazwa='$nazwa'");

if (@mysqli_num_rows($zapytanie)>'0')
{
komentarz ("blad","Powtórzenie nazwy katedry","Katedra o takiej nazwie już istnieje w bazie danych.");
break;
}
else
{
$zapytanie="insert into katedra values('','$nazwa','$opis')";
if (mysqli_query($zapytanie))
{
komentarz("OK","Wprowadzenie danych do bazy","Katedra została przyjęty i zapisana do bazy danych");
header ("refresh: 2; index.php?akcja=admin&admin=katedry");
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
$zapytanie_t=mysqli_query("select * from katedra where id='$id'");
$wynik_t=mysqli_fetch_array($zapytanie_t);
}

?>
<form action="index.php?akcja=admin&admin=katedry&katedry=zapisz" method="POST">
<?php if (@$id) echo "<input type='hidden' name='id' value='".$id."'>"; ?>

Tytuł: <input type="text" name="nazwa" size="73" value="<?php echo @$wynik_t['nazwa']; ?>"><p>
Opis: <textarea rows="10" cols="75" name="opis"><?php echo @$wynik_t['opis']; ?></textarea><p>
<hr>
<input type="submit" value="ZAPISZ">
</form>
<div style='text-align: right; color: red; font-weight: bold;'><a href='index.php?akcja=admin&admin=katedry&katedry=usun&usun=<?php echo $id; ?>'> USUŃ KATEDRĘ </a></div>
<?php
break;


default:

echo "<fieldset><Legend><b> Lista Katedr </b> </legend>";
$zapytanie=mysqli_query("select * from katedra");

echo "<table style='width: 100%;'>";
while ($wynik=mysqli_fetch_array($zapytanie))
{
echo "<tr>";
$id=$wynik['id'];
echo "<td><a href='index.php?akcja=admin&admin=katedry&katedry=edycja&edycja=".$id."'>".$wynik['nazwa']."</a></td>";
echo "</tr>";
}
echo "</table></fieldset><p>";


}
?>
