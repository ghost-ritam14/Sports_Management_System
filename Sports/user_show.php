<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel = "stylesheet" href = "style.css">
    
    <style>
        body{
                background-image: url("img2.jpg");
                opacity: 1;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }

            .topnav{
                background-color: burlywood;
            }

            .topnavleft a{
                float: left;
                color:cornsilk;
                text-align:center;
                padding:14px;
                font-size:20px;
            }

            .topnavright a{
                float:right;
                color:cornsilk;
                text-align:center;
                padding:14px;
                font-size:20px;
            }

            .topnav a:hover{
                background-color: rgb(0, 128, 0);
                color: rgb(230, 141, 207);
            }

            .topnav a.active{
                background-color: rgb(182, 182, 12);
                color: rgba(255, 255, 255, 0.315);
            }

            table, th, td{
                
                width: 100%;
                padding: 15px;
                text-align: left;
                background-color: #7aafece8;
                padding: 20px;
            }
            
            table, th, td {
                border: 2px solid black;
            }

            .container{
                max-width: 80%;
                background-color:rgb(90, 155, 240);
                padding: 34px;
                margin: auto;
                position:absolute;
                left: 118px;
                
            }

            .container h2{
                text-align:center;
            }

    </style>
</head>
<body>
<div class="container">

<h1>Welcome to Heritage Sports Event</h1>
        <p>Where learning is an intaractive evalutionary process</p>
        <div class="topnav">
            <div class="topnavleft">
                <a class="active" href="user_show.php">Home</a>
                <a href="contact.html">Contact</a>
                <a href="about.html">About</a>
            </div>

            <div class="topnavright">
                <a href="#">Welcome <?php echo $_SESSION['username']; ?></a>
                <a href="logout.php">Logout</a>
                <!-- <a href="sign-up.php" id="sigh-up">Signup</a> -->
            </div>
        </div>

        <a href="about.html"><img src="img1.jpg" alt="Heritage Sports" style="width: 100%;height: 350px;"></a>

        <h2>Personal Details</h2>
        <div style="width:20%;";>
        <?php
        //session_start();
        include("conn.php");
        error_reporting(0);
        if(isset($_SESSION['username']))
        {
            $username=$_SESSION['username'];
            $pass=$_SESSION['password'];
        }
        $sql = "SELECT * FROM student_info where name='$username' AND password='$pass'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table style='width:80%'>
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
            <th>Sports</th>
            <th>Year</th>
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
                <td> " . $row["sports"]. "</td>
                <td> " . $row["year"]. "</td>
                <td> " . $row["player"]. "</td>
                <td><a href = 'user_update.php ? id=$row[id]&nm=$row[name]&rl=$row[roll]&em=$row[email]&con=$row[contact]&gn=$row[gender]&db=$row[DOB]&dp=$row[department]&sp=$row[sports]&ye=$row[year]&pl=$row[player]' onclick='returncheckdelete()'>Edit/Update</td>
                <td><a href = 'user_password.php ? id=$row[id]' onclick='returncheckdelete()'>Change Password</td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        ?>
    </div>
    <h2>Participation Details</h2>

    <?php
    $sql1 = "SELECT * FROM participation p, student_info s where p.student_id=s.id AND name='$username' AND password='$pass'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        echo "<table>
        <tr>
        <th>Participation ID</th>
        <th>Sports Name</th>
        <th>Location</th>
        <th>Date</th>
        <th>Position</th>
        </tr>";
        // output data of each row
        while($row = $result1->fetch_assoc()) {
            echo "<tr>
            <td>" . $row["pid"]. "</td>
            <td> " . $row["sports_name"]. "</td>
            <td> " . $row["location"]. "</td>
            <td> " . $row["date"]. "</td>
            <td> " . $row["position"]. "</td>
            </tr>";
        }
        echo "</table>";
    } 
    else {
        echo "No participation details available";
    }
    $conn->close();
    ?>
</div>
</body>
</html>
    