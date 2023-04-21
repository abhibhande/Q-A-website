<?php
include_once 'connect.php';
session_start();
?>

<?php

if (isset($_GET['id'])) {
    $sql = "select * from answers_ where answer_id=". $_GET['id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $count=$row['like_count'];
    $id=$_GET['id'];
    $count=$count+1;
    

    $sql1 = "update answers_ set like_count = $count where answer_id=$id" ;
    
    if ($result = mysqli_query($conn, $sql1))
    {
        // echo "updated susscefully id:".$_GET['id'];
    }
    else{
        // echo "not updated";
    }
}

echo "<script>location.href='http://localhost/project_1/main/index.php';</script>";


?>