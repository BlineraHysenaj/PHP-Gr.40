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

                <nav class="navbar ikonaNav">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i>
                        </span>
                    </button>
                </nav>
            </div> 
            <div>
            </div></div>

        <div>
        <h3 id="welcomeAdmin">Hi <?php echo htmlspecialchars($_SESSION["username"]); ?> welcome to the admin section!</h3>
        </div>
        <div class="container-fluid">
        <div class="row">
            
            <div class="col col-lg-12">
            <a href="shkycu.php"><button class="butonimbylle btn btn-danger"><i class="fa fa-times-circle" aria-hidden="true"></i>
 Log out</button></a>
                <a href="#"><button class="butonimbylle btn btn-success"  data-toggle="modal" data-target="#myModal"><i class="fa fa-user-circle" aria-hidden="true"></i>
 Create new admin</button></a>
           
            </div>
            </div>
        </div>
            
             <div class="container-fluid">
        <div class="row">
            
            <div class="col col-lg-3 requestCol">
            <h4><i class="fa fa-plus" aria-hidden="true"></i>
 New requests to join the community</h4>
            
                 <?php
                        $result = mysqli_query($link,"SELECT * FROM table_requests");

                        while($row = mysqli_fetch_array($result)) {
                        ?>     
                <div class="requestJoin">
                    <h5><?php echo $row["Name"]; ?><span> </span><?php echo $row["Lastname"]; ?> </h5>
                    <h5><?php echo $row["Email"]; ?></h5>
                    <h5><?php echo $row["Phonenumber"]; ?></h5>
                
                </div>
                <?php } ?>
                
            </div>
            
                <div class="col col-lg-3 requestCol">
            <h4><i class="fa fa-plus" aria-hidden="true"></i>
 New comments from visitors</h4>
 <?php
             $result = mysqli_query($link,"SELECT * FROM table_comments");
                    while($row = mysqli_fetch_array($result)) {
                        ?>     
                <div class="requestJoin">
                    <h5><?php echo $row["id"]; ?></h5>
                    <h5><span><?php echo $row["Name"]; ?></span><span> : </span><?php echo $row["Comment"]; ?></h5>
                    
                   <a href="login.php?del=<?php echo $row['id']; ?>" class="del_btn"><i class="fa fa-times-circle" aria-hidden="true"></i>
</a>
                </div>
                  <?php } ?>
            </div>
            
                <div class="col col-lg-6 requestCol">
            <h4><i class="fa fa-plus" aria-hidden="true"></i>
 Admins</h4>
            
                <div class="requestJoin">
                
                      <div class="table-wrapper">
                <div class="table-title">
                <h5><strong style="color:#FF4141">Warning!</strong> These data are sensitive.</h5>
                </div><br>
                <table class="table  table-striped table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $result = mysqli_query($link,"SELECT * FROM table_admins");

                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr id="<?php echo $row["id"]; ?>">
                            <td><?php echo $row["id"]; ?>
                            <td><?php echo $row["username"]; ?></td>
                            <td><?php echo $row["password"]; ?></td>
                
                            <td>
                                <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                    <i class="fas fa-exchange-alt" data-toggle="tooltip" 
                                       data-id="<?php echo $row["id"]; ?>"
                                       data-emri="<?php echo $row["username"]; ?>"
                                       data-mbiemri="<?php echo $row["password"]; ?>"   title="Ndrysho"></i>
                                </a>
                                <a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="fas fa-user-slash" data-toggle="tooltip" title="Fshije"></i></a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
                    
                
                </div>
                
            </div>
            
            
            </div>
        </div>  