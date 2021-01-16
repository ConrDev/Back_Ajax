<?php
require "../../backend/configs/config.php";
session_start();

if (isset($_POST['artikelnr'])) {
    if (empty($_SESSION['artikelen'])) {
        $_SESSION['artikelen'] = array();
    }

    foreach ($_POST as $key => $value) {
        $artikel[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }

    $stmt = $link->prepare("SELECT naam, prijs, omschrijving, type FROM ajax_meubels WHERE artikelnr=? LIMIT 1");
    $stmt->bind_param('s', $artikel['artikelnr']);
    $stmt->execute();
    $stmt->bind_result($naam, $prijs, $omschrijving, $type);

    while($stmt->fetch()) {
        $artikel['naam'] = $naam;
        $artikel['prijs'] = $prijs;
        $artikel['omschrijving'] = $omschrijving;
        $artikel['type'] = $type;
        $artikel['aantal'] = 1;

        if (isset($_SESSION['artikelen'])) {
            if (array_key_exists($artikel['artikelnr'], $_SESSION['artikelen'])) {
               $_SESSION['artikelen'][$artikel['artikelnr']]['aantal']++;
            } else {
                $_SESSION['artikelen'][$artikel['artikelnr']] = $artikel;
            }
        }
    }

    $totaal_aantal = 0;
    foreach ($_SESSION['artikelen'] as $artikelen) {
        
        $totaal_aantal += $artikelen['aantal'];
    }
    
    // $totaal_artikelen = count($_SESSION['artikelen']);
    print_r($_SESSION);
    die(json_encode(array('artikelen'=>$totaal_aantal)));
}

?>