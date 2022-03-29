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

    <div style = "position:relative; top:25px; left:0px">
    <h1>Enter your details for sports event.</h1>
    <form action="" method="post" >
        <fieldset>
        		<legend>Details</legend>
        		<label for="s_name">Sports Name</label>
                <input type = "text" name = "sname" id="s_name" placeholder="Enter Sports Name"><br>
                <label for="c_name">College Name</label>
                <input type = "text" name = "cname" id="c_name" placeholder="Enter College Name"><br>
                <label for="s_loc">Sports Location</label>
                <input type = "text" name = "sloc" id="s_loc" placeholder="Enter Sports Location"><br>
                <label for="dob">Sports Date</label>
			    <input type="date" name="DOB" id="dob"><br>
                <label for="f_prize">1st Prize</label>
                <input type = "text" name = "fprize" id="f_prize" placeholder="Enter Rs"><br>
                <label for="s_prize">2nd Prize</label>
                <input type = "text" name = "sprize" id="s_prize" placeholder="Enter Rs"><br>
                <label for="t_prize">3rd Prize</label>
                <input type = "text" name = "tprize" id="t_prize" placeholder="Enter Rs"><br>
        </fieldset>
                <input type="submit" name="submit">
		        <input type="reset" name="reset">
    </form>
    </div>
    </div>

    <div style = "position:relative; top:-750px; left:10%; width:40%;">
        <form action="admin_show_sports.php" method="POST">
        <input type="submit" name="Back" value="Back"  style="width:20%;">
</form>  
</div> 

</body>
</html>
<?php
if($_POST["submit"])
{
    $snm=$_POST['sname'];
    $cnm=$_POST['cname'];
    $sl=$_POST['sloc'];
    $dos=$_POST['DOB'];
    $fp=$_POST['fprize'];
    $sp=$_POST['sprize'];
    $tp=$_POST['tprize'];
    $query="INSERT INTO sports_events (`sports_id`, `sports_name`, `college_name`, `sports_location`, `sports_date`, `first_prize`, `second_prize`, `third_prize`) VALUES (NULL, '$snm', '$cnm', '$sl', '$dos', '$fp', '$sp', '$tp');";
    $data= mysqli_query($conn,$query);
    if($data)
    {
        echo "<script>alert('Record Created')</script>";
        ?>
        <meta http-equiv="refresh" content="1; url=http://localhost/Sports/admin_show_sports.php">
        <?php
    }
    else{
        echo "<script>alert('Failed To Create The Record')</script>";
        ?>
        <meta http-equiv="refresh" content="1; url=http://localhost/Sports/admin_show_sports.php">
        <?php
    }
    }
    $conn->close();
    ?>
    
