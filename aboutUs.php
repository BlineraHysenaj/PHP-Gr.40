<?php
require("Header.php");
?>

<?php
ob_start();
$emri = "personi";
$vlera = "101";

setcookie($emri, $vlera, time() + 60 * 60 * 24);
if (isset($_POST['personi'])) {
    $emri = "FIEK"; 
    $vlera = "101";
}

if (isset($_COOKIE["personi"])) {
    echo "Cookie i krijuar:" . $_COOKIE["personi"];
    echo "<br>";
    
    ShfaqListenCookie();

} else {
    echo "Nuk ekziston ndonje cookie i krijuar ne kete web app.";
}

function ShfaqListenCookie()
{
    echo "Lisa e cookie-ve akitv: <br/>";
    echo "<table border='1'><tr><th>Cookie</th><th>Vlera</th></tr>";
  
    foreach ($_COOKIE as $key => $value) {       
        echo "<tr><td>" . $key . "</n></td><td>" . $value . "</td></tr>";
    }
    echo "</table>";
}
ob_end_flush();
?>
<?php
require("deletecookies.php");
?>

<DIV id="aboutUs">
    <div id="domain">
        <?php
        require_once 'Perdoruesi.php';
        require_once 'Koha.php';
       

        $aMember = new Perdoruesi("FIEK", "Bregun e Diellit", 'http://w3programmers.com/');
        echo $aMember->getUsername() . " gjendet ne " . $aMember->getLocation() . "<br>";
        $aMember->save();
        $aTopic = new Koha("Koha: ", $aMember);
        $aTopic->showHeader();
        $aTopic->save();
       
        // get host name from URL
        preg_match(
            '@^(?:http://)?([^/]+)@i',
            "http://www.php.net/index.html",
            $matches
        );       
        $host = $matches[1];
        // get last two segments of host name
        preg_match('@[^.]+\.[^.]+$@', $host, $matches);
        echo "Domain name is: {$matches[0]}\n";
        ?>
    </div>

    <hr id="hr44" data-aos="slide-left">
    <hr id="hr3"  data-aos="slide-left">

    <?php
    $string = 'The Education Department is in -> USA.';
    $patterns = array();
    $patterns[6] = '/USA/';
    $replacements = array();
    $replacements[0] = 'Kosova';
    $statement = preg_replace($patterns, $replacements, $string);
    echo "<h4>$statement</h4>";

    ?> <br>
    <div id="preg_split">
        <?php
        $quotes = "A man's mind, stretched by new ideas, may never return to its original dimensions. ; Either you run the day or the day runs you. ;If you think education is expensive, try ignorance. ;Don't let what you cannot do interfere with what you can do.";
        $keywords = preg_split("/[;]+/", $quotes);
        // for loop
        for ($i = 0; $i < count($keywords); $i++) {
            echo $keywords[$i] . "<br>";
        }
        ?>
    </div>
</DIV>
<br>
<hr id="hr3">
<hr id="hr4">
<?php
//require("WebWeather.php");
?>

<!-- Rangimet -->
<div class="container-fluid">
    <div class="row">

        <div class="col-12 col-lg-5 col-md-4">

            <div class="card-quote">
                <p>“One in five children, adolescents and youth worldwide are out of school - a figure that has barely changed over the past five years (UNESCO).
                    Youth literacy rates have improved from 83% to 91% over two decades (UNICEF).
                </p>
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5 col-md-4">
            <img src="./bt-content/Images/20.jpg" width="100%" height="300">
        </div>
        <div class="col-12 col-lg-2 col-md-4 ">
            <?php
            require('Profesori.php');
            ?>
        </div>
    </div>
</div>

<!-- Mbarimi i rangimit -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-12">
            <h3 id="likeus1">STATISTIKAT</h3>
        </div>

        <div class="col col-lg-3 col-12">
            <div class="square1">
                <p><i style="font-size: 50px" class="fas fa-graduation-cap "></i></p>
                <h3 id="pjesmarres"></h3>
                <p>Students</p>
            </div>
        </div>

        <div class="col col-lg-3 col-12">
            <div class="square1">
                <p><i style="font-size: 50px" class="fas fa-chalkboard-teacher "></i></p>
                <h3 id="foles"></h3>
                <p>Teachers</p>
            </div>
        </div>

        <div class="col col-lg-3 col-12">
            <div class="square1">
                <p><i style="font-size: 50px" class="fas fa-university "></i></p>
                <h3 id="komunitet"></h3>
                <p>Universities</p>
            </div>
        </div>

        <div class="col col-lg-3 col-12">
            <div class="square1">
                <p><i style="font-size: 50px" class="fas fa-laptop "></i></p>
                <h3 id="partner"></h3>
                <p>Digital Education</p>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    var pjesmarres = document.getElementById('pjesmarres');
    var foles = document.getElementById('foles');
    var komunitet = document.getElementById('komunitet');
    var partner = document.getElementById('partner');

    var i = 0,
    persona = 11230987;

    function pjesmarresit() {
        pjesmarres.innerHTML = i++ + '+';
        if (i <= persona) {
            setTimeout(pjesmarresit, 10);
        }
    };

    var f = 0,
        folesit = 67895;

    function folesitpjesmarres() {

        foles.innerHTML = f++ + '+';
        if (f <= folesit) {
            setTimeout(folesitpjesmarres, 20);
        }
    };

    var k = 0,
        komuniteti = 1987;

    function komunitetetpjesmarres() {

        komunitet.innerHTML = k++ + '+';
        if (k <= komuniteti) {
            setTimeout(komunitetetpjesmarres, 100);
        }
    };

    var p = 0,
        partneri = 756392;

    function partneripjesmarres() {

        partner.innerHTML = p++ + '+';
        if (p <= partneri) {
            setTimeout(partneripjesmarres, 10);
        }
    };

    partneripjesmarres();
    komunitetetpjesmarres();
    folesitpjesmarres();
    pjesmarresit();
</script>

<?php
require("email.php");
?>
<br>
<br>
<a href="./index.php" style="text-decoration: none;color: rgb(192, 93, 93);">
    </n><button class="button" color="red"></n>RETURN HOME</button>
    <style>
        button {
            /* remove default behavior */
            appearance: none;
            -webkit-appearance: none;

            /* usual styles */
            padding: 10px;
            border: none;
            background-color: #3F51B5;
            color: #fff;
            font-weight: 600;
            border-radius: 5px;
        }
    </style>
    <br><br>

    <div id="cookie-accept-footer" class="CookieAcceptance">
        <p>EDUCATION DEPARTMENT site uses cookies to provide you with a personalized browsing experience. By continuing to use this site, you agree to our <a href="/policies/privacy_policy.php">Privacy Policy</a>.</p>
        <a href="#" class="CookieAcceptance-close" onclick="acceptCookieFooter(); return false;">
            <span>Dismiss</span>
        </a>
    </div>

    <script type="text/javascript">
        function acceptCookieFooter() {
            var el = document.getElementById('cookie-accept-footer');
            if (el) el.style.display = 'none';
            document.cookie = "accept-cookies=1;domain=.mediafire.com;path=/;max-age=31536000";
        }
    </script>

    <style>
        .CookieAcceptance {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 25px;
            background: hsla(220, 21%, 12%, .95);
            border-top: 1px solid rgba(255, 255, 255, .1);
            color: #fff;
            font-size: 13px;
            z-index: 5000;
        }
    </style>

    <?php
    require("Footer.php");
    ?>

    <style>
        #preg_split {
            text-align: right;
            font-size: 15px;
            font-family: sans-serif monospace;
            color: blueviolet;
        }

        #domain {
            margin-top: 0px;
            width: 100%;
            text-align: center;
            border: 1px solid black;
            border-radius: 10px 10px 10px 10px;
            font-size: 15px;
            font-family: sans-serif monospace;
        }

        #aboutUs {
            background: url('C:/xampp/htdocs/New folder/Detyra2020/bt-content/Images/3.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 100% 100%;

        }

        .card-quote {
            color: cadetblue;
            text-align: center;
            margin-top: 110px;
        }
    </style>