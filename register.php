<?php
include 'regjistrimi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Regjistrimi</title>

    <!-- PÃĢrdorimi i bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.0/css/bootstrap.min.css">

    <!-- Definimi i stilizimit CSS -->
    <style type="text/css">
        .center {
            margin: auto;
            margin-top: 100px;
            width: 100%;
            padding: 10px;
        }

        .form-group {
            width: 30%;
            margin-left: auto;
            margin-right: auto;
        }

        body {
            width: 100%;
            height: 100%;
            background-image: url("bt-content/Images/100.jpg");
            background-size: cover;
            color: #FFF;
        }

        @media only screen and (max-width: 768px) {
            .form-group {
                width: 100%;
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>
</head>

<body>

    <div class="center">
        <center>
            <h2>Register here</h2>
        </center>
        <br>
        <center>
            <p>Please enter your valid information.</p>
        </center>
        <br>

        <center>
            <p>You have an account? <a href="login.php">Log in here</a>.</p>
        </center>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>

            <br>

            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" name="krijo" id="largohu" value="Register">
            </div>
        </form>
         <center><a href="./index.php"><button class="btn btn-primary">Return Home</button></a></center>
    </div>
</body>
</html>