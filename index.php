<?php

require_once 'vendor/autoload.php';
require_once 'config.php';
$env = parse_ini_file('.env');
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
    $tag1 = 'Error: Ratelimit exceeded or API unreachable';
    $tag2 = $tag3 = '';
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
    <title><?php $env["PAGE_NAME"];?></title>
    <meta http-equiv="refresh" content="300">  <!-- Refresh every 5 minutes -->
</head>

<body>
    <header>
        <style>
            img {
                margin-left: -3.5px;
            }

            body {
                background: <?php echo $env["BACKGROUND"];?>;
            }
        </style>
    </header>
    <div class="mask">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="mx-auto text-black text-center">
                <img src="qr.png" width="200px" height="200px">
                <h3 class="mb-4"><?php $env["PAGE_NAME"];?></h3>
            </div>
            <!--  -->
            <div class="mx-auto <?php if($env["BACKGROUND"] == "black"){ echo "text-white";} else { echo "text-black";} ?> text-center ">
                <h2 class="mb-4">Access Code</h2>
                <h2 class="mb-4"><?php echo $tag1; ?></h2>
                <h2 class="mb-4"><?php echo $tag2; ?></h2>
                <h2 class="mb-4"><?php echo $tag3; ?></h2>
            </div>
        </div>
    </div>
</body>

</html>