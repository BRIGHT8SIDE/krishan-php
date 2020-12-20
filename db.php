<?php

$servername = "localhost";
$username  = "root";
$password = "";
$dbname = "users_db";


$connection = mysqli_connect($servername, $username, $password, $dbname);


if (mysqli_connect_errno()) {
    die('Database connection failed ' . mysqli_connect_error());
}
