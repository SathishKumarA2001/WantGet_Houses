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

<main>

  <div class="album py-5 bg-light">
    <div class="container">
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

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
          <?php $x = rand(0,$s)?>
          <div class="bd-placeholder-img card-img-top" style="height: 255px; width: 100%; background: url(<?= $get_houses["$x"]["pic2"]?>); background-position: center; background-size: contain;background-repeat: no-repeat;">
              </div>

            <div class="card-body">
              <p class="card-text">  
                <?php echo "Facilities : ".$get_houses["$x"]["Facilities"]."</br>"; 
                      echo "Price : ".$get_houses["$x"]["Price"]."</br>"; 
                      echo "House : ".$get_houses["$x"]["RentorSell"];
                ?>
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="./picture.php?House_id=<?php echo $get_houses["$x"]["House_id"]?>&RentorSell=<?php echo $get_houses["$x"]["RentorSell"]?>" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                </div>
                <small class="text-muted">house</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <?php $x = rand(0,$s)?>
          <div class="bd-placeholder-img card-img-top" style="height: 255px; width: 100%; background: url(<?= $get_houses["$x"]["pic1"]?>); background-position: center; background-size: contain;background-repeat: no-repeat;">
              </div>

            <div class="card-body">
              <p class="card-text">  
                <?php echo "Facilities : ".$get_houses["$x"]["Facilities"]."</br>"; 
                      echo "Price : ".$get_houses["$x"]["Price"]."</br>"; 
                      echo "House : ".$get_houses["$x"]["RentorSell"];
                ?>
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <a href="./picture.php?House_id=<?php echo $get_houses["$x"]["House_id"]?>&RentorSell=<?php echo $get_houses["$x"]["RentorSell"]?>" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                </div>
                <small class="text-muted">house</small>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

</main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
