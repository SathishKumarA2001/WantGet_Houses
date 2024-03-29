<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/Signin/auth.php');
  if(isset($_COOKIE['username']) and isset($_COOKIE['token'])){
    if(!verify_session($_COOKIE['username'],$_COOKIE['token'])){
      header("Location: ./../Signin/Signin.php");
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .fixed-bg {
  min-height: 10%;
  background-size: cover;
  -o-background-size: cover; 
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-position: center center;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
    
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./dashboard/dashboard.css" rel="stylesheet">
  </head>
  <body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><span data-feather="home"></span>  wantGet_Houses</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="shield"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./Register.php">
              <span data-feather="user-check"></span>
              Register House
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./House.php?type=Rent">
              <span data-feather="home"></span>
              Houses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat" >
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              My_houses
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <br>

        
<?php
  //Alert Box for Delete method
  if(isset($_GET['delmsg'])) {
    if($_GET['delmsg'] == 'success'){
?>
  <div class="alert alert-success" role="alert">
  Deleted Successfully
</div>
<?php
  }
  }
  if(isset($_GET['delmsg'])){
    if($_GET['delmsg'] == 'failure'){
?>
<div class="alert alert-warning" role="alert">
  Can't Delete...
</div>
<?php
    }
  }
?>

    <?php
    if (isset($_GET['msg'])) {
      if($_GET['msg'] == '1'){
    ?>
    <div class="alert alert-success" role="alert">
      Updated Successfully
    </div>
    <?php
      }
    }
    if (isset($_GET['msg'])) {
      if($_GET['msg'] == '0'){
    ?>
    <div class="alert alert-warning" role="alert">
  Can't Update...
</div>
<?php
    }
  }
?>

      <br>
      <h5 class="fixed-bg">A sea of Houses | Take one you liked</h5>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./dashboard/nature.jpg" class="d-block w-100" width="1200" height="420px" alt="Apartments">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="fixed-bg">Solo Forest Houses for peace </h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./dashboard/apartment.jpg" class="d-block w-100" width="1200" height="420px" alt="Single House">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="fixed-bg">Apartments for peoples who loves traffic with peoples</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./dashboard/hut.jpg" class="d-block w-100" width="1200" height="420px" alt="Huts">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="fixed-bg">Huts for naturistic peoples</h5>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
  </button>
</div>
    </main>
  </div>
</div>

<!--POP OVER PASSWORD PAGE --> 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <form action="./My_house.php" method=POST>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">PASSWORD:</label>
            <input class="form-control" type="password" name="password"><br>
            <button type="submit" name="submit" class="btn btn-primary">Verify</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget
  var recipient = button.getAttribute('data-bs-whatever')
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body input')

  modalTitle.textContent = 'New message to ' + recipient
  modalBodyInput.value = recipient
})

//Alert Hiding in 5 seconds
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
</script>

    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="./dashboard/dashboard.js"></script>
  </body>
</html>
