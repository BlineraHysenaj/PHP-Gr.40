<?php

require_once 'konfigurimi.php';
# Variablat ne PHP i shenojme me $
#$_GET--Array of query string data passed to the server via the URL
#$_Get eshte variabel superglobale qe perdoret per me i grumbullu/collect te dhenat qe paraqiten ne nje Html form, gjithashtu munet me grumbullu te dhena qe jane dergu ne URL

if(isset($_GET['userSubmit'])) {
    
    $emri = $_GET['chatEmri'];
    $komenti = $_GET['chatKomenti'];
    $sql = "INSERT INTO table_comments(Name,Comment) VALUES ('$emri','$komenti')";
    
    if($link->query($sql)===true) {
    }
    else {
        echo "Error:" . $sql . "<br>" . $link->error;
    }
}

if(isset($_GET['request'])) {
    
    $emri = $_GET['emri'];    
    $mbiemri = $_GET['mbiemri'];    
    $email = $_GET['email'];    
    $tel = $_GET['tel'];    

    $sql = "INSERT INTO table_requests(Name,Lastname,Email,Phonenumber) VALUES ('$emri','$mbiemri','$email','$tel')";
    
    if($link->query($sql)===true) {
    }
    else {
        echo "Error:" . $sql . "<br>" . $link->error;
    }
}
?>



<!DOCTYPE html>
<?php
setcookie("username", "Blinera", time()+60*60*24*7);?>
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
            <script>
                // Data se ku do te mbaroj
                var data = new Date("June 17, 2020 00:00:00").getTime();

                // Update e kohes qdo 1 sekond
                var x = setInterval(function() {

                    // Data e sodit dhe koha
                    var datasot = new Date().getTime();

                    // Distanca nga koha sodit me daten e mbarimit
                    var distanca = data - datasot;

                    // Kalkulimi i diteve oreve e sekondeve
                    var days = Math.floor(distanca / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distanca % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distanca % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distanca % (1000 * 60)) / 1000);

                    // Ndrysho elementet 
                    document.getElementById("dita").innerHTML = days + " ";
                    document.getElementById("ora").innerHTML = hours + " ";
                    document.getElementById("minuta").innerHTML = minutes + " ";
                    document.getElementById("sekonda").innerHTML = seconds + " ";
                    // Deklarimi dhe incializimi i variablave te id

                    var paragrafi1 = document.getElementById("paragrafi-ditet");
                    var paragrafi2 = document.getElementById("paragrafi-ora");
                    var paragrafi3 = document.getElementById("paragrafi-minuta");
                    var paragrafi4 = document.getElementById("paragrafi-sekonda");

                    // Nese eventi mbaron ndrysho elementin ne tekst
                    if (distanca < 0) {
                        clearInterval(x);
                        document.getElementById("dita").innerHTML = "0";
                        document.getElementById("ora").innerHTML =  "0";
                        document.getElementById("minuta").innerHTML = "0";
                        document.getElementById("sekonda").innerHTML =  "0";

                    }
                }, 100);
            </script>
        </div>
        
        <!-- Perdorimi i SVG per krijimin e nje divi te lakuar -->
        <div class="curved"> 
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 310"><path fill="#fff" fill-opacity="1" d="M0,64L48,69.3C96,75,192,85,288,90.7C384,96,480,96,576,101.3C672,107,768,117,864,149.3C960,181,1056,235,1152,250.7C1248,267,1344,245,1392,234.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </div>  
        
 
        <!--Krijimi i formes per userat e jashtum te kerkojn  te hyn ne grup -->
        <div class="formaBG">
            <h5 id="formMsg">Join Us</h5>
            <form action="" method="get">
            <i class="fa ikona fa-sticky-note" aria-hidden="true"></i> 
            <input type="text" id="emri" name="emri" placeholder="Name" class="btn" required><br><br>

            <i class="fa ikona fa-sticky-note" aria-hidden="true"></i> <input type=text id="mbiemri" name="mbiemri" placeholder="Lastname" class="btn" required ><br><br>

            <i class="fa ikona fa-envelope" aria-hidden="true"></i>
            <input type="email" id="email" name="email" placeholder="Email Address" class="btn" required><br><br>

            <i class="fa ikona fa-phone" aria-hidden="true"></i>
            <input type="tel" id="tel" name="tel" placeholder="Phone number" class="btn" required><br><br>

            <button type="submit" name="request" class="btn btn-dark btn-lg">Request</button><br>
                </form>
        </div>  
    
        <div class="cardsinFront">

            <!-- Krjimi i disa fotove -->
            <hr id="hr44" data-aos="slide-left">
            <hr id="hr3" data-aos="slide-left">
            <hr id="hr2" data-aos="slide-left">
            <hr id="hr1" data-aos="slide-left">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-12">
                    
                        <h3 id="likeus1">What is digital Education?</h3>
                       
                    </div>

                    <div class="col col-lg-3 col-12">
                        <div class="square1">

                            <h4 id="education">Top Education States</h4>
                            <img src='./bt-content/Images/1.jpg' alt="education" width="100%" height="200">
                            
                        </div>
                    </div>

                    <div class="col col-lg-3 col-12">
                        <div class="square1">

                            <h4 id="education">Online Educations Degrees.</h4>
                            <img src='./bt-content/Images/2.jpg' alt="education" width="100%" height="200">
                           
                        </div>
                    </div>

                    <div class="col col-lg-3 col-12">
                        <div class="square1">

                            <h4 id="education">Challenge of education</h4>
                            <img src='./bt-content/Images/3.jpg' alt="education" width="100%" height="200">
                         
                        </div>
                    </div>

                    <div class="col col-lg-3 col-12">
                        <div class="square1">
                   
                            <h4 id="education">Benefits of educations</h4>
                            <img src='./bt-content/Images/4.jpg' alt="education" width="100%" height="200">
                        </div>
                    </div> 
                </div>
            </div>
            <hr id="hr1">
            <hr id="hr2">
            <hr id="hr3">
            <hr id="hr4" >
        </div>
        

        <br><br>
        <div class="container-fluid">
            <div class="row">



                <div class="col-12 col-lg-5 col-md-4">

                    <div class="card quote">
                        <div class="card-body">
                           
                                <p>“The roots of education are bitter, but the fruit is sweet. ”</p>
                                <footer class="blockquote-footer">
                                <!--Globalet-->
                             <?php 
                             // Dekalrojme variablat globale 
                               $x = "Aristotle"; 
                               $y = "Lava";  
                              // Concatinate 
                              echo $x.$y; 
                             ?>  <cite title="Source Title"></cite></footer>
                           
                        </div>
                    </div>
                </div>
            
                <div class="col-12 col-lg-5 col-md-4">
                    <img src="./bt-content/Images/6.jpg" width="100%" height="300">


                </div>

                
                <div class="col-12 col-lg-2 col-md-4 ">
                    
                    
                    <div class="divKomentet">  
                        <p>Leave a comment about us!</p>
                        
                        <?php
                        $result = mysqli_query($link,"SELECT * FROM table_comments");

                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <h3 id="userKomenti"><span id="userEmri"><?php echo $row["Name"]; ?></span><span> : </span><?php echo $row["Comment"]; ?></h3>
                        <?php } ?>
                    </div>
    
                       <form action="./index.php" method="get" class="formaKomentet">
                    
                            <div class="text-center">
                                <input type="text" name="chatEmri" id="chatEmri" placeholder="Name : " class="btn" required><br>
                                
                                <input type="text" name="chatKomenti" id="chatKomenti" placeholder="Comment" class="btn" required> <br>
                                
                                <button type="submit" name="userSubmit" id="userSubmit" class="btn btn-success">Submit</button>
                            </div>
                    </form>
                </div>

            </div></div>

        <div class="container">
            <div class="row">

                <div class="col col-lg-12 textTurtles">
                    <p>Digital education is the innovative use of digital tools and technologies during teaching and learning, and is often referred to as Technology Enhanced Learning (TEL) or e-Learning. Exploring the use of digital technologies gives educators the opportunity to design engaging learning opportunities in the courses they teach, and these can take the form of blended or fully online courses and programmes.
                        </span></p>

                    <div class="text-center">
                        <button class="butoni btn btn-dark" id="btnshikomeshume" onclick="shikomeshume()">Wanna know more about me?</button>
                        <br>

                    </div>
                </div>

            </div>

        </div>
        <!-- Krijimi i scriptes per butonin shiko me shume-->
        <script>
            
            function shikomeshume() {
                var pikat = document.getElementById("pikat");
                var meshume = document.getElementById("meshume");
                var btnshikomeshume = document.getElementById("btnshikomeshume");

                if (pikat.style.display === "none") {
                    pikat.style.display = "inline";
                    meshume.style.display = "none";
                    btnshikomeshume.innerHTML = "Wanna read it again?";

                } else {
                    pikat.style.display = "none";
                    btnshikomeshume.innerHTML = "Read less";
                    meshume.style.display = "inline";
                }
            }
        </script>    
        <br>  <br> <br>
        <br>
<!-- Galleria numer 1 -->
<div class="col col-12 col-lg-6 col-md-6 col-sm-6"  data-aos="fade-up">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                               
                               
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="./bt-content/Images/10.jpg" >
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./bt-content/Images/9.jpg" >
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="./bt-content/Images/12.jpg" >
                                </div>
                                
                              
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div></div></div> </div> <br> <br>
                <!-- Programi Eventit -->
        <div id="schedule" class="section">
            <div class="container">
                <div class="row">
                    <div class="titulli-div">
                        <h3 class="titulli"><span>TOP </span> <span style="color: #dd0a37;">FIVE UNIVERSITIES</span></h3> <br>
                    </div> <br> <br>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="events-wrapper">
                            <!-- Universiteti 1 top--><br> <br>
                            <div class="eventi"  data-aos="fade-up">
                                <div class="dita-eventit">
                                    <div>
                                    <p><i style="font-size: 50px" class="fas fa-award "></i></p>
                                    </div>
                                </div>
                                <div class="permbajtja-eventit">
                                    
                                    <h5 class="titulli-eventit"> <a href="https://www.topuniversities.com/university-rankings-articles/world-university-rankings/top-universities-world-2020">Massachusetts Institute of Technology</h5>
                                    <p>United States </a></p>
                                </div>
                            </div>
                            <!-- Mbarimi  -->
                            <!-- Universiteti 2 -->
                           <div class="eventi" data-aos="fade-up">
                                <div class="dita-eventit">
                                    <div>
                                    <p><i style="font-size: 50px" class="fas fa-award "></i></p>
                                    </div>
                                </div>
                                <div class="permbajtja-eventit">
                                    <h3 class="titulli-eventit"><a href="https://www.topuniversities.com/university-rankings-articles/world-university-rankings/top-universities-world-2020">Stanford University</h5>
                                    <p>United States </a></p>
                                </div>
                            </div>
                            <!-- Mbarimi -->
                           <!-- Universiteti 3 -->
                           <div class="eventi" data-aos="fade-up">
                                <div class="dita-eventit">
                                    <div>
                                    <p><i style="font-size: 50px" class="fas fa-award "></i></p>
                                    </div>
                                </div>
                                <div class="permbajtja-eventit">
                                    <h3 class="titulli-eventit"><a href="https://www.topuniversities.com/university-rankings-articles/world-university-rankings/top-universities-world-2020">Harvard University</h5>
                                    <p>United States </a></p>
                                </div>
                            </div>
                            <!-- Mbarimi -->
                             <!-- Universiteti 4 -->
                           <div class="eventi" data-aos="fade-up">
                                <div class="dita-eventit">
                                    <div>
                                    <p><i style="font-size: 50px" class="fas fa-award "></i></p>
                                    </div>
                                </div>
                                <div class="permbajtja-eventit">
                                    <h3 class="titulli-eventit"><a href="https://www.topuniversities.com/university-rankings-articles/world-university-rankings/top-universities-world-2020">University of Oxford</h5>
                                    <p>United Kingdom </a></p>
                                </div>
                            </div>
                            <!-- Mbarimi -->
                                <!-- Universiteti 5-->
                           <div class="eventi" data-aos="fade-up">
                                <div class="dita-eventit">
                                    <div>
                                    <p><i style="font-size: 50px" class="fas fa-award "></i></p>
                                    </div>
                                </div>
                                <div class="permbajtja-eventit">
                                    <h3 class="titulli-eventit"><a href="https://www.topuniversities.com/university-rankings-articles/world-university-rankings/top-universities-world-2020">California Institute of Technology</h5>
                                    <p>United States </a></p>
                                </div>
                            </div>
                            <!-- Mbarimi -->
                        </div>
                      <!--  <div class="col-12 col-md-12 col-md-offset-2" data-aos="fade-up">
                            <a href="../2020/databaza/KerkesateProjektit.txt" download><div class="btn butoni3"><i style="color: #FFF" class="fa fa-download"></i> Download
                                </div></a></div>
                    </div>-->
                </div>
            </div>
        </div>
<br><br>

<?php
require("Footer.php");
?>