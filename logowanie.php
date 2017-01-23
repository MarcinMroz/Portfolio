<?php
session_start();
require_once 'connect.php';



    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    
    $sql = "SELECT * FROM uzytkownicy WHERE user = '$login' AND pass = '$haslo'";
    
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

