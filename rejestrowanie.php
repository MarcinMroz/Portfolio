<?php
session_start();
require_once 'connect.php';

    
  $sekret = "6LcprRIUAAAAAMwd9L4HeAeF1GYvYaXBdni6oPUB";
  $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
  $odpowiedz = json_decode($sprawdz);
    
  $login = $_POST['login'];
  $mail = $_POST = ['email'];
  $haslo = $_POST['pass'];

    
    
    
    
    
    
    if($rezultat = @$polaczenie->query($sql))
    {
        $ilu_userow = $rezultat->num_rows;
        if($ilu_userow>0)
        {
            $_SESSION['zalogowany'] = true;
            
            $wiersz = $rezultat->fetch_assoc();
            $_SESSION['id'] = $wiersz['id'];
            $_SESSION['user'] = $wiersz['user'];
            
            $rezultat->free_result();
            header('Location:index.php');
            
        }
        else
        {
            $_SESSION['blad'] = '<span style = " color: red">Nieprawidłowe dane</span>';
            header('Location: index.php');
        }
    }
    
    $polaczenie->close();


?>

