<?php

include_once("conn.php");

if (isset($_SESSION['email'])) {
    // echo "your username is " . $_SESSION['email'] . "<br>";
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
<!-- <a href="logout.php">Logout</a> -->

<!DOCTYPE html>
<html>

<head>
    <title>Header</title>

    <!--============= META tag =============-->
    <meta name="viewport" content="width=device-width ,initial-scale=1.0">
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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


</head>

<body>
    <!-- <header> -->
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Shreyansh</label>
        <ul class="nav-ul">
            <li class="nav-li"><a class="sidea1" href="index.php">Home</a></li>
            <li class="nav-li"><a class="sidea1" href="services.php">Services</a></li>
            <li class="nav-li"><a class="sidea1" href="feedback.php">Feedback</a></li>
            <li class="nav-li visitor"><a class="sidea1" href="final_signin_signup_module.php">LogIN</a></li>
            <!-- <li class="nav-li"><a class="sidea1" href="#">About</a></li> -->
            <li class="nav-li user">
                <div class="btn-group">
                    <button type="button" style="width: max-content;" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['email']; ?>
                    </button>
                    <div class="dropdown-menu">
                        <a style="color: black" class="dropdown-item" href="car_register_maiin_page.php">Car registar & share car</a>
                        <a style="color: black" class="dropdown-item" href="show_car_book.php">Booked Car</a>
                        <a style="color: black" class="dropdown-item" href="show_car_register_&_passenger.php">passenger of car</a>
                        <div class="dropdown-divider"></div>
                        <a style="color: black" class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <!-- </header> -->


    <!-- <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                if (scroll > 300) {
                    $("nav").css("background", "#32d8bc");
                }

                else {
                    $("nav").css("background", "#0082e6");
                }
            })
        })
    </script> -->
</body>

</html>

<?php

?>