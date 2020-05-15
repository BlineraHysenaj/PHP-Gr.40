<?php
// Inicializimi i sesionit.
session_start();

// Kontrolloni nëse përdoruesi është identifikuar(kyqur),
// përndryshe përcjellim në faqen e identifikimit.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: kycu.php");
    exit;
}

// Përfshini fajllin e konfigurimit.
require_once "konfigurimi.php";

// Definimi i variablave dhe inicializimi me vlera bosh.
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

//  Procesimi i dhënave të formës kur forma është paraqitur (submitted).
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validoni fjalëkalimin e ri
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Type your new password";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password should be more than 6 characters";
    } else{
        $new_password = trim($_POST["new_password"]);
    }

    // Ri-konfirmimi i fjalëkalimit.
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm your password";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password doesnt match!";
        }
    }

    // Kontrolloni gabimet e dhëna përpara se të përditësoni bazën e të dhënave.
    if(empty($new_password_err) && empty($confirm_password_err)){

        // Përgatitni një deklaratë të përditësimit.
        $sql = "UPDATE table_admins SET password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){

            // Bind (vendos) variablat në deklaratën e përgatitur si parametra (string, dhe int).
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Vendosni parametrat.
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Përpjekje për të ekzekutuar deklaratën e përgatitur.
            if(mysqli_stmt_execute($stmt)){
                // Fjalëkalimi është përditësuar me sukses.
                // Shkatëroni sesionin, dhe ridirektohuni në faqen e identifikimit.
                session_destroy();
                header("location: login.php");

                // Funksioni exit () përfundon vetëm ekzekutimin e skriptit. 
                // Funksionet e mbylljes dhe destruktorët e objekteve.
                // gjithmonë do të ekzekutohen edhe nëse thirret funksioni exit().
                exit();
            } else{
                echo "Something went bad, please try again.";
            }
        }

        // Mbyllni deklaratën.
        mysqli_stmt_close($stmt);
    }

    // Mbyllni lidhjen.
    mysqli_close($link);
}
?>

<!-- Definimi i html -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ndryshoni fjal&euml;kalimin - 2020</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.0/css/bootstrap.min.css">

        <style type="text/css">
            body
            { 
                font: 14px sans-serif; 
                background: #292929;
                font-family: 'Poppins', sans-serif;
                color: #FFF;
            }

            .center {
                margin: auto;
                margin-top: 100px;
                width: 35%;
                padding: 10px;
            }
        </style>
    </head>
    <body>

        <div class="center">
            <h3><center>Ndryshoni fjal&euml;kalimin tani !  </center> </h2>
            <br>
            <p>Ju lutemi plot&euml;soni k&euml;t&euml; formular p&euml;r t&euml; rivendosur fjal&euml;kalimin tuaj.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 

                <!-- Fjalëkalimi i ri -->
                <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                    <label>Fjal&euml;kalim i ri:</label>
                    <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                    <span class="help-block"><?php echo $new_password_err; ?></span>
                </div>

                <!-- Konfirmimi i fjalëkalimit -->
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Konfirmo fjal&euml;kalimin:</label>
                    <input type="password" name="confirm_password" class="form-control">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>

                <!-- Dërgimi i të dhënave -->
                <div class="form-group">
                    <center> <input type="submit" class="btn btn-danger" value="Ndryshoni fjal&euml;kalimin !"> </center>
                    <center>  <a class="btn btn-link" href="index.php">Anuloje</a></center
                        </div>
                        </form>
                </div>    
                </body>
            </html>