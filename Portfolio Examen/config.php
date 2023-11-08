<?php

$connect = mysqli_connect("localhost", "root", "", "broodkruimels_db");

if (!$connect) {
    echo "Connection Failed, ERROR!";
}
?>
