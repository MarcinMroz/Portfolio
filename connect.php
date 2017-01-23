<?php
    $host = "mysql.futurehost.pl";
    $db_user = "i4737_mroz1";
    $db_password = "Qnzcjskx7YOn";
    $db_name = "i4737_mroz1";
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    $polaczenie->query("SET NAMES 'utf8'");
if($polaczenie->connect_errno!=0)
{
    die("Error:".$polaczenie->connect.errno);
}
?>