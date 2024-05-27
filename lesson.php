<?php
include("config.php");
session_start();
if (!isset($_SESSION["user"])) {
  echo "<script>location.href='./'</script>";
}

if (isset($_GET["c"])) {
  $course_id = $_GET["c"];
} else {
  echo "<script>location.href='./'</script>";
}

$getCourse = mysqli_query($conn, "SELECT * FROM `courses` WHERE `course_id` = '$course_id'");
if (mysqli_num_rows($getCourse) > 0) {
  $course = mysqli_fetch_assoc($getCourse);
}

$getReview = mysqli_query($conn, "SELECT * FROM `reviews` WHERE `course_id` = '$course_id'");
$g_r = 0;
if (mysqli_num_rows($getReview) > 0) {
  while ($review = mysqli_fetch_assoc($getReview)) {
    $g_r += $review["rating"];
  }
  $avr = $g_r / mysqli_num_rows($getReview);
  $avr = round($avr, 1);
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from creativelayers.net/themes/Royal-Educity-html/lesson-single-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Apr 2024 14:44:29 GMT -->

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
  <link rel="stylesheet" href="w3.css" />

  <title>Royal-Educity</title>
</head>

<body class="preloader-visible" data-barba="wrapper">
  <!-- preloader start -->
  <div class="preloader js-preloader">
    <!-- <div class="preloader__bg"></div> -->
  </div>
  <!-- preloader end -->

  <main class="main-content">
    <header data-anim="fade" data-add-bg="" class="header -type-1 js-header">
      <div class="header__container">
        <div class="row justify-between items-center">
          <div class="col-auto">
            <div class="header-left">
              <div class="header__logo">
                <a data-barba href="index.php">
                  <img src="img/logo/logo-text.png" style="height: 60px;" alt="logo" />
                </a>
              </div>
            </div>
          </div>

          <div class="col-auto lg:d-none">
            <div class="text-20 lh-1 text-white fw-500">
              <?= $course["course_name"]; ?>
            </div>
          </div>

          <div class="col-auto">
            <div class="header-right d-flex items-center">
              <div class="header-right__buttons">
                <a href="user/courses.php" class="w3-button w3-small w3-round-large w3-white">Back to Courses</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="content-wrapper js-content-wrapper">
      <section class="lesson-image">
        <div class="relative pt-80">
          <img class="w-1/1" src="uploads/<?= $course["thumbnail"]; ?>" alt="image" />
          <div class="absolute-full-center d-flex justify-center items-center">
            <!-- <a href="https://drive.google.com/file/d/1qq2VJ-bj0D1YbA-1VE6Ui-v1xmR37uwa/preview" class="d-flex justify-center items-center size-60 rounded-full bg-white js-gallery" data-gallery="gallery1">
              <div class="icon-play text-18"></div>
            </a> -->
          </div>
        </div>
      </section>

      <div class="d-flex flex-column">
        <section class="pt-40 layout-pb-lg lg:order-2">
          <div class="container">
            <div class="row">
              <div class="col-xxl-8 col-xl-7 col-lg-8">
                <div class="">
                  <h4 class="text-18 fw-500">Description</h4>
                  <p class="mt-30">
                    <?= $course["long_description"]; ?>
                  </p>


                  <div class="mt-60">
                    <h4 class="text-20 mb-30">What you'll learn</h4>
                    <div class="row x-gap-100 justfiy-between">
                      <div class="col-12">
                        <div class="y-gap-20">
                          <div class="d-flex items-center">
                            <div class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                              <i class="icon-check text-6"></i>
                            </div>
                            <p><?= str_replace(",", "<br>", $course["scheme"]) ?></p>
                          </div>

                        </div>
                      </div>


                    </div>
                  </div>

                  <div class="mt-60">
                    <h4 class="text-20">Requirements</h4>
                    <ul class="ul-list y-gap-15 pt-30">
                      <li>
                        <?= str_replace(",", "<br>", $course["requirements"]) ?>
                      </li>
                    </ul>
                  </div>
                </div>

                <div id="reviews" class="pt-60 lg:pt-40">
                  <div class="blogPost -comments">
                    <div class="blogPost__content">
                      <h2 class="text-20 fw-500">Student feedback</h2>
                      <div class="row x-gap-10 y-gap-10 pt-30">
                        <div class="col-md-4">
                          <div class="d-flex items-center justify-center flex-column py-50 text-center bg-light-6 rounded-8">
                            <div class="text-60 lh-11 text-dark-1 fw-500">
                              <?= $avr; ?>
                            </div>
                            <div class="d-flex x-gap-5 mt-10">
                              <div class="icon-star text-11 text-yellow-1"></div>
                              <div class="icon-star text-11 text-yellow-1"></div>
                              <div class="icon-star text-11 text-yellow-1"></div>
                              <div class="icon-star text-11 text-yellow-1"></div>
                              <div class="icon-star text-11 text-yellow-1"></div>
                            </div>
                            <div class="mt-10">Course Rating</div>
                          </div>
                        </div>


                      </div>

                      <h2 class="text-20 fw-500 mt-60 lg:mt-40">Reviews</h2>
                      <ul class="comments__list mt-30">
                        <?php
                        $get__Review = mysqli_query($conn, "SELECT * FROM `reviews` WHERE `course_id` = '$course_id'");
                        if (mysqli_num_rows($get__Review) > 0) {
                          while ($rev = mysqli_fetch_assoc($get__Review)) {
                            $user = $rev["user_id"];
                            $getUser = mysqli_query($conn, "SELECT * FROM `users` WHERE `id` = '$user'");
                            if (mysqli_num_rows($getUser) > 0) {
                              $user_info = mysqli_fetch_assoc($getUser);
                            }

                        ?>
                            <li class="comments__item">
                              <div class="comments__item-inner md:direction-column">


                                <div class="comments__body md:mt-15">
                                  <div class="comments__header">
                                    <h4 class="text-17 fw-500 lh-15">
                                      <?= $user_info["name"]; ?>
                                      <span class="text-13 text-light-1 fw-400"><?= $rev["created_at"]; ?></span>
                                    </h4>

                                    <div class="stars"></div>
                                  </div>

                                  <div class="comments__text mt-10">
                                    <p>
                                      <?= $rev["comment"]; ?>
                                    </p>
                                  </div>


                                </div>
                              </div>
                            </li>
                        <?php
                          }
                        }
                        ?>




                      </ul>
                    </div>
                  </div>

                  <div class="respondForm pt-60">
                    <h3 class="text-20 fw-500">Write a Review</h3>

                    <div class="mt-30">
                      <h4 class="text-16 fw-500">
                        How do you rate this Course?
                      </h4>
                      <div class="d-flex x-gap-10 pt-10">
                        <div class="icon-star text-14 text-yellow-1"></div>
                        <div class="icon-star text-14 text-yellow-1"></div>
                        <div class="icon-star text-14 text-yellow-1"></div>
                        <div class="icon-star text-14 text-yellow-1"></div>
                        <div class="icon-star text-14 text-yellow-1"></div>
                      </div>
                    </div>

                    <form class="contact-form respondForm__form row y-gap-30 pt-30" method="post">
                      <div class="col-12">
                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Rating</label>
                        <select name="rating" id="" class="w3-select">
                          <option value="5.0">5.0 🌟🌟🌟🌟🌟</option>
                          <option value="4.5">4.5 🌟🌟🌟🌟⭐</option>
                          <option value="4.0">4.0 🌟🌟🌟🌟</option>
                          <option value="3.5">3.5 🌟🌟🌟⭐</option>
                          <option value="3.0">3.0 🌟🌟🌟</option>
                          <option value="2.5">2.5 🌟🌟⭐</option>
                          <option value="2.0">2.0 🌟🌟</option>
                          <option value="1.5">1.5 🌟⭐</option>
                          <option value="1.0">1.0 🌟</option>
                        </select>
                      </div>
                      <div class="col-12">
                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Review Comment</label>
                        <textarea name="comment" placeholder="Comment" rows="8"></textarea>
                      </div>
                      <div class="col-12">
                        <button type="submit" name="submit" id="submit" class="button -md -purple-1 text-white">
                          Submit Review
                        </button>
                      </div>

                      <?php
                      if (isset($_POST["submit"])) {
                        if (isset($_SESSION["user"])) {
                          $rating = $_POST["rating"];
                          $comment = $_POST["comment"];
                          $user_id = $_SESSION["user"]["id"];

                          $insertReview = mysqli_query($conn, "INSERT INTO `reviews` (`user_id`,`course_id`,`rating`,`comment`) VALUES ('$user_id','$course_id','$rating','$comment')");
                          if ($insertReview) {
                            echo "<script>alert('Review sent successfully ✅')</script>";
                          } else {
                            echo "<script>alert('Error sending review ❌')</script>";
                          }
                        } else {
                          echo "<script>alert('Sign in to enable you leave a review!'); location.href='./login.php';</script>";
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

        <aside class="lesson-sidebar -type-2 lg:order-1">
          <div class="px-30 sm:px-20">


            <div class="accordion -block-2 text-left js-accordion mt-30" id="course-content">
              <?php
              $getSections = mysqli_query($conn, "SELECT * FROM `sections` WHERE `course_id` = '$course_id'");
              if (mysqli_num_rows($getSections) > 0) {
                while ($section = mysqli_fetch_assoc($getSections)) {
                  $section_id = $section["id"];

              ?>

                  <!-- course content accordion -->
                  <div class="accordion__item">
                    <div class="accordion__button py-20 px-30 bg-light-4">
                      <div class="d-flex items-center">
                        <div class="accordion__icon">
                          <div class="icon" data-feather="chevron-down"></div>
                          <div class="icon" data-feather="chevron-up"></div>
                        </div>
                        <span class="text-17 fw-500 text-dark-1"><?= $section["section_title"]; ?></span>
                      </div>
                    </div>

                    <div class="accordion__content">
                      <div class="accordion__content__inner px-30 py-30">
                        <div class="y-gap-30">
                          <?php
                          $getLessons = mysqli_query($conn, "SELECT * FROM `course_contents` WHERE `section_id`='$section_id'");
                          if (mysqli_num_rows($getLessons) > 0) {
                            while ($lesson = mysqli_fetch_assoc($getLessons)) {
                          ?>

                              <!-- lesson -->
                              <div class="">
                                <div class="d-flex">
                                  <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                    <div class="icon-play text-9"></div>
                                  </div>

                                  <div class="">
                                    <div><?= $lesson["title"] ?></div>
                                    <div class="d-flex x-gap-20 items-center pt-5">
                                      <a href="<?= $lesson["link"]; ?>" data-gallery="gallery1" class="js-gallery text-14 lh-1 text-purple-1 underline">Watch Lesson</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- end lesson -->
                          <?php
                            }
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end course content accordion -->
              <?php
                }
              }
              ?>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </main>

  <!-- JavaScript -->
  <script src="https://unpkg.com/leaflet%401.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  <script src="js/vendors.js"></script>
  <script src="js/main.js"></script>
</body>

<!-- Mirrored from creativelayers.net/themes/Royal-Educity-html/lesson-single-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Apr 2024 14:44:29 GMT -->

</html>