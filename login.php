<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: kycu.php");
    exit;
}

require_once "konfigurimi.php";
include 'regjistrimi.php';

if (isset($_GET['fshije'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `table_admins` WHERE id='$id'";
    if (!mysqli_query($link, $sql)) {
        echo "<br><p class='paragrafi1'>SHIKONI P&#203;R GABIME.</p>";
    } else {
    }
}
if (isset($_GET['del'])) {

    $id = $_GET['del'];
    $sql = "DELETE FROM table_comments WHERE id=$id";
    if (!mysqli_query($link, $sql)) {
        echo "<br><p class='paragrafi1'>SHIKONI P&#203;R GABIME.</p>";
    } else {
    }
}

if (isset($_GET['update'])) {
    $id = $_GET['id'];
    $username = $_GET['username'];

    $password = $_GET['password'];
    $password2 = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE `table_admins` SET `username`='$username',`password`='$password2' WHERE id=$id ";

    if (!mysqli_query($link, $sql)) {
        echo "<br><p class='paragrafi1'>T&#203; DH&#203;NAT NUK U NDRYSHUAN - SHIKONI P&#203;R GABIME.</p>";
    } else {
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
                            <a class="nav-link" href="./aboutUs.php"><i class="fa fa-users" aria-hidden="true"></i> About Us</a>
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
    </div>

    <div>
        <h3 id="welcomeAdmin">Hi <?php echo htmlspecialchars($_SESSION["username"]); ?> welcome to the admin section!</h3>
    </div>

    <div class="container-fluid">
        <div class="row">

            <div class="col col-lg-12">
                <a href="shkycu.php"><button class="butonimbylle btn btn-danger"><i class="fa fa-times-circle" aria-hidden="true"></i>
                        Log out</button>
                </a>
                <a href="#"><button class="butonimbylle btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-circle" aria-hidden="true"></i>
                        Create new admin</button>
                </a>
            </div>
            
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-3 requestCol">

                <h4><i class="fa fa-plus" aria-hidden="true"></i>
                    New requests to join the community
                </h4>

                <?php
                $result = mysqli_query($link, "SELECT * FROM table_requests");

                while ($row = mysqli_fetch_array($result)) {
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
                $result = mysqli_query($link, "SELECT * FROM table_comments");
                while ($row = mysqli_fetch_array($result)) {
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
                                $result = mysqli_query($link, "SELECT * FROM table_admins");

                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr id="<?php echo $row["id"]; ?>">
                                        <td><?php echo $row["id"]; ?>
                                        <td><?php echo $row["username"]; ?></td>
                                        <td><?php echo $row["password"]; ?></td>

                                        <td>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                                <i class="fas fa-exchange-alt" data-toggle="tooltip" data-id="<?php echo $row["id"]; ?>" data-emri="<?php echo $row["username"]; ?>" data-mbiemri="<?php echo $row["password"]; ?>" title="Ndrysho"></i>
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

    <!-- Pjesa e modal per ndryshimin e te dhenave -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="update_form">

                    <div class="modal-header">
                        <h3 class="modal-title">Ndrysho</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" id="id" name="id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" id="password" name="password" class="form-control" required>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary btn-lg" type="submit" name="update" style="background: #556B2F;">Ndrysho</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Pjesa e modal per fshirjen e te dhenave -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>

                    <div class="modal-header">
                        <h3 class="modal-title"></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="id_d" name="id" class="form-control">
                        <p>Are u sure u want to delete?</p>
                        <p class="text-danger"><small>You cannot return this data anymore</small></p>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-danger" type="submit" name="fshije" style="background: red;">Delete</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="center">
                        <center>
                            <h2>Create new administrator</h2>
                        </center>
                        <br>
                        <center>
                            <p>Please type the information right.</p>
                        </center>
                        <br>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <label>Username :</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                                <span class="help-block"><?php echo $username_err; ?></span>
                            </div>

                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label>Password :</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>

                            <!-- Krijimi i formës - Konfirmimi i  Fjalëkalimit (Password) -->
                            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <label>Confirm Password:</label>
                                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                            </div>

                            <br>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="krijo" id="largohu" value="Create">

                                <input type="reset" class="btn btn-info" value="Reset">
                            </div>

                            <br>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Fillimi i librarive te JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="bt-content/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({

            offset: 120,
            delay: 0,
            once: true,

        });
    </script>
</body>
</html>