<?php
    session_start();
?>


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

<div class="topnav">
            <div class="topnavleft" style="position:absolute; top:10px;">
                <a class="active" href="admin_home.php">Home</a>
                <a href="contact.html">Contact</a>
                <a href="about.html">About</a>
            </div>

            
                
                <!-- <a href="sign-up.php" id="sigh-up">Signup</a> -->
                <div class="topnavright" style="float: right; position:absolute; top:4px; left:80%";>
                    <a href="logout.php" style="position:absolute; top:14px; right:250px;">Logout</a>
                    <div class="dropdown">
                        <button class="dropbtn"><a href="#">Welcome <?php echo $_SESSION['username']; ?></a>
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="admin_parti_show.php">Participants</a>
                            <a href="admin_show_sports.php">Sports</a>
                            <a href="admin_show.php">Students</a>
                        </div>
                    </div>
                    
                </div>
                
            
        </div>

<div style = "position:relative; top:230px; right:53%;">
<?php
include("conn.php");
error_reporting(0);
$sql = "SELECT * FROM student_info";
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
    <th>Player</th>
    <th colspan=2 align=center>Operations</th>
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
        <td> " . $row["player"]. "</td>
        <td><a href = 'update.php ? id=$row[id]&nm=$row[name]&rl=$row[roll]&em=$row[email]&con=$row[contact]&gn=$row[gender]&db=$row[DOB]&dp=$row[department]&ye=$row[year]' onclick='returncheckdelete()'>Edit/Update</td>
        <td><a href = 'delete.php ? id=$row[id]'onclick='returncheckdelete()'>Delete</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
</div>

<div style = "position:relative; top:50px; right:0%;">
<form action="search.php" method="POST">
    <label for="id_num">Name Of Student</label>
    <input type = "text" name = "name" id="id_num" placeholder="Enter Name Of The Student" required><br>
    <input type="submit" name="search" value="Search">
</form>
</div>
</div>       
</body>
</html>