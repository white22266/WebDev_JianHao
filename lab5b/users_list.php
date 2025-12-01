<?php
require "session_check.php";
require "db.php";

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Users List</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .topbar { margin: 20px; }
        table { border-collapse: collapse; width: 80%; margin: 0 auto; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #f0f0f0; }
        a.btn { padding: 4px 8px; text-decoration: none; border: 1px solid #333; margin: 0 2px; }
    </style>
</head>
<body>

<div class="topbar">
    <span>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?> (<?php echo $_SESSION['accessLevel']; ?>)</span> |
    <a href="logout.php">Logout</a>
</div>

<h2 style="text-align:center;">Users List</h2>

<table>
    <tr>
        <th>No</th>
        <th>Matric</th>
        <th>Name</th>
        <th>Access Level</th>
        <th>Action</th>
    </tr>
    <?php
    $no = 1;
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$no."</td>";
            echo "<td>".$row['matric']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['accessLevel']."</td>";
            echo "<td>
                    <a class='btn' href='update_user.php?id=".$row['id']."'>Update</a>
                    <a class='btn' href='delete_user.php?id=".$row['id']."' onclick=\"return confirm('Delete this user?');\">Delete</a>
                  </td>";
            echo "</tr>";
            $no++;
        }
    } else {
        echo "<tr><td colspan='5'>No users found.</td></tr>";
    }
    ?>
</table>

</body>
</html>
