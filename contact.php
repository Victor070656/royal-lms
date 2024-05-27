<?php
include("config.php");
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from creativelayers.net/themes/Royal-Educity-html/contact.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Apr 2024 14:45:03 GMT -->

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

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
      <section class="">
        <!-- <div id="map" class="map"></div> -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.7184478823942!2d7.05567817379832!3d4.81833114062904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1069cd9fff056675%3A0x29fd35976f7beed6!2sRoyal%20Solutions%20Technologies!5e0!3m2!1sen!2sng!4v1716573897741!5m2!1sen!2sng" width="100%" height="550" style="border:0;margin-top: 100px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </section>

      <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
          <div class="row y-gap-50 justify-between">
            <div class="col-lg-4">
              <h3 class="text-24 fw-500">Keep In Touch With Us.</h3>
              <p class="mt-25">
                Reach us through any of the following means
              </p>

              <div class="y-gap-30 pt-60 lg:pt-40">
                <div class="d-flex items-center">
                  <div class="d-flex justify-center items-center size-60 rounded-full bg-light-7">
                    <img src="img/contact-1/1.svg" alt="icon" />
                  </div>
                  <div class="ml-20">
                    Suite C11 & C20 Woji Shopping Plaza, Woji Port Harcourt, Rivers State.
                  </div>
                </div>

                <div class="d-flex items-center">
                  <div class="d-flex justify-center items-center size-60 rounded-full bg-light-7">
                    <img src="img/contact-1/2.svg" alt="icon" />
                  </div>
                  <div class="ml-20">+234 818 2891 846</div>
                </div>

                <div class="d-flex items-center">
                  <div class="d-flex justify-center items-center size-60 rounded-full bg-light-7">
                    <img src="img/contact-1/3.svg" alt="icon" />
                  </div>
                  <div class="ml-20">support@royalsolutions.com.ng</div>
                </div>
              </div>
            </div>

            <div class="col-lg-7">
              <h3 class="text-24 fw-500">Send a Message.</h3>
              <p class="mt-25">
                For more information or enquiry, please leave us a message.
              </p>

              <form class="contact-form row y-gap-30 pt-60 lg:pt-40" action="#">
                <div class="col-md-6">
                  <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Name</label>
                  <input type="text" name="title" placeholder="Name..." />
                </div>
                <div class="col-md-6">
                  <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email Address</label>
                  <input type="text" name="title" placeholder="Email..." />
                </div>
                <div class="col-12">
                  <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Message...</label>
                  <textarea name="comment" placeholder="Message" rows="8"></textarea>
                </div>
                <div class="col-12">
                  <button type="submit" name="submit" id="submit" class="button -md -purple-1 text-white">
                    Send Message
                  </button>
                </div>
              </form>
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
</body>

<!-- Mirrored from creativelayers.net/themes/Royal-Educity-html/contact.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Apr 2024 14:45:04 GMT -->

</html>