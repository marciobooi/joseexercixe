<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';
include 'header.php';




//FillIn SQL //////////////////////
$result = GetFromDB($connection);
/*$SQL = $connection->prepare('SELECT * FROM `article`');
$SQL->execute();
$SQL->setFetchMode(PDO::FETCH_ASSOC);
print_r($SQL->rowCount());
$result = $SQL->fetchAll();*/

//var_dump($result);
if($_SESSION["loggedin"] == true) echo "<div><p class='flexy'><a class='button' href='new.php' > NEW </a>
<a class='button' href='form.php'>search</a>
<a class='button' href='login.php'>Exit</a></p></div>";

for ($count = 0; $count < count($result); $count++) { 
	echo "<div class='row'>";

  
	if(is_array($result[$count]) == true ) {
	//Loop and Create HTML


        echo "<h1> ".$result[$count]['title']."</h1>";
        echo "<div class='flexy'>";
        echo "<p> ".$result[$count]['description']."</p>";
        echo "<img src='".$result[$count]['img']."'>";
        echo "</div>";
        echo "<div>";
        echo "<a href='view.php?id=".$result[$count]['id']."'><p>".$result[$count]['title']."</p></a>";
        echo "<a href='delete.php?deleteid=".$result[$count]['id']."'>Delete</a>";
        echo "</div>";


	}
	echo "</div>";

}



