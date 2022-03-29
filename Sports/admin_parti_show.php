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

    <div style = "position:relative; top:30px; right: 25%">
        <?php
        include("conn.php");
        error_reporting(0);
        $sql = "SELECT * FROM participation p, student_info s where p.student_id=s.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Roll</th>
            <th>Sports Name</th>
            <th>Location</th>
            <th>Date</th>
            <th>Position</th>
            <th colspan=2 align=center>Operations</th>
            </tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["pid"]. "</td>
                <td>" . $row["name"]. "</td>
                <td> " . $row["department"]. "</td>
                <td> " . $row["roll"]. "</td>
                <td> " . $row["sports_name"]. "</td>
                <td> " . $row["location"]. "</td>
                <td> " . $row["date"]. "</td>
                <td> " . $row["position"]. "</td>
                <td><a href = 'admin_parti_update.php ? id=$row[pid]&nm=$row[sports_name]&loc=$row[location]&dt=$row[date]&pos=$row[position]' onclick='returncheckdelete()'>Edit/Update</td>
                <td><a href = 'admin_parti_delete.php ? id=$row[pid]'onclick='returncheckdelete()'>Delete</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </div>
</div>
    <div style = "position:relative; top:90px; left:10%; width:60%;">
        <form action="admin_parti_add.php" method="POST">
            <input type="submit" name="Add" value="Add Data" style="width:20%";>
        </form>        
    </div>

</body>
</html>