<?php
$universities = array (
    //Top universitetet me te mire ne bote, Nr i studenteve qe kane, Nr i programeve qe ofrojne
  array("Helsinki",31.312,88),
  array("Princeton University",29.897,89),
  array("University of Oxford",27.453,69),
  array("LMU Munich",30.345,78)
);
//Sortimi i arrays 
sort($universities);
for ($topuni = 0; $topuni < 4; $topuni++) {
  echo "<p><b>Universiteti-$topuni</b></p>";
  echo "<ul>";
  for ($students = 0; $students < 3; $students++) {
    echo "<li>".$universities[$topuni][$students]."</li>";
  }
  echo "</ul>";
}
//Explode function
$universities='I,II,III,IV';
$classes=explode(",",$universities);
print_r($classes);

?>