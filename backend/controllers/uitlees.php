<?php
require 'backend/configs/config.php';
$id = $_GET['artikelnr'];
//Maak de query
$query = "SELECT * FROM ajax_meubels WHERE artikelnr = $id";
//Voer de query uit
$result = mysqli_query($mysqli, $query);

while ($row = mysqli_fetch_array($result))
{
    echo "<td>" . $row['artikelnr'] . "</td><br>";
    echo "<td>" . $row['naam'] . "</td><br>";
    echo "<td>" . $row['type'] . "</td><br>";
    echo "<td>" . $row['omschrijving'] . "</td><br>";
    echo "<td>" . $row['prijs'] . "</td><br>";
    
}
