<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/func/register.php');
  require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/Signin/auth.php');

  if(isset($_COOKIE['username']) and isset($_COOKIE['token'])){
    if(!verify_session($_COOKIE['username'],$_COOKIE['token'])){
      header("Location: ../Signin/Signin.php");
    }
  }else{
    header("Location: ../Signin/Signin.php");
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
    <title>Signin Template · Bootstrap v5.0</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="./sign-in/signin.css" rel="stylesheet">
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
    <script>
      //Alert Hiding in 5 seconds
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
    </script>
  </head>

<body>
  <section class="vh-100" style="background-color: Tomato;">
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
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-13">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

              <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Post your Property</p>

                <form action="./../func/register.php" method="POST" enctype="multipart/form-data">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <select type="text" name="Facilities" class="form-select form-select-md mb-1" required autofocus>
                    <option selected value="1BHK">1BHK</option>
                    <option value="2BHK">2BHK</option>
                    <option value="3BHK">3BHK</option>
                    <option value="4BHK">4BHK</option>
                    </select>
                    <label class="form-label" for="form3Example3c">Facilities</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="number" class="form-control" name="Area" min="10" step="10" required autofocus>
                      <label class="form-label" for="form3Example3c">Area</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="number" class="form-control" name="Price" min="1000" step="1000" required autofocus>
                      <label class="form-label" for="form3Example4c">Price</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="text" class="form-control" name="District" required autofocus>
                    <label class="form-label" for="form3Example4c">District</label>
                    <Address class="btn btn-warning">Type without spell change</Address>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="text" class="form-control" name="City" required autofocus>
                    <label class="form-label" for="form3Example4c">City</label>
                    <Address class="btn btn-warning">Type without spell change</Address>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="number" class="form-control" name="WaterFacility" min="1" max="24" required autofocus>
                    <label class="form-label" for="form3Example4c">WaterFacility</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="text" class="form-control" name="HouseAddress" required autofocus>
                    <label class="form-label" for="form3Example4c">Area</label>
                    <Address class="btn btn-warning">Village or Street and pincode </Address>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <select class="form-select form-select-sm" name="RentorSell" required autofocus>
                    <option selected value="Rent">Rent</option>
                    <option value="Sell">Sell</option>
                    </select>
                    <label class="form-label" for="form3Example4c">Rent or Sell</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="text" class="form-control" name="Contact" required autofocus>
                    <label class="form-label" for="form3Example4c">Contact</label>
                    <Address class="btn btn-warning">Mobile or email</Address>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input class="form-control" type="file" id="pic" name="pic[]" multiple required autofocus>
                    <label class="form-label" for="form3Example4c">Pictures</label>
                    <Address class="btn btn-warning">Upload atleast more than 2 pictures</Address>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input
                      class="form-check-input me-2"
                      type="checkbox"
                      value=""
                      id="form2Example3c"
                    />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                  <input type="submit" class="btn btn-primary" name="submit" value="submit">
                  <input type="reset" class="btn btn-secondary">
                  </div>
                </form>
              </div>

              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-start order-1 order-lg-2">
                <img src="./dashboard/Register.jpg" class="img-fluid" alt="Sample image">
              </div>
          
              <a class="navbar-brand" href="./Dashboard.php">Back to Houses</a>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </body>
</html>
