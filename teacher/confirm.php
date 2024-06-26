<?php
include("../config.php");
include("../function.php");
session_start();

if (!isset($_GET["email"])) {
  echo "<script>location.href='forgot.php'</script>";
}

$email = htmlspecialchars($_GET["email"]);
$checkUser = mysqli_query($conn, "SELECT * FROM `teachers` WHERE `email` = '$email' ");


if ($email == "") {
  echo "<script>location.href='forgot.php'</script>";
}
// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//   echo "<script>location.href='forgot.php'</script>";
// }

$newCode = rand(100000, 999999);

?>
<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="./img/logo/logo2.png">

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

  <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet%401.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/vendors.css" />
  <link rel="stylesheet" href="css/main.css" />

  <title>Royal-Educity</title>
</head>

<body class="preloader-visible" data-barba="wrapper">
  <!-- preloader start -->
  <div class="preloader js-preloader">
    <!-- <div class="preloader__bg"></div> -->
  </div>
  <!-- preloader end -->

  <main class="main-content bg-beige-1">


    <div class="content-wrapper js-content-wrapper">
      <section class="">


        <div class="">
          <div class="container" style="height: 100vh;">
            <div class="row justify-content-center align-items-center h-100">
              <div class="col-xl-6 col-lg-8 mx-auto">
                <div class="px-50 py-50 md:px-25 md:py-25 bg-white shadow-1 rounded-16">
                  <div class="py-3">
                    <h6><a href="../"><i class="text-13 icon-chevron-left mr-5"></i>Home</a></h6>
                  </div>
                  <h3 class="text-30 lh-13">Confirmation Code</h3>
                  <p class="mt-10">
                    We sent you a confirmation code. If you didn't receive it, please check your spam folder.
                  </p>

                  <form class="contact-form row y-gap-20 pt-30" method="post">
                    <div class="col-12">
                      <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Code</label>
                      <input type="number" name="code" placeholder="123456" class="form-control" />
                    </div>
                    <div class="col-12">
                      <button type="submit" name="confirm" id="submit" class="button -md -green-1 text-dark-1 fw-500 w-1/1">
                        Confirm Code
                      </button>
                    </div>
                    <?php
                    if (isset($_POST["confirm"])) {
                      $code = $_POST["code"];
                      $sql = "SELECT * FROM `teachers` WHERE `email` = '$email' AND `code` = '$code'";
                      $result = mysqli_query($conn, $sql);


                      if (mysqli_num_rows($result) > 0) {
                        echo "<script>alert('Code confirmed ✅'); location.href='new-password.php?email=$email&code=$code'</script>";
                      } else {
                        echo "<script>alert('Failed!');</script>";
                      }
                    }
                    ?>
                  </form>
                  <form method="post" class="text-center mt-4">
                    <button type="submit" class="btn btn-link" name="resend"><u>Resend Code</u></button>
                    <?php
                    if (isset($_POST["resend"])) {
                      $updateCode = mysqli_query($conn, "UPDATE `teachers` SET `code` = '$newCode' WHERE `email` = '$email'");
                      if ($updateCode) {
                        $send = sendMail($email, "Confirmation Code", $body, "Confirmation code from Royal-Educity sent to your email address");
                        if ($send) {
                          echo "<script>location.href='confirm.php?email=$email';</script>";
                        } else {
                          echo "<script>alert('An error occured. Email not sent!');</script>";
                        }
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
  <script src="https://unpkg.com/leaflet%401.7.1/dist/leaflet.js"></script>
  <script src="js/vendors.js"></script>
  <script src="js/main.js"></script>
</body>

<!-- Mirrored from creativelayers.net/themes/Royal-Educity-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Apr 2024 14:41:57 GMT -->

</html>