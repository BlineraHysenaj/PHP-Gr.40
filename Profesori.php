<?php
class Professors
{
    public $firstName;
    public $lastName;
    public $birthDate;
    public $birthCity;
    public $deathDate;
    function __construct($firstName, $lastName, $city, $birth,$death=null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthCity = $city;
        $this->birthDate = $birth;
        $this->deathDate = $death;
    }
    public function outputAsTable()
    {
        $table = "<table border='1'>";
        $table .= "<tr><th colspan='2'>";
        $table .= $this->firstName . " " . $this->lastName;
        $table .= "</th></tr>";
        $table .= "<tr><td>Birth:</td>";
        $table .= "<td>" . $this->birthDate;
        $table .= "(" . $this->birthCity . ")</td></tr>";
        $table .= "<tr><td>Death:</td>";
        $table .= "<td>" . $this->deathDate . "</td></tr>";
        $table .= "</table>";
        return $table;
    }
}

$Clayton = new Professors("Clayton","Christensen","Salt Lake City,","April 6, 1952",
"January 23, 2020");
$Vijay = new Professors("Vijay ","Govindarajan"," Chennai","November 18, 1949");
$Michael = new Professors("Michael","Porter"," Ann Arbor,","May 23, 1947","March 14, 2020");
echo $Clayton->outputAsTable();
echo $Vijay->outputAsTable();
echo $Michael->outputAsTable();
?>