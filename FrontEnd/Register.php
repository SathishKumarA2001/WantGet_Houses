<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/func/register.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Signin Template · Bootstrap v5.0</title>

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
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

<main class="form-signin">
<!--It shows success if the data have registered successfully -->
<?php
    if (isset($_GET['msg']) and isset($_GET['msg']) == 1) {
    ?>
    <div class="alert alert-success" role="alert">
      <?php
        echo "Registered Succesfully";
      ?>
    </div>
    <?php
    }
    ?>
    <?php
    if(isset($_GET['error']) and isset($_GET['error']) == 2){ 
    ?>
    <div class="alert alert-danger" role="alert">
      <?php
        echo "fill all rows";
      ?>
    </div>
    <?php
    }else if(isset($_GET['error'])){
    ?>
    <div class="alert alert-danger" role="alert">
      <?php
        echo "Can't Register";
      ?>
    </div>
    <?php
    }
    ?>
 
 <nav class="navbar navbar-light bg-light">
  <div class="container alert-info">
    <a class="navbar-brand" href="./Dashboard.php">Back to Houses</a>
  </div>
</nav>

  <svg width="42" height="42" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
  </svg>
  <h1 class="h3 mb-3 fw-normal">Please Register your House</h1>

  <form action="./../func/register.php" method="POST" enctype="multipart/form-data">
    <div class="form-floating">
      <input type="text" class="form-control" id="Facilities" name="Facilities" required autofocus>
      <label for="floatingInput">Facilities</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="Area" name="Area" required autofocus>
      <label for="floatingInput">Area</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="Price" name="Price" required autofocus>
      <label for="floatingInput">Price</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="BuildedMaterial" name="BuildedMaterial" required autofocus>
      <label for="floatingInput">BuildedMaterial</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="CielingMaterial" name="CeilingMaterial" required autofocus>
      <label for="floatingInput">CielingMaterial</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="WaterFacility" name="WaterFacility" required autofocus>
      <label for="floatingInput">WaterFacility</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="HouseAddress" name="HouseAddress" required autofocus>
      <label for="floatingInput">HouseAddress</label>
    </div>
    <div class="form-floating">
    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="RentorSell" required autofocus>
      <option selected value="Rent">Rent</option>
      <option value="Sell">Sell</option>
    </select>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="Contact" name="Contact" required autofocus>
      <label for="floatingInput">Contact</label>
    </div> 
    <div class="form-floating">
      <input class="form-control" type="file" id="pic" name="pic[]" multiple required autofocus>
      <label for="floatingInput">Picture</label>
    </div><br>
    <input class="w-100 btn btn-lg btn-primary" type="submit" name="submit">
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>

  </form>
</main>

  </body>
</html>
