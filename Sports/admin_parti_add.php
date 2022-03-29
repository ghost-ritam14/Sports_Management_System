<?php
include("conn.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <title>Add Details</title>
</head>
<body>
<div class="container"> 
    <h1>Enter your details Of Participation.</h1>
    <form action="" method="post" >
        <fieldset>
        		<legend>Details</legend>
        		<label for="s_id">Student Id</label>
                <input type = "text" name = "sid" id="s_id" placeholder="Enter student id"><br>
                <label for="loc">Location</label>
                <input type = "text" name = "location" id="loc" placeholder="Enter Location"><br>
                <label for="dos">Sports Date</label>
			    <input type="date" name="DOS" id="dos"><br>
                <label for="s_name">Sports Name</label>
                <input type = "text" name = "sname" id="s_name" placeholder="Enter sports name"><br>
                <label for="p_id">Position</label>
                <input type = "text" name = "pos" id="p_id" placeholder="Enter position"><br>
     </fieldset>
            <input type="submit" name="submit">
            <input type="reset" name="reset">
   </form>
</div>
</body>
</html>
<?php
if($_POST["submit"])
{
    $sid=$_POST['sid'];
    $loc=$_POST['location'];
    $date=$_POST['DOS'];
    $ps=$_POST['pos'];
    $snm=$_POST['sname'];
    $query="INSERT INTO `participation` (`pid`, `student_id`, `location`, `date`, `position`, `sports_name`) VALUES (NULL, '$sid', '$loc', '$date', '$ps', '$snm');";
    $data= mysqli_query($conn,$query);
    if($data)
    {
        echo "<script>alert('Record Created')</script>";
        ?>
        <meta http-equiv="refresh" content="1; url=http://localhost/Sports/admin_parti_show.php">
        <?php
    }
    else{
        echo "<script>alert('Failed To Create The Record')</script>";
        ?>
        <meta http-equiv="refresh" content="1; url=http://localhost/Sports/admin_parti_show.php">
       <?php
    }
    }
    $conn->close();
    ?>
    
    
    
    
                



