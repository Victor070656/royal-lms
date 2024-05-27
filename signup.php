<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">




<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="./img/logo/logo2.png">

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

  <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet%401.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/vendors.css">
  <link rel="stylesheet" href="css/main.css">

  <title>Royal-Educity</title>
</head>

<body class="preloader-visible" data-barba="wrapper">
  <!-- preloader start -->
  <div class="preloader js-preloader">
    <!-- <div class="preloader__bg"></div> -->
  </div>
  <!-- preloader end -->


  <main class="main-content  
  bg-beige-1
">




    <div class="content-wrapper  js-content-wrapper">

      <section class="">

        <div class="">
          <div class="container">
            <div class="row justify-center items-center my-5">
              <div class="col-xl-8 col-lg-9">
                <div class="px-50 py-50 md:px-25 md:py-25 bg-white shadow-1 rounded-16">
                  <div class="py-3">
                    <h6><a href="../index.php"><i class="text-13 icon-chevron-left mr-5"></i>Home</a></h6>
                  </div>
                  <h3 class="text-30 lh-13">Sign Up</h3>
                  <p class="mt-10">Already have an account? <a href="login.php" class="text-purple-1">Log in</a></p>

                  <form class="contact-form  row y-gap-20 pt-30" method="post">

                    <div class="">
                      <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Full Name <span style="color: red;">*</span></label>
                      <input type="text" name="name" placeholder="Last Name" required>
                    </div>
                    <div class="">
                      <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email <span style="color: red;">*</span></label>
                      <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="">
                      <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Password <span style="color: red;">*</span></label>
                      <input type="password" name="password" placeholder="******" required>
                    </div>
                    <div class="col-12">
                      <button type="submit" name="register" id="submit" class="button -md -green-1 text-dark-1 fw-500 w-1/1">
                        Register
                      </button>
                    </div>

                    <?php
                    if (isset($_POST["register"])) {
                      $name = $_POST["name"];
                      $email = $_POST["email"];
                      $password = $_POST["password"];

                      $checkExistence = mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$email'");
                      if (mysqli_num_rows($checkExistence) < 1) {

                        $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                          echo "<script>alert('Registration Successful'); location.href= 'login.php'</script>";
                        } else {
                          echo "<script>alert('Registration Failed')</script>";
                        }
                      } else {
                        echo "<script>alert('Registration Failed: A user with this email already exists')</script>";
                      }
                    }
                    ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


    </div>
  </main>

  <!-- JavaScript -->
  <script src="https://unpkg.com/leaflet%401.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  <script src="js/vendors.js"></script>
  <script src="js/main.js"></script>
</body>


<!-- Mirrored from creativelayers.net/themes/Royal-Educity-html/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Apr 2024 14:41:57 GMT -->

</html>