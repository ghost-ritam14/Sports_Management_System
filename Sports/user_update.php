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
$sports=explode(",",$_GET['sp']);
$year=$_GET['ye'];
$player=$_GET['pl'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <title>Registration</title>
</head>
<body>
<div class="container">
    <h1>Edit details for participating </h1>
        <form action="" method="POST">
        <fieldset>
        		<legend>Personel Details</legend>
        		<label for="sname">Name</label>
                <input type = "text" name = "name" id="sname" value="<?php echo $name ?>"><br>
                <label for="sroll">Roll No.</label>
                <input type = "text" name = "roll" id="sroll" value="<?php echo $roll ?>"><br>
                <label for="semail">Email</label>
                <input type="text" name="email" id="semail" value="<?php echo $email ?>"><br>
                <label for="spnumber">Contact number</label>
                <input type="number" name="ph_number" id="spnumber" value="<?php echo $con ?>"><br>

                
                <p1>Gender:-</p1><br>
                <input type="radio" name="gender" id="male" value="Male" <?php echo $gender == "male" ? "checked":'';?>/>
                <label for="male">Male</label><br>
                <input type="radio" name="gender" id="female" value="Female" <?php echo $gender == "female" ? "checked":'';?>/>
                <label for="female">Female</label><br>
                <label for="dob">Date of Birth</label>
			    <input type="date" name="DOB" id="dob" value="<?php echo $dob ?>"><br>
                

	 </fieldset>

            <br>
            <p1>Department:-</p1><br>
            <input type = "radio" name = "department" id="b_tech" value="B_Tech" <?php echo $depart == "b_tech" ? "checked":'';?>>
            <label for="b_tech">B_Tech</label><br>
            <input type = "radio" name = "department" id="bca" value="BCA" <?php echo $depart == "bca" ? "checked":'';?>>
            <label for="bca">BCA</label><br>
            <input type = "radio" name = "department" id="m_tech" value="M_Tech" <?php echo $depart == "m_tech" ? "checked":'';?>>
            <label for="m_tech">M_Tech</label><br>
            <input type = "radio" name = "department" id="mca" value="MCA" <?php echo $depart == "mca" ? "checked":'';?>>
            <label for="mca">MCA</label><br><br>
            
            <label for="years">Year:-</label><br>
            <select name="year" id="year">
                <option value="1styear" <?php echo $year == "1styear" ? "selected":'';?>>1st Year</option>
                <option value="2ndyear" <?php echo $year == "2ndyear" ? "selected":'';?>>2nd Year</option>
                <option value="3rdyear" <?php echo $year == "3rdyear" ? "selected":'';?>>3rd Year</option>
                <option value="4thyear" <?php echo $year == "4thyear" ? "selected":'';?>>4th Year</option>
            </select><br>
            <br>Player:-<br>
            <input type="radio" name="player" id="player1" value="Player1" <?php echo $player == "player1" ? "checked":'';?>>
            <label for="player1">Player1</label><br>
            <input type="radio" name="player" id="player2" value="Player2" <?php echo $player == "player2" ? "checked":'';?>>
            <label for="player2">Player2</label><br>

            <br>
            <h2>Select sports you want to participate:-</h2>
            <h3>Outdoor:-</h3>
            <input type="checkbox" name="sports[]" id="cricket" value="Cricket" <?php echo in_array("Cricket",$sports) ? "checked":'';?>>
            <label for="cricket">Cricket</label>
            <input type="checkbox" name="sports[]" id="football" value="Football" <?php echo in_array("Football",$sports) ? "checked":'';?>>
            <label for="football">Football</label>
            <input type="checkbox" name="sports[]" id="badminton" value="Badminton" <?php echo in_array("Badminton",$sports) ? "checked":'';?>>
            <label for="badminton">Badminton</label>
            <input type="checkbox" name="sports[]" id="basketball" value="Basketball" <?php echo in_array("Basketball",$sports) ? "checked":'';?>>
            <label for="basketball">Basketball</label><br>
            
            <h3>Indoor:-</h3>
            <input type="checkbox" name="sports[]" id="chess" value="Chess" <?php echo in_array("Chess",$sports) ? "checked":'';?>>
            <label for="chess">Chess</label>
            <input type="checkbox" name="sports[]" id="pool" value="Pool" <?php echo in_array("Pool",$sports) ? "checked":'';?>>
            <label for="pool">Pool</label>
            <input type="checkbox" name="sports[]" id="table-tannis" value="Table Tannis" <?php echo in_array("Table Tannis",$sports) ? "checked":'';?>>
            <label for="table-tannis">Table Tannis</label><br><br>
            
			<input type="submit" id="button" name="submit" value="Update" style="width:100%;">
            

				

        
        </form>
</div>
</body>
</html>
<?php
if($_POST["submit"])
{
    $nm=$_POST['name'];
    $rl=$_POST['roll'];
    $em=$_POST['email'];
    $ph=$_POST['ph_number'];
    $gen=$_POST['gender'];
    $db=$_POST['DOB'];
    $dep=$_POST['department'];
    $sp=implode(",",$_POST['sports']);
    $ye=$_POST['year'];
    $pl=$_POST['player'];

$query="UPDATE student_info SET name='$nm',roll='$rl',email='$em',contact='$ph',gender='$gen',DOB='$db',department='$dep',sports='$sp',year='$ye',player='$pl' WHERE id='$id'";

$data= mysqli_query($conn,$query);
if($data)
{
    echo "<script>alert('Record Updated')</script>";
    ?>
    <meta http-equiv="refresh" content="1; url=http://localhost/Sports/user_show.php">
    <?php
}
else{
    echo "<script>alert('Failed To Update The Record')</script>";
    ?>
    <meta http-equiv="refresh" content="1; url=http://localhost/Sports/user_show.php">
    <?php
}
}
$conn->close();
?>