<?php
include_once 'connect.php';
session_start();
?>

<?php

    $name=$_POST['username'];
    $question=$_POST['question'];
    $category=$_POST['category'];
    $question_desc=$_POST['question_desc'];

    // echo $name."name ".$question."question " .$category." category ".$question_desc." question_desc";

    $sql="insert into questions(question,question_desc,username_name,question_type) values('$question','$question_desc','$name','$category')";
    if ($result = mysqli_query($conn, $sql))

    {
        echo "question Uploaded";
    }
    else{
        echo "question not Uploaded";
    }

    echo "<script>location.href='http://localhost/project_1/main/index.php';</script>";
    // header("refresh:0;url=test_index.php");

?>