<?php

require_once 'vendor/autoload.php';
require_once 'config.php';
$site_id = 'default';
$unifi_connection = new UniFi_API\Client($controlleruser, $controllerpassword, $controllerurl, $site_id, $controllerversion);
$unifi_connection->login();
$vouchers = $unifi_connection->stat_voucher();

// create a new string where there is a dash between every 5 characters
if ($vouchers) {
    $tag1 = implode(' - ', str_split($vouchers[0]->code, 5));
    $tag2 = implode(' - ', str_split($vouchers[1]->code, 5));
    $tag3 = implode(' - ', str_split($vouchers[3]->code, 5));
} else {
    $tag1 = 'Error: Ratelimit exceeded';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="mdb.min.css" />
    <title>SHOR-Guest</title>

    <meta http-equiv="refresh" content="300">

</head>

<body>
    <header>
        <style>
            .navbar .nav-link {
                color: #fff !important;
            }

            img {
                margin-left: -3.5px;
            }

            body {
                background: white;
            }
        </style>
    </header>
    <div class="mask">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-black text-center">
                <img src="qr.png" width="200px" height="200px">
                <br>
                <br>
                <br>
                <h2 class="mb-4">Access Code</h2>
                <h2 class="mb-4"><?php echo $tag1; ?></h2>
                <h2 class="mb-4"><?php echo $tag2; ?></h2>
                <h2 class="mb-4"><?php echo $tag3; ?></h2>
            </div>
        </div>
    </div>
</body>

</html>