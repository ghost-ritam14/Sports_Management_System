<?php
    include("connection.php");

        //$sname=$sroll=$semail=$snumber=$sgender=$spassword=$scpassword=$sdob=$smyfile=$sdepartment=$syear=$ssports=$splayer='';

        if($_SERVER['REQUEST_METHOD']=== 'POST'){

            $target_dir = "Dp/";
            $target_file = $target_dir . basename($_FILES["myfile"]["name"]);

           // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


            $sname = $_POST['name'];
            $sroll = $_POST['roll'];
            $semail = $_POST['email'];
            $snumber = $_POST['ph_number'];
            $sgender = $_POST['gender'];
            $spassword = $_POST['password'];
            $scpassword = $_POST['c_password'];
            $sdob = $_POST['DOB'];
            $smyfile = basename($_FILES["myfile"]["name"]);
            $sdepartment = $_POST['department'];
            $syear = $_POST['year'];
            $ssports = $_POST['sports'];
            $ssports1 = implode(",",$ssports);
            $splayer = $_POST['player'];

            $stmnt = $conn->prepare("INSERT INTO student_info (name,roll,email,contact,gender,password,c_password,
                                    DOB,myfile,department,year,sports,player) VALUES 
                                    (:a,:b ,:c ,:d , :e, :f, :g, :h, :i, :j, :k, :l, :m)");

            $stmnt->bindvalue(':a',$sname);
            $stmnt->bindvalue(':b',$sroll);
            $stmnt->bindvalue(':c',$semail);
            $stmnt->bindvalue(':d',$snumber);
            $stmnt->bindvalue(':e',$sgender);
            $stmnt->bindvalue(':f',md5($spassword));
            $stmnt->bindvalue(':g',md5($scpassword));
            $stmnt->bindvalue(':h',$sdob);
            $stmnt->bindvalue(':i',$smyfile);
            $stmnt->bindvalue(':j',$sdepartment);
            $stmnt->bindvalue(':k',$syear);
            $stmnt->bindvalue(':l',$ssports1);
            $stmnt->bindvalue(':m',$splayer);

            $data=$stmnt->execute();


            if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["myfile"]["name"])). " has been uploaded.";
              } else {
                echo "Sorry, there was an error uploading your file.";
              }
              if($data){
                echo "<script>alert('Record Created')</script>";
            ?>
            <meta http-equiv="refresh" content="0; url=http://localhost/Sports/">
            <?php
            }
            else{
                echo "<script>alert('Record Could Not Created')</script>";
            ?>
            <meta http-equiv="refresh" content="0; url=http://localhost/Sports/">
            <?php
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
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <div class="topnav">
			<div class="topnavleft">
				<a href="index.php">Home</a>
			</div>

		</div>
    <div style = "position:relative; top:25px; left:0px">
        <h1>Please Register here.</h1>
            <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
                    <legend>Personel Details</legend>
                    <label for="sname">Name</label>
                    <input type = "text" name = "name" id="sname" placeholder="Enter your Name here"><br>
                    <label for="sroll">Roll No.</label>
                    <input type = "text" name = "roll" id="sroll" placeholder="Enter your Roll no. here"><br>
                    <label for="semail">Email</label>
                    <input type="text" name="email" id="semail" placeholder="Enter your Email here"><br>
                    <label for="spnumber">Contact number</label>
                    <input type="number" name="ph_number" id="spnumber" placeholder="Enter your phone number here"><br>

                    
                    <p1>Choose your Gender:-</p1><br>
                    <input type="radio" name="gender" id="male" value="Male">
                    <label for="male">Male</label><br>
                    <input type="radio" name="gender" id="female" value="Female">
                    <label for="female">Female</label><br>

                    <label for="passwrd">Create Password:</label>
                    <input type="password" name="password" id="passwrd" placeholder="Enter your password here"><br>
                    <label for="conpasswrd">Confirm Password:</label>
                    <input type="password" name="c_password" id="conpasswrd" placeholder="Re-enter your password here"><br>
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="DOB" id="dob"><br>
                    <label for="myfile">Upload your Passport size photo:-</label>
                    <input type="file" name="myfile" id="myfile"><br>

                </fieldset>

                <br>
                <p1>Choose your Department:-</p1><br>
                <input type = "radio" name = "department" id="b_tech" value="B_Tech">
                <label for="b_tech">B_Tech</label><br>
                <input type = "radio" name = "department" id="bca" value="BCA">
                <label for="bca">BCA</label><br>
                <input type = "radio" name = "department" id="m_tech" value="M_Tech">
                <label for="m_tech">M_Tech</label><br>
                <input type = "radio" name = "department" id="mca" value="MCA">
                <label for="mca">MCA</label><br><br>
                
                <label for="years">Select your Year:-</label><br>
                <select name="year" id="year">
                    <option value="1styear">1st Year</option>
                    <option value="2ndyear">2nd Year</option>
                    <option value="3rdyear">3rd Year</option>
                    <option value="4thyear">4th Year</option>
                </select>
                <br>
                <h2>Select sports you want to participate:-</h2>
                <h3>Outdoor:-</h3>
                <input type="checkbox" name="sports[]" id="cricket" value="Cricket">
                <label for="cricket">Cricket</label>
                <input type="checkbox" name="sports[]" id="football" value="Football">
                <label for="football">Football</label>
                <input type="checkbox" name="sports[]" id="badminton" value="Badminton">
                <label for="badminton">Badminton</label>
                <input type="checkbox" name="sports[]" id="basketball" value="Basketball">
                <label for="basketball">Basketball</label><br>
                
                <h3>Indoor:-</h3>
                <input type="checkbox" name="sports[]" id="chess" value="Chess">
                <label for="chess">Chess</label>
                <input type="checkbox" name="sports[]" id="pool" value="Pool">
                <label for="pool">Pool</label>
                <input type="checkbox" name="sports[]" id="table-tannis" value="Table Tannis">
                <label for="table-tannis">Table Tannis</label><br><br>
                <p1>Choose player. (This applicable if you have participated for Badminton or Table Tannis):-</p1><br>
                <input type="radio" name="player" id="player1" value="Player1">
                <label for="player1">Player1</label><br>
                <input type="radio" name="player" id="player2" value="Player2">
                <label for="player2">Player2</label><br>
                
                <input type="submit" name="submit">
                <input type="reset" name="reset">
                    

            
            </form>
        </div>
    </div>
</body>
</html>