<?php
session_start();

include_once("conn.php");

if ($_SESSION["email"]  == true) {
    // echo "your username is " . $_SESSION['email'] . "<br>";
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Header</title>

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
        <!--============= FONT AWESOME =============-->
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <!--============= JQUERY CDN =============-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!--============= STYLESHEET =============-->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Amiri&display=swap,Arvo&family=Libre+Baskerville&display=swap,Rokkitt:wght@600&display=swap,Amiri&display=swap');

            * {
                box-sizing: border-box;
                text-decoration: none !important;
                margin: 0;
                padding: 0;
                list-style: none;
            }


            #feedbak .container {
                width: 100%;
            }

            #car-register .container .mainbox .text hr {
                height: 4px;
                border-radius: 20px;
                width: 120px;
                background: #0078f1;
                border: none;
            }

            #car-register .container .mainbox .text h2 {
                font-family: 'Libre Baskerville', serif;
                font-family: 'Amiri', serif;
            }

            #car-register .container .mainbox {
                display: table;
                margin: 5rem auto;
                background-color: white;
                padding: 3rem 1.25rem;
                position: relative;
                background-color: #fff;
                z-index: 2;
                width: 70%;
                border-radius: 5px;
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.06), 0 2px 5px 0 rgba(0, 0, 0, 0.2);
            }

            #car-register .container .mainbox .box {
                position: relative;
            }

            #car-register .container .mainbox .box textarea,
            input {
                position: relative;
                border: 1px solid rgb(206, 203, 210);
                outline: none;
                border-radius: 3px;
                padding: 10px;
                /* height: 38px;*/
                width: 100%;
                padding: 10px;
                /* margin-bottom: 35px; */
            }

            #car-register .container .mainbox .box textarea {
                height: 120px;
            }

            #car-register .container .mainbox .box input:hover,
            textarea:hover {
                border: 1px solid black;
                outline: none;
                transition: 0.2s;
            }

            #car-register .container .mainbox .box input[type="submit"] {
                background: #677eff;
                height: 60px;
                border-radius: 1px;
                border: none;
                font-size: 30px;
                font-family: 'Libre Baskerville', serif;
                font-family: 'Amiri', serif;
                color: #fff;
                width: 100%;
                box-shadow: 0 1px 6px rgba(0, 0, 0);
                font-weight: 500;
                letter-spacing: 1px;
            }

            #car-register .container .mainbox .box input[type="submit"]:hover {
                background: #294cdd;
                color: #fff;

            }


            .inputbox {
                position: relative;
                height: auto;
                width: 100%;
                font-family: 'Amiri', serif;
                flex-grow: 1;
                margin-right: 10px;
                margin-bottom: 30px;
            }

            #car-register .inputbox span {
                position: absolute;
                top: 3px;
                left: 2px;
                padding: 10px;
                display: inline-block;
                font-size: 18px;
                font-family: 'Amiri', serif;
                color: rgb(87, 84, 84);
                font-weight: 400;
                transition: 0.3s;
                pointer-events: none;
            }

            .container .inputbox input:focus~span,
            .container .inputbox input:valid~span {
                transform: translateX(-10px) translateY(-42px);
                font-size: 16px;
                /* display: block; */
            }

            .inputbox textarea:focus~span,
            .inputbox textarea:valid~span {
                transform: translateX(-10px) translateY(-42px);
                font-size: 16px;
                /* display: block; */
            }



            @media (max-width: 780px) {
                #car-register .container .mainbox {
                    width: 80%;
                }
            }

            @media (max-width: 600px) {
                #car-register .container .mainbox {
                    width: 100%;
                }

                #car-register .container .mainbox .text h2 {
                    font-size: 30px;
                }
            }

            @media (max-width:400px) {
                #car-register .container .mainbox .box input[type="submit"] {
                    font-size: 25px;
                }
            }

            @media (max-width:350px) {

                #car-register .container .mainbox .box input {
                    margin-bottom: 20px;
                }

                #car-register .container .mainbox .box textarea {
                    margin-bottom: 20px;
                }

                .container .inputbox textarea:focus~span,
                .container .inputbox textarea:valid~span {
                    transform: translateX(-10px) translateY(-62px);
                    font-size: 16px;
                    /* display: block; */
                }
            }
        </style>

    </head>

    <body>
        <?php
        include_once("navbar2.php");
        ?>
        <section class="page" id="car-register">
            <div class="container">
                <div class="mainbox">
                    <div class="text">
                        <h2>Car Register</h2>
                        <hr><br>
                    </div>
                    <div class="box">
                        <div class="innner-form">

                            <?php
                            // if (isset($_GET['car_id'])) {
                            //     $query2="select * from car_register_info where car_id=$_GET[car_id]";
                            //     $result2=mysqli_query($con,$query2);
                            //     $row2=mysqli_fetch_array($result2);
                            ?>
                            <!-- <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="inputbox">
                                        <input type="text" name="car_no" value="<?php echo $row2['car_no'] ?>" class="input-control" required>
                                        <span>Car no</span>
                                    </div>
                                    <div class="inputbox">
                                        <input class="input-control" name="car_name" value="<?php echo $row2['car_name'] ?>" required>
                                        <span>Car Name</span>
                                    </div>
                                    <div class="inputbox">
                                        <textarea class="input-control" name="car_details" value="<?php echo $row2['car_details'] ?>" required></textarea>
                                        <span>Car details: Color, Company, Model etc...</span>
                                    </div>
                                    <div class="inputbox">
                                        Licence: <input type="file" name="file" class="input-control" value="<?php echo $row2['licence'] ?>" required>
                                    </div>
                                    <input class="mt-4" type="submit" name="car-register" value="Register car">
                                </form> -->
                            <?php
                            // } else {
                            ?>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <div class="inputbox">
                                    <input type="text" name="car_no" class="input-control" required>
                                    <span>Car no</span>
                                </div>
                                <div class="inputbox">
                                    <input class="input-control" name="car_name" required>
                                    <span>Car Name</span>
                                </div>
                                <div class="inputbox">
                                    <textarea class="input-control" name="car_details" required></textarea>
                                    <span>Car details: Color, Company, Model etc...</span>
                                </div>
                                <div class="inputbox">
                                    Licence: <input type="file" name="file" class="input-control" required>
                                </div>
                                <input class="mt-4" type="submit" name="car-register" value="Register car">
                            </form>
                            <?php
                            // }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

    </html>
<?php
    $email = $_SESSION["email"];
    $fetch_query = mysqli_query($con, "select * from login where email='$email'");
    // echo "email="."$email";
    $row = mysqli_fetch_array($fetch_query);
    // print_r($row);
    $user_id = $row['user_id'];
    // echo "$id";

    if (isset($_REQUEST["car-register"])) {
        extract($_POST);
        echo $_FILES["file"]["size"];
        if ((($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 1048576 * 3)) {

            if ($_FILES["file"]["error"] > 0) {
                echo "error: " . $_FILES["file"]["error"] . "<br>";
            } else {
                // substr(sha1(mt_rand()), 16, 6)
                $filename   = rand(0, 10000);
                $extension  = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION); // jpg
                $basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

                $destination  = "../db_licence/{$basename}";
                move_uploaded_file($_FILES["file"]["tmp_name"], $destination);

                echo $car_no = strtoupper($car_no);
                $ins = "INSERT INTO `car_register_info`(`user_id`, `car_no`, `car_name`, `car_details`, `licence`) VALUES ($user_id,'$car_no','$car_name','$car_details','$destination')";
                $result = mysqli_query($con, $ins);
                if (!$result) {
                    echo "<script> alert('ERROR: Your car number is already registered.')</script>";
                } else {
                    echo "<script> alert('MESSAGE: Your car is syccefully registered')</script>";
                    echo "<script> location.replace('show_car_registered.php') </script>";
                }
            }
        } else {
            echo "<script> alert('ERROR: You can upload only jpg or png file and maximum file size 3MB allowed')</script>";
        }
    }
} else {
    header('location:Final_signin_signup_module.php');
}
?>