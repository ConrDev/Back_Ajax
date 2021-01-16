<?php
session_start();

if (empty($_SESSION['artikelen'])) {
    ?>
    <p class="p-3 m-5 text-light text-center">Sorry, geen artikelen gevonden!</p>
    <?php
}

foreach ($_SESSION['artikelen'] as $key => $artikel) {
    $artikelNaam = $artikel['naam'];
?>
    <tr class="animated zoomIn faster">
        <td scope="row"><img src='assets/meubels/<?=$artikelNaam; ?>.jpg' /></td>
        <td>
            <p class="font-weight-bold"><?=$artikelNaam; ?></p>
            <p style="color: #666;"><?=$artikel['omschrijving']; ?></p><br>
            <p style="color: #666;">Type: <?=$artikel['type']; ?></p>
        </td>
        <!-- <td><?=$artikel['type']; ?></td> -->
        <td class="list-unstyled">
            <p class="mr-3 font-weight-bold">€ <?=$artikel['prijs']; ?></p> <br><br>
            <p class="mr-3">aantal: <?=$artikel['aantal']; ?></p> 
            <button type="submit" class="btn btn-danger text-center mr-3" onclick="VerwijderArtikel(<?=$key; ?>, '<?=$artikelNaam; ?>');">Verwijder</button>
        </td>
    </tr>
<?php
    next($artikel);
}
?>