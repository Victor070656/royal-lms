<?php
include("../config.php");
if (isset($_GET["t"])) {
    $teacher_id = $_GET["t"];
} else {
    echo "<script>location.href='./teachers.php'</script>";
}

$activate = mysqli_query($conn, "UPDATE `teachers` SET `validity`='active' WHERE `id`='$teacher_id'");
if ($activate) {
    echo "<script>alert('Teacher activated');location.href='./teachers.php'</script>";
} else {
    echo "<script>alert('Error activating teacher');location.href='./teachers.php'</script>";
}
