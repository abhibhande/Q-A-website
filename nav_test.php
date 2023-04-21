
<?php
include_once 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q & A world</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
<script src="popper.min.js"></script>
<script>
  

const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
const appendAlert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    '</div>'
  ].join('')

  alertPlaceholder.append(wrapper)
}

const alertTrigger = document.getElementById('liveAlertBtn')
if (alertTrigger) {
  alertTrigger.addEventListener('click', () => {
    appendAlert('Nice, you triggered this alert message!', 'success')
  })
}

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
            <a class="nav-link btn btn-outline-primary" aria-current="page btn btn-outline-primary" href="#">About</a>
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
          echo' <a style="margin-left: 5px;" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#LOGOUT" href="login.php" >'.$_SESSION['username'].'';
        }
        else
        echo '<a style="margin-left: 5px;" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#LOGOUT"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle"
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
  <div id="liveAlertPlaceholder">welcome</div>

    <!-- Button trigger modal -->
<a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#LOGOUT">
    Launch demo modal
      </a>
  
  <!-- Modal -->
  <div class="modal fade" id="LOGOUT" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          hello abhi
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="liveAlertBtn">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>

</body>
</html>