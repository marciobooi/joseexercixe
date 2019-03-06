<?php
include 'dbconnect.php';
include 'functions.php';
include 'header.php';

$password_err = "";
$username_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
var_dump($_POST);
    /* Form Required Field Validation */
    foreach ($_POST as $key => $value) {
        if (empty($_POST[$key])) {
            $error_message = "All Fields are required";
            break;
        }
    }
    /* Password Matching Validation */
    if ($_POST['password'] != $_POST['confirm_password']) {
        $error_message = 'Passwords should be same<br>';
    }





        //FillIn SQL with the Bind params :TITLE :DESCRIPTION :IMG
        $SQL = $connection->prepare("INSERT INTO users (username, password) VALUES (:USERNAME, :PASSWORD)");
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $SQL->bindParam(':USERNAME', $_POST['username'], PDO::PARAM_STR);
        $SQL->bindParam(':PASSWORD',$hash, PDO::PARAM_STR);
        $SQL->execute();
        $updatedb = $SQL->fetchAll();

}
include 'header.php';

?>
<div class="wrapper">
    <h2>Register</h2>
    <form name="frmRegistration" method="post" action="">
        <table border="0" width="500" align="center" class="demo-table">
            <?php if(!empty($success_message)) { ?>
                <div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
            <?php } ?>
            <?php if(!empty($error_message)) { ?>
                <div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
            <?php } ?>
            <tr>
                <td>User Name</td>
                <td><input type="text" class="demoInputBox" name="username"></td>
            </tr>


            <tr>
                <td>Password</td>
                <td><input type="password" class="demoInputBox" name="password" value=""></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" class="demoInputBox" name="confirm_password" value=""></td>
            </tr>
        </table>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="REGISTER">
            <a type="button" class="btn btn-primary" href="login.php">Back</a>
        </div>
    </form>
</div>
