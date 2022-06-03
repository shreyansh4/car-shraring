<?php
session_start();

include_once("conn.php");

// if ($_SESSION["email"]  == true) {
// echo "your username is " . $_SESSION['email'] . "<br>";
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

    <section class="page" id="services">
        <div class="content scalable">
            <div class="container">
                <div class="head">
                    <h1><label>Core</label> Services</h1>
                    <p>Our services are the best with 99% customer satisfaction rating</p>
                </div>
                <style>

                </style>
                <div class="row">
                    <div class="col-md-6 cnt-bx">
                        <div class="img"><img src="../images/5283.jpg"></div>
                        <div class="content">
                            <h3>Choice</h3>
                            <p>We go everywhere,literally thousands of destinations. No station required</p>
                        </div>
                    </div>
                    <div class="col-md-6 cnt-bx">
                        <div class="img"><img src="../images/documents-(1).jpg"></div>
                        <div class="content">
                            <h3>ID proof</h3>
                            <p>Government ID verification adds another level of security to member profiles</p>
                        </div>
                    </div>
                    <div class="col-md-6 cnt-bx1">
                        <div class="img"><img src="../images/8399.jpg"></div>
                        <div class="content">
                            <h3>Get going faster</h3>
                            <p>No need to travel across town,catch a ride leaving near you</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img"><img src="../images/3156704.jpg"></div>
                        <div class="content">
                            <h3>Go anywhere</h3>
                            <p>Our cars have all-india permits.</p>
                        </div>
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

?>