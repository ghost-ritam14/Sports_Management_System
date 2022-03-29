<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style2.css">
<style>
table, th, td {
    border: 2px solid black;
}
</style>
</head>
<body>
<div class="container">
<div style = "position:relative; top:5px; right: 25%">
<?php
include("conn.php");
error_reporting(0);
$key=$_POST["name"];
$sql = "SELECT * FROM student_info WHERE name='$key'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table>
    <tr>
    <th>ID</th>
    <th>Dp</th>
    <th>Name</th>
    <th>Roll</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Gender</th>
    <th>Date Of Birth</th>
    <th>Department</th>
    <th>Year</th>
    <th>Sports</th>
    </tr>";
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>" . $row["id"]. "</td>
    <td><img src='./Dp/" . $row["myfile"] . "' height='50px' width='50px'></td>
    <td>" . $row["name"]. "</td>
    <td> " . $row["roll"]. "</td>
    <td> " . $row["email"]. "</td>
    <td> " . $row["contact"]. "</td>
    <td> " . $row["gender"]. "</td>
    <td> " . $row["DOB"]. "</td>
    <td> " . $row["department"]. "</td>
    <td> " . $row["year"]. "</td>
    <td> " . $row["sports"]. "</td>
    </tr>";
}
echo "</table>";
} else {
    echo "<script>alert('No Records Find!!')</script>";
    ?>
    <meta http-equiv="refresh" content="1; url=http://localhost/Sports/admin_show.php">
    <?php
}

$conn->close();

?> 
</div>
</div>

<div style = "position:relative; top:-40px; left:5%;">
<form action="admin_show.php" method="POST">
    <input type="submit" name="Back" value="Back"  style="width:20%;">
</form>  
</div>    
</body>
</html>