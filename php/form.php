<?php
include 'dbconnect.php';
include 'functions.php';
include 'header.php';

//If form not submitted, display form.
if (!isset($_POST['submit'])){


    ?>
<div class="container">
    <form  method="post" action="form.php">
        <h2> Search articles:  </h2>
        <input class="form-control" type="text" name="titletosearch" />


        <input type="submit" class="btn btn-primary" name="submit" value="Go" />
        <button class="btn btn-primary" type="button" onclick="history.back();">Back</button>
    </form>
</div>
    <?php
//If form submitted, process input.
}else{

//Retrieve string from form submission.
    $city = $_POST['titletosearch'];
    //echo "titletosearch $city.";
    if (empty($_POST['titletosearch'])) echo "titletosearch empty";
    // if ($_POST['titletosearch'] == "" ) echo "titletosearch empty";
    else {
        //var_dump($_POST['titletosearch']);

        //echo "searching for" . $_POST['titletosearch'];




        $SearchString = "%".$_POST['titletosearch']."%";

        $SQL = $connection->prepare('SELECT * FROM article WHERE title LIKE :TITLE');
        $SQL->bindParam(':TITLE',$SearchString, PDO::PARAM_STR);
        $SQL->execute();
        $SQL->setFetchMode(PDO::FETCH_ASSOC);

        echo "<div class='d-flex justify-content-between'>
              <div>
              <h3> searching for <a style='color:blue;'>". $_POST['titletosearch']. "</a></h3>
              <p> We found " . $SQL->rowCount()." results in our database</p>
              </div>
              <div>
              <a class='button' href='form.php'>search</a>
              <a class='button' href='list.php'>home</a>
              </div>
              </div>";


        $result = $SQL->fetchAll();
        //var_dump($result);

        for($ArrayIndex = 0 ; $ArrayIndex < count($result);$ArrayIndex++ ) {



                //Loop and Create HTML


            echo"<div class='row'>";
                echo "<h1> ".$result[$ArrayIndex]['title']."</h1>";
                echo "<div class='flexy'>";
                echo "<p> ".$result[$ArrayIndex]['description']."</p>";
                echo "<img src='".$result[$ArrayIndex]['img']."'>";
                echo "</div>";
                echo "<a href='view.php?id=".$result[$ArrayIndex]['id']."'><p>".$result[$ArrayIndex]['title']."</p></a>";
                echo "<a href='delete.php?deleteid=".$result[$ArrayIndex]['id']."'>Delete</a>";

            echo "</div>";








        }
    }
}




?>

</body>
</html>