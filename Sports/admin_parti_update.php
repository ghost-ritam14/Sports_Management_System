<?php
include("conn.php");
error_reporting(0);
$id=$_GET['id'];
$name=$_GET['nm'];
$loc=$_GET['loc'];
$date=$_GET['dt'];
$pos=$_GET['pos'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <title>Update Details</title>
</head>
<body>
<div class="container">
    <h1>Update Details For Participation.</h1>
    <form action="" method="post" >
        <fieldset>
        <legend>Details</legend>
        		<label for="s_name">Sports Name</label>
                <input type = "text" name = "sname" id="s_name" value="<?php echo $name ?>"><br>
                <label for="l_name">Location</label>
                <input type = "text" name = "lname" id="l_name" value="<?php echo $loc ?>"><br>
                <label for="dob">Date</label>
			    <input type="date" name="DOB" id="dob" value="<?php echo $date ?>"><br>
                <label for="p_name">Position</label>
                <input type = "text" name = "pos" id="p_name" value="<?php echo $pos ?>"><br>
        </fieldset>
        <input type="submit" id="button" name="submit" value="Update" style="width:100%";>
    </form>
</div>                
</body>
</html>

<?php
if($_POST["submit"])
{
    $snm=$_POST['sname'];
    $lnm=$_POST['lname'];
    $dos=$_POST['DOB'];
    $ps=$_POST['pos'];
    
    $query="UPDATE participation SET sports_name='$snm',location='$lnm',date='$date',position='$ps' WHERE pid='$id'";
    $data= mysqli_query($conn,$query);
    if($data)
    {
        echo "<script>alert('Record Updated')</script>";
        ?>
        <meta http-equiv="refresh" content="1; url=http://localhost/Sports/admin_parti_show.php">
        <?php
    }
    else{
        echo "<script>alert('Failed To Update The Record')</script>";
        ?>
        <meta http-equiv="refresh" content="1; url=http://localhost/Sports/admin_parti_show.php">
        <?php
    }
    }
    $conn->close();
    ?>
    

                
               
