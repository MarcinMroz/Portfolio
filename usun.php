<?php
session_start();
require_once 'connect.php';

    $wlasciciel = $_SESSION['id'];
    $id = $_POST['noteId'];
    
    //$sql = "DELETE FROM `note` WHERE `note`.`id` = '$id' AND `note`.`owner` = '$wlasciciel';";
    $sql = "UPDATE note SET label = 2 WHERE note.id = '$id' AND note.owner = '$wlasciciel';";
    //echo($sql);
    if($rezultat = @$polaczenie->query($sql))
    {
        header('Location: index.php');
    }
    $polaczenie->close();
?>