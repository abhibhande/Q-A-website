<?php
include_once 'connect.php';
session_start();
?>

<html>

<head>
  <?php

    if(isset($_POST['logout']))
    {
      session_unset();
      session_destroy();

    }



  ?>

<script>

// setTimeout(,1000) ;

// function logouted()
//  {
//    alert("Logout Successful");
//  }

</script>
</head>
  <body>

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid ">
      <a class="navbar-brand" href="index.php">Q & A</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" aria-current="page" href="index.php">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn btn-outline-primary"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu">
                <?php
                $sql="select * from question_type";
                $category=mysqli_query($conn,$sql);

                if(mysqli_num_rows($category)>0)
                {
                    while($data=mysqli_fetch_array($category))
                    {
                        echo '<li><a class="dropdown-item btn btn-outline-primary" href="wt.php?id='.$data['id'].'">'.$data['type_name'].'</a></li>';
                    }
                }
                ?>
              
              <!-- <li><a class="dropdown-item btn btn-outline-primary" href="wt.php?category='Virtual Reality'">Virtual Reality</a></li>
              <li><a class="dropdown-item btn btn-outline-primary" href="wt.php?category='Augumented Reality'">Augumented Reality</a></li>
              <li><a class="dropdown-item btn btn-outline-primary" href="wt.php?category='DBMS System'">DBMS System</a></li>
              <li><a class="dropdown-item btn btn-outline-primary" href="wt.php?category='Artificial Intelligence'">Artificial Intelligence</a></li>
              <li><a class="dropdown-item btn btn-outline-primary" href="wt.php?category='Operating System'">Operating System</a></li> -->

            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" aria-current="page btn btn-outline-primary" href="about.php">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" aria-current="page btn btn-outline-primary" href="#">Contact us</a>

          </li>
        </ul>
      <form class="d-flex" role="search" style="padding-right: 5px;">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-warning " type="submit">Search</button>

           
           <?php
        if(isset($_SESSION['username']))
        {
          echo' <a style="margin-left: 5px;" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#LOGOUT"">'.$_SESSION['username'].'';
        }
        else
        echo '<a style="margin-left: 5px;" class="btn btn-outline-warning" href="login.php"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle"
        viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
        <path fill-rule="evenodd"
          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
      </svg>';
        
         ?> 

        </a>

        
         
        </form>


        
        
        
      </div>
    </div>
  </nav>

   <!-- Modal -->

   <form action="" method="post">
   <div class="modal fade" id="LOGOUT" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"- >
    <div class="modal-dialog" >
      <div class="modal-content" style="background-color: white; color:black" >
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Welcome <?php echo $_SESSION['username']; ?>,<br></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          You can logout from here<br>
          See You Soon <?php echo $_SESSION['username']; ?>
        </div>
        <div class="modal-footer">
          <button name="logout" type="submit" class="btn btn-outline-danger" data-bs-dismiss="modal" onclick="logouted()">logout</button>
          
        </div>
      </div>
    </div>
  </div>
  </form>

  </body>
  </html>