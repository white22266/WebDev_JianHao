<?php
require "session_check.php";
require "db.php";

if (!isset($_GET['id'])) {
    header("Location: users_list.php");
    exit();
}

$id = (int) $_GET['id'];
$msg = "";

// Fetch current user data
$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($conn, $sql);
if (!$result || mysqli_num_rows($result) == 0) {
    die("User not found.");
}
$user = mysqli_fetch_assoc($result);

// Handle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = mysqli_real_escape_string($conn, $_POST['matric']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $accessLevel = mysqli_real_escape_string($conn, $_POST['accessLevel']);

    // If password field is empty, do not change password
    if ($password == "") {
        $sqlUpdate = "UPDATE users
                      SET matric='$matric', name='$name', accessLevel='$accessLevel'
                      WHERE id=$id";
    } else {
        $sqlUpdate = "UPDATE users
                      SET matric='$matric', name='$name', password='$password', accessLevel='$accessLevel'
                      WHERE id=$id";
    }

    if (mysqli_query($conn, $sqlUpdate)) {
        $msg = "User updated successfully.";
        // refresh user data
        $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
        $user = mysqli_fetch_assoc($result);
    } else {
        $msg = "Error updating user: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update User</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 400px; margin: 50px auto; border: 1px solid #ccc; padding: 20px; }
        label { display: block; margin-top: 10px; }
        input, select { width: 100%; padding: 6px; margin-top: 5px; }
        .btn { margin-top: 15px; padding: 8px; width: 100%; cursor: pointer; }
        .msg { margin-top: 10px; color: green; }
    </style>
</head>
<body>
<div class="container">
    <h2>Update User</h2>

    <?php if ($msg != "") echo "<p class='msg'>$msg</p>"; ?>

    <form method="post" action="">
        <label>Matric</label>
        <input type="text" name="matric" value="<?php echo htmlspecialchars($user['matric']); ?>" required>

        <label>Name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

        <label>Password (leave blank to keep current)</label>
        <input type="password" name="password">

        <label>Access Level</label>
        <select name="accessLevel" required>
            <option value="admin" <?php if ($user['accessLevel']=="admin") echo "selected"; ?>>admin</option>
            <option value="user" <?php if ($user['accessLevel']=="user") echo "selected"; ?>>user</option>
        </select>

        <button type="submit" class="btn">Update</button>
    </form>

    <p style="margin-top:10px;"><a href="users_list.php">Back to Users List</a></p>
</div>
</body>
</html>
