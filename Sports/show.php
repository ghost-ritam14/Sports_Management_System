<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
<?php
echo "Welcome";
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Remove all illegal characters from name


// Remove all illegal characters from email
if (!filter_var($_POST['name'], FILTER_SANITIZE_STRING) === false) {
  echo("is a valid name");
} else {
  echo("is not a valid name");
}          

// Validate e-mail
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
  echo("is a valid email address");
} else {
  echo("is not a valid email address");
}          
?>
</body>
</html>
