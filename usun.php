<?php
session_start();
require_once 'connect.php';

    $wlasciciel = $_SESSION['id'];
    $id = $_POST['noteId'];
    
    $sql = "DELETE FROM note WHERE note.label = 2 AND note.id = '$id' AND note.owner = '$wlasciciel';";
    $sql1 = "UPDATE note SET label = 2 WHERE note.id = '$id' AND note.owner = '$wlasciciel';";
    if($rezultat = @$polaczenie->query($sql))
    {
        header('Location: index.php');
    }
    if($rezultat = @$polaczenie->query($sql1))
    {
        header('Location: index.php');
    }
    $polaczenie->close();
?>