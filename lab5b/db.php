<?php
$host = "localhost";
$user = "root";       // change if you set a different MySQL user
$pass = "";           // change if you have a MySQL password
$dbname = "Lab_5b";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
