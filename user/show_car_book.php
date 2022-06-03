<?php
session_start();
include_once("conn.php");

if ($_SESSION["email"]  == true) {
    // echo "your username is " . $_SESSION['email'] . "<br>";

    $query2 = "select * from login where email='$_SESSION[email]'";
    $result2 = mysqli_query($con, $query2);
    $row2 = mysqli_fetch_array($result2);
?>
    <html>

    <head>
        <title></title>
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

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Amiri&display=swap,Arvo&family=Libre+Baskerville&display=swap,Rokkitt:wght@600&display=swap,Amiri&display=swap');

            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
                text-transform: capitalize;
                font-family: 'Amiri', serif;
            }

            #show-car-book div.container {
                margin: 0 auto;
                overflow: hidden
            }

            #show-car-book .upcomming {
                font-size: 45px;
                text-transform: uppercase;
                border-left: 14px solid rgba(255, 235, 59, 0.78);
                padding-left: 12px;
                margin: 18px 8px;
            }

            #show-car-book .container .item {
                width: 80%;
                float: left;
                padding: 0 20px;
                /* border: 2px solid black; */
                box-shadow: 1px 1px 10px 1px black;
                border-radius: 5px;
                background: rgb(255, 255, 255);
                overflow: hidden;
                margin: 10px
            }

            #show-car-book .container .item-right,
            #show-car-book .container .item-left {
                float: left;
                padding: 0px
            }


            #show-car-book .container .item-right .up-border,
            #show-car-book .container .item-right .down-border {
                padding: 14px 15px;
                background-color: rgb(63, 59, 59);
                /* border-radius: 50%; */
                position: absolute
            }

            #show-car-book .container .item-right .up-border {
                top: -8px;
                right: -35px;
            }

            #show-car-book .container .item-right .down-border {
                bottom: -13px;
                right: -35px;
            }


            #show-car-book .container .item-right .day {
                text-align: center;
                font-size: 25px;
            }

            #show-car-book .container .item-left {
                width: 71%;
                padding: 34px 0px 19px 46px;
                border-left: 3px dotted #999;
            }

            #show-car-book .container .item-left .title {
                color: #111;
                font-size: 34px;
                margin-bottom: 12px
            }

            #show-car-book .container .item-left .sce {
                margin-top: 5px;
                display: block
            }

            #show-car-book .container .item-left .sce .icon,
            #show-car-book .container .item-left .sce p,
            #show-car-book .container .item-left .loc .icon,
            #show-car-book .container .item-left .loc p {
                float: left;
                word-spacing: 5px;
                letter-spacing: 1px;
                color: black;
                font-size: 17px;
                margin-bottom: 10px;
            }

            #show-car-book .container .item-left .sce .icon,
            #show-car-book .container .item-left .loc .icon {
                margin-right: 10px;
                font-size: 20px;
                color: #666
            }

            #show-car-book .container .item-left .loc {
                display: block
            }

            #show-car-book .fix {
                clear: both
            }

            #show-car-book .container .item .tickets {
                float: right;
                margin-top: 10px;
                font-size: 18px;
                border: none;

            }

            #show-car-book .linethrough {
                text-decoration: line-through
            }

            @media only screen and (max-width: 1150px) {
                #show-car-book .container .item {
                    width: 100%;
                    margin-right: 20px
                }

                #show-car-book div.container {
                    margin: 0 20px auto
                }
            }
        </style>
    </head>

    <body>
        <?php


        $query3 = "SELECT passen_id FROM `car_passenger_info` WHERE user_id=$row2[user_id]";
        $result3 = mysqli_query($con, $query3);
        // $row3 = mysqli_fetch_array($result3);
        $rowcount3 = mysqli_num_rows($result3);

        for ($i = 0; $i < $rowcount3; $i++) {
            $row3 = mysqli_fetch_array($result3);
            $query4 = "SELECT * from car_share_info WHERE car_share_id IN(SELECT car_share_id FROM `car_passenger_info` WHERE passen_id=$row3[passen_id])";
            $result4 = mysqli_query($con, $query4);
            $row4 = mysqli_fetch_array($result4);

            $query5 = "SELECT * from car_register_info WHERE car_id IN (SELECT car_id FROM `car_passenger_info` WHERE passen_id=$row3[passen_id])";
            $result5 = mysqli_query($con, $query5);
            $row5 = mysqli_fetch_array($result5);

            $query6 = "SELECT * from login WHERE user_id=$row5[user_id]";
            $result6 = mysqli_query($con, $query6);
            $row6 = mysqli_fetch_array($result6);

            $query7 = "SELECT * from car_passenger_info WHERE passen_id=$row3[passen_id]";
            $result7 = mysqli_query($con, $query7);
            $row7 = mysqli_fetch_array($result7);

        ?>

            <section class="show-car-book" id="show-car-book">
                <div class="container">
                    <div class="item">
                        <div class="item-left">
                            <h2>Car no: <?php echo $row5['car_no'] ?></h2>
                            <h2>Rent: <?php echo $row4['rent'] ?></h2>
                            <h2>Seat: <?php echo $row7['book_seat'] ?></h2>
                            <div class="sce">
                                <div class="icon">
                                    <i class="fa fa-table"></i>
                                </div>
                                <p>car share details:<br><?php echo $row4['start_date']; ?> TO <?php echo $row4['stop_date']; ?><br /> <?php echo $row4['start_time']; ?> & <?php echo $row4['stop_time']; ?><br><?php echo $row4['source']; ?> TO <?php echo $row4['destination']; ?></p>
                                <p style="margin-left: 40px;">Source city:<?php echo $row4['source']; ?><br> destination city:<?php echo $row4['destination']; ?><br> Route :<?php echo $row4['route']; ?><br>Other: Route :<?php echo $row4['other_info']; ?></p>

                            </div>
                            <div class="fix"></div>
                            <div class="sce">
                                <div class="icon">
                                    <span class="glyphicon glyphicon-user" span>
                                </div>
                                <p>Car owner Details:<br><?php echo $row6['first_name'] . " " . $row6['last_name']; ?><br>Phone no: <?php echo $row6['phone_no']; ?><br>Email: <?php echo $row6['email']; ?></p>
                            </div>

                            <div class="fix"></div>
                            <div class="sce">
                                <div class="icon">
                                    <i class='fas fa-user-friends' style='font-size:24px'></i>
                                </div>
                                <p>Car Details:<br>car no: <?php echo $row5['car_no'] ?><br>car name: <?php echo $row5['car_name'] ?><br>car details: <?php echo $row5['car_details'] ?><br></p>
                            </div>
                            <div class="fix"></div>
                            <div class="loc">
                                <div class="icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <h4><?php echo $row4['location'] ?></h4>
                            </div>
                            <a href="ticket.php?passen_id=<?php echo $row3['passen_id'] ?>&amp; share_car_id=<?php echo $row4['car_share_id'] ?>"><button name="delete" class="btn btn-primary">Ticket</button></a>
                            <a href="car_book.php?passen_id=<?php echo $row3['passen_id'] ?>"><button name="delete" class="btn btn-warning">Edit</button></a>
                            <a href="delete.php?passen_id=<?php echo $row3['passen_id'] ?>&amp; share_car_id=<?php echo $row7['car_share_id'] ?>&amp; book_seat=<?php echo $row7['book_seat'] ?>""><button name=" delete" class="btn btn-danger">Cancle booking</button></a>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        }
        ?>
    </body>

    </html>

<?php

} else {
    header('location:Final_signin_signup_module.php');
}

?>