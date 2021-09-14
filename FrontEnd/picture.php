<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/func/get_one_house.php');
  if(empty($_GET)){
    echo 'Wrong Entry: Please do your testing by another way';
    die();
  }
?>

<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">

    <!-- Bootstrap core CSS  <div class="p-1 carousel slide"><img src="./dashboard/hut.jpg" width=900px height=600px> </div>-->
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
      
    img,.carousel-inner {
    display: block;
    max-width:880px;
    max-height:880px;
    width: auto;
    height: auto;
    }
    #details{
      padding: 20px;
    }
    .detail{
      letter-spacing: 2px;
      line-height: .5;
      font-variant: small-caps;
      border: 2px solid grey;
      border-radius: 5px;
    }


    </style>
    <link href="./picture/picture.css" rel="stylesheet">
  </head>

<?php
    if(!empty($_GET['House_id']) and !empty($_GET['RentorSell'])){
      $House_id = $_GET['House_id'];
      $RentorSell = $_GET['RentorSell'];
      $get_one_house = get_one_house($House_id,$RentorSell);
      if($get_one_house == 0){
        echo "Wrong Entry Try to get in a straight way";
      }
    }
?>


<body class="d-flex h-100 text-center text-white bg-dark ">
<!-- Picture Box -->
  <div class="d-flex p-2">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= $get_one_house["Pic1"][0]?>" class="d-block w-100" alt="pic1">
        </div>
        <div class="carousel-item">
          <img src="<?= $get_one_house["Pic2"][0]?>" class="d-block w-100" alt="pic2">
        </div>
      </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<!-- Details Box-->
<div class="d-flex flex-column pt-3">
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./House.php?type=Rent">Back to Houses</a>
  </div>
</nav><br>
  <div class="p-2 detail"><p><b>Facilities</b> : <?=$get_one_house["Facilities"][0]?></p></div>
  <div class="p-2 detail"><p><b>Area</b> : <?=$get_one_house["Area"][0]?></p></div>
  <div class="p-2 detail"><p><b>Price</b> : <?=$get_one_house["Price"][0]?></p></div>
  <div class="p-2 detail"><p><b>Builded Material</b> : <?=$get_one_house["BuildedMaterial"][0]?></p></div>
  <div class="p-2 detail"><p><b>Ceiling Material</b> : <?=$get_one_house["CeilingMaterial"][0]?></p></div>
  <div class="p-2 detail"><p><b>Water Facility</b> : <?=$get_one_house["WaterFacility"][0]?></p></div>
  <div class="p-2 detail"><p><b>House Address</b> : <?=$get_one_house["HouseAddress"][0]?></p></div>
  <div class="p-2 detail"><p><b>Rent or Sell</b> : <?=$get_one_house["RentorSell"][0]?></p></div>
  <div class="p-2 detail"><p><b>Contact</b> : <?=$get_one_house["Contact"][0]?></p></div>
</div>

<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="./dashboard/dashboard.js"></script>

</body>
</html>
