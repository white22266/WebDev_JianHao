<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lab 5a Question 1</title>
</head>
<body>

<?php 
    $name = "Peck Jian Hao";
    $matric = "AI230119";
    $course = "Bachelor of Computer Science (Web Technology) with Honours";
    $year = "Year 3";
    $address = "Universiti Tun Hussein Onn Malaysia (UTHM)";
?>

<table border="1" cellpadding="8">
    <tr>
        <td>Name</td>
        <td><?php echo $name; ?></td>
    </tr>
    <tr>
        <td>Matric Number</td>
        <td><?php echo $matric; ?></td>
    </tr>
    <tr>
        <td>Course</td>
        <td><?php echo $course; ?></td>
    </tr>
    <tr>
        <td>Year of Study</td>
        <td><?php echo $year; ?></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><?php echo $address; ?></td>
    </tr>
</table>

</body>
</html>
