<?php
include("../config.php");
session_start();
if (!isset($_SESSION["user"])) {
  echo "<script>location.href='../login.php'</script>";
} else {
  $user_id = $_SESSION["user"]["id"];
}

$getOrders = mysqli_query($conn, "SELECT * FROM `orders` WHERE `user_id` = '$user_id' AND `status`='confirmed' ORDER BY `created_at`");



?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from creativelayers.net/themes/Royal-Educity-html/dshb-courses.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Apr 2024 14:44:35 GMT -->

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

              <div class="sidebar__item -is-active -dark-bg-dark-2">
                <a href="courses.php" class="d-flex items-center text-17 lh-1 fw-500">
                  <i class="text-20 icon-play-button mr-15"></i>
                  My Courses
                </a>
              </div>

              <div class="sidebar__item">
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
                  <h1 class="text-30 lh-12 fw-700">My Courses</h1>

                </div>
              </div>

              <div class="row y-gap-30">
                <div class="col-12">
                  <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="tabs -active-purple-2 js-tabs">


                      <div class="py-30 px-30">
                        <div class="">


                          <div class="row y-gap-30 pt-30">
                            <?php
                            $av_rating = 0;
                            $t_rating = 0;
                            if (mysqli_num_rows($getOrders) > 0) {
                              while ($orders = mysqli_fetch_assoc($getOrders)) {
                                $course_id = $orders["course_id"];
                                $getRatiing = mysqli_query($conn, "SELECT * FROM `reviews` WHERE `course_id` = '$course_id'");
                                if (mysqli_num_rows($getRatiing) > 0) {
                                  while ($rating = mysqli_fetch_assoc($getRatiing)) {
                                    $t_rating += $rating["rating"];
                                  }
                                  $av_rating = round($t_rating / mysqli_num_rows($getRatiing), 1);
                                }
                                $getCourses = mysqli_query($conn, "SELECT * FROM `courses` WHERE `course_id` = '$course_id'");
                                if (mysqli_num_rows($getCourses) > 0) {
                                  $course = mysqli_fetch_assoc($getCourses);
                                  $teacher_id = $course["teacher_id"];
                                  $getTeacher = mysqli_query($conn, "SELECT * FROM `teachers` WHERE `id` = '$teacher_id'");
                                  if (mysqli_num_rows($getTeacher) > 0) {
                                    $teacher = mysqli_fetch_assoc($getTeacher);
                                  }
                                }
                            ?>

                                <div class="col-md-4">
                                  <a href="../lesson.php?c=<?= $course["course_id"]; ?>">
                                    <div class="w3-round-large w3-card">
                                      <div class="relative">
                                        <img class="rounded-8 w-1/1" src="../uploads/<?= $course["thumbnail"]; ?>" alt="image" />
                                      </div>

                                      <div class="py-15 px-10">
                                        <div class="d-flex y-gap-10 justify-between items-center">
                                          <div class="text-14 lh-1"><?= $teacher["first"] . " " . $teacher["last"]; ?></div>

                                          <div class="d-flex items-center">
                                            <div class="text-14 lh-1 text-yellow-1 mr-10">
                                              <?= $av_rating; ?>
                                            </div>
                                            <div class="d-flex x-gap-5 items-center">
                                              <i class="icon-star text-9 text-yellow-1"></i>
                                            </div>
                                          </div>
                                        </div>

                                        <h3 class="text-16 fw-500 lh-15 mt-10">
                                          Learn Figma - UI/UX Design Essential
                                          Training
                                        </h3>


                                      </div>
                                    </div>
                                  </a>
                                </div>
                            <?php
                              }
                            } else {
                              echo "<p class='w3-text-teal'>No course enrolled yet. click <a href='../courselist.php' class='w3-text-orange'>Here</a> to enroll for a course</p>";
                            }
                            ?>

                          </div>


                        </div>


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

<!-- Mirrored from creativelayers.net/themes/Royal-Educity-html/dshb-courses.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Apr 2024 14:44:35 GMT -->

</html>