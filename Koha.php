<?php

require_once 'InterfaceClass.php';

class Koha implements InterfaceClass {
  private $subject;
  private $author;
  private $createdTime;

  public function __construct( $subject, $author ) {
    $this->subject = $subject;
    $this->author = $author;
    $this->createdTime = time();
  }

  public function showHeader() {    
    $createdTimeString = date( 'l jS M Y h:i:s A', $this->createdTime );
    $authorName = $this->author->getUsername();
    echo "$this->subject  $createdTimeString.'  >>>Emri i perdoruesit:'.$authorName<br>";
  }
  public function save() {
    echo "Metoda save() ne klasen 'Koha'.<br>";
  }
  public function load() {
    echo "Metoda load() ne klasen 'Koha'.<br>";
  }
  public function delete() {
    echo "Metoda delete() ne klasen 'Koha'.<br>";
  }
}
?>