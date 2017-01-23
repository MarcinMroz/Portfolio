<?php
session_start();
header('Content-Type: application/json; charset=UTF-8');

require_once 'connect.php';
$label = intval(trim($_GET['label']));
//echo $label;
/*if($label==0)
     $label = 'note.label = 0 OR note.label = 1';
else $label = 'note.label = 2';*/
if ($label==0)
     $label = 'note.label = 0 OR note.label = 1';
else if ($label==1) $label = 'note.label = 1';
else if ($label==2) $label = 'note.label = 2';
$query='SELECT note.id, note.title, note.type, note.owner, note.content, note.data, note.label, note.author, uzytkownicy.user FROM note note INNER JOIN uzytkownicy uzytkownicy ON note.author=uzytkownicy.id  where note.owner = "'.$_SESSION['id'].'" AND ('.$label.') ORDER BY note.data DESC';
//echo($query);
$polaczenie->query("SET NAMES 'utf8'");
$query=$polaczenie->query($query);
$linia='[';


while($row=$query->fetch_assoc())
{
    $content = preg_replace('/\s+/', ' ', trim(nl2br($row['content'])));
  $linia .='{"id":'.$row['id'].',"autor":'.$row['author'].',"title":"'.$row['title'].'", "type": '.$row['type'].',"owner": '.$row['owner'].',"content":"'.$content.'","NazwaAutora":"'.$row['user'].'","label":'.$row['label'].',"data":"'.$row['data'].'"},';
  
   
}
$linia = substr($linia, 0, strlen($linia)-1);
$linia.=']';       
echo $linia;
?>