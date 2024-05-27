<?php
include("../config.php");
session_start();
if (!isset($_SESSION["user"])) {
  echo "<script>location.href='../login.php'</script>";
} else {
  $user_id = $_SESSION["user"]["id"];
}

$getOrders = mysqli_query($conn, "SELECT * FROM `orders` WHERE `user_id` = '$user_id' ORDER BY `created_at`");



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet%401.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/vendors.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="../w3.css" />

  <title>Royal-Educity</title>
</head>

<body class="preloader-visible" data-barba="wrapper">
  <!-- preloader start -->
  <div class="preloader js-preloader">
    <!-- <div class="preloader__bg"></div> -->
  </div>
  <!-- preloader end -->

  <!-- barba container start -->
  <div class="barba-container" data-barba="container">
    <main class="main-content">
      <header class="header -dashboard -dark-bg-dark-1 js-header">
        <div class="header__container py-20 px-30">
          <div class="row justify-between items-center">
            <div class="col-auto">
              <div class="d-flex items-center">
                <div class="header__explore text-dark-1">
                  <button class="d-flex items-center js-dashboard-home-9-sidebar-toggle">
                    <i class="icon -dark-text-white icon-explore"></i>
                  </button>
                </div>

                <div class="header__logo ml-30 md:ml-20">
                  <a data-barba href="index.php">
                    <img class="-light-d-none" src="img/logo-text.png" style="height: 60px;" alt="logo" />
                    <img class="-dark-d-none" src="img/logo-text2.png" style="height: 60px;" alt="logo" />
                  </a>
                </div>
              </div>
            </div>

            <div class="col-auto">
              <div class="d-flex items-center">


                <div class="relative">
                  <button class="js-darkmode-toggle text-light-1 d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light">
                    <i class="text-24 icon icon-night"></i>
                  </button>
                </div>
                <div class="d-flex items-center sm:d-none">

                  <div class="relative">
                    <button class="d-flex items-center text-light-1 d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light">
                      <a href="logout.php"><i class="text-20 icon icon-power"></i></a>
                    </button>
                  </div>

                </div>


              </div>
            </div>
          </div>
        </div>
      </header>

      <div class="content-wrapper js-content-wrapper">
        <div class="dashboard -home-9 js-dashboard-home-9">
          <div class="dashboard__sidebar scroll-bar-1">
            <div class="sidebar -dashboard">
              <div class="sidebar__item ">
                <a href="./" class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                  <i class="text-20 icon-discovery mr-15"></i>
                  Dashboard
                </a>
              </div>

              <div class="sidebar__item">
                <a href="courses.php" class="d-flex items-center text-17 lh-1 fw-500">
                  <i class="text-20 icon-play-button mr-15"></i>
                  My Courses
                </a>
              </div>

              <div class="sidebar__item -is-active -dark-bg-dark-2">
                <a href="orders.php" class="d-flex items-center text-17 lh-1 fw-500">
                  <i class="text-20 icon-coupon mr-15"></i>
                  My Orders
                </a>
              </div>

              <div class="sidebar__item">
                <a href="reviews.php" class="d-flex items-center text-17 lh-1 fw-500">
                  <i class="text-20 icon-comment mr-15"></i>
                  Reviews
                </a>
              </div>

              <!-- <div class="sidebar__item">
                <a href="dshb-settings.html" class="d-flex items-center text-17 lh-1 fw-500">
                  <i class="text-20 icon-setting mr-15"></i>
                  Settings
                </a>
              </div> -->

              <div class="sidebar__item">
                <a href="logout.php" class="d-flex items-center text-17 lh-1 fw-500">
                  <i class="text-20 icon-power mr-15"></i>
                  Logout
                </a>
              </div>
            </div>
          </div>

          <div class="dashboard__main">
            <div class="dashboard__content bg-light-4">
              <div class="row pb-50 mb-10">
                <div class="col-auto">
                  <h1 class="text-30 lh-12 fw-700">All Orders</h1>
                </div>
              </div>

              <div class="row y-gap-30 pt-30">

                <div class="col-12">
                  <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="d-flex justify-between items-center py-20 px-30 ">
                      <h2 class="text-17 lh-1 fw-500">Orders</h2>
                    </div>
                    <div class="py-30 px-30">
                      <div class="y-gap-40">
                        <?php
                        if (mysqli_num_rows($getOrders) > 0) {
                          while ($recentOrders = mysqli_fetch_assoc($getOrders)) {
                            $course = $recentOrders["course_id"];
                            $courseSql = mysqli_query($conn, "SELECT * FROM `courses` WHERE `course_id` = '$course' ORDER BY `id` DESC");
                            if (mysqli_num_rows($courseSql) > 0) {
                              $courseItem = mysqli_fetch_assoc($courseSql);
                            }
                        ?>

                            <!--  -->
                            <div class="d-flex justify-between border-top-light">

                              <div class="d-flex items-center ">
                                <div class="shrink-1">
                                  <img src="img/dashboard/actions/3.png" alt="image" />
                                </div>
                                <div class="ml-12 ">
                                  <h4 class="text-15 lh-1 fw-500">
                                    <?= $courseItem["course_name"]; ?>
                                  </h4>
                                  <div class="text-13 lh-1 mt-10 <?php if ($recentOrders["status"] == "pending") {
                                                                    echo "w3-text-orange";
                                                                  } else {
                                                                    echo "w3-text-teal";
                                                                  } ?>"><?= $recentOrders["status"]; ?></div>
                                </div>
                              </div>
                              <div class="flex-end w3-border-left ps-2" style="justify-self: end;">
                                <!-- <a href="confirmorder.php?o=<?= $recentOrders["order_id"]; ?>" class="w3-button w3-small w3-indigo w3-round-medium">Confirm</a> -->
                                <p class="w3-tiny"><b>Reference №</b></p>
                                <p class="w3-small"><?= $recentOrders["reference"]; ?></p>
                              </div>
                            </div>
                            <!--  -->
                        <?php
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <footer class="footer -dashboard py-30">
              <div class="row items-center justify-between">
                <div class="col-auto">
                  <div class="text-13 lh-1">
                    © 2024 Royal-Educity. All Right Reserved.
                  </div>
                </div>


              </div>
            </footer>
          </div>
        </div>
      </div>
    </main>


  </div>
  <!-- barba container end -->

  <!-- JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/leaflet%401.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  <script src="js/vendors.js"></script>
  <script src="js/main.js"></script>
</body>

<!-- Mirrored from creativelayers.net/themes/Royal-Educity-html/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Apr 2024 14:44:35 GMT -->

</html>