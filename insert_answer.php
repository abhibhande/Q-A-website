<?php
include_once 'connect.php';
session_start();
?>

<?php

if (isset($_GET['id'])) {

    

    $question_id = $_GET['id'];
    $username=$_GET['username'];
    $answer=$_GET['answer'];
    
   

    // echo $name."name ".$question."question " .$category." category ".$question_desc." question_desc";

    $sql="insert into answers_(question_id,answer,username) values('$question_id','$answer','$username')";
    if ($result = mysqli_query($conn, $sql))

    {
        echo "answer Uploaded";
    }
    else{
        echo "answer not Uploaded";
        echo mysqli_error($conn);
    }
    echo "<script>location.href='http://localhost/project_1/main/index.php';</script>";


    // header("refresh:1;url=test_index.php");
}

?>