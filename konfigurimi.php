<?php
require("konfigurimiConst.php");

// Përpjekje për t'u lidhur me bazën e të dhënave MySQL.
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Kontrolloni lidhjen.
if($link === false){
	// Verifikohet lidhja me databazë.
    die("Gabim n&euml; lidhje !" . mysqli_connect_error());
}
?>