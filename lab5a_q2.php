<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lab 5a Q2</title>
</head>
<body>

<?php
$students = array(
    array("name" => "Ali", "matric" => "AI230001", "course" => "Computer Science"),
    array("name" => "Aisyah", "matric" => "AI230045", "course" => "Software Engineering"),
    array("name" => "Ahmad", "matric" => "AI230078", "course" => "Information Technology")
);
?>

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Matric</th>
        <th>Course</th>
    </tr>

<?php
$no = 1;
foreach ($students as $student) {
    echo "<tr>";
    echo "<td>".$no."</td>";
    echo "<td>".$student['name']."</td>";
    echo "<td>".$student['matric']."</td>";
    echo "<td>".$student['course']."</td>";
    echo "</tr>";
    $no++;
}
?>

</table>

</body>
</html>
=======
