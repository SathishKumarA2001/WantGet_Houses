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
    
<header>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg width="32" height="32" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
          <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
        </svg>
        <strong>Houses</strong>
      </a>
      <div class="d-grid gap-2 d-md-block">
        <a class="btn btn-success" href="./Dashboard.php">Dashboard</a>
        <a class="btn btn-secondary" href="./House.php?type=Rent">Rent</a>
        <a class="btn btn-secondary" href="./House.php?type=Sell">Sell</a>
      </div>
    </div>
  </div>
</header>

<main class="shadow-none p-3 mb-5 bg-light rounded">
<div class="container"><br>
<?php
      if(!empty($_GET)){
        if($_GET['type'] == "Rent"){
          $get_houses = get_houses($_GET['type']);
        }elseif($_GET['type'] == "Sell") {
          $get_houses = get_houses($_GET['type']);
        }
      }
      $s = sizeof($get_houses)-1;
      ?>

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

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
