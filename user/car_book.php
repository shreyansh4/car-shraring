<?php
session_start();

include_once("conn.php");

if ($_SESSION["email"]  == true) {
    // echo "your username is " . $_SESSION['email'] . "<br>";
    if (isset($_GET['source']) && isset($_GET['destination']) && isset($_GET['car_id']) && isset($_GET['car_share_id'])) {
        $source = $_GET['source'];
        $destination = $_GET['destination'];
        $car_id = $_GET['car_id'];
        $car_share_id = $_GET['car_share_id'];

        $query1 = "select * from login where email='$_SESSION[email]'";
        $result1 = mysqli_query($con, $query1);
        $row = mysqli_fetch_array($result1);
        $user_id = $row['user_id'];
        // echo "<br>user id: "."$user_id";
    }
    if (isset($_POST['book'])) {
        extract($_POST);
        // echo "car_share_id: " . "$car_share_id";

        $query3 = "select * from car_share_info where car_share_id=$car_share_id";
        $result3 = mysqli_query($con, $query3);
        $row = mysqli_fetch_array($result3);
        $free_seat = $row['free_seat'];
        // echo "<br>book_seat:" . $book_seat;
        $car_owner_id = $row['user_id'];

        // echo "<br>car owner id:". $car_owner_id;
        if ($free_seat > 0) {
            if ($free_seat >= $book_seat) {
                $query2 = "INSERT INTO `car_passenger_info` (`car_id`, `car_share_id`, `user_id`, `source`, `destination`, `book_seat`) 
                 VALUES ('$car_id', '$car_share_id', '$user_id', '$source', '$destination', '$book_seat');";
                $result2 = mysqli_query($con, $query2);

                if (!$result2) {
                    echo "<script> alert('not book car')</script>";
                } else {
                    $query4 = "UPDATE `car_share_info` SET `free_seat`=`free_seat`-$book_seat WHERE car_share_id='$car_share_id'";
                    $result4 = mysqli_query($con, $query4);
                    // if(!$result4){
                    //     echo "<script> alert('not update')</script>";
                    // }
                    // else{
                    //     echo "<script> alert('update')</script>";
                    // }
                    echo "<script> alert('Your $book_seat seat booked')</script>";
                    echo "<script> location.replace('show_car_book.php') </script>";
                }
            } else {
                $dis_seat = $row['free_seat'];
                echo "<script> alert('Only availble $dis_seat seat')</script>";
            }
        } else {
            echo "<script> alert('not available free seat')</script>";
        }
    }

    if (isset($_POST['update'])) {
        extract($_POST);
        $query7 = "select * from car_passenger_info where passen_id=$_GET[passen_id]";
        $result7 = mysqli_query($con, $query7);
        $row7 = mysqli_fetch_array($result7);
        $booked_seat = $row7['book_seat'];

        $query3 = "select * from car_share_info where car_share_id in(select car_share_id from car_passenger_info where passen_id=$_GET[passen_id])";
        $result3 = mysqli_query($con, $query3);
        $row = mysqli_fetch_array($result3);
        $free_seat = $row['free_seat'];

        // echo "<br>free" . $free_seat;

        $total = $free_seat + $booked_seat;
        // echo "<br>total" . $total;
        // echo "book_seat" . $book_seat;
        if ($total >= $book_seat) {
            $sub_seat = $total - $book_seat;
            // echo "<br>$sub_seat";

            $query8 = "UPDATE `car_passenger_info` SET `book_seat` = '$book_seat' WHERE `car_passenger_info`.`passen_id` = $_GET[passen_id]";
            $result8 = mysqli_query($con, $query8);
            if (!$result8) {
                echo "<script> alert('not book car')</script>";
            } else {
                $query9 = "UPDATE `car_share_info` SET `free_seat` = '$sub_seat' WHERE `car_share_info`.`car_share_id` = $row[car_share_id]";
                $result9 = mysqli_query($con, $query9);
                // if (!$result9) {
                //     echo "<script> alert('not update')</script>";
                // } else {
                //     echo "<script> alert('update')</script>";
                // }
                echo "<script> alert('Your $book_seat seat booked')</script>";
            }
        } else {
            echo "<script> alert('Only availble $free_seat')</script>";
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

            #car_book_form {
                position: relative;
                min-height: 100vh;
                background: rgba(32, 57, 168, 0.2);
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
            }

            #car_book_form .container {
                position: relative;
                width: 800px;
                height: 600px;
                -webkit-box-shadow: 0 0 20px rgb(0, 0, 0);
                box-shadow: 0 0 20px rgb(0, 0, 0);
                background: #fff;
                box-shadow: 0 15px 50px rgba(0, 0, 0, 0, 5);
                overflow: hidden;
            }

            #car_book_form .container .user {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
            }

            #car_book_form .container h2 {
                font-family: 'Libre Baskerville', serif;
                font-family: 'Amiri', serif;
            }

            #car_book_form .container .user .imgBx {
                position: relative;
                width: 50%;
                height: 100%;
                background: #ff0;
                transition: 0.5s;
            }

            #car_book_form .container .user .imgBx img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            #car_book_form .container .user .formBx {
                position: relative;
                width: 50%;
                height: 100%;
                background: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 40px;
                transition: 0.5s;
            }

            #car_book_form .container .user .formBx form {
                font-size: 18px;
                font-weight: 600;
                text-transform: capitalize;
                letter-spacing: 2px;
                text-align: center;
                width: 100%;
                margin-right: 10px;
                color: #555;
            }

            #car_book_form .container .user .formBx form input {
                position: relative;
                width: 100%;
                padding: 9px;
                background: rgba(238, 238, 238, 0.6);
                color: rgb(0, 0, 0);
                border-radius: 2px;
                border: 1px solid #555;
                outline: none;
                box-shadow: none;
                margin: 8px 0;
                font-family: 'Amiri', serif;
                font-size: 14px;
                letter-spacing: 1px;
                font-weight: 300
            }



            #car_book_form .container .user .formBx form input[type="submit"] {
                max-width: 200px;
                background: #677eff;
                border: none;
                border-radius: 2px;
                color: #fff;
                cursor: pointer;
                font-weight: 500;
                font-size: 14px;
                letter-spacing: 1px;
                transition: 0.5s;
            }

            #car_book_form .container .user .formBx form input[type="submit"]:hover {
                background: #294cdd;
                color: #fff;
            }

            #car_book_form .container .user .formBx form a {
                font-weight: 600;
                text-decoration: none;
                color: #677eff;
                font-family: 'Amiri', serif;
            }

            #car_book_form span {
                position: absolute;
                top: 9px;
                left: 2px;
                padding: 10px;
                display: inline-block;
                font-size: 14px;
                color: rgb(87, 84, 84);
                font-weight: 400;
                transition: 0.3s;
                font-family: 'Amiri', serif;
                pointer-events: none;
            }

            #car_book_form .inputbox {
                position: relative;
                height: 50px;
                flex-grow: 1;
                font-family: 'Amiri', serif;
                margin-right: 10px;
                margin-bottom: 15px;
            }

            #car_book_form .container .inputbox input:focus~span,
            #car_book_form .container .inputbox input:valid~span {
                transform: translateX(-10px) translateY(-34px);
                font-size: 16px;
            }

            @media (max-width: 991px) {
                #car_book_form .container {
                    max-width: 400px;
                    height: 500px;
                }

                #car_book_form .container .imgBx {
                    display: none;
                }

                #car_book_form .container .user .formBx {
                    width: 100%;
                }
            }

            @media (max-width: 400px) {
                #car_book_form .container {
                    height: 400px;
                }
            }
        </style>
    </head>

    <body>
        <section id="car_book_form">
            <div class="container">
                <div class="user car-share">
                    <div class="imgBx"><img src="../images/9.jpg"></div>
                    <div class="formBx">
                        <?php
                        if (isset($_GET['passen_id'])) {
                            $query5 = "select * from car_passenger_info where passen_id=$_GET[passen_id]";
                            $result5 = mysqli_query($con, $query5);
                            $row5 = mysqli_fetch_array($result5);

                            $query6 = "select * from car_share_info where car_share_id in(select car_share_id from car_passenger_info where passen_id=$_GET[passen_id]) ";
                            $result6 = mysqli_query($con, $query6);
                            $row6 = mysqli_fetch_array($result6);
                        ?>
                            <form method="POST">
                                <h2>Car Book</h2>
                                <div class="inputbox">
                                    <input type="text" name="source" value="<?php echo $row6['source'] ?>" class="flex-item-left" disabled required>
                                    <!-- <span>Source</span> -->
                                </div>
                                <div class="inputbox">
                                    <input type="text" name="destination" value="<?php echo $row6['destination'] ?>" class="flex-item-right" disabled required>
                                    <!-- <span>Destination</span> -->
                                </div>
                                <div class="inputbox">
                                    <input type="number" name="book_seat" value="<?php echo $row5['book_seat'] ?>" class="input-control" required>
                                    <span>how many seat book</span>
                                </div>

                                <input type="submit" name="update" value="Update">
                            </form>
                        <?php
                        } else {
                        ?>
                            <form method="POST">
                                <h2>Car Book</h2>
                                <div class="inputbox">
                                    <input type="text" name="source" value="<?php echo $source ?>" class="flex-item-left" disabled required>
                                    <!-- <span>Source</span> -->
                                </div>
                                <div class="inputbox">
                                    <input type="text" name="destination" value="<?php echo $destination ?>" class="flex-item-right" disabled required>
                                    <!-- <span>Destination</span> -->
                                </div>
                                <div class="inputbox">
                                    <input type="number" name="book_seat" class="input-control" required>
                                    <span>how many seat book</span>
                                </div>

                                <input type="submit" name="book" value="Book car">
                            <?php
                        }
                            ?>
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
// echo "car_id: "."$car_id<br>";
// echo "car_share_id: "."$car_share_id";
// echo "<br>user id: "."$user_id";
// echo "<br>source: "."$source<br>";
// echo "destination: "."$destination<br>";
// echo "book_seat: "."$book_seat<br>";
?>