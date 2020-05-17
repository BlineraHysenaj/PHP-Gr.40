<!DOCTYPE html>
<html>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $to = "blinera.hysenaj@gmail.com"; // this is your Email address
        $from = $_POST['email']; // this is the sender's Email address
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $subject = "Form submission";
        $subject2 = "Copy of your form submission";
        $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
        $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

        $headers = "From:" . $from;
        $headers2 = "From:" . $to;
        mail($to, $subject, $message, $headers);
        mail($from, $subject2, $message2, $headers2); // sends a copy of the message to the sender
        echo '<i style="color:green;">
    "Mail Sent. Thank you " </i> ' . $first_name . '<i style="color:green;">
    "we will contact you shortly"</i> ';
        // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
    ?>

    <!DOCTYPE html>

    <head>
        <title>Form submission</title>
    </head>

    <body>
        <div class="bg-img">
            <div id="dergonEmail">
                <hr id="hr44" data-aos="slide-left">
                <hr id="hr3" data-aos="slide-left">
                <hr id="hr2" data-aos="slide-left">
                <hr id="hr1" data-aos="slide-left">
                <p> Dergoni nje email </p>
                <form action="" class="container" method="post">
                    First Name: <input type="text" name="first_name"><br><br>
                    Last Name: <input type="text" name="last_name"><br><br>
                    Your Email: <input type="text" name="email"><br>
                    Message:<br><textarea rows="5" name="message" cols="35"></textarea><br>
                    <input type="submit" name="submit" value="Submit">
                </form>

                <style>
                    #dergonEmail {
                        box-sizing: border-box;
                        width: 100%;
                        border: 0;

                        padding: 20px;
                    }

                    form {
                        display: inline-block;
                        margin: 10px 0;
                        padding: 10px;

                    }

                    body {
                        text-align: center;
                    }

                    input[type=text]:focus {
                        background-color: #3F51B5;
                        border-color: #000;
                        border-radius: 10px;

                    }
                </style>
                <hr id="hr1">
                <hr id="hr2">
                <hr id="hr3">
                <hr id="hr4">
            </div>
        </div>

    </body>
</html>