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



</head>
  <body>
      <!-- Krijimi i navigacionit dhe backgroundit -->
        <div class="bg-nav">

            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-light p-4">

                        <ul class="navbar-nav ">
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>

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
                   
                <!-- Krijimi i navigacionit per burger -->
                <nav class="navbar ikonaNav">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i>
                        </span>
                    </button>
                </nav>
            </div> 
            <div>

                <!-- Krijimi i disa mesazheve dhe krijim i countdown te diteve permes JS -->
                <h1 id="hpNature1" data-aos="slide-left">EDUCATION DEAPARTMENT!</h1>
                <p id="hpNature" data-aos="slide-left">Digital Education</p>


                <h4 id="msgEvent">The next sammit for education is </h4>
                <div class="container" data-aos="slide-left">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="koha-countdown slideInRight" id="countdown">
                                <div class="ditet ">
                                    <span id="dita"></span>
                                    <p id="paragrafi-ditet">Days</p>
                                </div>
                                <div class="ditet ">
                                    <span id="ora"></span>
                                    <p id="paragrafi-ora">Hours</p>
                                </div>
                                <div class="ditet ">
                                    <span id="minuta"></span>
                                    <p id="paragrafi-minuta">Minutes</p>
                                </div>
                                <div class="ditet ">
                                    <span id="sekonda"></span>
                                    <p id="paragrafi-sekonda">Seconds</p>
                                </div>
                            </div></div>
                    </div>
                </div>
            </div>
            <footer>
            <!--Krijimi i foterit --> 
            <div class="container-fluid foteri">
                <div class="row" data-aos="zoom-in">

                    <div class="col col-lg-4 col-12 ">
                        <h1><i class="fa fa-location-arrow" aria-hidden="true"></i> Address :</h1>
                        <p>Bregu i Diellit- 1000 Prishtina Kosovo</p>
                    </div>

                    <div class="col col-lg-4 col-12 ">
                        <h1><i class="fa fa-phone-square" aria-hidden="true"></i> Contact :</h1>
                        <p>+383 45 947 425</p>
                    </div>

                    <div class="col col-lg-4 col-12 ">
                        <h1><i class="fa fa-envelope" aria-hidden="true"></i> Email :</h1>
                        <p>noreply@uni-pr.edu</p>
                    </div>

                    <div class="col col-lg-12 col-12">
                        
                        <!--Paraqitja e iframe te mapit -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1471.753372737915!2d21.044426257954523!3d42.45950997992854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13537f00b9312eab%3A0x64cc0dfa29a9062e!2sDonje%20Godance!5e0!3m2!1sen!2s!4v1588196537271!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>


            </div>

        </footer>



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