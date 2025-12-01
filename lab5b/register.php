<?php
require "db.php";
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = mysqli_real_escape_string($conn, $_POST['matric']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $accessLevel = mysqli_real_escape_string($conn, $_POST['accessLevel']);

    $sql = "INSERT INTO users (matric, name, password, accessLevel)
            VALUES ('$matric', '$name', '$password', '$accessLevel')";

    if (mysqli_query($conn, $sql)) {
        $msg = "Registration successful. You can now login.";
    } else {
        $msg = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 400px; margin: 50px auto; border: 1px solid #ccc; padding: 20px; }
        label { display: block; margin-top: 10px; }
        input, select { width: 100%; padding: 6px; margin-top: 5px; }
        .btn { margin-top: 15px; padding: 8px; width: 100%; cursor: pointer; }
        .msg { margin-top: 10px; color: green; }
        .error { color: red; }
    </style>
</head>
<body>
<div class="container">
    <h2>User Registration</h2>

    <?php if ($msg != "") echo "<p class='msg'>$msg</p>"; ?>

    <form method="post" action="">
        <label>Matric</label>
        <input type="text" name="matric" required>

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Access Level</label>
        <select name="accessLevel" required>
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select>

        <button type="submit" class="btn">Register</button>
    </form>

    <p style="margin-top: 10px;">Already registered? <a href="login.php">Login here</a></p>
</div>
</body>
</html>
