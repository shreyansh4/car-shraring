<?php
session_start();

include_once("conn.php");
// ---------------create account------------------
if ($_SESSION["email"]  == true) {
    // echo "your username is " . $_SESSION['email'] . "<br>";

    $query1 = "select * from login where email='$_SESSION[email]'";
    $result1 = mysqli_query($con, $query1);
    $row = mysqli_fetch_array($result1);
    $user_id = $row['user_id'];
    if (isset($_POST["update"])) {
        extract($_POST);

        $var = $dob;
        $date = str_replace('/', '-', $var);
        $dob = date('Y-m-d', strtotime($date));

        $query2 = "UPDATE `login` SET `first_name` = '$first_name', `last_name` = '$last_name', `email` = '$email', 
        `gender` = '$gender', `phone_no` = '$phone_no', `DOB` = '$dob', `password` = '$password' WHERE `login`.`user_id` = $user_id";
        $result2 = mysqli_query($con, $query2);

        if (!$result2) {
            echo "<script> alert('ERROR: Something is wrong please try again...')</script>";
        } else {
            header("index.php");
            echo "<script> alert('Your account is succefully update...')</script>";
        }
    }


?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Header</title>

        <!------ META tag ------>
        <meta name="viewport" content="width=device-width ,initial-scale=1.0">
        <!------ BOOTSTRAP ------>
        <!------ CSS only ------>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!------ JS, Popper.js, and jQuery ------>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <!------ BOOTSTRAP END ------>
        <!------ FONT AWESOME------>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <!------ JQUERY CDN ------>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!------ FONTAWESOME CDN ------>
        <script src="https://kit.fontawesome.com/0c04773b83.js" crossorigin="anonymous"></script>

        <!------ STYLESHEET ------>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Amiri&display=swap,Arvo&family=Libre+Baskerville&display=swap,Rokkitt:wght@600&display=swap,Amiri&display=swap');

            * {
                box-sizing: border-box;
                text-decoration: none !important;
                margin: 0;
                padding: 0;
                list-style: none;
            }

            #profile .container .mainbox .text hr {
                height: 4px;
                /* display: block;
            margin: 0 auto; */
                border-radius: 20px;
                width: 120px;
                background: #0078f1;
                border: none;
            }


            #profile .container .join_box,
            #profile .create_box {
                margin: auto;
                padding: auto;
                top: 50%;
                transform: translate(0%, 12%);
                padding: 3rem 1.25rem;
                position: relative;
                background-color: rgb(255, 255, 255);
                width: 55%;
                border-radius: 5px;
                box-shadow: 0 5px 12px rgba(0, 0, 0);
            }

            #profile .container .join_box {
                transform: translate(0%, 30%);
            }

            #profile .container {
                margin-bottom: 300px;
            }

            #profile .inputbox {
                position: relative;
                height: 50px;
                flex-grow: 1;
                margin-right: 10px;
                margin-bottom: 30px;
                font-family: 'Amiri', serif;
            }

            #profile .container .mainbox input,
            select {
                position: relative;
                width: 100%;
                padding: 10px;
                background: white;
                color: rgb(0, 0, 0);
                border: 1px solid rgb(206, 203, 210);
                border-radius: 3px;
                outline: none;
                box-shadow: none;
                font-family: 'Amiri', serif;
                margin: 8px 0 !important;
                font-size: 18px !important;
                letter-spacing: 1px;
                font-weight: 400
            }

            #profile .container .mainbox input:hover,
            select:hover {
                border: 1px solid black;
                transition: 0.3s;
            }

            #profile .container .mainbox form input[type="submit"] {
                width: 100%;
                background: #677eff;
                color: #fff;
                display: block;
                margin: 0 auto !important;
                cursor: pointer;
                box-shadow: 0 1px 6px rgba(0, 0, 0);
                font-weight: 500;
                border-radius: 1px;
                border: none;
                font-size: 14px;
                letter-spacing: 1px;
                transition: 0.5s;
            }


            #profile .container .mainbox form input[type="submit"]:hover {
                background: #294cdd;
                color: #fff;
            }


            #profile span {
                position: absolute;
                top: 8px;
                left: 2px;
                padding: 10px;
                display: inline-block;
                font-size: 18px;
                color: rgb(87, 84, 84);
                font-weight: 400;
                transition: 0.3s;
                font-family: 'Amiri', serif;
                pointer-events: none;
            }

            #profile .flex-container {
                display: flex;
                flex-wrap: wrap;
                font-size: 30px;
            }

            #profile .container .mainbox .text h2 {
                font-family: 'Amiri', serif;
            }

            #profile .flex-item-left {
                padding: 10px;
                flex: 50%;
            }

            #profile .flex-item-right {
                padding: 10px;
                flex: 50%;
            }

            #profile .container .inputbox input~span {
                transform: translateX(-10px) translateY(-34px);
                font-size: 16px;
            }

            #profile .dob {
                display: none;
            }

            #profile .container .inputbox input:focus~.dob,
            #profile .container .inputbox input:valid~.dob {
                transform: translateX(-10px) translateY(-34px);
                font-size: 16px;
                display: block;
            }

            #profile .container .mainbox form p {
                font-family: 'Amiri', serif;
            }

            #profile .container .mainbox form p a {
                background: none !important;
                font-family: 'Amiri', serif;
            }

            #profile .container .mainbox form p a:hover {
                color: #294cdd;
                transition: 0.4s;
            }

            @media (max-width: 780px) {
                #profile .container .mainbox {
                    width: 80%;
                }
            }

            @media (max-width: 768px) {

                #profile .flex-item-right,
                #profile .flex-item-left {
                    flex: 100%;
                }
            }

            @media (max-width: 600px) {
                #profile .container .mainbox {
                    width: 100%;
                }

                #profile .container .mainbox .text h2 {
                    font-size: 30px;
                }
            }
        </style>

    </head>

    <body>
        <?php
        include_once("navbar2.php");
        ?>

        <section class="login" id="profile">
            <div class="container">
                <div class="mainbox signupBx page create_box" id="signup">
                    <div class="text">
                        <h2>Update profile</h2>
                        <hr><br>
                    </div>
                    <form method="POST">
                        <div class="flex-container">
                            <div class="inputbox">
                                <input type="text" name="first_name" value="<?php echo $row['first_name'] ?>" class="flex-item-left" required>
                                <span>Firstname</span>
                            </div>
                            <div class="inputbox">
                                <input type="text" name="last_name" value="<?php echo $row['last_name'] ?>" class="flex-item-right" required>
                                <span>Lastname</span>
                            </div>
                        </div>
                        <div class="inputbox">
                            <input type="email" name="email" value="<?php echo $row['email'] ?>" class="input-control" required>
                            <span>email</span>
                        </div>
                        <div class="flex-container">
                            <div class="inputbox">
                                <input type="text" name="phone_no" value="<?php echo $row['phone_no'] ?>" pattern="[6-9]{1}[0-9]{9}" title="Phone number with 6-9 and remaing 10 digit with 0-9" class="flex-item-left" required>
                                <span>Number</span>
                            </div>
                            <div class="inputbox">
                                <select name="gender" class="form-control" name="gender" class="flex-item-right" required>
                                    <option value="">Please select gender</option>
                                    <option value="Male" <?php if ($row['gender'] == 'Male') { ?> selected <?php } ?>>Male</option>
                                    <option value="Female" <?php if ($row['gender'] == 'Female') { ?> selected <?php } ?>>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="inputbox">
                            <input type="text" name="dob" onfocus="(this.type='date')" value="<?php echo $row['DOB'] ?>" placeholder="DOB" class="input-control" required>
                            <span class="dob">DOB</span>
                        </div>
                        <div class="inputbox">
                            <input type="text" name="password" class="input-control" id="pwd" value="<?php echo $row['password'] ?>" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                            <span>Password</span>
                        </div>
                        <input type="submit" name="update" value="Update Account">
                    </form>
                </div>
            </div>

        </section>


    </body>
    <?php
    ?>

    </html>
<?php
} else {
    header('location:Final_signin_signup_module.php');
}
?>