<?php
session_start();
include_once("conn.php");

if ($_SESSION["email"]  == true) {
    // echo "your username is " . $_SESSION['email'] . "<br>";
    $email = $_SESSION['email'];
    $q = "select * from login where email='$email'";
    $r = mysqli_query($con, $q);

    $row = mysqli_fetch_array($r);
    // echo $row["user_id"];
    $uid = $row["user_id"];



    if (isset($_POST["share"])) {
        extract($_POST);
        $car_info = $_POST['car_info'];
        $start_time  = date("H:i", strtotime($_POST['start_time']));
        $stop_time  = date("H:i", strtotime($_POST['stop_time']));

        $var1 = $_POST['start_date'];
        $start_date = str_replace('/', '-', $var1);
        $start_date = date('Y-m-d', strtotime($start_date));

        $var2 = $_POST['stop_date'];
        $stop_date = str_replace('/', '-', $var2);
        $stop_date = date('Y-m-d', strtotime($stop_date));
        // $query="INSERT INTO `car_share_info` (`car_share_id`, `car_id`, `user_id`, `source`, `destination`, `route`, `free_seat`, `start_time`, `stop_time`, `start_date`, `stop_date`, `rent`, `ac_non_ac`, `location`, `other_info`) VALUES (NULL, '125', '17', 'morbi', 'rajkot', 'nsik', '2', '00:20:00', '00:30:00', '2020-11-05', '2020-11-12', '100', 'ac car', 'kbkdkbdk', 'kdbkdbgkdbg');";
        // echo "$car_info<br> $_POST[source]<br> $_POST[destination]<br> $_POST[route]<br> $_POST[free_seat]<br> $start_time<br>  $stop_time<br> $start_date<br> $stop_date<br> $_POST[rent]<br> $_POST[other_info]<br> $uid<br>";
        $query = "INSERT INTO `car_share_info` (`car_share_id`, `car_id`, `user_id`, `source`, `destination`, `route`, `free_seat`, `start_time`, `stop_time`, `start_date`, `stop_date`, `rent`, `ac_non_ac`, `location`, `other_info`) 
        VALUES (NULL, '$car_info', '$uid', '$source', '$destination', '$route', '$free_seat', '$start_time', '$stop_time', '$start_date', '$stop_date', '$rent','$ac_nonac','$location', '$other_info')";
        $result = mysqli_query($con, $query);

        if (!$result) {
            echo mysqli_error($result);
            echo "<script> alert('ERROR: Something is wrong please try again...')</script>";
        } else {
            header("index.php");
            echo "<script> alert('Your car is succefully share...')</script>";
        }
    }
    if (isset($_POST["update"])) {
        extract($_POST);
        $car_info = $_POST['car_info'];
        $start_time  = date("H:i", strtotime($_POST['start_time']));
        $stop_time  = date("H:i", strtotime($_POST['stop_time']));

        $var1 = $_POST['start_date'];
        $start_date = str_replace('/', '-', $var1);
        $start_date = date('Y-m-d', strtotime($start_date));

        $var2 = $_POST['stop_date'];
        $stop_date = str_replace('/', '-', $var2);
        $stop_date = date('Y-m-d', strtotime($stop_date));
        echo $car_share_id = $_GET["car_share_id"];
        // echo "$car_info<br> $_POST[source]<br> $_POST[destination]<br> $_POST[route]<br> $_POST[free_seat]<br> $start_time<br>  $stop_time<br> $start_date<br> $stop_date<br> $_POST[rent]<br> $_POST[other_info]<br> $uid<br> $_GET[car_share_id]";
        $query3 = "UPDATE `car_share_info` SET `car_id` = '$car_info', `source` = '$source', `destination` = '$destination', `route` = '$route', `free_seat` = '$free_seat', `start_time` = '$start_time', `stop_time` = '$stop_time', `start_date` = '$start_date', `stop_date` = '$stop_date', `rent` = '$rent',`ac_non_ac` = '$ac_nonac',`location` = '$location', `other_info` = '$other_info' WHERE `car_share_info`.`car_share_id` = $_GET[car_share_id]";
        $result3 = mysqli_query($con, $query3);

        if (!$result3) {
            echo mysqli_error($con);
            echo "<script> alert('ERROR: Something is wrong please try again...')</script>";
        } else {
            header("index.php");
            echo "<script> alert('Your car is succefully update...')</script>";
        }
    }


?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Form</title>
        <!--============= META tag =============-->
        <meta name="viewport" content="width=device-width ,initial-scale=1.0">

        <!--========================== BOOTSTRAP ===============================-->

        <!--============= CSS only =============-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!--============= JS, Popper.js, and jQuery =============-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <!--======================== BOOTSTRAP END ============================== -->

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Amiri&display=swap,Arvo&family=Libre+Baskerville&display=swap,Rokkitt:wght@600&display=swap,Amiri&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;

            }

            section {
                position: relative;
                min-height: 100vh;
                background: rgba(32, 57, 168, 0.2);
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
            }

            section .container {
                position: relative;
                width: 900px;
                height: 750px;
                -webkit-box-shadow: 0 0 20px rgb(0, 0, 0);
                box-shadow: 0 0 20px rgb(0, 0, 0);
                background: #fff;
                box-shadow: 0 15px 50px rgba(0, 0, 0, 0, 5);
                overflow: hidden;
            }

            section .container .user {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
            }

            section .container .user .imgBx {
                position: relative;
                width: 40%;
                height: 100%;
                background: #ff0;
                transition: 0.5s;
            }

            section .container .user .imgBx img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            section .container .user .formBx {
                position: relative;
                width: 60%;
                height: 100%;
                background: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 40px;
                transition: 0.5s;
            }

            section .container .user .formBx form {
                font-size: 18px;
                font-weight: 600;
                text-transform: capitalize;
                letter-spacing: 2px;
                text-align: center;
                width: 100%;
                margin-right: 10px;
                color: #555;
            }

            section .container .user .formBx form input,
            select {
                position: relative;
                width: 100%;
                padding: 9px;
                font-family: 'Arvo', serif;
                background: rgba(238, 238, 238, 0.6);
                color: rgb(0, 0, 0);
                border-radius: 2px;
                border: 1px solid #555;
                outline: none;
                box-shadow: none;
                margin: 8px 0;
                font-size: 14px;
                letter-spacing: 1px;
                font-weight: 400
            }



            section .container .user .formBx form input[type="submit"] {
                max-width: 200px;
                background: #677eff;
                border: none;
                border-radius: 2px;
                font-family: 'Arvo', serif;
                color: #fff;
                cursor: pointer;
                font-weight: 500;
                font-size: 14px;
                letter-spacing: 1px;
                transition: 0.5s;
            }

            section .container .user .formBx form input[type="submit"]:hover {
                background: #294cdd;
                color: #fff;
            }

            section .container .user .formBx form a {
                font-weight: 600;
                text-decoration: none;
                color: #677eff;
                font-family: 'Arvo', serif;
            }

            section .container .user .formBx form h2 {
                font-family: 'Libre Baskerville', serif;
                font-family: 'Amiri', serif;
            }

            span {
                position: absolute;
                top: 9px;
                left: 2px;
                font-family: 'Arvo', serif;
                padding: 10px;
                display: inline-block;
                font-size: 14px;
                color: rgb(87, 84, 84);
                font-weight: 400;
                transition: 0.3s;
                pointer-events: none;
            }

            .inputbox {
                position: relative;
                height: 50px;
                flex-grow: 1;
                margin-right: 10px;
                margin-bottom: 15px;
            }

            .flex-container {
                display: flex;
                flex-wrap: wrap;
                font-size: 30px;
            }

            .flex-item-left {
                padding: 10px;
                flex: 50%;
            }

            .flex-item-right {
                padding: 10px;
                flex: 50%;
            }

            .container .inputbox input:focus~span,
            .container .inputbox input:valid~span {
                transform: translateX(-10px) translateY(-34px);
                font-size: 16px;
            }

            .container .inputbox select~span {
                transform: translateX(-10px) translateY(-34px);
                font-size: 16px;
            }

            @media (max-width: 991px) {
                section .container {
                    max-width: 500px;
                }

                section .container .imgBx {
                    display: none;
                }

                section .container .user .formBx {
                    width: 100%;
                }
            }

            @media (max-width: 540px) {

                section .container {
                    height: 1000px;
                }
            }

            @media (max-width: 400px) {
                section .container {
                    height: 1000px;
                }
            }
        </style>
    </head>

    <body>
        <section>
            <div class="container">
                <div class="user car-share">
                    <div class="formBx">
                        <?php
                        if (isset($_GET['car_share_id'])) {
                            $query2 = "select * from car_share_info where car_share_id=$_GET[car_share_id]";
                            $result2 = mysqli_query($con, $query2);
                            $row2 = mysqli_fetch_array($result2);
                        ?>
                            <form method="POST">
                                <h2>Car Share</h2>
                                <div class="flex-container">
                                    <div class="inputbox">
                                        <input type="text" name="source" class="flex-item-left" value="<?php echo $row2['source']; ?>" required>
                                        <span>Source</span>
                                    </div>
                                    <div class="inputbox">
                                        <input type="text" name="destination" value="<?php echo $row2['destination']; ?>" class="flex-item-right" required>
                                        <span>Destination</span>
                                    </div>
                                </div>

                                <div class="inputbox">
                                    <input type="text" name="route" value="<?php echo $row2['route']; ?>" class="input-control" required>
                                    <span>Route</span>
                                </div>
                                <div class="inputbox">
                                    <select class="input-control" name="car_info">
                                        <?php
                                        $query = "select * from car_register_info where user_id=$uid";
                                        $res = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($res)) {
                                        ?>
                                            <option value="<?php echo $row[0]; ?>" <?php if ($row[0] == $row2['car_id']) echo "SELECTED"; ?>><?php echo "Car name: $row[car_name] Car Number: $row[car_no]"; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="flex-container">
                                    <div class="inputbox">
                                        <input type="text" onfocus="(this.type='time')" name="start_time" value="<?php echo $row2['start_time']; ?>" class="input-control flex-item-left time" required>
                                        <span>Start time</span>
                                    </div>
                                    <div class="inputbox">
                                        <input type="text" onfocus="(this.type='time')" name="stop_time" value="<?php echo $row2['stop_time']; ?>" class="input-control flex-item-right time" required>
                                        <span>Stop time</span>
                                    </div>
                                </div>
                                <div class="flex-container">
                                    <div class="inputbox">
                                        <input type="text" name="start_date" onfocus="(this.type='date')" value="<?php echo $row2['start_date']; ?>" class="input-control flex-item-left time" required>
                                        <span>Start date</span>
                                    </div>
                                    <div class="inputbox">
                                        <input type="text" name="stop_date" onfocus="(this.type='date')" value="<?php echo $row2['stop_date']; ?>" class="input-control flex-item-right time" required>
                                        <span>Stop date</span>
                                    </div>
                                </div>
                                <div class="inputbox">
                                    <input type="number" name="rent" value="<?php echo $row2['rent']; ?>" class="input-control" required>
                                    <span>Rent</span>
                                </div>
                                <div class="flex-container">
                                    <div class="inputbox">
                                        <input type="number" name="free_seat" value="<?php echo $row2['free_seat']; ?>" ; class="input-control flex-item-left time" required>
                                        <span>Free seat</span>
                                    </div>
                                    <div class="inputbox">
                                        <select name="ac_nonac" class="flex-item-right" required>
                                            <option value="">Please select Option</option>
                                            <option value="AC car" <?php if ($row2['ac_non_ac'] == 'AC car') { ?> selected <?php } ?>>AC car</option>
                                            <option value="Non AC car" <?php if ($row2['ac_non_ac'] == 'Non AC car') { ?> selected <?php } ?>>Non AC car</option>
                                        </select>

                                        <span>Car info</span>
                                    </div>
                                </div>
                                <div class="inputbox">
                                    <input type="text" name="location" value="<?php echo $row2['location']; ?>" class="input-control" required>
                                    <span>Location</span>
                                </div>
                                <div class="inputbox">
                                    <input type="text" name="other_info" value="<?php echo $row2['other_info']; ?>" class="input-control" required>
                                    <span>Other</span>
                                </div>
                                <input type="submit" name="update" value="Update">
                            </form>
                        <?php
                        } else {
                        ?><form method="POST">
                                <h2>Car Share</h2>
                                <div class="flex-container">
                                    <div class="inputbox">
                                        <input type="text" name="source" class="flex-item-left" required>
                                        <span>Source</span>
                                    </div>
                                    <div class="inputbox">
                                        <input type="text" name="destination" class="flex-item-right" required>
                                        <span>Destination</span>
                                    </div>
                                </div>

                                <div class="inputbox">
                                    <input type="text" name="route" class="input-control" required>
                                    <span>Route</span>
                                </div>

                                <div class="inputbox">
                                    <select class="input-control" name="car_info">
                                        <?php
                                        $query = "select * from car_register_info where user_id=$uid";
                                        $res = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_row($res)) {
                                        ?>
                                            <option value="<?php echo $row[0]; ?>"><?php echo "Car name: $row[2] Car Number: $row[3]"; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <span>Car info</span>
                                </div>
                                <div class="flex-container">
                                    <div class="inputbox">
                                        <input type="text" onfocus="(this.type='time')" name="start_time" class="input-control flex-item-left time" required>
                                        <span>Start time</span>
                                    </div>
                                    <div class="inputbox">
                                        <input type="text" onfocus="(this.type='time')" name="stop_time" class="input-control flex-item-right time" required>
                                        <span>Stop time</span>
                                    </div>
                                </div>
                                <div class="flex-container">
                                    <div class="inputbox">
                                        <input type="text" name="start_date" onfocus="(this.type='date')" class="input-control flex-item-left time" required>
                                        <span>Start date</span>
                                    </div>
                                    <div class="inputbox">
                                        <input type="text" name="stop_date" onfocus="(this.type='date')" class="input-control flex-item-right time" required>
                                        <span>Stop date</span>
                                    </div>
                                </div>
                                <!-- <div class="inputbox">
                                <input type="text" name="date" onfocus="(this.type='date')" class="input-control" required>
                                <span>Date</span>
                            </div> -->
                                <div class="inputbox">
                                    <input type="number" name="rent" class="input-control" required>
                                    <span>Rent</span>
                                </div>
                                <div class="flex-container">
                                    <div class="inputbox">
                                        <input type="number" name="free_seat" class="input-control flex-item-left time" required>
                                        <span>Free seat</span>
                                    </div>
                                    <div class="inputbox">
                                        <select name="ac_nonac" class="flex-item-right" required>
                                            <option value="">Please select Option</option>
                                            <option value="AC car">AC car</option>
                                            <option value="Non Ac car">Non AC car</option>
                                        </select>
                                        <span>Car info</span>
                                    </div>
                                </div>
                                <div class="inputbox">
                                    <input type="text" name="location" class="input-control" required>
                                    <span>Location</span>
                                </div>
                                <div class="inputbox">
                                    <input type="text" name="other_info" class="input-control" required>
                                    <span>Other</span>
                                </div>
                                <input type="submit" name="share" value="Share Car">
                            </form><?php
                                }
                                    ?>
                    </div>
                    <div class="imgBx"><img src="../images/7.jpg"></div>
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