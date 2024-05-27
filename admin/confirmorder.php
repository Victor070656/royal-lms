<?php
include("../config.php");
session_start();

if (isset($_SESSION["admin"])) {
  $admin_id = $_SESSION["admin"]["id"];
} else {
  echo "<script>location.href='./login.php'</script>";
}

if (isset($_GET["o"])) {
  $order_id = $_GET["o"];
  $confirm = mysqli_query($conn, "UPDATE `orders` SET `status` = 'confirmed'");
  if ($confirm) {
    echo "<script>alert('Order Confirmed!');location.href='./orders.php'</script>";
  } else {
    echo "<script>alert('Error confirming order!');location.href='./orders.php'</script>";
  }
} else {
  echo "<script>location.href='./orders.php'</script>";
}
