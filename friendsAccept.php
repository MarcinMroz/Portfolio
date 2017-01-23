<?php
session_start();
header('Content-Type: application/json; charset=UTF-8');

require_once 'connect.php';

    $query = 'INSERT INTO friends VALUES ('.$_SESSION['id'].', '.$_POST['autor'].')';
    $query2 = 'INSERT INTO friends VALUES ('.$_POST['autor'].', '.$_SESSION['id'].')';
    $query3 = 'DELETE FROM note WHERE author = '.$_POST['autor'] .' AND owner = '.$_SESSION['id'].' AND type=2';
     $query4 = 'DELETE FROM note WHERE author = '.$_SESSION['id'].' AND owner = '.$_POST['autor'].' AND type=2';
	
    $polaczenie->query($query);
    $polaczenie->query($query2);
    $polaczenie->query($query3);
    $polaczenie->query($query4);
    

?>