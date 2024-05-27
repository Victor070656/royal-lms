<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Paystack</title>
</head>

<body>

    <?php
    include("paystack_config.php");
    $email = "ikechukwuv052@gmail.com";
    $amount = 1000; // The amount in kobo (1000 kobo = 10 NGN)
    $cartid = rand(10000000, 99999999);
    $currency = "NGN";
    ?>

    <form method="POST">
        <input type="hidden" name="user_email" value="<?php echo $email; ?>">
        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
        <input type="hidden" name="cartid" value="<?php echo $cartid; ?>">
        <button type="submit" name="pay_now" id="pay-now" title="Pay now">Pay now</button>
    </form>

    <?php
    if (isset($_POST['pay_now'])) {
        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' => $email,
            'amount' => $amount * 100, // Convert amount to kobo
            'callback_url' => "http://localhost/edu/callback.php?c=2&u=3",
            'metadata' => ["cancel_action" => "https://your-cancel-url.com"]
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
            header('Location: ' . $authorization_url);
        }

        //close connection
        curl_close($ch);
    }
    ?>

</body>

</html>