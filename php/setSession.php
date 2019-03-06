<?php

session_start();

echo "Name for Session". $_GET['nameforsession'];
$_SESSION["nameforsession"] = $_GET['nameforsession'];