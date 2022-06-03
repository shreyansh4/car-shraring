<?php
session_start();

include_once("conn.php");
// if ($_SESSION["email"]  == true) {
    // echo "your username is " . $_SESSION['email'] . "<br>";
    
    if (isset($_POST["send"])) {
        $date=date("Y-m-d");
        extract($_POST);
        $var = $date;
        $date = str_replace('/', '-', $var);
        $dob = date('Y-m-d', strtotime($date));
        $query = "INSERT INTO `feedback` (`email`, `title`, `date`, `description`) 
        VALUES ('$email', '$title', '$dob', '$message');";
        $result = mysqli_query($con, $query);
    
        if (!$result) {
            echo "<script> alert('ERROR: Something is wrong please try again...')</script>";
        } else {
            echo "<script> alert('Your feedback send succefully...')</script>";
        }
    }
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>CAR SHARING</title>

        <!--============= META tag =============-->
        <meta name="viewport" content="width=device-width ,initial-scale=1.0">

        <!--============= Style Sheet =============-->
        <link rel="stylesheet" type="text/css" href="style.css">

        <!--============= JQUERY CDN =============-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!--========================== BOOTSTRAP ===============================-->

        <!--============= CSS only =============-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!--============= JS, Popper.js, and jQuery =============-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <!--======================== BOOTSTRAP END ============================== -->
        <script src="https://kit.fontawesome.com/0c04773b83.js" crossorigin="anonymous"></script>

    </head>

    <body>
        <?php
        include_once("navbar2.php");
        ?>
        <section class="page" id="feedback">
            <div class="container">
                <div class="mainbox">
                    <div class="text">
                        <h2>Send Message Us</h2>
                        <hr><br>
                    </div>
                    <div class="box">
                        <div class="innner-form">
                            <form method="POST" action="">
                                <input type="email" name="email" placeholder="Email"><br>
                                <input type="text" name="title" placeholder="Title"><br>
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <input class="mt-4" type="submit" name="send" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        include_once("footer.php")
        ?>
    </body>
<?php
// } else {
    // header('location:Final_signin_signup_module.php');
// }
?>