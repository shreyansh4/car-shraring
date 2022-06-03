<?php
session_start();

include_once("conn.php");

// if ($_SESSION["email"]  == true) {
// echo "your username is " . $_SESSION['email'] . "<br>";

if (isset($_POST['Search'])) {
    extract($_POST);

    // echo "$Source<br>";
    // echo "$Destination<br>";

    $query = "select * from car_share_info where source='$Source' and destination='$Destination'";
    $result = mysqli_query($con, $query);
    $rowcount = mysqli_num_rows($result);
?>
    <style>
        .php {
            display: block !important;
        }
    </style>
<?php
    // if (isset($_POST['more_details'])) {
    //     echo $row['car_id'];
    //     echo $row['user_id'];
    // }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <!--============= META tag =============-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    <!--============= FONT AWESOME =============-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Amiri&display=swap,Arvo&family=Libre+Baskerville&display=swap,Rokkitt:wght@600&display=swap,Amiri&display=swap');

        #search-car .php {
            display: none;
        }

        #search-car .header {
            /* background-size: cover; */
            /* background-position: center; */
            /* align-items: center; */
            display: flex;
            justify-content: center;
        }

        #search-car .hea {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../images/4.jpg);
            padding-bottom: 30px;
            padding-top: 30px;
        }

        #search-car h1 {
            color: rgb(235, 235, 235);
            margin-bottom: 10px;
            font-size: 45px;
            text-align: center;
            font-family: 'Libre Baskerville', serif;
            font-family: 'Amiri', serif;
            letter-spacing: 2px;
        }

        #search-car .header form input {
            height: 50px;
            width: 100%;
            font-family: 'Rokkitt', serif;
            padding: 10px;
            border: none;
            border-radius: 25px;
            outline: none;
        }

        #search-car .header form input[type="submit"] {
            height: 50px;
            width: 150px;
            font-family: 'Rokkitt', serif;
            background: #ffeb3b;
            color: rgb(0, 0, 0);
            border: none;
            border-radius: 25px;
        }

        #search-car .header form input[type="submit"]:hover {
            background: #ffc107;
            cursor: pointer;
        }

        #search-car .form-box {
            background: rgba(0, 0, 0, 0.5);
            padding: 15px;
        }

        @media (max-width: 740px) {
            #search-car .header form input[type="submit"] {
                margin-top: 10px;
                width: 100%;
            }

            #search-car .header form input {
                margin-top: 10px;
                width: 100%;

            }

            #search-car .form-box {
                background: rgba(0, 0, 0, 0.5);
                padding-top: 10px;
            }
        }

        @media (max-width: 572px) {
            #search-car h1 {
                font-size: 35px;
            }

            #search-car .header form input[type=text] {
                margin-top: 10px;
                width: 100% !important;
            }
        }

        #search-car .container .car-details .box {
            /* border: 2px solid steelblue; */
            border-radius: 5px;
            box-shadow: 1px 1px 10px 1px black;
            padding: 20px;
            font-family: 'Rokkitt', serif;
        }

        #search-car .container .car-details .box hr {
            height: 1px;
            margin-top: -4px;
            border-radius: 20px;
            background: #000000;
            border: none;
        }

        #search-car .container .car-details .box ul li {
            display: inline;
            margin-right: 10px;
            vertical-align: middle;
        }

        #search-car .container .car-details .details {
            margin-top: -15px;
        }

        #search-car .container .car-details i {
            vertical-align: middle;
            font-size: 20px;
        }

        #search-car .container {
            padding: 30px 0px;
        }

        #search-car .city {
            margin-top: -10px;
        }

        #search-car .headline h1,
        .headline p,
        .headline h6 {
            color: black;
            font-family: 'Rokkitt', serif;
            display: inline-block;
            font-size: 25px;
        }

        #search-car .headline h6 {
            font-size: 20px;

        }

        #search-car .headline h1 {
            font-weight: bold;
            font-family: 'Libre Baskerville', serif;
            font-family: 'Amiri', serif;
            font-size: 30px;
        }

        #search-car .headline p {
            text-align: right;
            padding-right: 2em;
            float: right;
        }

        /* button {
                width: auto;
                padding: 0px 10px;
                border: none;
                border-radius: 2px;
                color: black;
                background-color: rgba(0, 129, 191, 0.7);
            }

            button:hover {
                transition: 0.2s;
                background-color: rgba(0, 129, 191, 1);
            } */

        @media (max-width: 590px) {
            #search-car .container {
                padding: 30px 10px;
            }
        }

        @media (max-width: 425px) {

            #search-car .headline h1,
            .headline p,
            .headline h6 {
                color: black;
                display: contents;
            }


            #search-car .headline h1 {
                font-weight: bold;
            }

            #search-car .headline p {
                text-align: left;
                padding-right: 2em;
            }
        }
    </style>

</head>

<body>
    <section id="search-car" class="search-car">
        <div class="hea">
            <h1>Finding car near you</h1>
            <div class="header">
                <div class="form-box">
                    <form method="POST" action="">
                        <label for="something">
                            <input id="something" list="source" name="Source" class="business" placeholder="Source">
                            <datalist id="source">
                                <?php
                                $query4 = "select DISTINCT source from car_share_info";
                                $res4 = mysqli_query($con, $query4);
                                while ($row4 = mysqli_fetch_array($res4)) {
                                ?>
                                    <option><?php echo $row4["source"]; ?></option>
                                <?php
                                }
                                ?>
                            </datalist>
                        </label>
                        <label for="something">
                            <input id="something" list="destination" name="Destination" class="location" placeholder="Destination">
                            <datalist id="destination">
                                <?php
                                $query5 = "select DISTINCT destination from car_share_info";
                                $res5 = mysqli_query($con, $query5);
                                while ($row5 = mysqli_fetch_array($res5)) {
                                ?>
                                    <option><?php echo $row5["destination"]; ?></option>
                                <?php
                                }
                                ?>
                            </datalist>
                        </label>
                        <input type="submit" name="Search" class="search-btn" value="Search">

                        <!-- <input type="text" name="source" class="business" placeholder="Source"> -->
                        <!-- <input type="text" name="destination" class="location" placeholder="Destination"> -->

                    </form>
                </div>
            </div>
        </div>
        <div class="php">
            <?php
            for ($i = 0; $i < $rowcount; $i++) {
                $row = mysqli_fetch_array($result);
                $user_id =  $row['user_id'];
                $query2 = "select * from login where user_id=$user_id";
                $result2 = mysqli_query($con, $query2);
                $row2 = mysqli_fetch_array($result2);
                $car_id = $row['car_id'];
                $query3 = "SELECT * FROM `car_register_info` WHERE car_id=$car_id";;
                $result3 = mysqli_query($con, $query3);
                $row3 = mysqli_fetch_array($result3);
                $free_seat = $row["free_seat"];
                if ($free_seat > 0) {
            ?>
                    <div class="container">
                        <div class="car-details">
                            <div class="box">
                                <div class="headline">
                                    <h1><?php echo ucfirst($row3['car_name']) ?></h1>
                                    <p>&#x20B9;<?php echo $row['rent'] ?>/seat</p>
                                </div>

                                <hr>
                                <div class="details">
                                    <ul>
                                        <li><i class="material-icons" style="font-size:20px">event_seat</i> <?php echo $row['free_seat'] ?> seat free</li>
                                        <li> | <i class='fas fa-user-tie' style='font-size:19px'></i> <?php echo $row2['first_name'] . " " . $row2['last_name']  ?></li>
                                        <li> | <?php echo $row2['gender'] ?></li>
                                        <li> | <i class="material-icons" style="font-size:23px;">email</i> <?php echo $row2['email'] ?>
                                        </li>
                                    </ul>
                                </div>

                                <div class="city headline">
                                    <label><i class='far fa-calendar-alt' style='font-size:19px'></i> <?php echo $row['start_date'] ?></label><br>
                                    <label><i class="material-icons" style="font-size:21px">place</i> <?php echo $row['source'] ?></label><br>
                                    <h6><label><i class="material-icons" style="font-size:21px">pin_drop</i> <?php echo $row['destination'] ?></label></h6>
                                    <p><a href="car_share_more_details.php?car_id=<?php echo $row['car_id']; ?> &amp; user_id=<?php echo $row['user_id']  ?>  &amp; car_share_id=<?php echo $row['car_share_id'] ?>"><button class=" btn btn-primary" onclick="location.href='car_share_more_details.php';" name="more_details">More Details & Book Car</button></a></p>
                                </div>
                            </div>

                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>
    <script>
        $(function() {
            $('.selectpicker').selectpicker();
        });
    </script>
</body>

</html>
<?php
// } else {
//     header('location:Final_signin_signup_module.php');
// }
?>