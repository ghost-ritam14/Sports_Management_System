<?php
	session_start();
    include_once("conn.php");

	if($_SERVER['REQUEST_METHOD']=== 'POST'){
		if(!empty($_POST['login'])){
			$name = $_POST['name'];
			$password =md5($_POST['password']);

			$stmnt = "SELECT * FROM student_info WHERE
									name = '$name' AND password = '$password'";

			$result = mysqli_query($conn,$stmnt);
			$count = mysqli_num_rows($result);
			if($count > 0){
				echo "<script>alert('Login Successful')</script>"; 
				?>

				<meta http-equiv="refresh" content="1; url=http://localhost/Sports/user_show.php">
    			<?php
				//echo $result['name'];
				$_SESSION['username'] = $name;
				$_SESSION['password'] = $password;
				//header('Location: user_show.php');
				//header("Location:admin_show.php");	
			}else{
				echo "<script>alert('Login not Successful')</script>"; ?>

				<meta http-equiv="refresh" content="1; url=http://localhost/Sports/">
    			<?php
			}
		}
	}

		

		//$row = $stmnt->fetch(PDO::FETCH_BOTH);
		/*$row = $stmnt->rowCount();

		if($row == $stmnt->fetch(PDO::FETCH_ASSOC)){
			echo $result['name'];
			$_SESSION['username'] = $name;
			header('location:home.php');
		}
		else{
			header('location:login.php');
		}
	}*/
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
				<a class="active" href="index.php">Home</a>
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
			<legend style="text-align: center;"><h2>User Log-in</h2></legend>
			<label for="uname">User-name</label>
      		<input type = "text" name = "name" id="uname" placeholder="Enter your Email here"><br><br>
      
      		<label for="upasswrd">Password:</label>
      		<input type="password" name="password" id="upasswrd" placeholder="Enter your Password here"><br><br>
			<input type="submit" name="login" value="Login">
      	</fieldset>
	</form>
	</div>
	</center>
	</div>
</body>
</html>