<?php
    $conn = mysqli_connect('localhost', 'ritamnayek', 'ritam@12345') or
           die ('Unable to connect. Check your connection parameters.');
           mysqli_select_db($conn, 'soprts' ) or die(mysqli_error($conn));

    if($conn):
       // echo "Connected";
    endif


?>