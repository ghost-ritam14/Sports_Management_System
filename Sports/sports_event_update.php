<?php
include("conn.php");
error_reporting(0);
$id=$_GET['id'];
$name=$_GET['nm'];
$roll=$_GET['rl'];
$email=$_GET['em'];
$con=$_GET['con'];
$gender=$_GET['gn'];
$dob=$_GET['db'];
$depart=$_GET['dp'];
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
    <h1>Update your details for sports event.</h1>
    <form action="" method="post" >
        <fieldset>
        		<legend>Details</legend>
        		<label for="s_name">Sports Name</label>
                <input type = "text" name = "sname" id="s_name" value="<?php echo $name ?>"><br>
                <label for="c_name">College Name</label>
                <input type = "text" name = "cname" id="c_name" value="<?php echo $roll ?>"><br>
                <label for="s_loc">Sports Location</label>
                <input type = "text" name = "sloc" id="s_loc" value="<?php echo $email ?>"><br>
                <label for="dob">Sports Date</label>
			    <input type="date" name="DOB" id="dob" value="<?php echo $con ?>"><br>
                <label for="f_prize">1st Prize</label>
                <input type = "text" name = "fprize" id="f_prize" value="<?php echo $gender ?>"><br>
                <label for="s_prize">2nd Prize</label>
                <input type = "text" name = "sprize" id="s_prize" value="<?php echo $dob ?>"><br>
                <label for="t_prize">3rd Prize</label>
                <input type = "text" name = "tprize" id="t_prize" value="<?php echo $depart ?>"><br>
        </fieldset>
        <input type="submit" id="button" name="submit" value="Update" style="width:100%;">
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

$query="UPDATE sports_events SET sports_name='$snm',college_name='$cnm',sports_location='$sl',sports_date='$dos',first_prize='$fp',second_prize='$sp',third_prize='$tp' WHERE sports_id='$id'";
$data= mysqli_query($conn,$query);
if($data)
{
    echo "<script>alert('Record Updated')</script>";
    ?>
    <meta http-equiv="refresh" content="1; url=http://localhost/Sports/admin_show_sports.php">
    <?php
}
else{
    echo "<script>alert('Failed To Update The Record')</script>";
    ?>
    <meta http-equiv="refresh" content="1; url=http://localhost/Sports/admin_show_sports.php">
    <?php
}
}
$conn->close();
?>
