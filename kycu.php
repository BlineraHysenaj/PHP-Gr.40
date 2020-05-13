<?php

session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: login.php");
    exit;
}
require_once "konfigurimi.php";

// Definoni variablat dhe inicializoni me vlera të zbrazeta.
$username = $password = "";
$username_err = $password_err = "";


// Procesimi i dhënave të formës kur forma është paraqitur (submitted).
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Kontrolloni nëse emri i përdoruesit (username) është i zbrazët.
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter your valid username!";
    } else {
        $username = trim($_POST["username"]);
    }

  
    // Kontrolloni nëse fjalëkalimi është i zbrazët.
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your valid password!";
    } else {
        $password = trim($_POST["password"]);
    }

//   //funksioni per validimin e email-it
//     function checkemail($username)
//     {
//         return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $username)) ? FALSE : TRUE;
//     }

    // Validoni kredencialet.
    if (empty($username_err) && empty($password_err)) {
       
       // if (checkemail($username)) {
          
            // Përgatitni një deklaratë (select) të zgjedhur.
            $sql = "SELECT id, username, password FROM table_admins WHERE username = ?";
           
            // Përgatitni një deklaratë SQL për ekzekutim.
            if ($stmt = mysqli_prepare($link, $sql)) {

                // Bind (vendos) variablat në deklaratën e përgatitur si parametra.
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Vendosni parametrat.
                $param_username = $username;
               
               
                // Përpjekje për të ekzekutuar deklaratën e përgatitur.
                // Ekzekuton një Query të përgatitur.
                if (mysqli_stmt_execute($stmt)) {

                    // Ruaj rezultatin.
                    mysqli_stmt_store_result($stmt);

                    // Kontrolloni nëse ekziston një përdorues,
                    // nëse po, atëherë verifiko fjalëkalimin.
                    if (mysqli_stmt_num_rows($stmt) == 1) {

                        // Bind(vendos) rezultatet e variablave.
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                        // mysqli_stmt_fetch - Merrni rezultatet nga një deklaratë e përgatitur
                        //	në variablet e lidhura.
                        if (mysqli_stmt_fetch($stmt)) {
                            if (password_verify($password, $hashed_password)) {

                                // Fjalëkalimi është i saktë, për nisur një sesion të ri.
                                session_start();

                                //Ruaj të dhënat në variablat e sesionit.
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;

                                // Përcjell përdoruesin në faqen kryesore index.php.
                                header("location: login.php");
                            } else {

                                // Shfaq një mesazh gabimi nëse fjalëkalimi nuk është valid.
                                $password_err = "Password its not valid";
                            }
                        }
                    } else {
                        // Shfaq një mesazh gabimi nëse emri i përdoruesit nuk ekziston.
                        $username_err = "No account founded with that username!";
                    }
                } else {
                    echo "Please try again later!";
                }
            }
             