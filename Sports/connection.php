<?php

$conn = new PDO("mysql:host=localhost; dbname=soprts;","ritamnayek","ritam@12345");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($conn){
            //echo "Connected";
        }

        $stmnt = $conn->prepare("SELECT * FROM sports_events");
        $stmnt->execute();

        $num = $stmnt->rowCount();

?>
