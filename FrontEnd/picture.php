<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/func/get_one_house.php');
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
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">

    <!-- Bootstrap core CSS  <div class="p-1 carousel slide"><img src="./dashboard/hut.jpg" width=900px height=600px> </div>-->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="./picture/picture.css" rel="stylesheet">
    <link href="./picture/image_model.css" rel="stylesheet">
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

<div class="container">
  <div class="row">
    <div class="col-sm-6">
<!-- Picture Box -->
  <div class="d-flex p-2">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= $get_one_house["pic1"]?>" class="d-block w-100" alt="pic1" id="myImg">
        </div>
        <div class="carousel-item">
          <img src="<?= $get_one_house["pic2"]?>" class="d-block w-100 " alt="pic2" id="myImg1">
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
</div>
    <div class="col-sm-4">

<!-- Details Box-->
<div class="d-flex flex-column pt-3">
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./House.php?type=Rent">Back to Houses</a>
  </div>
</nav><br>
  <div class="p-2 detail"><p><b>Facilities</b> : <?=$get_one_house["Facilities"]?></p></div>
  <div class="p-2 detail"><p><b>Area</b> : <?=$get_one_house["Area"]?></p></div>
  <div class="p-2 detail"><p><b>Price</b> : <?=$get_one_house["Price"]?></p></div>
  <div class="p-2 detail"><p><b>District</b> : <?=$get_one_house["District"]?></p></div>
  <div class="p-2 detail"><p><b>City</b> : <?=$get_one_house["City"]?></p></div>
  <div class="p-2 detail"><p><b>Water Facility</b> : <?=$get_one_house["WaterFacility"]?></p></div>
  <div class="p-2 detail"><p><b>House Address</b> : <?=$get_one_house["HouseAddress"]?></p></div>
  <div class="p-2 detail"><p><b>Rent or Sell</b> : <?=$get_one_house["RentorSell"]?></p></div>
  <div class="p-2 detail"><p><b>Contact</b> : <?=$get_one_house["Contact"]?></p></div>
</div>

</div>
</div>
</div>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="./dashboard/dashboard.js"></script>


<!-- Image Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var img1 = document.getElementById("myImg1");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}
img1.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>

</body>
</html>
