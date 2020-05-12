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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <!-- Fillimi i Bootstrap -->
        <link rel="stylesheet" type="text/css" href="bt-content/css/bootstrap.min.css">
        <script src="bt-content/js/bootstrap.min.js"></script>

        <!-- Css i jashtum -->
        <link rel="stylesheet" type="text/css" href="bt-content/css/style.css">

        <!--Librari per animacione -->
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script src="bt-content/js/ajax.js"></script>

<style>
    .bg-nav {
        height: 200px;
        

    }
    body {
        background-color: #E1E1E1;
    }
        </style>
        

    </head>
    <body>

        <div class="bg-nav">

            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-light p-4">

                        <ul class="navbar-nav ">
                            <li class="nav-item active">
                                <a class="nav-link" href="./index.php"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-users" aria-hidden="true"></i> About Us</a>
                            </li>

                           <li class="nav-item">
                                <a class="nav-link" href="./register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign in</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="./login.php"><i class="fa fa-unlock" aria-hidden="true"></i> Log in</a>
                            </li>

                        </ul>

                    </div>
                </div>