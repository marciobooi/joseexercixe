<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';

include 'header.php';



$result = GetFromDBWithId($_GET['id'],$connection);

echo "<div class='row'>";

for ($count = 0; $count < count($result); $count++) { 
	if(is_array($result[$count]) == true ) {
	//Loop And FillIn HTML//////////////////////////

        ?>


            <div class="form-group cc">

                <button class="btn btn-default" type="button" onclick="history.back();">Back</button>
            </div>


        <?php


        echo "<h1> ".$result[$count]['title']."</h1>";
        echo "<p> ".$result[$count]['description']."</p>";
        echo "<img src='".$result[$count]['img']."'>";
        echo "<a href='view.php?id=".$result[$count]['id']."'><p>".$result[$count]['title']."</p></a>";
	}
	if($_SESSION["loggedin"] == true) echo "<p><a href='edit.php?id=".$result[$count]['id']."'</a> edit.php </p>";
}

echo "</div class='row'>";

include 'footer.php';
    
