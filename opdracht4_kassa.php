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
  <body>
    <div class="modal-content col-8 mx-auto p-5" style="background-color: lightgray;">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <h1 class="navbar-brand font-weight-bold"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Winkelwagen (<span id="count_artikelen">0</span> items)</h1>
                <div class="">
                    <!-- <div class="navbar-text" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> (<span id="count_artikelen">0</span>)</div> -->
                    <a class="btn btn-outline-danger" type="button" href="opdracht4.php">Terug</a>
                </div>
            </div>
        </nav>
        <p class="mb-2 text-white text-center bg-success font-weight-bold" id="artikel_verwijderd"></p>
        <div class="container-fluid d-flex mt-4" style="min-height: 500px;">
            <div class="container-winkelwagen row w-100"> 
                <table class="table table table-inverse" style="background-color: white;">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Product</th>
                            <th>Omschrijving</th>
                            <!-- <th>Type</th> -->
                            <th>Prijs</th>
                        </tr>
                        </thead>
                        <tbody id="kassaBody">
                            <!-- <div class="text-center m-5" id='loading'>
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div> -->
                        </tbody>
                </table>
            </div>


            <!-- Subtotaal
            € 169,50
            Verzending
            Gratis
            Totaalprijs (inclusief btw)
            € 169,50 -->

            <div class="container-prijs row ml-5 w-50 sticky-top" style="height: 300px"> 
                <form class=" w-100" style="background-color: white;">
                    <fieldset class="m-5 form-group row">
                        <legend class="col-form-legend col-sm-1-12 mb-4 font-weight-bold">Totaalprijs</legend>
                        <div class="form-group row w-100" id="artikel-prijzen">
                            <p class="text-left col-sm-8">Subtotaal </p> <p class="col-sm-4 text-right">€ 00,00</p>
                            <p class="text-left col-sm-8 mt-3">Verzending </p> <p class="col-sm-4 mt-3 text-right">Gratis</p>
                            <hr class="col-sm-8 mt-0">
                            <p class="font-weight-bold text-left col-sm-8">Totaalprijs (inc. btw) </p> <p class="col-sm-4 font-weight-bold text-right">€ 00,00</p>
                            <button type="button" class="btn btn-success text-center w-100" onclick="InWinkelwagen(<?=$row['artikelnr']; ?>)">Afrekenen</button>
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>
        
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