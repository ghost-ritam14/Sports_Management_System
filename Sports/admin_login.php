<?php
	session_start();
    include_once("conn.php");

	if($_SERVER['REQUEST_METHOD']=== 'POST'){
		if(!empty($_POST['login'])){
			$name = $_POST['name'];
			$password =($_POST['password']);

			$stmnt = "SELECT * FROM admin_info WHERE
									username = '$name' AND password = '$password'";

			$result = mysqli_query($conn,$stmnt);
			$count = mysqli_num_rows($result);
			if($count > 0){
				echo "<script>alert('Login Successful')</script>"; ?>

                <meta http-equiv="refresh" content="1; url=http://localhost/Sports/admin_home.php">
                <?php
                //echo $result['name'];
				$_SESSION['username'] = $name;
				//header('location:home.php');
					
			}else{
				echo "<script>alert('Login not Successful')</script>"; ?>

			<meta http-equiv="refresh" content="1; url=http://localhost/Sports/">
                <?php
			}
		}
	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style2.css">
    <title>Log-in</title>
	
</head>
<body>
	<div class="container">
		<div class="topnav">
				<div class="topnavleft">
					<a href="index.php">Home</a>
				</div>

				<div class="topnavright">
					<a href="#"></a>
					<a href="#"></a>
				</div>
			</div>
		<center>
		<div style = "position:relative; top:65px;">
			<form action="" method="post">
				<fieldset>
					<legend style="text-align: center;"><h2>Admin Log-in</h2></legend>
					<label for="uname">User-name</label>
					<input type = "text" name = "name" id="uname" placeholder="Enter your Email here"><br><br>
			
					<label for="upasswrd">Password:</label>
					<input type="password" name="password" id="upasswrd" placeholder="Enter your Password here"><br><br>
					<input type="submit" name="login" value="Login">
				</fieldset>
			</form>
			</center>
		</div>
	</div>
	
</body>
</html>