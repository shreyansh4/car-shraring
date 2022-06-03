<?php
session_start();
include_once("conn.php");
if (!$con) {
    die("cant connect connection error:" . mysqli_connect_errno() . "" . mysqli_connect_error());
}
// ---------------create account------------------

// if (isset($_POST["create"])) {
//     extract($_POST);

//     $var = $dob;
//     $date = str_replace('/', '-', $var);
//     $dob = date('Y-m-d', strtotime($date));

//     $query = "INSERT INTO `login`(`first_name`, `last_name`, `email`, `gender`, `phone_no`, `DOB`, `password`) 
//     VALUES ('$first_name','$last_name','$email','$gender',$phone_no,'$dob','$password')";
//     $result = mysqli_query($con, $query);

//     if (!$result) {
//         echo "<script> alert('ERROR: Something is wrong please try again...')</script>";
//     } else {
//         header("index.php");
//         echo "<script> alert('Your account is succefully create...')</script>";
//     }
// }

// ---------------Join account------------------
if (isset($_POST["login"])) {
    extract($_POST);

    $query = "SELECT * FROM `admin` WHERE email='$email' and password='$password'";
    $result = mysqli_query($con, $query);
    $rowcount = mysqli_num_rows($result);

    if ($rowcount == true) {
        $_SESSION["email"] = $email;
        header('location:../admin_panel/dashboard.php');
    } else {
        echo "<script> alert('ERROR: Your email and password are wrong')</script>";
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

        nav {
            position: fixed;
            z-index: 99;
            background: #0082e6;
            box-shadow: 0px 0.5px 5px #333333;
            height: 65px;
            position: fixed;
            width: 100%;
        }

        label.logo {
            position: relative;
            color: #f2f2f2;
            font-size: 30px;
            line-height: 65px;
            padding: 0 20px;
            font-weight: 500;
            font-family: 'Libre Baskerville', serif;
            font-family: 'Amiri', serif;
        }

        nav .nav-ul {
            float: right;
            padding-left: 0px;
            margin-right: 60px;
        }

        nav .nav-ul .nav-li {
            display: inline-block;
            line-height: 65px;
            margin: 0 2px;
        }

        nav .nav-ul .nav-li a {
            position: relative;
            color: #f2f2f2;
            font-weight: 500;
            font-size: 18px;
            padding: 7px 5px;
            border-radius: 3px;
            text-decoration: none;
            text-transform: uppercase;
            font-family: 'Amiri', serif;
        }

        nav .nav-ul .nav-li a.active,
        a:hover {
            background: #1b9bff;
            transition: .5s;
        }

        @media (max-width: 952px) {
            label.logo {
                font-size: 27px;
                padding-left: 25px;
            }

            nav .nav-ul .nav-li a {
                font-size: 16px;
            }
        }

        @media (max-width: 425px) {
            nav {
                height: 50px;
            }

            label.logo {
                box-sizing: border-box;
                position: relative;
                font-size: 18px;
                line-height: 50px;
            }

            nav .nav-ul {
                float: right;
                padding-left: 0px;
                margin-right: 0px;
            }

            nav .nav-ul .nav-li a {
                font-size: 15px;
            }

            nav .nav-ul .nav-li {
                line-height: 50px;
            }
        }


        @media (max-width: 291px) {
            nav {
                height: auto;
            }
        }

        body {
            background: white;
        }

        .container .mainbox .text hr {
            height: 4px;
            /* display: block;
            margin: 0 auto; */
            border-radius: 20px;
            width: 120px;
            background: #0078f1;
            border: none;
        }


        .container .join_box,
        .create_box {
            margin: auto;
            padding: auto;
            top: 50%;
            font-family: 'Rokkitt', serif;
            transform: translate(0%, 12%);
            padding: 3rem 1.25rem;
            position: relative;
            background-color: rgb(255, 255, 255);
            width: 55%;
            border-radius: 5px;
            box-shadow: 0 5px 12px rgba(0, 0, 0);
        }

        .container .join_box {
            transform: translate(0%, 30%);
        }

        .container {
            margin-bottom: 300px;
        }

        .inputbox {
            position: relative;
            height: 50px;
            flex-grow: 1;
            margin-right: 10px;
            margin-bottom: 30px;
        }

        .container .mainbox input,
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
            margin: 8px 0 !important;
            font-size: 18px !important;
            letter-spacing: 1px;
            font-weight: 400
        }

        .container .mainbox input:hover,
        select:hover {
            border: 1px solid black;
            transition: 0.3s;
        }

        .container .mainbox form input[type="submit"] {
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


        .container .mainbox form input[type="submit"]:hover {
            background: #294cdd;
            color: #fff;
        }


        span {
            position: absolute;
            top: 8px;
            left: 2px;
            padding: 10px;
            display: inline-block;
            font-size: 18px;
            color: rgb(87, 84, 84);
            font-weight: 400;
            transition: 0.3s;
            pointer-events: none;
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

        .dob {
            display: none;
        }

        .container .inputbox input:focus~.dob,
        .container .inputbox input:valid~.dob {
            transform: translateX(-10px) translateY(-34px);
            font-size: 16px;
            display: block;
        }

        .container .mainbox form p a {
            background: none !important;
        }

        .container .mainbox form p a:hover {
            color: #294cdd;
            transition: 0.4s;
        }

        @media (max-width: 780px) {
            .container .mainbox {
                width: 80%;
            }
        }

        @media (max-width: 768px) {

            .flex-item-right,
            .flex-item-left {
                flex: 100%;
            }
        }

        @media (max-width: 600px) {
            .container .mainbox {
                width: 100%;
            }

            .container .mainbox .text h2 {
                font-size: 30px;
            }
        }
    </style>

</head>

<body>
    <header>
        <nav>
            <label class="logo">Car Sharing</label>
            <ul class="nav-ul">
                <li class="nav-li"><a class="" href="admin_login.php">Admin Login</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <div class="container">
            <div class=" mainbox signinBx page join_box" id="signin">
                <form method="POST">
                    <div class="text">
                        <h2>Admin LogIn</h2>
                        <hr><br>
                    </div>
                    <div class="inputbox">
                        <input type="email" name="email" class="input-control" required>
                        <span>Email</span>
                    </div>
                    <div class="inputbox">
                        <input type="password" name="password" class="input-control" required>
                        <span>Password</span>
                    </div>
                    <input type="submit" name="login" value="LogIn">
                </form>
            </div>


            <!-- <div class="mainbox signupBx page create_box" id="signup" style="display:none">
                <div class="text">
                    <h2>Create account</h2>
                    <hr><br>
                </div>
                <form method="POST">
                    <div class="flex-container">
                        <div class="inputbox">
                            <input type="text" name="first_name" class="flex-item-left" required>
                            <span>Firstname</span>
                        </div>
                        <div class="inputbox">
                            <input type="text" name="last_name" class="flex-item-right" required>
                            <span>Lastname</span>
                        </div>
                    </div>
                    <div class="inputbox">
                        <input type="email" name="email" class="input-control" required>
                        <span>email</span>
                    </div>
                    <div class="flex-container">
                        <div class="inputbox">
                            <input type="number" name="phone_no" class="flex-item-left" required>
                            <span>Number</span>
                        </div>
                        <div class="inputbox">
                            <select name="gender" name="gender" class="flex-item-right" required>
                                <option value="">Please select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="inputbox">
                        <input type="text" name="dob" onfocus="(this.type='date')" placeholder="DOB" class="input-control" required>
                        <span class="dob">DOB</span>
                    </div>
                    <div class="inputbox">
                        <input type="password" name="password" class="input-control" required>
                        <span>Password</span>
                    </div>

                    <input type="submit" name="create" value="Create Account">
                    <p class="signup" style="margin-top: 10px;">Already have an account ? <a class="sidea1" href="#signin">Sign in.</a>
                    </p>

                </form>
            </div> -->
        </div>

    </section>

    <!-- <script>
        $(".sidea1").click(function(e) {
            e.preventDefault();
            $(".page").slideToggle();
            var toShow = $(this).attr('href');
            $(toShow).show();
        });
    </script> -->
</body>
<?php
// $first_name = $_POST['first_name'];
// $last_name = $_POST['last_name'];
// $email = $_POST['email'];
// $phone_no = $_POST['phone_no'];
// $gender = $_POST['gender'];
// $dob = $_POST['dob'];
// $password = $_POST['password'];
?>

</html>