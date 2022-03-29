<?php
include("conn.php");
error_reporting(0);
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <title>User Password</title>
</head>
<body>
<div class="container">
    <h1>Update Password </h1>
    <form action="" method="POST">
        <fieldset>
        		<legend>Password Details</legend>
                <label for="old_p">Old Password</label>
                <input type = "text" name = "oldp" id="old_p"><br>
                <label for="new_p">New Password</label>
                <input type = "text" name = "newp" id="new_p" value="<?php echo $name ?>"><br>
                <label for="con_p">Confirm Password</label>
                <input type = "text" name = "conp" id="con_p" value="<?php echo $name ?>"><br>
        </fieldset>
    
        <input type="submit" id="button" name="submit" value="Update" style="width:100%;">
    </form>
</div>
</body>
</html>


<?php
if($_POST["submit"])
{
    $oldpass=md5($_POST['oldp']);
    $newpass=md5($_POST['newp']);
    $conpass=md5($_POST['conp']);
    $sql = "SELECT * FROM student_info where id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()) {
            $pass=$row['password'];
            echo "$pass";
           }
    }
    if($oldpass == $pass and $newpass == $conpass )
            {
                $query = "UPDATE student_info SET password='$newpass',c_password='$conpass' where id=$id";
                $data= mysqli_query($conn,$query);
                if($data)
                {
                    echo "<script>alert('Password Updated')</script>";
                    ?>
                    <meta http-equiv="refresh" content="1; url=http://localhost/Sports/">
                     <?php
                }
                
            }
    else{

       echo "<script>alert('Failed TO Update Password!!')</script>";
        ?>
        <meta http-equiv="refresh" content="1; url=http://localhost/Sports/user_show.php">
        <?php         
    }

   
}
$conn->close();
?>




               
