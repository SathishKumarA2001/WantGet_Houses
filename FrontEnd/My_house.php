<?php
session_start();
  require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/func/my_house.php');
  require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/func/get_one_house.php');
  //require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/func/Delete.php');
  require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/Signin/auth.php');

    if(isset($_COOKIE['username']) and isset($_COOKIE['token']) and isset($_POST['password'])){
      if(!verify_session($_COOKIE['username'],$_COOKIE['token'])){
        header("Location: ./../Signin/Signin.php");
      }else{
        $house = user_house_id($_COOKIE['username'],$_POST['password']);
        if(!$house){
          header("Location: ./Dashboard.php?err=1");
        }
        $_SESSION['password'] = $_POST['password'];
        $get_one_house = get_one_house($house[0][0],$house[0][1]);
        if($get_one_house == 0){
          echo "Wrong Entry Try to get in a straight way";
        }
      }
    }elseif(isset($_COOKIE['username']) and isset($_COOKIE['token']) and isset($_SESSION['password'])){
      if(!verify_session($_COOKIE['username'],$_COOKIE['token'])){
        header("Location: ./../Signin/Signin.php");
      }else{
        $house = user_house_id($_COOKIE['username'],$_SESSION['password']);
        if(!$house){
          header("Location: ./Dashboard.php?err=1");
        }
        // Previous and Next Algorithmic code
        $size = sizeof($house);
        $_SESSION['count'];
        if(isset($_GET['next'])){
          $_SESSION['count'] = $_SESSION['count']+1;
          if($_SESSION['count'] == $size){
            $_SESSION['count'] = 0;
          }
        }elseif(isset($_GET['previous'])){
          $_SESSION['count'] = $_SESSION['count']-1;
          if($_SESSION['count'] <= 0){
            $_SESSION['count'] = 0;
          }
        }
        $get_one_house = get_one_house($house[$_SESSION['count']][0],$house[$_SESSION['count']][1]);
        if($get_one_house == 0){
        echo "Wrong Entry Try to get in a straight way";
        }
      }
    }else{
      header("Location: ./../Signin/Signin.php");
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
<link href="./picture/image_model.css" rel="stylesheet">
    <link href="./picture/cover.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- To remove modal-backdrop bug -->
  <script>
    $(document).ready(function(){
  $("button").click(function(){
    $("div").removeClass("modal-backdrop");
  });
});
    </script>
  </head>

<body class="d-flex h-100 text-center text-white bg-dark ">
<div class="container">

<ul class="nav">
  <li class="nav-item">
    <a href="./My_house.php?previous=1" class="nav-link active">Previous</a>
  </li>
  <li class="nav-item">
    <a href="./My_house.php?next=1"  class="nav-link active">Next House</a>
  </li>
</ul>

  <div class="row">
    <div class="col-sm-8">
<!-- Picture Box -->
  <div class="d-flex p-2">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= $get_one_house["Pic1"][0]?>" class="d-block w-100" alt="pic1" id="myImg">
        </div>
        <div class="carousel-item">
          <img src="<?= $get_one_house["Pic2"][0]?>" class="d-block w-100" alt="pic2" id="myImg1">
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
<a class="p-2" href="./House.php?type=Rent">Back to Houses</a>
  <div class="detail"><p><b>Facilities</b> : <?=$get_one_house["Facilities"][0]?></p></div>
  <div class="detail"><p><b>Area</b> : <?=$get_one_house["Area"][0]?></p></div>
  <div class="detail"><p><b>Price</b> : <?=$get_one_house["Price"][0]?></p></div>
  <div class="detail"><p><b>Builded Material</b> : <?=$get_one_house["BuildedMaterial"][0]?></p></div>
  <div class="detail"><p><b>Ceiling Material</b> : <?=$get_one_house["CeilingMaterial"][0]?></p></div>
  <div class="detail"><p><b>Water Facility</b> : <?=$get_one_house["WaterFacility"][0]?></p></div>
  <div class="detail"><p><b>House Address</b> : <?=$get_one_house["HouseAddress"][0]?></p></div>
  <div class="detail"><p><b>Rent or Sell</b> : <?=$get_one_house["RentorSell"][0]?></p></div>
  <div class=" detail"><p><b>Contact</b> : <?=$get_one_house["Contact"][0]?></p></div>
  <br>
  <div>
  <nav class="nav nav-pills">
  <button class="nav-link active detail p-2" id="myBtn" type="button" data-backdrop="false"  data-bs-toggle="modal" data-bs-target="#exampleModal">
  Edit
  </button>     

  <form action="./../func/Delete.php" method="POST"> 
  <input type="hidden" name="House_id" value="<?=$house[$_SESSION['count']][0]?>" >
  <input type="hidden" name="RentorSell" value="<?=$house[$_SESSION['count']][1]?>" >
  <input type="submit" class="nav-link detail detail p-2" value="Delete">
  </form>
</nav>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" style="background-color:grey;">
    <div class="modal-content" style="background-color:grey;">
      <div class="modal-header" style="background-color:Dodgerblue;">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form action="./../func/update.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="House_id" id="House_id" value="<?=$get_one_house["House_id"][0]?>" />
      
  <div class="row mb-4" style="user-select: auto;">
        <div class="col" style="user-select: auto;">
          <input type="text" class="form-control" id="Facilities" name="Facilities" value="<?=$get_one_house["Facilities"][0]?>" required autofocus>
          <label>Facilities</label>
        </div>
        <div class="col" style="user-select: auto;">
          <input type="text" class="form-control" id="Area" name="Area" value="<?=$get_one_house["Area"][0]?>" required autofocus>
          <label>Area</label>
        </div>
  </div>
  <div class="row mb-4" style="user-select: auto;">
        <div class="col" style="user-select: auto;">
          <input type="text" class="form-control" id="Price" name="Price" value="<?=$get_one_house["Price"][0]?>" required autofocus>
          <label>Price</label>
        </div>
        <div class="col" style="user-select: auto;">
        <input type="text" class="form-control" id="BuildedMaterial" name="BuildedMaterial" value="<?=$get_one_house["BuildedMaterial"][0]?>" required autofocus>
        <label>BuildedMaterial</label>
        </div>
  </div>
  <div class="row mb-4" style="user-select: auto;">
        <div class="col" style="user-select: auto;">
        <input type="text" class="form-control" id="CielingMaterial" name="CeilingMaterial" value="<?=$get_one_house["CeilingMaterial"][0]?>" required autofocus>
      <label>CielingMaterial</label>
        </div>
        <div class="col" style="user-select: auto;">
        <input type="text" class="form-control" id="WaterFacility" name="WaterFacility" value="<?=$get_one_house["WaterFacility"][0]?>" required autofocus>
      <label>WaterFacility</label>
        </div>
  </div>
  <div class="row mb-4" style="user-select: auto;">
        <div class="col" style="user-select: auto;">
        <input type="text" class="form-control" id="HouseAddress" name="HouseAddress" value="<?=$get_one_house["HouseAddress"][0]?>" required autofocus>
      <label>HouseAddress</label>
        </div>
        <div class="col" style="user-select: auto;">
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="RentorSell" value="<?=$get_one_house["RentorSell"][0]?>" required autofocus>
      <option selected value="Rent">Rent</option>
      <option value="Sell">Sell</option>
      </select>
        </div>
  </div>
  <div class="row mb-4" style="user-select: auto;">
        <div class="col" style="user-select: auto;">
        <input type="text" class="form-control" id="Contact" name="Contact" value="<?=$get_one_house["Contact"][0]?>" required autofocus>
      <label>Contact</label><br>
        </div>
        <div class="col" style="user-select: auto;">
        <input class="form-control" type="file" id="pic" name="pic[]" multiple autofocus>
      <label>Picture</label>
        </div>
  </div>
  <input class="btn btn-primary" type="submit" name="submit" value="submit">
  </form>
      </div>
    </div>
  </div>
</div>

<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="./dashboard/dashboard.js"></script>

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
