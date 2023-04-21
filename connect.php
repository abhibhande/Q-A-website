<?php
    $conn=mysqli_connect("localhost","root","","project");
    
    if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn ->connect_error;
        exit();
    }
    else{
        // echo "connection successful project";
    }
?>