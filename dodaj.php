<?php
session_start();
require_once 'connect.php';

    $tytul = $_POST['title'];
    $tresc = $_POST['text'];
    $id = $_SESSION['id'];
    if(isset($_POST['owner'])){
        $tytul = 'Zaproszenie';
        $tresc = "Użytkownik ".$_SESSION['user']." wysłał ci zaproszenie do znajomych.";
    }
    $wlasciciel = (isset($_POST['owner'])) ? $_POST['owner'] : $_SESSION['id'];
    
    if( $_POST['Itype']=='notatki')
       $typ = 1;
    else  if( $_POST['Itype']=='zakupy')
        $typ = 0;
    else if( $_POST['Itype']=='zaproszenie')
        $typ = 2;
    $sql = "INSERT INTO `note` (`id`, `author`, `title`, `type`, `owner`, `content`, `data`, `label`) VALUES (NULL, '$id', '$tytul', $typ, '$wlasciciel', '$tresc', NOW(), '0')";
            
    
    if($rezultat = @$polaczenie->query($sql))
    {
        header('Location: index.php');
    }
    
    $polaczenie->close();
?>

