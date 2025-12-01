<?php
session_start();
require "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = mysqli_real_escape_string($conn, $_POST['matric']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE matric='$matric' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['matric'] = $row['matric'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['accessLevel'] = $row['accessLevel'];

        header("Location: users_list.php");
        exit();
    } else {
        $error = "Invalid matric or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 350px; margin: 50px auto; border: 1px solid #ccc; padding: 20px; }
        label { display: block; margin-top: 10px; }
        input { width: 100%; padding: 6px; margin-top: 5px; }
        .btn { margin-top: 15px; padding: 8px; width: 100%; cursor: pointer; }
        .error { margin-top: 10px; color: red; }
    </style>
</head>
<body>
<div class="container">
    <h2>User Login</h2>

    <?php if ($error != "") echo "<p class='error'>$error</p>"; ?>

    <form method="post" action="">
        <label>Matric</label>
        <input type="text" name="matric" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" class="btn">Login</button>
    </form>

    <p style="margin-top: 10px;">
        Don't have an account? <a href="register.php">Register here</a>
    </p>
</div>
</body>
</html>
