<?php
include("paystack_config.php");
include("config.php");

if (isset($_GET['reference'])) {
    if (isset($_GET['c']) && isset($_GET['u'])) {
        $reference = $_GET['reference'];
        $url = "https://api.paystack.co/transaction/verify/" . rawurlencode($reference);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $paystackSecretKey",
            "Cache-Control: no-cache",
        ));
        $result = curl_exec($ch);
        $response = json_decode($result, true);

        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        } elseif ($response['status'] !== true) {
            echo 'Transaction Verification Failed: ' . $response['message'];
        } else {
            $payment_data = $response['data'];

            // Check if payment was successful
            if ($payment_data['status'] === 'success') {
                // Payment was successful, store data in the database


                $email = $payment_data['customer']['email'];
                $price = $payment_data['amount'] / 100;
                $ref = $payment_data['reference'];
                $status = $payment_data['status'];

                $order_id = rand(100000, 999999);
                $course_id = $_GET["c"];
                $user_id = $_GET["u"];

                $checkCoursePurchase = mysqli_query($conn, "SELECT * FROM `orders` WHERE `course_id`='$course_id' AND `user_id`='$user_id' ");
                if (mysqli_num_rows($checkCoursePurchase) < 1) {
                    $addOrder = mysqli_query($conn, "INSERT INTO `orders` (`order_id`,`course_id`,`user_id`,`price`,`reference`) VALUES ('$order_id','$course_id','$user_id','$price','$ref')");
                    if ($addOrder) {
                        echo "<script>alert('Successful ✅. Your order is being processed and your course will be available to you shortly once payment is confirmed.'); location.href='user/';</script>";
                    }
                } else {
                    echo "<script>alert('Course order already exists ❌.');location.href='user/'</script>";
                }
            } else {
                echo "Payment was not successful.";
            }
        }

        curl_close($ch);
    }
} else {
    echo "No reference provided.";
}
