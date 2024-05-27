<?php
include("../config.php");
session_start();

if (isset($_SESSION["teacher"])) {
  $teacher_id = $_SESSION["teacher"]["id"];
} else {
  echo "<script>location.href='login.php'</script>";
}

if (isset($_GET["cid"])) {
  $cid = $_GET["cid"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet%401.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/vendors.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="../w3.css">

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
                  <a href="index.php">
                    <img class="-light-d-none" src="../img/logo/logo-text.png" style="height: 60px;" alt="logo">
                    <img class="-dark-d-none" src="../img/logo/logo-text2.png" style="height: 60px;" alt="logo">
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
                    <a href="logout.php" class="d-flex items-center text-light-1 justify-center size-50 rounded-16 -hover-dshb-header-light">
                      <i class="text-18 icon icon-power"></i>
                    </a>
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

              <div class="sidebar__item  ">
                <a href="index.php" class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                  <i class="text-20 icon-discovery mr-15"></i>
                  Dashboard
                </a>
              </div>

              <div class="sidebar__item -is-active -dark-bg-dark-2">
                <a href="courses.php" class="d-flex items-center text-17 lh-1 fw-500 ">
                  <i class="text-20 icon-play-button mr-15"></i>
                  My Courses
                </a>
              </div>

              <div class="sidebar__item ">
                <a href="addcourse.php" class="d-flex items-center text-17 lh-1 fw-500 ">
                  <i class="text-20 icon-list mr-15"></i>
                  Create Course
                </a>
              </div>

              <div class="sidebar__item ">
                <a href="settings.php" class="d-flex items-center text-17 lh-1 fw-500 ">
                  <i class="text-20 icon-setting mr-15"></i>
                  Settings
                </a>
              </div>

              <div class="sidebar__item ">
                <a href="logout.php" class="d-flex items-center text-17 lh-1 fw-500 ">
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



              <div class="w3-padding w3-round-large">
                <div class="w3-padding">
                  <a href="editcourse.php?cid=<?= $cid; ?>" class="w3-button w3-indigo w3-round">
                    Edit Course
                  </a>

                  <div class="pt-30 w-100">

                    <?php
                    $selectCourse = mysqli_query($conn, "SELECT * FROM `courses` WHERE `teacher_id` = '$teacher_id' AND `course_id` = '$cid'");
                    if (mysqli_num_rows($selectCourse) > 0) {
                      $record = mysqli_fetch_assoc($selectCourse);
                    ?>

                      <!-- course -->
                      <div class="row w3-padding-24 w3-card w3-round w3-full w3-margin-bottom" style="align-items: center;">
                        <div class="col-12">
                          <img class="w3-image w3-round" src="../uploads/<?= $record["thumbnail"]; ?> " alt="image">
                        </div>

                        <div class="col-12">
                          <div class="d-flex pt-15 pt-md-0 y-gap-10 justify-between items-center">
                            <div class="text-14 lh-1 w3-small">
                              <?php
                              if ($record["teacher_id"] == $teacher_id) {
                                echo $_SESSION["teacher"]["first"] . " " . $_SESSION["teacher"]["last"];
                              }
                              ?>
                            </div>

                            <div class="d-flex items-center">
                              <div class="text-14 lh-1 text-yellow-1 mr-10"><?= $record["duration"]; ?></div>
                            </div>
                          </div>

                          <h3 class="text-16 fw-500 lh-15 mt-10"><a href="viewcourse.php?cid=<?= $record["course_id"]; ?>"><?= $record["course_name"]; ?></a></h3>

                          <p class="w3-small">
                            <?= $record["short_description"]; ?>
                          </p>
                          <p class="w3-small">
                            <?= $record["long_description"]; ?>
                          </p>

                          <div class="w3-light-grey w3-round-large w3-padding w3-margin-top">
                            <h5><b>Course Sections</b></h5>
                            <small><b>Add section</b></small>
                            <form method="post" class="mb-15">
                              <div class="d-flex">
                                <input type="text" name="section_title" class="w3-input " placeholder="Section title" />
                                <input type="submit" name="add" value="ADD" class="w3-button w3-indigo w3-round w3-center">
                              </div>
                              <?php
                              if (isset($_POST["add"])) {
                                $section = $_POST["section_title"];
                                $insertQuery = mysqli_query($conn, "INSERT INTO `sections` (`course_id`,`section_title`) VALUES('$cid','$section')");
                                if ($insertQuery) {
                                  echo "<script>alert('Section Added!');</script>";
                                }
                              }
                              ?>
                            </form>
                            <div class="">
                              <?php
                              $selectSections = mysqli_query($conn, "SELECT * FROM `sections` WHERE `course_id` = '$cid'");
                              $num = 1;
                              if (mysqli_num_rows($selectSections) > 0) {
                                while ($row = mysqli_fetch_assoc($selectSections)) {
                              ?>
                                  <a href="sections.php?s=<?= $row["id"]; ?>">
                                    <div class="w3-white w3-round-medium w3-padding d-flex align-items-center mb-15">
                                      <span><b>#<?= $num; ?> </b></span>
                                      <span class="">&nbsp;<?= $row["section_title"]; ?></span>
                                    </div>
                                  </a>
                              <?php
                                  $num++;
                                }
                              }
                              ?>
                            </div>
                          </div>
                          <div class="w3-padding">
                            <h6><b>Reviews</b></h6>
                            <?php
                            $getReviews = mysqli_query($conn, "SELECT * FROM `reviews` WHERE `course_id`='$cid' ORDER BY `id` DESC");
                            if (mysqli_num_rows($getReviews) > 0) {
                              while ($reviews = mysqli_fetch_assoc($getReviews)) {
                                $user_id = $reviews["user_id"];
                                $getUser = mysqli_query($conn, "SELECT * FROM `users` WHERE `id`='$user_id'");
                                if (mysqli_num_rows($getUser) > 0) {
                                  $user = mysqli_fetch_assoc($getUser);
                                }
                            ?>
                                <div class="py-10">
                                  <div class="d-flex items-center">
                                    <span><b><?= $user["name"]; ?></b></span>
                                    <span class="w3-text-orange w3-small w3-margin-left"><?= $reviews["rating"]; ?> <i class="icon icon-star"></i></span>
                                  </div>
                                  <p><?= $reviews["comment"]; ?></p>
                                  <p class="w3-small w3-text-grey"><?= $reviews["created_at"]; ?></p>
                                  <hr>
                                </div>
                            <?php
                              }
                            }
                            ?>
                          </div>

                        </div>
                      </div>
                      <!-- end course -->
                    <?php
                    }
                    ?>


                  </div>


                </div>

              </div>

            </div>

            <footer class="footer -dashboard py-30">
              <div class="row items-center justify-between">
                <div class="col-auto">
                  <div class="text-13 lh-1">© 2024 Royal-Educity. All Right Reserved.</div>
                </div>


              </div>
            </footer>
          </div>
        </div>
      </div>
    </main>

    <aside class="sidebar-menu toggle-element js-msg-toggle js-dsbh-sidebar-menu">
      <div class="sidebar-menu__bg"></div>

      <div class="sidebar-menu__content scroll-bar-1 py-30 px-40 sm:py-25 sm:px-20 bg-white -dark-bg-dark-1">
        <div class="row items-center justify-between mb-30">
          <div class="col-auto">
            <div class="-sidebar-buttons">
              <button data-sidebar-menu-button="messages" class="text-17 text-dark-1 fw-500 -is-button-active">
                Messages
              </button>

              <button data-sidebar-menu-button="messages-2" data-sidebar-menu-target="messages" class="d-flex items-center text-17 text-dark-1 fw-500">
                <i class="icon-chevron-left text-11 text-purple-1 mr-10"></i>
                Messages
              </button>

              <button data-sidebar-menu-button="settings" data-sidebar-menu-target="messages" class="d-flex items-center text-17 text-dark-1 fw-500">
                <i class="icon-chevron-left text-11 text-purple-1 mr-10"></i>
                Settings
              </button>

              <button data-sidebar-menu-button="contacts" data-sidebar-menu-target="messages" class="d-flex items-center text-17 text-dark-1 fw-500">
                <i class="icon-chevron-left text-11 text-purple-1 mr-10"></i>
                Contacts
              </button>
            </div>
          </div>

          <div class="col-auto">
            <div class="row x-gap-10">
              <div class="col-auto">
                <button data-sidebar-menu-target="settings" class="button -purple-3 text-purple-1 size-40 d-flex items-center justify-center rounded-full">
                  <i class="icon-setting text-16"></i>
                </button>
              </div>
              <div class="col-auto">
                <button data-sidebar-menu-target="contacts" class="button -purple-3 text-purple-1 size-40 d-flex items-center justify-center rounded-full">
                  <i class="icon-friend text-16"></i>
                </button>
              </div>
              <div class="col-auto">
                <button data-el-toggle=".js-msg-toggle" class="button -purple-3 text-purple-1 size-40 d-flex items-center justify-center rounded-full">
                  <i class="icon-close text-14"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="relative js-menu-switch">
          <div data-sidebar-menu-open="messages" class="sidebar-menu__item -sidebar-menu -sidebar-menu-opened">
            <form class="search-field rounded-8 h-50" action="https://creativelayers.net/themes/Royal-Educity-html/post">
              <input class="bg-light-3 pr-50" type="text" placeholder="Search Courses">
              <button class="" type="submit">
                <i class="icon-search text-light-1 text-20"></i>
              </button>
            </form>

            <div class="accordion -block text-left pt-20 js-accordion">

              <div class="accordion__item border-light rounded-16">
                <div class="accordion__button">
                  <div class="accordion__icon size-30 -dark-bg-dark-2 mr-10">
                    <div class="icon d-flex items-center justify-center">
                      <span class="lh-1 fw-500">2</span>
                    </div>
                    <div class="icon d-flex items-center justify-center">
                      <span class="lh-1 fw-500">2</span>
                    </div>
                  </div>
                  <span class="text-17 fw-500 text-dark-1 pt-3">Starred</span>
                </div>

                <div class="accordion__content">
                  <div class="accordion__content__inner pl-20 pr-20 pb-20">
                    <div data-sidebar-menu-target="messages-2" class="row x-gap-10 y-gap-10 pointer">
                      <div class="col-auto">
                        <img src="img/dashboard/right-sidebar/messages/1.png" alt="image">
                      </div>
                      <div class="col">
                        <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson</div>
                        <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span> Hello</div>
                      </div>
                      <div class="col-auto">
                        <div class="text-13 lh-12 pt-8">35 mins</div>
                      </div>
                    </div>

                    <div data-sidebar-menu-target="messages-2" class="row x-gap-10 y-gap-10 pt-15 pointer">
                      <div class="col-auto">
                        <img src="img/dashboard/right-sidebar/messages/1.png" alt="image">
                      </div>
                      <div class="col">
                        <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson</div>
                        <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span> Hello</div>
                      </div>
                      <div class="col-auto">
                        <div class="text-13 lh-12 pt-8">35 mins</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="accordion__item border-light rounded-16">
                <div class="accordion__button">
                  <div class="accordion__icon size-30 -dark-bg-dark-2 mr-10">
                    <div class="icon d-flex items-center justify-center">
                      <span class="lh-1 fw-500">2</span>
                    </div>
                    <div class="icon d-flex items-center justify-center">
                      <span class="lh-1 fw-500">2</span>
                    </div>
                  </div>
                  <span class="text-17 fw-500 text-dark-1 pt-3">Group</span>
                </div>

                <div class="accordion__content">
                  <div class="accordion__content__inner pl-20 pr-20 pb-20">
                    <div data-sidebar-menu-target="messages-2" class="row x-gap-10 y-gap-10 pointer">
                      <div class="col-auto">
                        <img src="img/dashboard/right-sidebar/messages/1.png" alt="image">
                      </div>
                      <div class="col">
                        <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson</div>
                        <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span> Hello</div>
                      </div>
                      <div class="col-auto">
                        <div class="text-13 lh-12 pt-8">35 mins</div>
                      </div>
                    </div>

                    <div data-sidebar-menu-target="messages-2" class="row x-gap-10 y-gap-10 pt-15 pointer">
                      <div class="col-auto">
                        <img src="img/dashboard/right-sidebar/messages/1.png" alt="image">
                      </div>
                      <div class="col">
                        <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson</div>
                        <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span> Hello</div>
                      </div>
                      <div class="col-auto">
                        <div class="text-13 lh-12 pt-8">35 mins</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="accordion__item border-light rounded-16">
                <div class="accordion__button">
                  <div class="accordion__icon size-30 -dark-bg-dark-2 mr-10">
                    <div class="icon d-flex items-center justify-center">
                      <span class="lh-1 fw-500">2</span>
                    </div>
                    <div class="icon d-flex items-center justify-center">
                      <span class="lh-1 fw-500">2</span>
                    </div>
                  </div>
                  <span class="text-17 fw-500 text-dark-1 pt-3">Private</span>
                </div>

                <div class="accordion__content">
                  <div class="accordion__content__inner pl-20 pr-20 pb-20">
                    <div data-sidebar-menu-target="messages-2" class="row x-gap-10 y-gap-10 pointer">
                      <div class="col-auto">
                        <img src="img/dashboard/right-sidebar/messages/1.png" alt="image">
                      </div>
                      <div class="col">
                        <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson</div>
                        <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span> Hello</div>
                      </div>
                      <div class="col-auto">
                        <div class="text-13 lh-12 pt-8">35 mins</div>
                      </div>
                    </div>

                    <div data-sidebar-menu-target="messages-2" class="row x-gap-10 y-gap-10 pt-15 pointer">
                      <div class="col-auto">
                        <img src="img/dashboard/right-sidebar/messages/1.png" alt="image">
                      </div>
                      <div class="col">
                        <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Darlene Robertson</div>
                        <div class="text-14 lh-1 mt-5"><span class="text-dark-1">You:</span> Hello</div>
                      </div>
                      <div class="col-auto">
                        <div class="text-13 lh-12 pt-8">35 mins</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>


          <div data-sidebar-menu-open="messages-2" class="sidebar-menu__item -sidebar-menu">
            <div class="row x-gap-10 y-gap-10">
              <div class="col-auto">
                <img src="img/dashboard/right-sidebar/messages-2/1.png" alt="image">
              </div>
              <div class="col">
                <div class="text-15 lh-12 fw-500 text-dark-1 pt-8">Arlene McCoy</div>
                <div class="text-14 lh-1 mt-5">Active</div>
              </div>
            </div>

            <div class="mt-20 pt-30 border-top-light">
              <div class="row y-gap-20">
                <div class="col-12">
                  <div class="row x-gap-10 y-gap-10 items-center">
                    <div class="col-auto">
                      <img src="img/dashboard/right-sidebar/messages-2/2.png" alt="image">
                    </div>
                    <div class="col-auto">
                      <div class="text-15 lh-12 fw-500 text-dark-1">Albert Flores</div>
                    </div>
                    <div class="col-auto">
                      <div class="text-14 lh-1 ml-3">35 mins</div>
                    </div>
                  </div>
                  <div class="bg-light-3 rounded-8 px-30 py-20 mt-15">
                    How likely are you to recommend our company to your friends and family?
                  </div>
                </div>

                <div class="col-12">
                  <div class="row x-gap-10 y-gap-10 items-center justify-end">
                    <div class="col-auto">
                      <div class="text-14 lh-1 mr-3">35 mins</div>
                    </div>
                    <div class="col-auto">
                      <div class="text-15 lh-12 fw-500 text-dark-1">You</div>
                    </div>
                    <div class="col-auto">
                      <img src="img/dashboard/right-sidebar/messages-2/3.png" alt="image">
                    </div>
                  </div>
                  <div class="text-right bg-light-7 -dark-bg-dark-2 text-purple-1 rounded-8 px-30 py-20 mt-15">
                    How likely are you to recommend our company to your friends and family?
                  </div>
                </div>

                <div class="col-12">
                  <div class="row x-gap-10 y-gap-10 items-center">
                    <div class="col-auto">
                      <img src="img/dashboard/right-sidebar/messages-2/3.png" alt="image">
                    </div>
                    <div class="col-auto">
                      <div class="text-15 lh-12 fw-500 text-dark-1">Cameron Williamson</div>
                    </div>
                    <div class="col-auto">
                      <div class="text-14 lh-1 ml-3">35 mins</div>
                    </div>
                  </div>
                  <div class="bg-light-3 rounded-8 px-30 py-20 mt-15">
                    Ok, Understood!
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-30 pb-20">
              <form class="contact-form row y-gap-20" action="https://creativelayers.net/themes/Royal-Educity-html/post">

                <div class="col-12">

                  <textarea placeholder="Write a message" rows="7"></textarea>
                </div>

                <div class="col-12">
                  <button type="submit" class="button -md -purple-1 text-white">Send Message</button>
                </div>
              </form>
            </div>
          </div>
          <div data-sidebar-menu-open="contacts" class="sidebar-menu__item -sidebar-menu">
            <div class="tabs -pills js-tabs">
              <div class="tabs__controls d-flex js-tabs-controls">

                <button class="tabs__button px-15 py-8 rounded-8 text-dark-1 js-tabs-button is-active" data-tab-target=".-tab-item-1" type="button">Contacts</button>

                <button class="tabs__button px-15 py-8 rounded-8 text-dark-1 js-tabs-button " data-tab-target=".-tab-item-2" type="button">Request</button>

              </div>

              <div class="tabs__content pt-30 js-tabs-content">

                <div class="tabs__pane -tab-item-1 is-active">
                  <div class="row x-gap-10 y-gap-10 items-center">
                    <div class="col-auto">
                      <img src="img/dashboard/right-sidebar/contacts/1.png" alt="image">
                    </div>
                    <div class="col-auto">
                      <div class="text-15 lh-12 fw-500 text-dark-1">Darlene Robertson</div>
                    </div>
                  </div>
                </div>

                <div class="tabs__pane -tab-item-2 ">
                  <div class="row x-gap-10 y-gap-10 items-center">
                    <div class="col-auto">
                      <img src="img/dashboard/right-sidebar/contacts/1.png" alt="image">
                    </div>
                    <div class="col-auto">
                      <div class="text-15 lh-12 fw-500 text-dark-1">Darlene Robertson</div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>


          <div data-sidebar-menu-open="settings" class="sidebar-menu__item -sidebar-menu">
            <div class="text-17 text-dark-1 fw-500">Privacy</div>
            <div class="text-15 mt-5">You can restrict who can message you</div>
            <div class="mt-30">

              <div class="form-radio d-flex items-center ">
                <div class="radio">
                  <input type="radio">
                  <div class="radio__mark">
                    <div class="radio__icon"></div>
                  </div>
                </div>
                <div class="lh-1 text-13 text-dark-1 ml-12">My contacts only</div>
              </div>


              <div class="form-radio d-flex items-center mt-15">
                <div class="radio">
                  <input type="radio">
                  <div class="radio__mark">
                    <div class="radio__icon"></div>
                  </div>
                </div>
                <div class="lh-1 text-13 text-dark-1 ml-12">My contacts and anyone in my courses</div>
              </div>


              <div class="form-radio d-flex items-center mt-15">
                <div class="radio">
                  <input type="radio">
                  <div class="radio__mark">
                    <div class="radio__icon"></div>
                  </div>
                </div>
                <div class="lh-1 text-13 text-dark-1 ml-12">Anyone on the site</div>
              </div>

            </div>

            <div class="text-17 text-dark-1 fw-500 mt-30 mb-30">Notification preferences</div>
            <div class="form-switch d-flex items-center">
              <div class="switch">
                <input type="checkbox">
                <span class="switch__slider"></span>
              </div>
              <div class="text-13 lh-1 text-dark-1 ml-10">Email</div>
            </div>

            <div class="text-17 text-dark-1 fw-500 mt-30 mb-30">General</div>
            <div class="form-switch d-flex items-center">
              <div class="switch">
                <input type="checkbox">
                <span class="switch__slider"></span>
              </div>
              <div class="text-13 lh-1 text-dark-1 ml-10">Use enter to send</div>
            </div>
          </div>
        </div>
      </div>
    </aside>
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