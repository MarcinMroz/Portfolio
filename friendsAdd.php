<?php
session_start();
header('Content-Type: application/json; charset=UTF-8');

require_once 'connect.php';

    $email = $_GET['e'];
    $query='SELECT uzytkownicy.id, uzytkownicy.user, uzytkownicy.email FROM uzytkownicy uzytkownicy where uzytkownicy.email = "'.$email.'"';
    //$polaczenie->query("SET NAMES 'utf8'");
    $query=$polaczenie->query($query); 
    $linia='[';

    while($row=$query->fetch_assoc())
    {
      $linia .='{"id": "'.$row['id'].'", "user":"'.$row['user'].'","email":"'.$row['email'].'"},';

    }
    $linia = substr($linia, 0, strlen($linia)-1);
    $linia.=']';       
    echo $linia;

?>