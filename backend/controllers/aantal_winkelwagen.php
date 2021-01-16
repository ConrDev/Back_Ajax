<?php
require "../../backend/configs/config.php";
session_start();

$totaal_aantal = 0;
foreach ($_SESSION['artikelen'] as $artikelen) {   
    $totaal_aantal += $artikelen['aantal'];
}
// $totaal_artikelen = count($_SESSION['artikelen']);
die(json_encode(array('artikelen'=>$totaal_aantal)));
?>