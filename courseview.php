<?php
include_once("config.php");
session_start();

if (isset($_GET["c"])) {
  $course_id = $_GET["c"];

  $getCourse = mysqli_query($conn, "SELECT * FROM `courses` WHERE `course_id` = '$course_id'");
  if (mysqli_num_rows($getCourse) > 0) {
    $course = mysqli_fetch_assoc($getCourse);
  }
} else {
  echo "<script>location.href='./'</script>";
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

if (isset($_SESSION["user"])) {
  $user_id = $_SESSION["user"]["id"];
  $email = $_SESSION["user"]["email"];
}


?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from creativelayers.net/themes/Royal-Educity-html/courses-single-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Apr 2024 14:41:49 GMT -->

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="./img/logo/logo2.png">

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />

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


      <div class="js-pin-container">
        <section class="page-header -type-5 bg-light-6">
          <div class="page-header__bg">
            <div class="bg-image js-lazy" data-bg="img/event-single/bg.png"></div>
          </div>

          <div class="container">
            <div class="page-header__content pt-90 pb-90">
              <div class="row y-gap-30 relative">
                <div class="col-xl-7 col-lg-8 " style="padding-top: 80px;">


                  <div>
                    <h1 class="text-30 lh-14 pr-60 lg:pr-0">
                      <?= $course["course_name"]; ?>
                    </h1>
                  </div>

                  <p class="col-xl-9 mt-20">
                    <?= $course["short_description"]; ?>
                  </p>

                  <div class="d-flex x-gap-30 y-gap-10 items-center flex-wrap pt-20">
                    <div class="d-flex items-center">
                      <div class="text-14 lh-1 text-yellow-1 mr-10"><?= $avr; ?></div>
                      <div class="d-flex x-gap-5 items-center">
                        <div class="icon-star text-11 text-yellow-1"></div>
                      </div>
                      <div class="text-14 lh-1 text-light-1 ml-10">
                        (<?= mysqli_num_rows($getReview); ?>)
                      </div>
                    </div>

                    <div class="d-flex items-center text-light-1">
                      <div class="icon icon-person-3 text-13"></div>
                      <div class="text-14 ml-8">
                        853 enrolled on this course
                      </div>
                    </div>

                    <div class="d-flex items-center text-light-1">
                      <div class="icon icon-wall-clock text-13"></div>
                      <div class="text-14 ml-8">Last updated 11/2021</div>
                    </div>
                  </div>

                  <div class="d-flex items-center pt-20">

                    <?php
                    $teacher_id = $course["teacher_id"];
                    $teachers = mysqli_query($conn, "SELECT * FROM `teachers` WHERE `id` = '$teacher_id'");
                    if (mysqli_num_rows($teachers) > 0) {
                      $teacher = mysqli_fetch_assoc($teachers);
                    }
                    ?>
                    <div class="text-14 lh-1 ml-10"><?= $teacher["first"] . " " . $teacher["last"]; ?></div>
                  </div>
                </div>

                <div class="courses-single-info js-pin-content">
                  <div class="bg-white shadow-2 rounded-8 border-light py-10 px-10">
                    <div class="relative">
                      <img class="w-1/1" src="uploads/<?= $course["thumbnail"]; ?>" alt="image" />
                      <div class="absolute-full-center d-flex justify-center items-center">
                        <?php
                        $getSections = mysqli_query($conn, "SELECT * FROM `sections` WHERE `course_id` = '$course_id'");
                        $getSections2 = $getSections;

                        $no_lesson = 0;
                        if (mysqli_num_rows($getSections) > 0) {
                          while ($secArray = mysqli_fetch_assoc($getSections)) {

                            $sec_id = $secArray["id"];
                            $getLessons = mysqli_query($conn, "SELECT * FROM `course_contents` WHERE `section_id` = '$sec_id'");
                            if (mysqli_num_rows($getLessons) > 0) {
                              $no_lesson += mysqli_num_rows($getLessons);
                              $lesson = mysqli_fetch_assoc($getLessons);
                            }
                          }
                        }


                        ?>
                        <a href="<?= $lesson["link"]; ?>" class="d-flex justify-center items-center size-60 rounded-full bg-white js-gallery" data-gallery="gallery1">
                          <div class="icon-play text-18"></div>
                        </a>
                      </div>
                    </div>

                    <div class="courses-single-info__content scroll-bar-1 pt-30 pb-20 w3-padding-small">
                      <div class="d-flex justify-between items-center mb-30">
                        <div class="text-24 lh-1 text-dark-1 fw-500">
                          ₦ <?= $course["price"]; ?>
                        </div>
                        <div class="lh-1 line-through">₦ <?= (($course["price"] * 0.3) + $course["price"]); ?></div>
                      </div>

                      <form method="POST">
                        <input type="hidden" name="user_email" value="<?php echo $email; ?>">
                        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                        <input type="hidden" name="cartid" value="<?php echo $cartid; ?>">
                        <button type="submit" class="button w3-btn -outline-dark-1 text-dark-1 mt-10" name="pay_now" id="pay-now" title="Pay now">Pay now</button>
                      </form>
                      <!-- paystack integration -->
                      <?php
                      include("paystack_config.php");
                      if (isset($_POST['pay_now'])) {
                        if (isset($_SESSION["user"])) {
                          // $checkCoursePurchase = mysqli_query($conn, "SELECT * FROM `orders` WHERE `course_id`='$course_id' AND `user_id`='$user_id' ");
                          // if (mysqli_num_rows($checkCoursePurchase) < 1) {
                            $url = "https://api.paystack.co/transaction/initialize";

                            $fields = [
                              'email' => $email,
                              'amount' => $course["price"] * 100, // Convert amount to kobo
                              'callback_url' => "http://localhost/edu/callback.php?c=$course_id&u=$user_id",
                              'metadata' => ["cancel_action" => "http://localhost/edu/courseview.php?c=$course_id"]
                            ];

                            $fields_string = http_build_query($fields);

                            //open connection
                            $ch = curl_init();

                            //set the url, number of POST vars, POST data
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                              "Authorization: Bearer $paystackSecretKey",
                              "Cache-Control: no-cache",
                            ));

                            //So that curl_exec returns the contents of the cURL; rather than echoing it
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                            //execute post
                            $result = curl_exec($ch);
                            $response = json_decode($result, true);

                            // Error handling
                            if (curl_errno($ch)) {
                              echo 'Error:' . curl_error($ch);
                            } elseif ($response['status'] !== true) {
                              echo 'Transaction Initialization Failed: ' . $response['message'];
                            } else {
                              // Redirect to Paystack payment page
                              $authorization_url = $response['data']['authorization_url'];
                              // header('Location: ' . $authorization_url);
                              echo "<script>location.href='$authorization_url'</script>";
                            }

                            //close connection
                            curl_close($ch);
                          // }else {
                          //   echo "<script>alert('Course order already exists ❌.')</script>";
                          // }
                        } else {
                          echo "<script>alert('Sign in to enable you buy a course!'); location.href='./login.php';</script>";
                        }
                      }
                      ?>
                      <!-- paystack integration end -->


                      <!-- <button class="button w3-btn -outline-dark-1 text-dark-1 mt-10" onclick="document.getElementById('id01').style.display='block'">
                        Buy Now
                      </button> -->

                      <!-- modal -->
                      <!-- <div id="id01" class="w3-modal" style="max-height: 100vh; overflow-y: auto; z-index: 1000; ">
                        <div class="w3-modal-content w3-card-4 w3-animate-zoom">

                          <header class="w3-container w3-white">
                            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h4><b>Course Purchase</b></h4>
                          </header>
                          <hr>

                          <div class="w3-container">
                            <p>Make your payment of <b>₦<?= $course["price"] ?></b> for <i class="w3-small">"<?= $course["course_name"]; ?>"</i> into the account below. <br> Type in the reference code for the transaction and click on <b>CONFIRM</b> </p>
                            <p><b>Account Name: </b>Royal Solutions Technologies</p>
                            <p><b>Account Number: </b>1234567890</p>
                            <p><b>Bank Name: </b>GTBank Plc</p>
                            <p><b>Account Type: </b>Current Account</p>
                          </div>
                          <footer class="w3-container w3-padding">
                            <div class="w3-panel">
                              <form method="post">
                                <input type="text" name="ref" placeholder="Reference Number" required class="w3-input w3-border w3-round-large">
                                <input type="submit" value="CONFIRM" name="confirm" class="w3-margin-top w3-button w3-indigo w3-round-large">
                              </form>
                            </div>
                          </footer>
                        </div>
                      </div> -->
                      <!-- end modal -->

                      <?php
                      /**
                       * code for the payment confirmation
                       */
                      // if (isset($_POST["confirm"])) {
                      //   if (isset($_SESSION["user"])) {
                      //     $order_id = rand(100000, 999999);
                      //     $course_id = $course["course_id"];
                      //     $price = $course["price"];
                      //     $ref = $_POST["ref"];

                      //     $checkCoursePurchase = mysqli_query($conn, "SELECT * FROM `orders` WHERE `course_id`='$course_id' AND `user_id`='$user_id' ");
                      //     if (mysqli_num_rows($checkCoursePurchase) < 1) {

                      //       $addOrder = mysqli_query($conn, "INSERT INTO `orders` (`order_id`,`course_id`,`user_id`,`price`,`reference`) VALUES ('$order_id','$course_id','$user_id','$price','$ref')");
                      //       if ($addOrder) {
                      //         echo "<script>alert('Successful ✅. Your order is being processed and your course will be available to you shortly once payment is confirmed.'); location.href='user/';</script>";
                      //       }
                      //     } else {
                      //       echo "<script>alert('Order already exists ❌.')</script>";
                      //     }
                      //   } else {
                      //     echo "<script>alert('Sign in to enable you buy a course!'); location.href='./login.php';</script>";
                      //   }
                      // }
                      ?>

                      <div class="mt-25">
                        <div class="d-flex justify-between py-8">
                          <div class="d-flex items-center text-dark-1">
                            <div class="icon-video-file"></div>
                            <div class="ml-10">Lessons</div>
                          </div>
                          <div><?= $no_lesson; ?></div>
                        </div>



                        <div class="d-flex justify-between py-8 border-top-light">
                          <div class="d-flex items-center text-dark-1">
                            <div class="icon-clock-2"></div>
                            <div class="ml-10">Duration</div>
                          </div>
                          <div><?= $course["duration"]; ?></div>
                        </div>



                        <div class="d-flex justify-between py-8 border-top-light">
                          <div class="d-flex items-center text-dark-1">
                            <div class="icon-translate"></div>
                            <div class="ml-10">Language</div>
                          </div>
                          <div>English</div>
                        </div>

                        <!-- <div class="d-flex justify-between py-8 border-top-light">
                          <div class="d-flex items-center text-dark-1">
                            <div class="icon-badge"></div>
                            <div class="ml-10">Certificate</div>
                          </div>
                          <div>Yes</div>
                        </div> -->

                        <div class="d-flex justify-between py-8 border-top-light">
                          <div class="d-flex items-center text-dark-1">
                            <div class="icon-infinity"></div>
                            <div class="ml-10">Full lifetime access</div>
                          </div>
                          <div>Yes</div>
                        </div>
                      </div>

                      <div class="d-flex justify-center pt-15">
                        <a href="#" class="d-flex justify-center items-center size-40 rounded-full">
                          <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="d-flex justify-center items-center size-40 rounded-full">
                          <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="d-flex justify-center items-center size-40 rounded-full">
                          <i class="fa fa-instagram"></i>
                        </a>

                        <a href="#" class="d-flex justify-center items-center size-40 rounded-full">
                          <i class="fa fa-linkedin"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="layout-pt-md layout-pb-md">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="page-nav-menu -line">
                  <div class="d-flex x-gap-30">
                    <div>
                      <a href="#overview" class="pb-12 page-nav-menu__link is-active">Overview</a>
                    </div>
                    <div>
                      <a href="#course-content" class="pb-12 page-nav-menu__link">Course Content</a>
                    </div>
                    <!-- <div>
                      <a href="#instructors" class="pb-12 page-nav-menu__link">Instructors</a>
                    </div> -->
                    <div>
                      <a href="#reviews" class="pb-12 page-nav-menu__link">Reviews</a>
                    </div>
                  </div>
                </div>

                <div id="overview" class="pt-60 lg:pt-40 to-over">
                  <h4 class="text-18 fw-500">Description</h4>

                  <div class="show-more mt-30 js-show-more">
                    <div class="show-more__content">
                      <p class="">
                        <?= $course["long_description"]; ?>
                      </p>
                    </div>

                    <button class="show-more__button text-purple-1 fw-500 underline mt-30">
                      Show more
                    </button>
                  </div>

                  <div class="mt-60">
                    <h4 class="text-20 mb-30">What you'll learn</h4>
                    <div class="row x-gap-100 justfiy-between">
                      <div class="col-md-6">
                        <div class="y-gap-20">
                          <div class="d-flex items-center">
                            <div class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                              <i class="size-12" data-feather="check"></i>
                            </div>
                            <p><?= str_replace(",", "<br>", $course["scheme"]); ?></p>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="mt-60">
                    <h4 class="text-20">Requirements</h4>
                    <ul class="ul-list y-gap-15 pt-30">
                      <li>
                        <?= str_replace(",", "<br>", $course["requirements"]); ?>
                      </li>
                    </ul>
                  </div>
                </div>

                <div id="course-content" class="pt-60 lg:pt-40">
                  <h2 class="text-20 fw-500">Course Content</h2>

                  <div class="d-flex justify-between items-center mt-30">
                    <div class=""><?= mysqli_num_rows($getSections); ?> sections • <?= $no_lesson; ?> lectures</div>

                  </div>

                  <div class="mt-10">
                    <div class="accordion -block-2 text-left js-accordion">
                      <?php
                      $secondSelect = mysqli_query($conn, "SELECT * FROM `sections` WHERE `course_id` = '$course_id'");
                      if (mysqli_num_rows($secondSelect) > 0) {
                        while ($secSection = mysqli_fetch_assoc($secondSelect)) {
                          $s_id = $secSection["id"];
                          $get_Lessons = mysqli_query($conn, "SELECT * FROM `course_contents` WHERE `section_id` = '$s_id'");
                      ?>

                          <div class="accordion__item">
                            <div class="accordion__button py-20 px-30 bg-light-4">
                              <div class="d-flex items-center">
                                <div class="accordion__icon">
                                  <div class="icon" data-feather="chevron-down"></div>
                                  <div class="icon" data-feather="chevron-up"></div>
                                </div>
                                <span class="text-17 fw-500 text-dark-1">Course Content</span>
                              </div>

                              <div><?= mysqli_num_rows($get_Lessons); ?> lectures</div>
                            </div>

                            <div class="accordion__content">
                              <div class="accordion__content__inner px-30 py-30">
                                <div class="y-gap-20">
                                  <?php
                                  if (mysqli_num_rows($get_Lessons) > 0) {
                                    while ($singleLesson = mysqli_fetch_assoc($get_Lessons)) {


                                  ?>
                                      <div class="d-flex justify-between">
                                        <div class="d-flex items-center">
                                          <div class="d-flex justify-center items-center size-30 rounded-full bg-purple-3 mr-10">
                                            <div class="icon-play text-9"></div>
                                          </div>
                                          <div>
                                            Introduction to the User Experience Course
                                          </div>
                                        </div>


                                      </div>
                                  <?php
                                    }
                                  }
                                  ?>
                                </div>
                              </div>
                            </div>
                          </div>
                      <?php
                        }
                      }
                      ?>

                    </div>
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
      </div>

      <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
          <div class="row">
            <div class="col-auto">
              <div class="sectionTitle">
                <h2 class="sectionTitle__title">You May Like</h2>

                <p class="sectionTitle__text">
                  Our unique online courses
                </p>
              </div>
            </div>
          </div>

          <div class="relative pt-60 lg:pt-50">
            <div class="overflow-hidden js-section-slider" data-gap="30" data-loop data-pagination data-nav-prev="js-courses-prev" data-nav-next="js-courses-next" data-slider-cols="xl-4 lg-3 md-2">
              <div class="swiper-wrapper">
                <?php
                $getCourses = mysqli_query($conn, "SELECT * FROM `courses` WHERE `course_id` != '$course_id' ORDER BY `created_at` DESC LIMIT 6");
                if (mysqli_num_rows($getCourses) > 0) {
                  $no_lesson = 0;
                  while ($course = mysqli_fetch_assoc($getCourses)) {
                    $course_id = $course["course_id"];
                    $getSections = mysqli_query($conn, "SELECT * FROM `sections` WHERE `course_id` = '$course_id'");
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
                    <div data-anim-child="slide-up delay-1" class="swiper-slide">
                      <a href="courseview.php?c=<?= $course["course_id"]; ?>" class="coursesCard -type-1">
                        <div class="relative">
                          <div class="coursesCard__image overflow-hidden rounded-8">
                            <img class="w-1/1" src="uploads/<?= $course["thumbnail"]; ?>" alt="image" />
                            <div class="coursesCard__image_overlay rounded-8"></div>
                          </div>
                          <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3"></div>
                        </div>

                        <div class="h-100 pt-15">
                          <div class="d-flex items-center">
                            <div class="text-14 lh-1 text-yellow-1 mr-10">
                              4.5
                            </div>
                            <div class="d-flex x-gap-5 items-center">
                              <div class="icon-star text-9 text-yellow-1"></div>
                            </div>
                            <div class="text-13 lh-1 ml-10">(1991)</div>
                          </div>

                          <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">
                            <?= $course["course_name"]; ?>
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
                              <div>Ali Tufan</div>
                            </div>

                            <div class="coursesCard-footer__price">
                              <div>₦ <?= (($course["price"] * 0.3) + $course["price"]); ?></div>
                              <div>₦ <?= $course["price"]; ?></div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                    <!--  -->
                <?php
                  }
                }
                ?>
              </div>
            </div>

            <button class="section-slider-nav -prev -dark-bg-dark-2 -white -absolute size-70 rounded-full shadow-5 js-courses-prev">
              <i class="icon icon-arrow-left text-24"></i>
            </button>

            <button class="section-slider-nav -next -dark-bg-dark-2 -white -absolute size-70 rounded-full shadow-5 js-courses-next">
              <i class="icon icon-arrow-right text-24"></i>
            </button>
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

<!-- Mirrored from creativelayers.net/themes/Royal-Educity-html/courses-single-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Apr 2024 14:41:51 GMT -->

</html>