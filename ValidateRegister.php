<?php
session_start();
header('Content-Type: application/json; charset=UTF-8');

require_once 'connect.php';
$query='SELECT uzytkownicy.id FROM uzytkownicy WHERE uzytkownicy.user = "'.$_POST['user'].'"';
$query2='SELECT uzytkownicy.id FROM uzytkownicy WHERE uzytkownicy.email = "'.$_POST['email'].'"';
$polaczenie->query("SET NAMES 'utf8'");
$query=$polaczenie->query($query);
$query2=$polaczenie->query($query2);
$linia='[';
if($query->num_rows > 0){
  $linia .='{"user": 1, ';
}
else $linia .='{"user": 0, ';
if($query2->num_rows > 0){
    $linia .='"email":1}';
}
else $linia .='"email":0}';
$linia.=']';       
echo $linia;
?>