<?php
include("config.php");
session_start();


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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet%401.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/vendors.css" />
  <link rel="stylesheet" href="css/main.css" />
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="w3.css">


  <title>Royal-Educity</title>
  <style>
    a {
      text-decoration: none;
    }

    .why::marker {
      content: "⁜ ";
    }

    .alt {
      display: flex;
      gap: 10px;
      width: 90%;
      margin: auto;
      transition: 1s;
      align-items: center;
    }

    .alt:hover {
      background-color: white;
      color: black;
      width: 100%;
      margin: auto;
    }

    .alt:hover i::before {
      color: black;
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
                <?php
                if (isset($_SESSION["user"])) {
                ?>
                  <a href="user/" class="text-dark-1">Dashboard</a>
                <?php
                } else {
                ?>
                  <a href="login.php" class="text-dark-1">Log in</a>
                  <a href="signup.php" class="text-dark-1 ml-30">Sign Up</a>
                <?php
                }
                ?>
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
                    08182891846
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
      <section class="masthead -type-1 js-mouse-move-container">
        <div class="masthead__bg">
          <img src="img/home-1/hero/bg.png" alt="image" />
        </div>

        <div class="container">
          <div class="w3-container">
            <div data-anim-wrap class="row justify-around items-center">
              <div class="col-xl-6 col-lg-6 col-sm-10">
                <div class="masthead__content">
                  <h1 data-anim-child="slide-up" class="masthead__title">
                    Investing in <br>
                    <span class="text-green-1 underline">Learning</span>
                    And <br>
                    Your Future
                  </h1>
                  <p data-anim-child="slide-up delay-1" class="masthead__text">
                    Take our courses taught by industry experts, apply your skills in real world projects, and develop a portfolio designed to enhance your professional goals, whether you're just starting out or scaling new heights.
                  </p>
                  <div data-anim-child="slide-up delay-2" class="masthead__buttons row x-gap-10 y-gap-10">
                    <div class="col-12 col-sm-auto">
                      <a data-barba href="signup.php" class="button -md -purple-1 text-white">Join For Free</a>
                    </div>
                    <div class="col-12 col-sm-auto">
                      <a data-barba href="courselist.php" class="button -md -outline-green-1 text-green-1">Find Courses</a>
                    </div>
                  </div>
                  <div data-anim-child="slide-up delay-3" class="masthead-info row y-gap-15 sm:d-none">

                  </div>
                </div>
              </div>

              <div data-anim-child="slide-up delay-5" class="col-xl-6 col-lg-6 mt-0 mt-md-4">
                <img src="img/hero.webp" alt="" class="img-fluid w-100">
              </div>
            </div>
          </div>
        </div>

        <svg class="svg-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
          <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
          </defs>
          <g class="svg-waves__parallax">
            <use xlink:href="#gentle-wave" x="48" y="0" />
            <use xlink:href="#gentle-wave" x="48" y="3" />
            <use xlink:href="#gentle-wave" x="48" y="5" />
            <use xlink:href="#gentle-wave" x="48" y="7" />
          </g>
        </svg>
      </section>

      <section class="layout-pt-lg layout-pb-md">
        <div data-anim-wrap class="container">
          <div class="row justify-center">
            <div class="col text-center">
              <h4 style="font-weight:bold">Royal-Educity graduates work for these companies</h4>
            </div>
          </div>

          <div class="row y-gap-30 justify-between sm:justify-start items-center pt-60 md:pt-50">
            <div data-anim-child="slide-up delay-1" class="col-lg-auto col-md-3 col-sm-4 col-6">
              <div class="d-flex justify-center items-center px-4">
                <img class="w-1/1" src="img/clients/1.svg" alt="clients image" />
              </div>
            </div>

            <div data-anim-child="slide-up delay-1" class="col-lg-auto col-md-3 col-sm-4 col-6">
              <div class="d-flex justify-center items-center px-4">
                <img class="w-1/1" src="img/clients/2.svg" alt="clients image" />
              </div>
            </div>

            <div data-anim-child="slide-up delay-1" class="col-lg-auto col-md-3 col-sm-4 col-6">
              <div class="d-flex justify-center items-center px-4">
                <img class="w-1/1" src="img/clients/3.svg" alt="clients image" />
              </div>
            </div>

            <div data-anim-child="slide-up delay-1" class="col-lg-auto col-md-3 col-sm-4 col-6">
              <div class="d-flex justify-center items-center px-4">
                <img class="w-1/1" src="img/clients/4.svg" alt="clients image" />
              </div>
            </div>

            <div data-anim-child="slide-up delay-1" class="col-lg-auto col-md-3 col-sm-4 col-6">
              <div class="d-flex justify-center items-center px-4">
                <img class="w-1/1" src="img/clients/5.svg" alt="clients image" />
              </div>
            </div>

            <div data-anim-child="slide-up delay-1" class="col-lg-auto col-md-3 col-sm-4 col-6">
              <div class="d-flex justify-center items-center px-4">
                <img class="w-1/1" src="img/clients/6.svg" alt="clients image" />
              </div>
            </div>
          </div>
        </div>
      </section>



      <section class="layout-pt-md layout-pb-lg w3-light-grey">
        <div data-anim-wrap class="container">
          <div class="row justify-center text-center">
            <div class="col-auto">
              <div class="sectionTitle">
                <h1 class="sectionTitle__title">Why Choose Us</h1>
                <img src="img/line.png" style="width: 150px;" alt="">

              </div>
            </div>
          </div>
          <div class="row mt-15 items-center">
            <div class="col-md-6">
              <img src="img/choice.png" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 sectionTitle__text">
              <ul>
                <li class="mb-3 w3-justify why"><b>Expert-Led Courses:</b> Our tech courses are designed and taught by industry professionals with extensive experience. Benefit from their expertise and gain insights that go beyond textbooks.</li>
                <li class="mb-3 w3-justify why"><b>Hands-On Learning:</b> We focus on practical application, ensuring you not only learn the theory but also gain real-world skills through projects and interactive assignments.</li>
                <li class="mb-3 w3-justify why"><b>Flexible Learning:</b> With 24/7 access to course materials, you can learn at your own pace, on your own schedule. Whether you're balancing work, school, or other commitments, our platform adapts to your needs.</li>
                <li class="mb-3 w3-justify why"><b>Comprehensive Support:</b> Our dedicated support team is here to assist you every step of the way. From live Q&A sessions to direct access to instructors, you'll never feel alone in your learning journey.</li>
                <li class="mb-3 w3-justify why"><b>Up-to-Date Content:</b> Stay ahead in the fast-paced tech industry with our regularly updated courses, reflecting the latest trends, tools, and technologies.</li>
                <li class="mb-3 w3-justify why"><b>Career Advancement:</b> Our courses are designed to enhance your skills and boost your career prospects. Earn certificates that are recognized by employers and showcase your expertise.</li>
                <li class="mb-3 w3-justify why"><b>Community and Networking:</b> Join a vibrant community of learners and professionals. Share your experiences, collaborate on projects, and build a network that can support your career growth.</li>
              </ul>
            </div>

          </div>
        </div>
      </section>

      <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
          <div class="row justify-center text-center">
            <div class="col-auto">
              <div class="sectionTitle">
                <h1 class="sectionTitle__title">Our Latest Courses</h1>
                <img src="img/line.png" style="width: 150px;" alt="">
                <p class="sectionTitle__text">
                  At Royal-Educity, we are dedicated to connecting people in emerging economies with the global tech economy. Our unique approach combines classroom learning, real-world projects, and certifications that will help you launch your career in tech.
                </p>
              </div>
            </div>
          </div>

          <div class="tabs -pills pt-50 js-tabs">


            <div class="tabs__content pt-60 js-tabs-content">
              <div class="tabs__pane -tab-item-1 is-active">
                <div class="row y-gap-30 justify-center">

                  <?php
                  $getCourses = mysqli_query($conn, "SELECT * FROM `courses` ORDER BY `created_at` DESC LIMIT 4");
                  if (mysqli_num_rows($getCourses) > 0) {
                    $no_lesson = 0;
                    while ($course = mysqli_fetch_assoc($getCourses)) {
                      $course_id = $course["course_id"];
                      $no_rating = 0;
                      $total_rating = 0;
                      $getReviews = mysqli_query($conn, "SELECT * FROM `reviews` WHERE `course_id`='$course_id'");
                      if (mysqli_num_rows($getReviews) > 0) {
                        while ($reviews = mysqli_fetch_assoc($getReviews)) {
                          $total_rating += $reviews["rating"];
                        }
                        $no_rating = $total_rating / mysqli_num_rows($getReviews);
                      }
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
                      <div class="col-lg-3 col-md-6">
                        <div data-anim-child="slide-up delay-1" class="w3-card">
                          <a href="courseview.php?c=<?= $course["course_id"]; ?>" class="coursesCard -type-1 ">
                            <div class="relative">
                              <div class="coursesCard__image overflow-hidden rounded-8">
                                <img class="w-1/1" src="uploads/<?= $course["thumbnail"]; ?>" alt="image" />
                                <div class="coursesCard__image_overlay rounded-8"></div>
                              </div>
                              <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3"></div>
                            </div>

                            <div class="h-100 pt-15 p-2">
                              <div class="d-flex items-center">
                                <div class="text-14 lh-1 text-yellow-1 mr-10">
                                  <?= round($no_rating, 1); ?>
                                </div>
                                <div class="d-flex x-gap-5 items-center">
                                  <div class="icon-star text-9 text-yellow-1"></div>

                                </div>
                                <div class="text-13 lh-1 ml-10">(<?= $getReviews->num_rows; ?>)</div>
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
            </div>
          </div>
        </div>
      </section>

      <!-- testimonial -->
      <section class="layout-pt-lg layout-pb-lg bg-purple-1">
        <div class="container">
          <div class="row justify-center text-center">
            <div class="col-auto">
              <div class="sectionTitle">
                <h2 class="sectionTitle__title text-green-1">
                  What People Say
                </h2>


              </div>
            </div>
          </div>

          <div data-anim-wrap class="js-section-slider pt-50" data-gap="30" data-pagination data-slider-cols="base-1 xl-3 lg-2 md-2 sm-1">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div data-anim-child="slide-left delay-1" class="testimonials -type-1">
                  <div class="testimonials__content">
                    <p class="testimonials__text">
                      “Royal-Educity's tech courses are a game-changer! The curriculum is cutting-edge and the hands-on projects have given me practical skills that I immediately applied in my job.”
                    </p>

                    <div class="testimonials-footer">


                      <div class="testimonials-footer__content">
                        <div class="testimonials-footer__title">
                          Alex T.
                        </div>
                        <div class="testimonials-footer__text">
                          Web Designer
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div data-anim-child="slide-left delay-2" class="testimonials -type-1">
                  <div class="testimonials__content">

                    <p class="testimonials__text">
                      “I was able to transition into a tech career seamlessly thanks to Royal-Educity. The instructors are industry experts who break down complex concepts into easily digestible lessons.”
                    </p>

                    <div class="testimonials-footer">


                      <div class="testimonials-footer__content">
                        <div class="testimonials-footer__title">
                          Priya M.
                        </div>
                        <div class="testimonials-footer__text">
                          Product Designer
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div data-anim-child="slide-left delay-3" class="testimonials -type-1">
                  <div class="testimonials__content">

                    <p class="testimonials__text">
                      “The tech courses at Royal-Educity are top-notch. The interactive content and real-world applications have prepared me to excel in a competitive job market.”
                    </p>

                    <div class="testimonials-footer">


                      <div class="testimonials-footer__content">
                        <div class="testimonials-footer__title">
                          Ryan C.
                        </div>
                        <div class="testimonials-footer__text">
                          Cybersecurity Specialist
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="swiper-slide">
                <div data-anim-child="slide-left delay-4" class="testimonials -type-1">
                  <div class="testimonials__content">

                    <p class="testimonials__text">
                      “Thanks to Royal-Educity, I've mastered the latest tech tools and trends. The personalized support and practical exercises have made a huge difference in my learning journey.”
                    </p>

                    <div class="testimonials-footer">

                      <div class="testimonials-footer__content">
                        <div class="testimonials-footer__title">
                          Daniel B.
                        </div>
                        <div class="testimonials-footer__text">
                          Software Developer
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex x-gap-20 items-center justify-end pt-60 lg:pt-40">
              <div class="col-auto">
                <button class="button -outline-white text-white size-50 rounded-full d-flex justify-center items-center js-prev">
                  <i class="icon icon-arrow-left text-24"></i>
                </button>
              </div>
              <div class="col-auto">
                <button class="button -outline-white text-white size-50 rounded-full d-flex justify-center items-center js-next">
                  <i class="icon icon-arrow-right text-24"></i>
                </button>
              </div>
            </div>
          </div>

          <div data-anim-wrap class="row y-gap-30 counter__row">
            <div class="col-lg-3 col-sm-6">
              <div data-anim-child="slide-left delay-1" class="counter -type-1">
                <div class="counter__number">2,000+</div>
                <div class="counter__title">Students worldwide</div>
              </div>
            </div>

            <div class="col-lg-3 col-sm-6">
              <div data-anim-child="slide-left delay-2" class="counter -type-1">
                <div class="counter__number">1,500+</div>
                <div class="counter__title">Total course views</div>
              </div>
            </div>

            <div class="col-lg-3 col-sm-6">
              <div data-anim-child="slide-left delay-3" class="counter -type-1">
                <div class="counter__number">800+</div>
                <div class="counter__title">Five-star course reviews</div>
              </div>
            </div>

            <div class="col-lg-3 col-sm-6">
              <div data-anim-child="slide-left delay-4" class="counter -type-1">
                <div class="counter__number">1,000+</div>
                <div class="counter__title">Students community</div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end testimonial -->

      <section class="layout-pt-lg layout-pb-lg bg-beige-1">
        <div data-anim-wrap class="container">
          <div class="row y-gap-30 justify-between items-center">
            <div class="col-xl-5 col-lg-6 col-md-10 order-2 order-lg-1">
              <div class="about-content">
                <h2 data-anim-child="slide-up delay-1" class="about-content__title">
                  <span>Learn</span> new skills when and where you like.
                </h2>

                <div data-anim-child="slide-up delay-3" class="y-gap-20 pt-30">
                  <div class="d-flex items-center">
                    <div class="about-content-list__icon">
                      <i class="icon" data-feather="check"></i>
                    </div>
                    <div class="about-content-list__title">
                      Hand-picked authors
                    </div>
                  </div>

                  <div class="d-flex items-center">
                    <div class="about-content-list__icon">
                      <i class="icon" data-feather="check"></i>
                    </div>
                    <div class="about-content-list__title">
                      Easy to follow curriculum
                    </div>
                  </div>

                  <div class="d-flex items-center">
                    <div class="about-content-list__icon">
                      <i class="icon" data-feather="check"></i>
                    </div>
                    <div class="about-content-list__title">Cheap courses</div>
                  </div>

                  <div class="d-flex items-center">
                    <div class="about-content-list__icon">
                      <i class="icon" data-feather="check"></i>
                    </div>
                    <div class="about-content-list__title">
                      Learning at your own pace
                    </div>
                  </div>
                </div>

                <div data-anim-child="slide-up delay-4" class="d-inline-block mt-30">
                  <a href="signup.php" class="button -md -dark-1 text-white">Join Free</a>
                </div>
              </div>
            </div>

            <div class="col-xl-5 col-lg-6 order-1 order-lg-2">
              <div data-anim-child="slide-up delay-5" class="about-image">
                <img src="img/about/1.png" alt="image" />
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="layout-pt-lg layout-pb-lg bg-dark-2">
        <div data-anim-wrap class="container">
          <div class="row justify-center text-center">
            <div data-anim-child="slide-up delay-1" class="col-auto">
              <div class="sectionTitle">
                <h2 class="sectionTitle__title text-white">
                  Why learn with our courses?
                </h2>

                <p class="sectionTitle__text text-white">
                  Empower Your Future with Expert-Curated, Practical, and Career-Boosting Courses.
                </p>
              </div>
            </div>
          </div>

          <div class="row y-gap-30 pt-50">
            <div data-anim-child="slide-up delay-2" class="col-lg-4 col-md-6">
              <div class="stepCard -type-1 -stepCard-hover">
                <div class="stepCard__content">
                  <div class="stepCard__icon">
                    <i class="icon-online-learning-4 text-64 text-green-1"></i>
                  </div>
                  <h4 class="stepCard__title">01. Learn</h4>
                  <p class="stepCard__text">

                    Our expert-curated courses offer comprehensive education with hands-on experience, ensuring valuable skills for today's dynamic world.

                  </p>
                </div>
              </div>
            </div>

            <div data-anim-child="slide-up delay-3" class="col-lg-4 col-md-6">
              <div class="stepCard -type-1 -stepCard-hover">
                <div class="stepCard__content">
                  <div class="stepCard__icon">
                    <i class="icon-graduation-1 text-64 text-green-1"></i>
                  </div>
                  <h4 class="stepCard__title">02. Graduate</h4>
                  <p class="stepCard__text">
                    Our specialized programs support exam preparation and academic success, helping you confidently approach graduation at any level.
                  </p>
                </div>
              </div>
            </div>

            <div data-anim-child="slide-up delay-4" class="col-lg-4 col-md-6">
              <div class="stepCard -type-1 -stepCard-hover">
                <div class="stepCard__content">
                  <div class="stepCard__icon">
                    <i class="icon-working-at-home-2 text-64 text-green-1"></i>
                  </div>
                  <h4 class="stepCard__title">03. Work</h4>
                  <p class="stepCard__text">
                    Our courses equip you with crucial skills for career progression, covering technical and soft skills to ensure workplace success.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- <section class="layout-pt-lg layout-pb-lg">
        <div data-anim-wrap class="container">
          <div data-anim-child="slide-left delay-1" class="row y-gap-20 justify-between items-center">
            <div class="col-lg-6">
              <div class="sectionTitle">
                <h2 class="sectionTitle__title">
                  Learn from the best instructors
                </h2>

                <p class="sectionTitle__text">
                  Lorem ipsum dolor sit amet, consectetur.
                </p>
              </div>
            </div>

            <div class="col-auto">
              <a href="instructors-list-1.html" class="button -icon -purple-3 text-purple-1">
                View All Instructors
                <i class="icon-arrow-top-right text-13 ml-10"></i>
              </a>
            </div>
          </div>

          <div class="row y-gap-30 pt-50">
            <div class="col-lg-3 col-sm-6">
              <div data-anim-child="slide-left delay-2" class="teamCard -type-1 -teamCard-hover">
                <div class="teamCard__image">
                  <img src="img/team/1.png" alt="image" />
                  <div class="teamCard__socials">
                    <div class="d-flex x-gap-20 y-gap-10 justify-center items-center h-100">
                      <a href="#"><i class="icon-facebook text-white"></i></a>
                      <a href="#"><i class="icon-twitter text-white"></i></a>
                      <a href="#"><i class="icon-instagram text-white"></i></a>
                      <a href="#"><i class="icon-linkedin text-white"></i></a>
                    </div>
                  </div>
                </div>
                <div class="teamCard__content">
                  <h4 class="teamCard__title">Floyd Miles</h4>
                  <p class="teamCard__text">President of Sales</p>

                  <div class="row items-center y-gap-10 x-gap-10 pt-10">
                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="icon-star text-yellow-1 text-11 mr-5"></div>
                        <div class="text-14 lh-12 text-yellow-1 fw-500">
                          4.5
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="icon-online-learning text-light-1 text-11 mr-5"></div>
                        <div class="text-14 lh-12">692 Students</div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="icon-play text-light-1 text-11 mr-5"></div>
                        <div class="text-14 lh-12">15 Course</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-sm-6">
              <div data-anim-child="slide-left delay-3" class="teamCard -type-1 -teamCard-hover">
                <div class="teamCard__image">
                  <img src="img/team/2.png" alt="image" />
                  <div class="teamCard__socials">
                    <div class="d-flex x-gap-20 y-gap-10 justify-center items-center h-100">
                      <a href="#"><i class="icon-facebook text-white"></i></a>
                      <a href="#"><i class="icon-twitter text-white"></i></a>
                      <a href="#"><i class="icon-instagram text-white"></i></a>
                      <a href="#"><i class="icon-linkedin text-white"></i></a>
                    </div>
                  </div>
                </div>
                <div class="teamCard__content">
                  <h4 class="teamCard__title">Cameron Williamson</h4>
                  <p class="teamCard__text">Web Designer</p>

                  <div class="row items-center y-gap-10 x-gap-10 pt-10">
                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="icon-star text-yellow-1 text-11 mr-5"></div>
                        <div class="text-14 lh-12 text-yellow-1 fw-500">
                          4.5
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="icon-online-learning text-light-1 text-11 mr-5"></div>
                        <div class="text-14 lh-12">692 Students</div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="icon-play text-light-1 text-11 mr-5"></div>
                        <div class="text-14 lh-12">15 Course</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-sm-6">
              <div data-anim-child="slide-left delay-4" class="teamCard -type-1 -teamCard-hover">
                <div class="teamCard__image">
                  <img src="img/team/3.png" alt="image" />
                  <div class="teamCard__socials">
                    <div class="d-flex x-gap-20 y-gap-10 justify-center items-center h-100">
                      <a href="#"><i class="icon-facebook text-white"></i></a>
                      <a href="#"><i class="icon-twitter text-white"></i></a>
                      <a href="#"><i class="icon-instagram text-white"></i></a>
                      <a href="#"><i class="icon-linkedin text-white"></i></a>
                    </div>
                  </div>
                </div>
                <div class="teamCard__content">
                  <h4 class="teamCard__title">Brooklyn Simmons</h4>
                  <p class="teamCard__text">Dog Trainer</p>

                  <div class="row items-center y-gap-10 x-gap-10 pt-10">
                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="icon-star text-yellow-1 text-11 mr-5"></div>
                        <div class="text-14 lh-12 text-yellow-1 fw-500">
                          4.5
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="icon-online-learning text-light-1 text-11 mr-5"></div>
                        <div class="text-14 lh-12">692 Students</div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="icon-play text-light-1 text-11 mr-5"></div>
                        <div class="text-14 lh-12">15 Course</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-sm-6">
              <div data-anim-child="slide-left delay-5" class="teamCard -type-1 -teamCard-hover">
                <div class="teamCard__image">
                  <img src="img/team/4.png" alt="image" />
                  <div class="teamCard__socials">
                    <div class="d-flex x-gap-20 y-gap-10 justify-center items-center h-100">
                      <a href="#"><i class="icon-facebook text-white"></i></a>
                      <a href="#"><i class="icon-twitter text-white"></i></a>
                      <a href="#"><i class="icon-instagram text-white"></i></a>
                      <a href="#"><i class="icon-linkedin text-white"></i></a>
                    </div>
                  </div>
                </div>
                <div class="teamCard__content">
                  <h4 class="teamCard__title">Wade Warren</h4>
                  <p class="teamCard__text">Marketing Coordinator</p>

                  <div class="row items-center y-gap-10 x-gap-10 pt-10">
                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="icon-star text-yellow-1 text-11 mr-5"></div>
                        <div class="text-14 lh-12 text-yellow-1 fw-500">
                          4.5
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="icon-online-learning text-light-1 text-11 mr-5"></div>
                        <div class="text-14 lh-12">692 Students</div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <div class="d-flex items-center">
                        <div class="icon-play text-light-1 text-11 mr-5"></div>
                        <div class="text-14 lh-12">15 Course</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row justify-center text-center pt-60 lg:pt-40">
            <div class="col-auto">

            </div>
          </div>
        </div>
      </section> -->

      <section class="layout-pt-lg layout-pb-lg bg-light-3">
        <div data-anim-wrap class="container">
          <div class="row y-gap-20 items-center">
            <div class="col-xl-7 col-lg-7">
              <div data-anim-child="slide-up delay-1" class="app-image">
                <img src="img/app/1.png" alt="image" />
              </div>
            </div>

            <div class="col-lg-5">
              <div class="app-content">
                <h2 data-anim-child="slide-up delay-3" class="app-content__title">
                  Learn From<br />
                  <span>Anywhere</span>
                </h2>
                <p data-anim-child="slide-up delay-4" class="app-content__text">
                  Take classes on the go with the Royal-Educity app. Stream or
                  download to watch on the plane, the subway, or wherever you
                  learn best.
                </p>
                <div data-anim-child="slide-up delay-5" class="app-content__buttons">
                  <a href="royal-educity.apk" type="download" class="w3-button w3-indigo w3-round-large">Download Our Android App</a>
                  <!--<a href="#"><img src="img/app/buttons/2.svg" alt="button" /></a>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="">
        <div class="row">
          <div class="col-md-6 w3-black w3-padding">
            <div class="py-4">
              <div class="w3-panel w3-round-large p-3 alt">
                <i class="bi bi-geo-alt-fill w3-xlarge" style="color: white;"></i>
                <div class="">
                  <p><b>Learn Anywhere</b></p>
                  <p class="w3-small">Why go to lecture halls when you can learn from home, by the beach, at the recording studio or at your office.</p>
                </div>
              </div>
              <div class="w3-panel w3-round-large p-3 alt">
                <i class="bi bi-flower3 w3-xlarge w3-text-white"></i>
                <div class="">
                  <p><b>Learning is Fun</b></p>
                  <p class="w3-small">Say goodbye to outdated curriculums, bulky lecture notes and boring lectures.</p>
                </div>
              </div>
              <div class="w3-panel w3-round-large p-3 alt">
                <i class="bi bi-diagram-3 w3-xlarge w3-text-white"></i>
                <div class="">
                  <p><b>Learning is Communal</b></p>
                  <p class="w3-small">Learners are working together, sharing knowledge to enhance their understanding. You are not alone in your learning journey.</p>
                </div>
              </div>
              <div class="w3-panel w3-round-large p-3 alt">
                <i class="bi bi-check-circle-fill w3-xlarge w3-text-white"></i>
                <div class="">
                  <p><b>Learn from the best</b></p>
                  <p class="w3-small">Our instructors are carefully selected to give you the best learning outcome. They are the best on the subject matter and are poised to give you the learning you deserve</p>
                </div>
              </div>
              <div class="w3-panel w3-round-large p-3 alt">
                <i class="bi bi-bullseye w3-xlarge w3-text-white"></i>
                <div class="">
                  <p><b>Learn the profitable way</b></p>
                  <p class="w3-small">Whether you are exploring a career path, embracing a new challenge, or acquiring a new skill for your career, we will help you to achieve the desired results.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 w3-pale-green w3-padding">
            <div class="p-2" style="display: flex; flex-direction: column; justify-content: center; height: 100%; ">
              <div><span class="w3-text-orange w3-pale-yellow p-2 w3-round-xlarge"><b>Learn & Grow</b></span></div>
              <h2><b>Expand Your Mind, Expand Your World</b></h2>
              <p class="w3-small">
                Unleash your full potential and broaden your horizons through our comprehensive and engaging online courses and resources, carefully designed to inspire, motivate, and empower you to reach new heights of personal and professional growth, and explore the vast and exciting possibilities of the world around you, at your own pace and at your own terms.
              </p>
              <div class="w3-center">
                <img src="img/learn2.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="layout-pt-md layout-pb-md bg-purple-1">
        <div class="container">
          <div class="row y-gap-20 justify-between items-center">
            <div class="col-xl-4 col-lg-5">
              <h2 class="text-30 lh-15 text-white">
                Join more than
                <span class="text-green-1">8 million learners</span> worldwide
              </h2>
            </div>

            <div class="col-auto">
              <a href="signup.php" class="button -md -green-1 text-dark-1">Join Us For Free</a>
            </div>
          </div>
        </div>
      </section>


      <!-- FAQ -->
      <section class="layout-pt-lg layout-pb-lg bg-light-4">
        <div class="container">
          <div class="row justify-center text-center">
            <div class="col-xl-8 col-lg-9 col-md-11">
              <div class="sectionTitle">
                <h2 class="sectionTitle__title">
                  Frequently Asked Questions.
                </h2>

                <p class="sectionTitle__text">
                  Your Questions Answered: Everything You Need to Know About Learning with Royal-Educity
                </p>
              </div>

              <div class="accordion -block text-left pt-60 lg:pt-40 js-accordion">
                <div class="accordion__item">
                  <div class="accordion__button">
                    <div class="accordion__icon">
                      <div class="icon" data-feather="plus"></div>
                      <div class="icon" data-feather="minus"></div>
                    </div>
                    <span class="text-17 fw-500 text-dark-1">What types of tech courses does Royal-Educity offer?</span>
                  </div>

                  <div class="accordion__content">
                    <div class="accordion__content__inner">
                      <p>
                        Royal-Educity offers a wide range of tech courses, including programming, web development, data analytics and more. Each course is designed to provide hands-on experience and practical skills.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="accordion__item">
                  <div class="accordion__button">
                    <div class="accordion__icon">
                      <div class="icon" data-feather="plus"></div>
                      <div class="icon" data-feather="minus"></div>
                    </div>
                    <span class="text-17 fw-500 text-dark-1">Who are the instructors for Royal-Educity's tech courses?</span>
                  </div>

                  <div class="accordion__content">
                    <div class="accordion__content__inner">
                      <p>
                        Our courses are taught by industry experts with extensive experience in their respective fields. They bring real-world insights and practical knowledge to ensure you gain valuable skills.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="accordion__item">
                  <div class="accordion__button">
                    <div class="accordion__icon">
                      <div class="icon" data-feather="plus"></div>
                      <div class="icon" data-feather="minus"></div>
                    </div>
                    <span class="text-17 fw-500 text-dark-1">Are the courses suitable for beginners?</span>
                  </div>

                  <div class="accordion__content">
                    <div class="accordion__content__inner">
                      <p>
                        Yes, Royal-Educity offers courses for all skill levels, from beginners to advanced learners. Each course includes foundational topics as well as more complex subjects to ensure a comprehensive understanding.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="accordion__item">
                  <div class="accordion__button">
                    <div class="accordion__icon">
                      <div class="icon" data-feather="plus"></div>
                      <div class="icon" data-feather="minus"></div>
                    </div>
                    <span class="text-17 fw-500 text-dark-1">How do I access the course materials?</span>
                  </div>

                  <div class="accordion__content">
                    <div class="accordion__content__inner">
                      <p>
                        Once you enroll in a course, you can access all materials through our online platform. This includes video lectures, and they are all available 24/7.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="accordion__item">
                  <div class="accordion__button">
                    <div class="accordion__icon">
                      <div class="icon" data-feather="plus"></div>
                      <div class="icon" data-feather="minus"></div>
                    </div>
                    <span class="text-17 fw-500 text-dark-1">Can I learn at my own pace?</span>
                  </div>

                  <div class="accordion__content">
                    <div class="accordion__content__inner">
                      <p>
                        Yes, our courses are designed to be flexible. You can learn at your own pace and access the materials at any time that fits your schedule.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="accordion__item">
                  <div class="accordion__button">
                    <div class="accordion__icon">
                      <div class="icon" data-feather="plus"></div>
                      <div class="icon" data-feather="minus"></div>
                    </div>
                    <span class="text-17 fw-500 text-dark-1">Are there any prerequisites for enrolling in tech courses?</span>
                  </div>

                  <div class="accordion__content">
                    <div class="accordion__content__inner">
                      <p>
                        Some advanced courses may have prerequisites, which will be listed in the course description. However, many of our beginner courses have no prerequisites and are open to everyone.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
  <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>-->
</body>

<!-- Mirrored from creativelayers.net/themes/Royal-Educity-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Apr 2024 14:41:40 GMT -->

</html>