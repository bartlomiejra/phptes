<?php
$data = $_POST['data'];
$tresc = $_POST['tresc'];
$autor = $_POST['autor'];
$id_newsa = $_POST['id_newsa'];
$hash = $_POST['hash'];
$ip = $_POST['ip'];
$host = $_POST['host'];

if($autor && $tresc && $data && $id_newsa) {
   
// łączymy się z bazą danych
$connection = @mysqli_connect('xxx', 'xxx', 'xxx')
or die('Brak połączenia z serwerem mysqli');
$db = @mysqli_select_db('xxx', $connection)
or die('Nie mogę połączyć się z bazą danych');
 
// dodajemy rekord do bazy
if (!$_SESSION['adduser'] || $_POST['hash'] != $_SESSION['adduser']){
$_SESSION['adduser'] = $_POST['hash']; //sprawdzamy, czy użytkownik nie odświeżył strony
$ins = @mysqli_query("INSERT INTO komentarze SET autor='$autor', tresc='$tresc', data='$data', id_newsa='$id_newsa', href='$href', ip='$ip', host='$host'");

echo 'Komentarz dodany do kolejki oczekujących';
                                               
}
else //jeżeli odświeżył wyświetlamy komunikat
{
echo 'Ten komentarz został już dodany';
}

?>