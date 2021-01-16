<?php
    session_start();

    $subTotaal = 0.00;
    $verzendKosten = 0.00;
    $Totaal = 0.00;

    foreach ($_SESSION['artikelen'] as $key => $artikel) {
        if ($artikel['aantal'] > 1) {
            $subTotaal += $artikel['prijs'] * $artikel['aantal'];
        } else {
            $subTotaal += $artikel['prijs'];
        }
    }

    $totaal = $subTotaal + $verzendKosten;
?>

<p class="text-left col-sm-5">Subtotaal </p> <p class="col-sm-7 text-right">€ <?=$subTotaal; ?></p>
<p class="text-left col-sm-5 mt-3">Verzending </p> <p class="col-sm-7 mt-3 text-right">Gratis</p>
<hr class="col-sm-8 mt-0">
<p class="font-weight-bold text-left col-sm-5">Totaalprijs (inc. btw) </p> <p class="col-sm-7 font-weight-bold text-right">€ <?=$totaal; ?></p>
<button type="button" class="btn btn-success text-center w-100" onclick="InWinkelwagen(<?=$row['artikelnr']; ?>)">Afrekenen</button>