<?php
session_start();

include_once("conn.php");

if ($_SESSION["email"]  == true) {
    // echo "your username is " . $_SESSION['email'] . "<br>";
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>CAR SHARING</title>

        <!--============= META tag =============-->
        <meta name="viewport" content="width=device-width ,initial-scale=1.0">

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
            @import url('https://fonts.googleapis.com/css2?family=Amiri&display=swap,Arvo&family=Libre+Baskerville&display=swap,Rokkitt:wght@600&display=swap,Amiri&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                display: block;
                justify-content: center;
                align-items: 100vh;
                min-height: 100vh;
                background: #ebf5fc;
            }

            #register .container {
                display: flex;
                justify-content: center;
                align-items: center;
                max-width: 1200px !important;
                flex-wrap: wrap;
                padding: 40px 0;
            }

            #register .container .card {
                position: relative;
                width: 320px;
                height: 450px;
                box-shadow: inset 5px 5px 5px rgba(0, 0, 0, 0.05),
                    inset -5px -5px 5px rgba(255, 255, 255, 0.5),
                    5px 5px 5px rgba(0, 0, 0, 0.05),
                    -5px -5px 5px rgba(255, 255, 255, 0.05);
                border-radius: 15px;
                margin: 30px;
            }
            

            #register .container .card .box {
                position: absolute;
                top: 20px;
                left: 20px;
                right: 20px;
                bottom: 20px;
                background: #ebf5fc;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                border-radius: 15px;
                display: flex;
                justify-content: center;
                align-items: center;
                transition: 0.4s;
                /* pointer-events: none; */
            }

            #register .container .card:hover .box {
                transform: translateY(-50px);
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
                /* background-image: linear-gradient(to right top, #d16ba5, #c46cb5, #b16fc4, #9774d2, #737add, #5b89e9, #3d97f2, #00a4f7, #00bcff, #00d3fe, #00e8f9, #5ffbf1); */
                background-image: linear-gradient(to right top, #bc6bd1, #a870d9, #9275df, #787ae4, #597ee6, #438bee, #2a98f3, #00a4f7, #00bcff, #00d3fe, #00e8f9, #5ffbf1);
            }

            #register .container .card .box .content {
                padding: 20px;
                text-align: center;
                display: fit-content;
            }


            #register .container .card .box .content h3 {
                font-size: 1.8em;
                color: #007;
                z-index: 1;
                font-family: 'Libre Baskerville', serif;
                font-family: 'Amiri', serif;
                transition: 0.3s;
                font-size: 38px;
            }

            #register .container .card .box .content p {
                font-size: 1em;
                font-weight: 300;
                color: #777;
                z-index: 1;
                font-family: 'Amiri', serif;
                transition: 0.3s;
                text-transform: lowercase;
            }

            #register .container .card .box .content p:first-letter{
                text-transform: capitalize;
            }

            #register .container .card:hover .box .content h3,
            #register .container .card:hover .box .content p {
                color: #fff;
            }

            #register .container .card .box .content a {
                position: relative;
                display: inline-block;
                padding: 8px 20px;
                background: #03a9f4;
                margin-top: 15px;
                border-radius: 20px;
                color: #fff;
                text-decoration: none;
                font-weight: 400;
                font-family: 'Amiri', serif;
                font-size: 22px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            }

            #register .container .card:hover .box .content a {
                background: #ff568f;
            }
        </style>
    </head>

    <body>
        <?php
        include_once("navbar2.php");
        ?>
        <section class="page" id="register">
            <div class="container">
                <div class="card">
                    <div class="box">
                        <div class="content">
                            <h3>Register car</h3>
                            <p>you can register multiple car in this system and after you can share your car with another member</p>
                            <a href="car_register.php">Register car</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <div class="content">
                            <h3>Registered car</h3>
                            <p>you can show your all registered car and you can edit or delete your car</p>
                            <a href="show_car_registered.php">Registered car</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <div class="content">
                            <h3>Share car</h3>
                            <p>you can share your car with another need ride</p>
                            <a href="car_share.php">Share car</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </body>
<?php
} else {
    header('location:Final_signin_signup_module.php');
}
?>