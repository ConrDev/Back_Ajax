<?php
session_start();
require_once 'backend/configs/config.php';

$query = "SELECT * FROM `ajax_meubels` ORDER BY `artikelnr`";
$result = mysqli_query($link, $query);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>AJAX</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
</head>
  <body >
    <div class="modal-content col-8 mx-auto p-5"style="background-color: lightgray;">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand font-weight-bold text-uppercase">Artikelen</a>
                <div class="">
                    <div class="navbar-text" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> (<span id="count_artikelen">0</span>)</div>
                    <a class="btn btn-outline-success" type="button" href="opdracht4_kassa.php">Afrekenen</a>
                </div>
            </div>
        </nav>
        <?php
            if (mysqli_num_rows($result) == 0) {
        ?>
                <p class="p-3 mb-2 text-white text-center bg-danger">Sorry, geen artikelen gevonden!</p>
        <?php
            } else {
                while ($row = mysqli_fetch_array($result)) {
        ?>
                    <div class="container" style="background-color: white;">
                        <form action="POST" class="product-form p-3 animated zoomIn fester">
                            <!-- <input type="hidden" name="artikelnr" value="<?=$row['artikelnr']; ?>"> -->
                            <fieldset class="form-group row">
                                <legend class="col-form-legend col-sm-1-12 font-weight-bold"><?=$row['naam']; ?></legend>
                                <div class="col-sm-1-12" >
                                    <img src='assets/meubels/<?=$row['naam']; ?>.jpg' />
                                    <p ><?=$row['type']; ?></p>
                                   
                                    
                                </div>
                                <div class="form-group col">
                                    <div class="offset-sm-2 col-sm-10">
                                        <p><?=$row['omschrijving']; ?></p>
                                        <p class="mr-3 font-weight-bold text-right">€ <?=$row['prijs']; ?></p>
                                        <button type="button" class="btn btn-success text-center mr-3 float-right" onclick="InWinkelwagen(<?=$row['artikelnr']; ?>)">Koop nu!</button>
                                    </div>
                                </div>
                            </fieldset>
                            
                        </form>
                    </div>
        <?php
                }
            }
        ?>

        <!-- <table class="table table-striped table-inverse w-100">
            <thead class="thead-inverse">
                <tr>
                    <th>Product</th>
                    <th>Omschrijving</th>
                    <th>Type</th>
                    <th>Prijs</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <form action="" method="post">
                            <input type="hidden" name="artikelnr" value="<?=$row['artikelnr']; ?>">
                            <td scope="row"><img src='assets/meubels/<?=$row['naam']; ?>.jpg' /></td>
                            <td><?=$row['omschrijving']; ?></td>
                            <td><?=$row['type']; ?></td>
                            <td class="list-unstyled">
                                <p class="mr-3 font-weight-bold">€ <?=$row['prijs']; ?></p> <br><br>
                                <button type="submit" class="btn btn-success text-center mr-3" onclick="">Koop nu!</button>
                            </td>
                        </form>
                    </tr>
                    <?php
                        }
                    ?> -->
                    <!-- <tr>
                        <td scope="row"><img src='assets/meubels/Armour.jpg' id="10084532" onclick="Zoeken(10084532)" /></td>
                        <td></td>
                        <td><button type="button" class="btn btn-success text-center" onclick="">Koop nu!</button></td>
                    </tr>
                    <tr>
                        <td scope="row"><img src='assets/meubels/Baltica.jpg' id="10085305" onclick='Zoeken(10085305)' /></td>
                        <td></td>
                        <td><button type="button" class="btn btn-success text-center" onclick="">Koop nu!</button></td>
                    </tr>
                    <tr>
                        <td scope="row"><img src='assets/meubels/Bari.jpg' id="10108335" onclick='Zoeken(10108335)' /></td>
                        <td></td>
                        <td><button type="button" class="btn btn-success text-center" onclick="">Koop nu!</button></td>
                    </tr>
                    <tr>
                        <td scope="row"><img src='assets/meubels/Canada.jpg' id="40074107" onclick='Zoeken(40074107)' /></td>
                        <td></td>
                        <td><button type="button" class="btn btn-success text-center" onclick="">Koop nu!</button></td>
                    </tr>
                    <tr>
                        <td scope="row"><img src='assets/meubels/Colorado.jpg' id="40084724" onclick='Zoeken(40084724)' /></td>
                        <td></td>
                        <td><button type="button" class="btn btn-success text-center" onclick="">Koop nu!</button></td>
                    </tr>
                    <tr>
                        <td scope="row"><img src='assets/meubels/Hawaii.jpg' id="50121189" onclick='Zoeken(50121189)' /></td>
                        <td></td>
                        <td><button type="button" class="btn btn-success text-center" onclick="">Koop nu!</button></td>
                    </tr> -->
                <!-- </tbody>
        </table> -->
        <div id="Zoeken"></div>
        <div id="resultaat"></div>
    </div>
   <!-- Optional JavaScript -->
   <script src="js/ajax.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script> 
</body>
</html>