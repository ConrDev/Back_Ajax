<?php
require "../../backend/configs/config.php";
session_start();

$artikelnr = $_POST['artikelnr'];

if(array_key_exists($artikelnr, $_SESSION['artikelen'])) {
    if ($_SESSION['artikelen'][$artikelnr]['aantal'] > 1) {
        echo 'meer dan 1';
        $_SESSION['artikelen'][$artikelnr]['aantal'] = $_SESSION['artikelen'][$artikelnr]['aantal'] - 1;
    } else {
        unset($_SESSION['artikelen'][$artikelnr]);
    }
    exit(200);
} else {
    exit(400);
}

?>