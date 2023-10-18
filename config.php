<?php
$env = parse_ini_file('.env');
$controlleruser     = $env["USER"];
$controllerpassword = $env["PASS"];
$controllerurl      = $env["URL"];
$controllerversion  = $env["VERSION"];
$debug = false;
?>