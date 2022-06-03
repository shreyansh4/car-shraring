<?php

include_once("conn.php");

if (isset($_SESSION['email'])) {
    // echo "your username is " . $_SESSION['email'] . "<br>";
    $query1 = "select * from login where email='$_SESSION[email]'";
    $result1 = mysqli_query($con, $query1);
    $row1 = mysqli_fetch_array($result1);
?>
    <style>
        .user {
            display: contents !important;
        }

        .visitor {
            display: none !important;
        }
    </style>
<?php
} else {
?>
    <style>
        .user {
            display: none !important;
        }

        .visitor {
            display: contents !important;
        }
    </style>
<?php
}

?>
<!DOCTYPE html>

<head>
    <title>Responsive Navbar</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!--============= META tag =============-->
    <!--============= Style Sheet =============-->
    <meta name="viewport" content="width=device-width ,initial-scale=1.0">
    <!--============= JQUERY CDN =============-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--========================== BOOTSTRAP ===============================-->
    <!--============= CSS only =============-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--============= JS, Popper.js, and jQuery =============-->
    <script src="https://kit.fontawesome.com/3a47d3c39e.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!--======================== BOOTSTRAP END ============================== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rokkitt:wght@600&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Amiri&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none !important;
        }


        nav {
            background: #0082e6;
            height: 80px;
            width: 100% !important;
        }

        nav .main {
            float: left !important;
            margin-left: 30px;
        }


        nav .main li {
            display: inline-block;
            line-height: 80px;
            margin: 0 2px;
        }

        nav .main li a {
            color: #f2f2f2;
            font-weight: 500;
            font-size: 22px;
            padding: 7px 13px;
            border-radius: 3px;
            letter-spacing: 2px;
            font-size: 25px;
            font-family: 'Rokkitt', serif;
            /* text-transform: uppercase; */
        }

        nav .main a.active,
        nav .main a:hover {
            background: #1b9bff;
            transition: .5s;
        }

        nav .checkbtn {
            font-size: 30px;
            color: white;
            float: left !important;
            line-height: 60px;
            margin-left: 40px;
            cursor: pointer;
            display: none;
        }

        nav #check {
            display: none;
        }

        @media (max-width: 952px) {
            nav .main li a {
                font-size: 16px;
            }
        }

        @media (max-width: 500px) {
            nav {
                height: 60px !important;
                width: 100% !;
            }

            nav .main {
                top: 60px !important;
            }

            nav .drop .logindrop,
            .drop i,
            .dropdown .subdrop li a {
                line-height: 60px !important;
            }

            nav .dropdown {
                top: 60px !important;
            }

            nav .checkbtn i {
                line-height: 10px !important;
            }
        }

        @media (max-width: 858px) {
            nav .checkbtn {
                display: block;
                margin-left: 40px;
            }

            nav .main {
                position: absolute;
                width: 60%;
                height: 100vh;
                margin-left: 0% !important;
                background: #2c3e50;
                top: 80px;
                left: -100%;
                z-index: 10;
                text-align: left;
                border-radius: 10px 0px 0px 10px;
                transition: all .5s;
            }

            nav .main li {
                display: block;
                margin: 30px 0;
                line-height: 30px;
            }

            nav .main li a {
                font-size: 20px;
                font-family: 'Rokkitt', serif;

            }

            nav .main a:hover,
            nav .main a.active {
                background: none;
                color: #0082e6;
            }

            nav #check:checked~.main {
                left: 40%;
            }
        }

        nav .drop {
            float: right !important;
            z-index: 21;
            cursor: pointer !important;
        }

        nav .drop .logindrop,
        nav .dropdown .subdrop li a {
            color: white;
            line-height: 80px;
            z-index: 22;
            letter-spacing: 1px;
            font-size: 25px;
            font-family: 'Amiri', serif;
            /* text-transform: capitalize; */
            /* margin-top: 30px; */
            /* font-size: 25px; */
        }

        nav .dropdown {
            float: right;
            position: absolute;
            top: 80px;
            right: 10px;
            line-height: 10px;
            background: #001b30;
            width: 300px;
            text-align: left;
            padding: 10px 25px;
            border-radius: 5px;
            display: none;
            z-index: 23;
        }

        nav .drop .sub .logindrop span {
            font-family: 'Amiri', serif;
        }

        nav .dropdown:before {
            content: "";
            position: absolute;
            top: -20px;
            left: 80%;
            z-index: 24;
            transform: translateX(-50%);
            border: 10px solid;
            border-color: transparent transparent #001b30 transparent;
        }

        @media (max-width: 500px) {
            nav .dropdown {
                width: 250px;
                text-align: left;
            }
            nav .dropdown .subdrop li a{
               font-size: 20px;
            }

        }
    </style>

</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <ul class="main">
            <li><a href="#"><img src="../images/logo.png" height="40px" width="200px"></a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="feedback.php">Feedback</a></li>
        </ul>
        <ul class="drop visitor" style="line-height: 80px;">
            <li class="mr-4 sub" style="text-align: right;"><a href="final_signin_signup_module.php">
                    <p class="logindrop">
                        <i class="fas fa-user-circle"></i> <span style="font-family: 'Rokkitt', serif; font-weight: 400; font-size: 30px;">Login</span></p>
                </a>
            </li>
        </ul>
        <ul class="drop user" id="drop">
            <li class="mr-4 sub" style="text-align: right;">
                <div class="mb-0 logindrop">
                    <span style="font-family: 'Rokkitt', serif; font-weight: 400; font-size: 30px;">
                        <style>
                            .material-icons {
                                vertical-align: middle;
                                margin-right: 5px;
                            }
                        </style>
                        <i class="material-icons" style="font-size: 28px;">account_circle</i><?php echo ucfirst($row1['first_name']); ?>
                    </span>
                </div>
                <!-- <i class="fas fa-angle-down"></i> -->
            </li>
            <li>
                <div class="dropdown">
                    <ul class="subdrop">
                        <li><a href="car_register_maiin_page.php">
                                <i class="material-icons" style="font-size:30px">add_circle</i> Car register & share car</a></li>
                        <li><a href="show_car_book.php">
                                <i class="fas fa-bookmark"></i> Booked Car</a></li>
                        <li><a href="show_car_register_&_passenger.php">
                                <i class="fas fa-users"></i> Passenger of car</a></li>
                        <li><a href="profile.php">
                                <i class="fas fa-user"></i> Profile</a></li>
                        <li><a href="logout.php">
                                <i class="fas fa-sign-out-alt"></i> Signout</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
    <script>
        $(document).ready(function() {
            $("#drop").click(function() {
                $(".dropdown").toggle();
                // $(".dropdown").slideToggle();
            });
        })
    </script>
</body>

</html>


<!-------------------------------------------------------------------->
<!-------------- PRISE SECTION --------------------------------------->
<!-------------------------------------------------------------------->