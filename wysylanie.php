<?php
session_start();
require_once 'connect.php';


    $id = ($_GET['mode'] == 'ajaxSendNote') ? $_GET['id'] : $_POST['noteIdSend'];
    $wlasciciel = $_SESSION['id'];
    $receiver = ($_GET['mode'] == 'ajaxSendNote') ? $_GET['receiver'] : $_POST['receiver'];
    
    $sql = "INSERT INTO note (author, content, data, owner, title, type, label) SELECT author, content, data, $receiver, title, type, label FROM note WHERE id = $id";
   
   if($rezultat = @$polaczenie->query($sql))
    {
        header('Location: index.php');
    }
    
    $polaczenie->close();


?>