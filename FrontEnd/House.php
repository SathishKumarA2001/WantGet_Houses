<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/func/home.php');
  require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/func/filter.php');
  require_once('../Signin/auth.php');

  if(isset($_COOKIE['username']) and isset($_COOKIE['token'])){
    if(!verify_session($_COOKIE['username'],$_COOKIE['token'])){
      header("Location: ../Signin/Signin.php");
    }
  }

  if(empty($_GET)){
    echo 'Wrong Entry: Please do your testing by another way';
    die();
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
    <title>Album example · Bootstrap v5.0</title>
   
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
<link href="./../FrontEnd/assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
      .font{
        font-size : 30px;
        color : rgb(255, 0, 0);
      }
      }
    </style>

</head>
  <body>
    <?php 
    /* Rent and sell house code */
      $s = NULL;
      $get_houses = array();
      if(!empty($_GET)){
        if($_GET['type'] == "Rent" and !isset($_GET['filter'])){
          $get_houses = get_houses($_GET['type']);
        }elseif($_GET['type'] == "Sell" and !isset($_GET['filter'])){
          $get_houses = get_houses($_GET['type']);
        }elseif(isset($_GET['type']) and isset($_GET['filter'])){
          $get_houses = $_SESSION['get_houses'];
        }
      }

      $s = sizeof($get_houses)-1;
      ?>

    <!--POP OVER PASSWORD PAGE --> 
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content bg-dark rounded-pill">
      <div class="modal-body">
        <ul class="nav justify-content-center">
        <li><form action="../func/filter.php" method="POST"> 
          <select type="text" id="Facilities" name="Facilities" class="form-select form-select-md mb-1" autofocus>
          <option selected></option>
          <option value="1BHK">1BHK</option>
          <option value="2BHK">2BHK</option>
          <option value="3BHK">3BHK</option>
          <option value="4BHK">4BHK</option>
          </select></li>&nbsp;
        <li><input class="form-control" type="text" name="District" placeholder="District"></li>&nbsp;
        <li><input class="form-control" type="text" name="City" placeholder="City"></li>&nbsp;
        <li><input class="form-control" type="text" name="HouseAddress" placeholder="Village or Street"></li>&nbsp;
        <li><input type="hidden" name="RentorSell" value="<?=$_GET['type'];?>"></li>&nbsp;
      
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Price</button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
      <input class="dropdown-item" type="text" name="Price_min" placeholder="min">
      <input class="dropdown-item" type="text" name="Price_max" placeholder="max">
  </ul>
  </div>&nbsp;
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Area</button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
      <input class="dropdown-item" type="text" name="Area_min" placeholder="min">
      <input class="dropdown-item" type="text" name="Area_max" placeholder="max">
  </ul>
  </div>&nbsp;
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">WaterFacility</button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
      <input class="dropdown-item" type="text" name="Water_min" placeholder="min">
      <input class="dropdown-item" type="text" name="Water_max" placeholder="max">
  </ul>
  </div>&nbsp;
        <input class="btn btn-secondary" type="submit" name="submit" value="submit">
        </form>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- ------------------- -->    

<header>
  <div class="navbar navbar-dark bg-dark shadow-sm position-fixed start-0 end-0">
    <div class="container">
      <div class="d-grid gap-2 d-md-block">
        <a class="btn btn-success" href="./Dashboard.php">Dashboard</a>
        <a class="btn btn-secondary" href="./House.php?type=Rent">Rent</a>
        <a class="btn btn-secondary" href="./House.php?type=Sell">Sell</a>
        <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Filter</a>
        </form>
      </div>
    </div>
  </div>
</header>

<main class="shadow-none p-3 mb-5 bg-light rounded">
<br><br><br><br><br><br><br>
<div class="container">
  <!---------------------------------- php code ------------------------------------------------->
<div class="row shadow-lg p-3 mb-5 bg-body rounded">
<?php $x = rand(0,$s)?>
    <div class="col-sm-4">  
    <img src="<?= $get_houses["$x"]["pic1"]?>" style="height: 200px; width: 100%; background-position: center; background-repeat: no-repeat;">
    </div>
    <div class="col-sm-4">
    <br><div class="container font"><b>&#x20b9;<?= $get_houses["$x"]["Price"];?> </b></div>
    <div class="container font-monospace">Property for&nbsp;<b class="fst-italic"><?=$get_houses["$x"]["RentorSell"];?></b></div><br>
    <p style="border-top: 1px solid red;"></p><br>
    <div class="container font-monospace">Posted on,&nbsp;<b><?=$get_houses["$x"]["time"];?></b></div>
  </div><br><br>
  <div class="col-sm-2" style="margin-left:-10px;margin-top:150px">
      <a href="./picture.php?House_id=<?=$get_houses["$x"]["House_id"]?>&RentorSell=<?=$get_houses["$x"]["RentorSell"]?>" class="btn btn-sm btn-outline-secondary">view</a>
    </div>
  </div>
  <!-- ------------------------------------------------------------------------ -->
  <div class="row shadow-lg p-3 mb-5 bg-body rounded">
  <?php $x = rand(0,$s)?>
    <div class="col-sm-4">
      <img src="<?= $get_houses["$x"]["pic1"]?>" style="height: 200px; width: 100%; background-position: center; background-repeat: no-repeat;">
    </div>
    <div class="col-sm-4">
    <br><div class="container font"><b>&#x20b9;<?= $get_houses["$x"]["Price"];?> </b></div>
    <div class="container font-monospace">Property for&nbsp;<b class="fst-italic"><?=$get_houses["$x"]["RentorSell"];?></b></div><br>
    <p style="border-top: 1px solid red;"></p><br>
    <div class="container font-monospace">Posted on,&nbsp;<b><?=$get_houses["$x"]["time"];?></b></div>
  </div><br><br>
  <div class="col-sm-2" style="margin-left:-10px;margin-top:150px">
      <a href="./picture.php?House_id=<?=$get_houses["$x"]["House_id"]?>&RentorSell=<?=$get_houses["$x"]["RentorSell"]?>" class="btn btn-sm btn-outline-secondary">view</a>
    </div>
  </div>
<!-- --------------------------------------------------------------------------- -->
<div class="row shadow-lg p-3 mb-5 bg-body rounded">
<?php $x = rand(0,$s)?>
    <div class="col-sm-4">
      <img src="<?= $get_houses["$x"]["pic1"]?>" style="height: 200px; width: 100%; background-position: center; background-repeat: no-repeat;">
    </div>
    <div class="col-sm-4">
    <br><div class="container font"><b>&#x20b9;<?= $get_houses["$x"]["Price"];?> </b></div>
    <div class="container font-monospace">Property for&nbsp;<b class="fst-italic"><?=$get_houses["$x"]["RentorSell"];?></b></div><br>
    <p style="border-top: 1px solid red;"></p><br>
    <div class="container font-monospace">Posted on,&nbsp;<b><?=$get_houses["$x"]["time"];?></b></div>
  </div><br><br>
  <div class="col-sm-2" style="margin-left:-10px;margin-top:150px">
      <a href="./picture.php?House_id=<?=$get_houses["$x"]["House_id"]?>&RentorSell=<?=$get_houses["$x"]["RentorSell"]?>" class="btn btn-sm btn-outline-secondary">view</a>
    </div>
  </div>
  <!-- --------------------------------------------------------------------------- -->
</div>   
</main>
<div class="mx-auto" style="width: 200px;">
<nav aria-label="...">
  <ul class="pagination pagination-md">
    <li class="page-item active"> <a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
  </ul>
</nav>
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
</script> 
<script>

  </script>


<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="./dashboard/dashboard.js"></script>

</body>
</html>
