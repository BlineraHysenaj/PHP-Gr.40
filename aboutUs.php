<?php
require("Header.php")
?>


<DIV id = "aboutUs">
<div id="domain">
  <?php
  require_once 'Perdoruesi.php';
  require_once 'Koha.php';
  
  date_default_timezone_set('america/new_york');
  
  $aMember = new Perdoruesi( "FIEK", "Bregu i Diellit", 'http://w3programmers.com/' );
  echo $aMember->getUsername() . " gjendet ne " . $aMember->getLocation() ."<br>";
  $aMember->save();
  $aTopic = new Koha( "Koha: ", $aMember );
  $aTopic->showHeader();
  $aTopic->save();
  ?>
<?php


// get host name from URL
preg_match('@^(?:http://)?([^/]+)@i',
    "http://www.php.net/index.html", $matches);
$host = $matches[1];
// get last two segments of host name
preg_match('/[^.]+\.[^.]+$/', $host, $matches);
echo "Domain name is: {$matches[0]}\n";

?>
</div>