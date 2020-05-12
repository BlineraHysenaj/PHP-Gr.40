<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: kycu.php");
    exit;
}


require_once "konfigurimi.php";
include 'regjistrimi.php';


if (isset($_GET['fshije'])) {

    $id = $_GET['id']; 
    $sql = "DELETE FROM `table_admins` WHERE id='$id'";
    if (!mysqli_query($link,$sql)) {
        echo "<br><p class='paragrafi1'>SHIKONI P&#203;R GABIME.</p>";
    }
    else{
    }
}
if (isset($_GET['del'])) {

    $id = $_GET['del']; 
    $sql = "DELETE FROM table_comments WHERE id=$id";
    if (!mysqli_query($link,$sql)) {
        echo "<br><p class='paragrafi1'>SHIKONI P&#203;R GABIME.</p>";
    }
    else{
      
    }
}

if (isset($_GET['update'])) {
    $id=$_GET['id'];
    $username=$_GET['username'];
    $password=$_GET['password'];
    $password2=password_hash($password, PASSWORD_DEFAULT);    
  
    $sql = "UPDATE `table_admins` SET `username`='$username',`password`='$password2' WHERE id=$id ";
    if (!mysqli_query($link,$sql)) {
        echo "<br><p class='paragrafi1'>T&#203; DH&#203;NAT NUK U NDRYSHUAN - SHIKONI P&#203;R GABIME.</p>";
    }
    else{
    }
}

?>