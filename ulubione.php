<?php
session_start();
require_once 'connect.php';

    $wlasciciel = $_SESSION['id'];
    $id = $_POST['noteId'];
    
    $sql = "UPDATE note SET label = 1 WHERE note.id = '$id' AND note.owner = '$wlasciciel';";
    if($rezultat = @$polaczenie->query($sql))
    {
        header('Location: index.php');
    }
    $polaczenie->close();
?>