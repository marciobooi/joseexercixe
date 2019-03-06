<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';

if($_SESSION["loggedin"] == true) {
	
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {


//AddToDB //////////////////////////////////////
        $SQL = $connection->prepare('UPDATE article set title=:TITLE,description=:DESCRIPTION, img=:IMG where id=:ID');
        if(!empty($_FILES['image']['tmp_name'])) {
            //echo "Hello here" . $_FILES['image']['tmp_name'];
            $FileNameToDB = ProcessUploadedFile($_FILES['image']);
            $SQL->bindParam(':IMG', $FileNameToDB, PDO::PARAM_STR);

        } else {
            //echo "Hello here else";
            $SQL = $connection->prepare('UPDATE article set title=:TITLE,description=:DESCRIPTION where id=:ID');

//            $SQL->bindParam(':IMG', $FileNameToDB, PDO::PARAM_STR);

        }

        $SQL->bindParam(':ID', $_POST['id'], PDO::PARAM_INT);
        $SQL->bindParam(':TITLE', $_POST['title'], PDO::PARAM_STR);
        $SQL->bindParam(':DESCRIPTION', $_POST['description'], PDO::PARAM_STR);
        $SQL -> execute();
        $updatedb = $SQL->fetchAll();





//ProcessFile
		
		
if($SQL->execute()) {
header("Location: view.php?id=$_POST[id]"); /* Redirect browser */
}
else {
echo "Error in Insert";
print_r($SQL->errorInfo());
$SQL->debugDumpParams();
var_dump($_POST);
}

}

else {
include 'header.php';


$result = GetFromDBWithId($_GET['id'],$connection);
var_dump($result);
?>
		<form method="POST" action="edit.php" enctype="multipart/form-data">
		    <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?? ''; ?>"
			<div class="form-group">
			    <label for="title">Tip a title for your project</label>
			    <input class="form-control" type="text" name="title" value="<?php echo $result[0]['title'] ?? ''; ?>"></input>
			</div>
			
			<div class="form-group">
			    <label for="description">Define a description for your project</label>
			    <textarea class="form-control" name="description"><?php echo $result[0]['description'] ?? ''; ?></textarea>
			</div>
		
			<div class="form-group">
			    <label for="image">Choose an image for your project</label>
			    <input class="form-control" type="file" name="image"></input>
			</div>
			<div class="form-group cc">
		    	<button class="btn btn-default" type="submit">Submit</button>
                <button class="btn btn-default" type="button" onclick="history.back();">Back</button>
			</div>
		</form>

<?php
}

	
	}
	


