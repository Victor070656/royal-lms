<?php
include("config.php");
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from creativelayers.net/themes/Royal-Educity-html/courses-list-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Apr 2024 14:44:26 GMT -->

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
  <link rel="stylesheet" href="./w3.css" />

  <title>Royal-Educity</title>
  <style>
    .truncate {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  </style>
</head>

<body class="preloader-visible" data-barba="wrapper">
  <!-- preloader start -->
  <div class="preloader js-preloader">
    <!-- <div class="preloader__bg"></div> -->
  </div>
  <!-- preloader end -->

  <main class="main-content">
    <header data-anim="fade" data-add-bg="bg-dark-1" class="header -type-1 js-header">
      <div class="header__container">
        <div class="row justify-between items-center">
          <div class="col-auto">
            <div class="header-left">
              <div class="header__logo">
                <a data-barba href="index.php">
                  <img src="img/logo/logo-text.png" alt="logo" style="height: 60px;" />
                </a>
              </div>

              <!--  -->
            </div>
          </div>

          <div class="header-menu js-mobile-menu-toggle">
            <div class="header-menu__content">
              <div class="mobile-bg js-mobile-bg"></div>

              <div class="d-none xl:d-flex items-center px-20 py-20 border-bottom-light">
                <a href="login.php" class="text-dark-1">Log in</a>
                <a href="signup.php" class="text-dark-1 ml-30">Sign Up</a>
              </div>

              <div class="menu js-navList">
                <ul class="menu__nav text-white -is-active">
                  <li class="">
                    <a href="index.php">
                      Home
                    </a>
                  </li>

                  <li class=" ">
                    <a href="courselist.php">Courses </a>
                  </li>

                  <li>
                    <a data-barba href="contact.php">Contact</a>
                  </li>
                </ul>
              </div>

              <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                <div class="mobile-footer__number">
                  <div class="text-17 fw-500 text-dark-1">Call us</div>
                  <div class="text-17 fw-500 text-purple-1">
                    800 388 80 90
                  </div>
                </div>

                <div class="lh-2 mt-10">
                  <div>
                    Suite C20 & C11 woji estate plaza, Woji Port Harcourt.
                  </div>
                  <div>support@royalsolutions.com.ng</div>
                </div>

                <div class="mobile-socials mt-10">
                  <a href="#" class="d-flex items-center justify-center rounded-full size-40">
                    <i class="fa fa-facebook"></i>
                  </a>

                  <a href="#" class="d-flex items-center justify-center rounded-full size-40">
                    <i class="fa fa-twitter"></i>
                  </a>

                  <a href="#" class="d-flex items-center justify-center rounded-full size-40">
                    <i class="fa fa-instagram"></i>
                  </a>

                  <a href="#" class="d-flex items-center justify-center rounded-full size-40">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </div>
              </div>
            </div>

            <div class="header-menu-close" data-el-toggle=".js-mobile-menu-toggle">
              <div class="size-40 d-flex items-center justify-center rounded-full bg-white">
                <div class="icon-close text-dark-1 text-16"></div>
              </div>
            </div>

            <div class="header-menu-bg"></div>
          </div>

          <div class="col-auto">
            <div class="header-right d-flex items-center">
              <div class="header-right__icons text-white d-flex items-center">




                <div class="d-none xl:d-block ml-20">
                  <button class="text-white items-center" data-el-toggle=".js-mobile-menu-toggle">
                    <i class="text-11 icon icon-mobile-menu"></i>
                  </button>
                </div>
              </div>

              <div class="header-right__buttons d-flex items-center ml-30 md:d-none">
                <?php
                if (isset($_SESSION["user"])) {
                ?>
                  <a href="user/" class="button -sm -white text-dark-1 ml-30">Dashboard</a>
                <?php
                } else {
                ?>
                  <a href="login.php" class="button -underline text-white">Log in</a>
                  <a href="signup.php" class="button -sm -white text-dark-1 ml-30">Sign up</a>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="content-wrapper js-content-wrapper">
      <section data-anim="fade" class="breadcrumbs">
        <div class="container">
          <div class="row">
            <div class="col-auto">
              <div class="breadcrumbs__content">
                <div class="breadcrumbs__item">
                  <a href="./">Home</a>
                </div>

                <div class="breadcrumbs__item">
                  <a href="#">All courses</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="page-header -type-1">
        <div class="container">
          <div class="page-header__content">
            <div class="row">
              <div class="col-auto">
                <div>
                  <h1 class="page-header__title">Our Courses</h1>
                </div>

                <div>
                  <p class="page-header__text">
                    Royal-Educity provides access to a rich repository of courses tailored for professionals seeking career advancement, students aiming to broaden their knowledge, and lifelong learners curious about exploring new realms.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="layout-pt-md layout-pb-lg">
        <div class="container">
          <div class="row y-gap-30" style="max-height: 800px; overflow-y: auto; ">
            <?php
            $getCourses = mysqli_query($conn, "SELECT * FROM `courses` ORDER BY `created_at` DESC LIMIT 4");
            if (mysqli_num_rows($getCourses) > 0) {
              $no_lesson = 0;
              while ($course = mysqli_fetch_assoc($getCourses)) {
                $course_id = $course["course_id"];
                $teacher_id = $course["teacher_id"];
                $getSections = mysqli_query($conn, "SELECT * FROM `sections` WHERE `course_id` = '$course_id'");
                $getTeacher = mysqli_query($conn, "SELECT * FROM `teachers` WHERE `id`='$teacher_id'");
                $teacher = mysqli_fetch_assoc($getTeacher);

                $no_rating = 0;
                $total_rating = 0;
                $getReviews = mysqli_query($conn, "SELECT * FROM `reviews` WHERE `course_id`='$course_id'");
                if (mysqli_num_rows($getReviews) > 0) {
                  while ($reviews = mysqli_fetch_assoc($getReviews)) {
                    $total_rating += $reviews["rating"];
                  }
                  $no_rating = $total_rating / mysqli_num_rows($getReviews);
                }
                if (mysqli_num_rows($getSections) > 0) {
                  while ($section = mysqli_fetch_assoc($getSections)) {
                    $section_id = $section["id"];
                    $getLessons = mysqli_query($conn, "SELECT * FROM `course_contents` WHERE `section_id` = '$section_id'");
                    if (mysqli_num_rows($getLessons) > 0) {
                      $no_lesson += mysqli_num_rows($getLessons);
                    }
                  }
                }
            ?>

                <!--  -->
                <div class="col-lg-3 col-md-6">
                  <div class="w3-card w3-round">
                    <a href="courseview.php?c=<?= $course["course_id"]; ?>" class="coursesCard -type-1 ">
                      <div class="relative">
                        <div class="coursesCard__image overflow-hidden rounded-8">
                          <img class="w-1/1" src="uploads/<?= $course["thumbnail"]; ?>" alt="image" />
                          <div class="coursesCard__image_overlay rounded-8"></div>
                        </div>
                        <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3"></div>
                      </div>

                      <div class="h-100 pt-15 w3-padding-small">
                        <div class="d-flex items-center">
                          <div class="text-14 lh-1 text-yellow-1 mr-10">
                            <?= round($no_rating, 1); ?>
                          </div>
                          <div class="d-flex x-gap-5 items-center">
                            <div class="icon-star text-9 text-yellow-1"></div>

                          </div>
                          <div class="text-13 lh-1 ml-10">(<?= $getReviews->num_rows; ?>)</div>
                        </div>

                        <div class="text-17 lh-15 fw-500 text-dark-1 mt-10 truncate">
                          <span class=""><?= $course["course_name"]; ?></span>
                        </div>

                        <div class="d-flex x-gap-10 items-center pt-10">
                          <div class="d-flex items-center">
                            <div class="mr-8">
                              <img src="img/coursesCards/icons/1.svg" alt="icon" />
                            </div>
                            <div class="text-14 lh-1"><?= $no_lesson; ?> lesson</div>
                          </div>

                          <div class="d-flex items-center">
                            <div class="mr-8">
                              <img src="img/coursesCards/icons/2.svg" alt="icon" />
                            </div>
                            <div class="text-14 lh-1"><?= $course["duration"] ?></div>
                          </div>


                        </div>

                        <div class="coursesCard-footer">
                          <div class="coursesCard-footer__author">

                            <div class="truncate">
                              <span class=""><?= $teacher["first"] . " " . $teacher["last"]; ?></span>
                            </div>
                          </div>

                          <div class="d-flex items-center">
                            <small><del>₦ <?= (($course["price"] * 0.3) + $course["price"]); ?></del></small>&nbsp;
                            <div><b>₦ <?= $course["price"]; ?></b></div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
                <!--  -->
            <?php
              }
            }
            ?>

          </div>
        </div>
      </section>

      <footer class="footer -type-1 bg-dark-1 -green-links">
        <div class="container">
          <div class="footer-header">
            <div class="row y-gap-20 justify-between items-center">
              <div class="col-auto">
                <div class="footer-header__logo">
                  <img src="img/logo/logo-text.png" alt="logo" style="height: 60px;" />
                </div>
              </div>
              <div class="col-auto">
                <div class="footer-header-socials">
                  <div class="footer-header-socials__title text-white">
                    Follow us on social media
                  </div>
                  <div class="footer-header-socials__list">
                    <a href="#"><i class="icon-facebook"></i></a>
                    <a href="#"><i class="icon-twitter"></i></a>
                    <a href="#"><i class="icon-instagram"></i></a>
                    <a href="#"><i class="icon-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="footer-columns">
            <div class="row y-gap-30">
              <div class="col-md-4">
                <div class="text-17 fw-500 text-white uppercase mb-25">
                  ABOUT US
                </div>
                <div class="">
                  <p class="w3-justify w3-small">
                    Royal-Educity, brought to you by Royal Solutions Technologies, is your top choice for online learning, offering courses across various disciplines. With its user-friendly interface, this platform caters to professionals, students, and lifelong learners eager to enhance their skills and knowledge. Join Royal-Educity to transform your educational journey.
                  </p>
                </div>
              </div>
              <div class="col-md-2">
                <div class="text-17 fw-500 text-white uppercase mb-25">
                  CATEGORIES
                </div>
                <div class="d-flex y-gap-10 flex-column">
                  <?php
                  $getCat = mysqli_query($conn, "SELECT * FROM `categories` LIMIT 5");
                  if (mysqli_num_rows($getCat) > 0) {
                    while ($cat = mysqli_fetch_assoc($getCat)) {
                  ?>
                      <a href="courselist.php"><?= $cat["category_name"]; ?></a>
                  <?php
                    }
                  }
                  ?>
                </div>
              </div>
              <div class="col-md-2">
                <div class="text-17 fw-500 text-white uppercase mb-25">
                  QUICK LINKS
                </div>
                <div class="d-flex y-gap-10 flex-column">
                  <a href="index.php">Home</a>
                  <a href="courselist.php">Courses</a>
                  <a href="#">Contact Us</a>
                </div>
              </div>



              <div class="col-md-4">
                <div class="text-17 fw-500 text-white uppercase mb-25">
                  GET IN TOUCH
                </div>
                <div class="footer-columns-form">
                  <div>We don’t send spam so don’t worry.</div>
                  <form action="https://creativelayers.net/themes/Royal-Educity-html/post">
                    <div class="form-group">
                      <input type="text" placeholder="Email..." />
                      <button type="submit">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="py-30 border-top-light-15">
            <div class="row justify-between items-center y-gap-20">
              <div class="col-auto">
                <div class="d-flex items-center h-100 text-white">
                  © 2024 Royal-Educity. All Right Reserved.
                </div>
              </div>

              <div class="col-auto">
                <div class="d-flex x-gap-20 y-gap-20 items-center flex-wrap">
                  <div>
                    <div class="d-flex x-gap-15 w3-text-grey">
                      <a href="teacher/" class="w3-tiny w3-text-grey">Teacher</a>
                      <a href="admin/" class="w3-tiny w3-text-grey">Admin</a>
                    </div>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>

  <!-- JavaScript -->
  <script src="https://unpkg.com/leaflet%401.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  <script src="js/vendors.js"></script>
  <script src="js/main.js"></script>
</body>

<!-- Mirrored from creativelayers.net/themes/Royal-Educity-html/courses-list-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Apr 2024 14:44:26 GMT -->

</html>