<?php
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
    <style>
        #footer {

            font-family: 'Libre Baskerville', serif;
            font-family: 'Amiri', serif;
        }
    </style>
</head>

<body>
    <section class="footer" id="footer">
        <footer>
            <div class="footer-container">
                <div class="row">
                    <div class="col-md-4">
                    <img src="../images/college logo.png" height="" width="260px">
                        <!-- <h2 style="font-family: 'Berkshire Swash', cursive">Car sharing</h2> -->
                        <div class="social-media">
                            <!-- <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a> -->
                        </div>
                        <p class="rights-text">This system is specially designed for those people who have to travel daily from <span style="color: #0078f1;"><b>one place to antoher place.</b></span></p>
                    </div>
                    <div class="col-md-4 use-link">
                        <h2>Usefull Links</h2>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="services.php">Servics</a></li>
                            <li><a href="feedback.php">feedback</a></li>

                        </ul>
                    </div>
                    <style>
                            #footer .footer-container .row  .col-md-4 .border i{
                                vertical-align: middle;
                                margin-right: 5px;
                            }
                        </style>
                    <div class="col-md-4">
                        <h1>Contact us</h1>
                        <div class="border"></div><br>
                        <i class='fas fa-phone-alt' style='font-size:25px; margin-top: 10px;color: #0078f1;'></i> <span style='font-size:25px'>+91 6351651105</span><br>
                        <i class="material-icons" style="font-size:25px;color: #0078f1; ">email</i> <span style='font-size:25px ;margin-top: -10px;'>Shreyanshthoriya@gmail.com</span>
                        <!-- <p>This system main dreem help of those pepole who can not buy a </p> -->
                        <!-- <form action="" class="newsletter-form"> -->
                        <!-- <input type="text" class="txtb" placeholder="Enter Your Email"><br> -->
                        <!-- <input type="submit" class="btn" value="submit"> -->
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </footer>
        <p style="text-align: center; background-color:#f3f3f3;"> © 2020 Created By <label style="color: #0078f1;">S & N</label> All Rights Reserved.</p>
    </section>
</body>
<?php
// }else {
// header('location:Final_signin_signup_module.php');
// }
?>