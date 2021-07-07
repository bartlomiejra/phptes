<!DOCTYPE html 
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="Serwis obsługi prac dyplomowych WBMiL - Politechnika Rzeszowska" />
	<meta name="Keywords" content="dyplom, praca dyplomowa, studia, politechnika rzeszowska, polibuda" />
	<title>SkateWorld</title>
	<link rel="Stylesheet" type="text/css" href="style.css" />

<style type="text/css">
#tresc ul
{
	margin: 0 0 15px 30px;
	list-style-type: square;
	color: #AAA;
}
</style>
</head>
<body>
<div id="calosc">

<div id="menu">
<p>
<a href="index.php"><font color="white"> Nowości </a></font><p>
<a href="index.php?akcja=inf_stud"><font color="white"> Informacje </a></font>
<a href="index.php?akcja=rej"><font color="white"> Rejestracja </a></font>


<?php
//-------------------Panel zalogowanego użytkownika
if (@$_SESSION['typ'])
{
?>
<hr>
<p style="font-weight: bold;"><font color="green">- Strefa Użytkownika -</p></font>
<hr>
<a href="index.php?akcja=dane"><font color="white"> Moje dane </a></font>
<a href="index.php?akcja=lista_tematow"><font color="white"> Lista tematow prac </a></font>
<a href="index.php?akcja=pliki"><font color="white"> Zarządzanie plikami prac </a></font>
<?php
}
?>

<?php
//-------------------Panel promotora/rencenzeta
if (@$_SESSION['typ']=='Admin' || @$_SESSION['typ']=='Pracownik'  )
{
?>
<hr>
<p style="font-weight: bold;"><font color="green">- Strefa Promotor/Recenenta -</p></font>
<hr>
<a href="index.php?akcja=tematy"><font color="white"> Tematy prac </a></font>
<?php
}
?>




<?php
//--------------------Panel administracyjny
if (@$_SESSION['typ']=='Admin')
{
?>
<hr>
<p style="font-weight: bold;"><font color="green"> - ADMINISTRACJA -</p></font>
<hr>
<a href="index.php?akcja=admin&admin=user"> <font color="white">Użytkownicy </a></font>
<a href="index.php?akcja=admin&admin=katedry"><font color="white"> Katedry </a></font>
<a href="index.php?akcja=admin&admin=dyscypliny"><font color="white"> Dyscypliny </a></font>
<?php
}
?>



</div>
<div style="float:right; with:400px; height: 30px; text-align: right; padding: 5px 5px 5px 5px;">
<?php

if (@!$_SESSION['email']) formlogin();
else echo '<a href="index.php?akcja=wylogowanie"> Wyloguj </a>';
echo'<form method="POST" action="http://127.0.0.1/dyplomy/index.php?akcja=error">
    <button class="error" type="submit">Zgłoś Problem </button>
</form>';

?>
</div>
<div id="naglowek">
<h2></h2>
<h1></h1>
</div>

<div id="srodek">