<?php

require_once 'InterfaceClass.php';
class Perdoruesi implements InterfaceClass{
    private $username;
    private $location;
    private $homepage;
    
    public function __construct ($username, $location, $homepage) {
        $this->username = $username;
        $this->location = $location;
        $this->homepage = $homepage;
    }

      public function getUsername() {
        return $this->username;
      }
      public function getLocation() {
        return $this->location;
      }
      public function getHomepage() {
        return $this->homepage;
      }
      public function save() {
        echo "Metoda save() ne klasen 'Perdoruesi'.<br>";
      }
      public function load() {
        echo "Metoda load() ne klasen 'Perdoruesi'.<br>";
      }
      public function delete() {
        echo "Metoda delete() ne klasen 'Perdoruesi'.<br>";
      }
}
?>