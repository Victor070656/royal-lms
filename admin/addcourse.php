<?php
include("../config.php");
session_start();

if (isset($_SESSION["admin"])) {
  $admin_id = $_SESSION["admin"]["id"];
} else {
  echo "<script>location.href='login.php'</script>";
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

              <div class="sidebar__item ">
                <a href="index.php" class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                  <i class="text-20 icon-discovery mr-15"></i>
                  Dashboard
                </a>
              </div>

              <div class="sidebar__item ">
                <a href="courses.php" class="d-flex items-center text-17 lh-1 fw-500 ">
                  <i class="text-20 icon-play-button mr-15"></i>
                  Courses
                </a>
              </div>

              <div class="sidebar__item -is-active -dark-bg-dark-2">
                <a href="addcourse.php" class="d-flex items-center text-17 lh-1 fw-500 ">
                  <i class="text-20 icon-list mr-15"></i>
                  Create Course
                </a>
              </div>

              <div class="sidebar__item ">
                <a href="orders.php" class="d-flex items-center text-17 lh-1 fw-500 ">
                  <i class="text-20 fa fa-shopping-cart mr-15"></i>
                  Orders
                </a>
              </div>

              <div class="sidebar__item ">
                <a href="teachers.php" class="d-flex items-center text-17 lh-1 fw-500 ">
                  <i class="text-20 fas fa-chalkboard-teacher mr-15"></i>
                  Teachers
                </a>
              </div>



              <div class="sidebar__item ">
                <a href="students.php" class="d-flex items-center text-17 lh-1 fw-500 ">
                  <i class="text-20 fas fa-user-graduate mr-15"></i>
                  Students
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

                  <h1 class="text-30 lh-12 fw-700">Create New Course</h1>

                </div>
              </div>


              <div class="row y-gap-60">
                <div class="col-12">
                  <div class="rounded-16 bg-white -dark-bg-dark-1 shadow-4 h-100">
                    <div class="d-flex items-center py-20 px-30 border-bottom-light">
                      <h2 class="text-17 lh-1 fw-500">Basic Information</h2>
                    </div>

                    <div class="py-30 px-30">
                      <form class="contact-form row y-gap-30" method="post" enctype="multipart/form-data">

                        <div class="col-12">

                          <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Course Title*</label>

                          <input type="text" name="name" placeholder="Learn Figma - UI/UX Design Essential Training">
                        </div>

                        <div class="col-12">

                          <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Course Category*</label>

                          <select name="category" id="" class="form-select">
                            <?php
                            $selectCategory = mysqli_query($conn, "SELECT * FROM `categories`");
                            if (mysqli_num_rows($selectCategory) > 0) {
                              while ($options = mysqli_fetch_assoc($selectCategory)) {
                            ?>
                                <option value="<?= $options["id"]; ?>"><?= $options["category_name"]; ?></option>
                            <?php
                              }
                            }
                            ?>
                          </select>
                        </div>


                        <div class="col-12">

                          <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Teacher*</label>

                          <select name="teacher" id="" class="form-select">
                            <?php
                            $selectTeachers = mysqli_query($conn, "SELECT * FROM `teachers`");
                            if (mysqli_num_rows($selectTeachers) > 0) {
                              while ($teacher = mysqli_fetch_assoc($selectTeachers)) {
                            ?>
                                <option value="<?= $teacher["id"]; ?>"><?= $teacher["first"] . " " . $teacher["last"]; ?></option>
                            <?php
                              }
                            }
                            ?>
                          </select>
                        </div>


                        <div class="col-12">

                          <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Short Description*</label>

                          <textarea name="short_desc" placeholder="Description" rows="4"></textarea>
                        </div>


                        <div class="col-12">

                          <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Long Description*</label>

                          <textarea name="long_desc" placeholder="Description" rows="7"></textarea>
                        </div>


                        <div class="col-md-6">

                          <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">What will students learn in your
                            course?*</label>

                          <textarea name="scheme" placeholder="Description" rows="7"></textarea>
                        </div>


                        <div class="col-md-6">

                          <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Requirements*</label>

                          <textarea name="req" placeholder="Description" rows="7"></textarea>
                        </div>


                        <div class="col-md-6">

                          <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Course Duration*</label>

                          <input name="duration" type="text" placeholder="E.g: 2h 3m">
                        </div>

                        <div class="col-md-6">

                          <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Price*</label>

                          <input name="price" type="text" placeholder="₦75000">
                        </div>

                        <div class="col-12">

                          <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Thumbnail *</label>

                          <input name="thumbnail" type="file" class="w3-input w3-border w3-round-large" placeholder="https://example.com/sample.png">
                        </div>

                        <div class="my-3">
                          <input type="submit" name="add" value="ADD" class="w3-button w3-full w3-indigo w3-round-large">
                        </div>
                      </form>

                      <?php
                      if (isset($_POST["add"])) {
                        $course_id = rand(10000000, 99999999);
                        $course_name = $_POST["name"];
                        $category_id = $_POST["category"];
                        $teacher_id = $_POST["teacher"];
                        $short_desc = $_POST["short_desc"];
                        $long_desc = $_POST["long_desc"];
                        $scheme = $_POST["scheme"];
                        $req = $_POST["req"];
                        $duration = $_POST["duration"];
                        $price = $_POST["price"];
                        $thumbnail = date("His") . $_FILES["thumbnail"]["name"];
                        $tmp_name = $_FILES["thumbnail"]["tmp_name"];
                        $location = "../uploads/" . $thumbnail;

                        // var_dump($location);

                        $insertQuery = mysqli_query($conn, "INSERT INTO `courses`(`course_id`, `teacher_id`, `course_name`, `category_id`, `short_description`, `long_description`, `scheme`, `requirements`, `duration`, `thumbnail`, `price`) 
                        VALUES ('$course_id', '$teacher_id','$course_name','$category_id','$short_desc','$long_desc','$scheme','$req','$duration','$thumbnail',{$price})");

                        if ($insertQuery) {
                          move_uploaded_file($tmp_name, $location);
                          echo "<script>alert('Course Added!')</script>";
                        } else {
                          echo "<script>alert('Error adding course!')</script>";
                        }
                      }
                      ?>

                    </div>
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


  </div>
  <!-- barba container end -->

  <!-- JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/leaflet%401.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  <script src="js/vendors.js"></script>
  <script src="js/main.js"></script>
</body>


<!-- Mirrored from creativelayers.net/themes/Royal-Educity-html/dshb-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Apr 2024 14:44:39 GMT -->

</html>