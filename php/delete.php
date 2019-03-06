<?php

include 'dbconnect.php';
include 'functions.php';
include 'header.php';


// php code to Delete data from mysql database

if(isset($_GET['deleteid']))
{



    // connect to mysql
    $SQL = $connection->prepare("DELETE FROM `article` WHERE `id` = :ID");
    $SQL->bindParam(':ID', $_GET['deleteid'], PDO::PARAM_INT);
    $SQL -> execute();
    history.back();




}

?>