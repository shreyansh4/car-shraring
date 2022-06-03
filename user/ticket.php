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

            #ticket body {
                background: rgb(228, 226, 226) !important;
            }

            #ticket div.container {
                margin: 0 auto;
                overflow: hidden
            }

            #ticket .upcomming {
                font-size: 45px;
                text-transform: uppercase;
                border-left: 14px solid rgba(255, 235, 59, 0.78);
                padding-left: 12px;
                margin: 18px 8px;
            }

            #ticket .container .item {
                width: 80%;
                box-shadow: 1px 1px 10px 1px black;
                float: left;
                padding: 0 20px;
                border: 1px solid black;
                background: rgb(255, 255, 255);
                overflow: hidden;
                margin: 10px
            }

            #ticket .container .item-right,
            #ticket .container .item-left {
                float: left;
                padding: 0px
            }

            #ticket .container .item-right {
                padding: 90px 20px;
                margin-right: 20px;
                width: 25%;
                position: relative;
                height: auto;
            }

            #ticket .container .item-right .up-border,
            #ticket .container .item-right .down-border {
                padding: 14px 15px;
                background-color: rgb(63, 59, 59);
                border-radius: 50%;
                position: absolute
            }

            #ticket .container .item-right .up-border {
                top: -8px;
                right: -35px;
            }

            #ticket .container .item-right .down-border {
                bottom: -13px;
                right: -35px;
            }

            #ticket .container .item-right .num {
                font-size: 60px;
                text-align: center;
                color: #111;
                font-family: 'Libre Baskerville', serif;
                font-family: 'Amiri', serif;
            }

            #ticket .container .item-right .seat {
                font-size: 40px;
                text-align: center;
                color: #111;
                font-family: 'Libre Baskerville', serif;
                font-family: 'Amiri', serif;
            }

            #ticket .container .item-right .day,
            #ticket .container .item-left .event {
                color: #555;
                font-size: 20px;
                margin-bottom: 9px;
            }

            #ticket .container .item-right .day {
                text-align: center;
                font-size: 25px;
                font-family: 'Libre Baskerville', serif;
                font-family: 'Amiri', serif;
            }

            #ticket .container .item-left {
                width: 71%;
                padding: 34px 0px 19px 46px;
                border-left: 3px dotted #999;
            }

            #ticket .container .item-left .title {
                color: #111;
                font-size: 34px;
                margin-bottom: 12px
            }

            #ticket .container .item-left .sce {
                margin-top: 5px;
                display: block
            }

            #ticket .container .item-left .sce .icon,
            #ticket .container .item-left .sce p,
            #ticket .container .item-left .loc .icon,
            #ticket .container .item-left .loc p {
                float: left;
                word-spacing: 5px;
                letter-spacing: 1px;
                color: #222;
                font-size: 18px;
                margin-bottom: 10px;
            }

            #ticket .container .item-left .sce .icon,
            #ticket .container .item-left .loc .icon {
                margin-right: 10px;
                font-size: 20px;
                color: #666
            }

            #ticket .container .item-left .loc {
                display: block
            }

            #ticket .fix {
                clear: both
            }

            #ticket .container .item .tickets {
                float: right;
                margin-top: 10px;
                font-size: 18px;
                border: none;

            }

            #ticket .linethrough {
                text-decoration: line-through
            }

            @media only screen and (max-width: 1150px) {
                #ticket .container .item {
                    width: 100%;
                    margin-right: 20px
                }

                #ticket div.container {
                    margin: 0 20px auto
                }
            }
        </style>
    </head>

    <body>
        <?php
        $query1 = "SELECT * FROM `car_passenger_info` WHERE passen_id=$_GET[passen_id]";
        $result1 = mysqli_query($con, $query1);
        $row1 = mysqli_fetch_array($result1);

        $query3 = "SELECT * FROM `car_share_info` WHERE car_share_id=$_GET[share_car_id]";
        $result3 = mysqli_query($con, $query3);
        $row3 = mysqli_fetch_array($result3);

        $query4 = "SELECT * FROM `login` WHERE user_id=$row3[user_id]";
        $result4 = mysqli_query($con, $query4);
        $row4 = mysqli_fetch_array($result4);

        $query5 = "SELECT * FROM `car_register_info` WHERE car_id=$row3[car_id]";
        $result5 = mysqli_query($con, $query5);
        $row5 = mysqli_fetch_array($result5);
        ?>

        <section id="ticket" class="ticket">
            <div class="container">
                <h1 class="upcomming">ticket</h1>
                <div class="item">
                    <div class="item-right">
                        <?php
                        $a_month = $row3['start_date'];
                        $amonth = str_replace('/', '-', $a_month);
                        $am_month = date('M', strtotime($amonth));

                        $a_date = $row3['start_date'];
                        $adate = str_replace('/', '-', $a_date);
                        $am_date = date('d', strtotime($adate));
                        ?>
                        <h2 class="num"><?php echo $am_date ?></h2>
                        <p class="day"><?php echo $am_month ?></p>
                        <h2 class="seat"><?php echo $row3['rent'] ?>/Seat</h2>
                        <h2 class="num"><?php echo $row1['book_seat']; ?></h2>
                        <p class="day">Seat</p>
                        <span class="up-border"></span>
                        <span class="down-border"></span>
                    </div> <!-- end item-right -->

                    <div class="item-left">
                        <h4 class="event" style="font-size: 25px;">Car sharing</h4>
                        <h2 class="title"><?php echo $row2['first_name'] . " " . $row2['last_name']; ?></h2>
                        <h4 style="font-size: 22px;">Car no: <?php echo $row5['car_no'] ?></h4><br>
                        <!-- <div class="col-md-6"> -->
                        <div class="sce">
                            <div class="icon">
                                <i class="fa fa-table"></i>
                            </div>
                            <p>Time:<br><?php echo $row3['start_date']; ?> TO <?php echo $row3['stop_date']; ?><br /> <?php echo $row3['start_time']; ?> & <?php echo $row3['stop_time']; ?><br><?php echo $row3['source']; ?> TO <?php echo $row3['destination']; ?> </p>
                        </div>
                        <div class="fix"></div>
                        <div class="sce">
                            <div class="icon">
                                <span class="glyphicon glyphicon-user" span>
                            </div>
                            <p>Car owner Details:<br><?php echo $row4['first_name'] . " " . $row4['last_name']; ?><br>Phone no: <?php echo $row4['phone_no']; ?><br>Email: <?php echo $row4['email']; ?></p>
                        </div>
                        <!-- </div> -->
                        <!-- <div class="col-md-6"> -->
                        <div class="fix"></div>
                        <div class="sce">
                            <div class="icon">
                                <i class='fas fa-user-friends'></i>
                            </div>
                            <p>Car passenger Details:<br>Phone no:<?php echo $row2['phone_no'] ?><br>Email: <?php echo $row2['email'] ?> </p>
                        </div>
                        <div class="fix"></div>
                        <div class="loc">
                            <div class="icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <p>Location: <?php echo $row3['location'] ?></p>
                        </div>
                        <button class="tickets btn btn-primary" onclick="window.print()">Generate tickets</button>
                    </div>
                </div>
            </div>
        </section>
    </body>

    </html>

<?php

} else {
    header('location:Final_signin_signup_module.php');
}
?>