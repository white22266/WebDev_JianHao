<?php
require "session_check.php";
require "db.php";

if (!isset($_GET['id'])) {
    header("Location: users_list.php");
    exit();
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM users WHERE id=$id";
mysqli_query($conn, $sql);

header("Location: users_list.php");
exit();
?>
