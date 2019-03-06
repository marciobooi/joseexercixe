<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        .row{background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
        padding: 2%;
        margin:5%;
        border-radius: 15px;
        border:1px solid grey;}

        .row:hover{
            box-shadow: 10px 0px 27px grey;
        }

        .flexy{
            display: flex;
            justify-content: space-between;
        }
        .button {
            display: block;
            width: 115px;
            height: 45px;
            background: #4E9CAF;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            margin-left: auto;
            margin-right: auto;
            margin-top:20px;
        }

        .error-message {
            padding: 7px 10px;
            background: #fff1f2;
            border: #ffd5da 1px solid;
            color: #d6001c;
            border-radius: 4px;
        }
        .success-message {
            padding: 7px 10px;
            background: #cae0c4;
            border: #c3d0b5 1px solid;
            color: #027506;
            border-radius: 4px;
        }
        .demo-table {
            width: 100%;
            border-spacing: initial;
            margin: 2px 0px;
            word-break: break-word;
            table-layout: auto;
            line-height: 1.8em;
            color: #333;
            border-radius: 4px;
            padding: 20px 40px;
        }
        .demo-table td {
            padding: 15px 0px;
        }
        .demoInputBox {
            padding: 10px 30px;
            border: #a9a9a9 1px solid;
            border-radius: 4px;
        }
        .btnRegister {
            padding: 10px 30px;
            background-color: #3367b2;
            border: 0;
            color: #FFF;
            cursor: pointer;
            border-radius: 4px;
            margin-left: 10px;
        }




    </style>
</head>
<body>
	<div class="container">

<?php if(isset($_SESSION) && !$_SESSION["loggedin"] == true) echo "<div class='row'><p><a href='login.php'> login.php  </a> </p></div>"; ?>

