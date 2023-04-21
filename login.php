<?php
include_once 'connect.php';
session_start();
?>

<?php

    $flag=false;

    $msg="";

    

   if(isset($_POST['submit']))
  {
    $user=$_POST["username"];
    $pass=$_POST["password"];
    $flag=false;

    $sql="select * from admin_login where Username='$user'";
    $result=mysqli_query($conn,$sql);
    
      if($row=mysqli_fetch_array($result))
      {
        if($row['Password']==$pass)
        {
          $_SESSION["username"]=$user;
          $flag=true;
        }
      }
    

    if(!$flag)
    {
      $msg="Invalid username or password";
    }
    else
    {
      $msg="Successfully Login";
      header("refresh:2;url=index.php");
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<style>
  html{
    height: 100%;
    display: flex;  
    justify-content: center;
    align-items: center;
  }
    body{
        background: url("question.jpg") no-repeat;
        background-size: cover;
    }
    .ex{
        padding: 5px;
       
        border: 2px solid aliceblue;
        height: 245px;
        border-radius: 14px;
        backdrop-filter: blur(13px);
        box-shadow: 0px 0px 30px rgb(0, 0, 0);
        }
    .btn{
      display: block;
      margin-left: auto;
      margin-right: auto;
      font-size: 18px;
      margin-top: 18px;
    }

    .Error
    {
      display: block;
      text-align: center;
      color: azure;
      font-size: 20px;
      margin-bottom: 5px;
    }
</style>
<body>



<form action="" method="post" name="Login_page">
<span class="Error"> <?php echo $msg; ?> </span>
<div class="container ex" style="align-items: center;">
    <div class="input-group flex-nowrap" style="padding: 15px;margin-top: 8px;">
        <span class="input-group-text" id="addon-wrapping"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle"
            viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd"
              d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
          </svg>
        </span>
        <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" >
      </div>


      <div class="input-group flex-nowrap" style="padding: 15px;margin-top: 8px;">
        <span class="input-group-text" id="addon-wrapping">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
  <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
  <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"/>
</svg>
</span>
        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="addon-wrapping">
      </div>

      
      <!-- <a role="button" type="submit" class="btn btn-outline-success" style="display: flex;justify-content: center; background: rgb(45, 45, 50);margin: 80px;margin-top: 80px;margin-top: 25px;" >Login</a> -->

      <input name="submit" type="submit" class="btn btn-outline-success" value="Login" 
      <?php 
      if(isset($_SESSION['username'])){
        echo 'disabled' ;
      }
        ?>>



</div>

</form>


</body>
</html>