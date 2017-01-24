<?php
session_start();
require_once 'connect.php';

    
  $sekret = "6LcprRIUAAAAAMwd9L4HeAeF1GYvYaXBdni6oPUB";
 // $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
 // $odpowiedz = json_decode($sprawdz);
    
  $login = $_POST['login'];
  $mail = $_POST = ['email'];
  $haslo = $_POST['pass'];

  $sql = "INSERT INTO uzytkownicy (id, user, pass, email) VALUES (NULL, '$login', '$haslo', '$mail')";
    if($rezultat = @$polaczenie->query($sql))
    {
            header('Location: index.php');
    }
    
    $polaczenie->close();


?>

