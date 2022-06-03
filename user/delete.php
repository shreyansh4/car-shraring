<?php
session_start();

include_once("conn.php");

if ($_SESSION["email"]  == true) {
    echo "your username is " . $_SESSION['email'] . "<br>";

    if (isset($_GET['car_share_id'])) {
        $query1 = "DELETE FROM `car_share_info` WHERE `car_share_id`=$_GET[car_share_id]";
        $result1 = mysqli_query($con, $query1);

        if (!$result1) {
            echo "<script> alert('MESSAGE: Your car is not delete')</script>";
            header('location:show_car_register_&_passenger.php');
        } else {
            header('location:show_car_register_&_passenger.php');
            echo "<script> alert('MESSAGE: Your car is succefully deleted')</script>";
        }
    }


    if (isset($_GET['car_id'])and isset($_GET['img_url']) ) {
        echo $car_id = $_GET['car_id'];
        echo $img_url=$_GET['img_url'];
       
        $query2 = "DELETE FROM `car_register_info` WHERE car_id=$car_id";
        $result2 = mysqli_query($con, $query2);

        if (!$result2) {
            echo "<script> alert('MESSAGE: Your car is not delete')</script>";
            header('location:show_car_registered.php');
        } else {
            unlink($img_url);
            header('location:show_car_registered.php');
            echo "<script> alert('MESSAGE: Your car is succefully deleted')</script>";
        }
    }


    if (isset($_GET['passen_id']) and isset($_GET['share_car_id']) and isset($_GET['book_seat'])) {
        echo $passen_id = $_GET['passen_id'];
        echo $share_car_id = $_GET['share_car_id'];
        echo $book_seat = $_GET['book_seat'];
        // $query4="SELECT car_share_id, SUM(book_seat) FROM car_passenger_info WHERE car_share_id=$share_car_id Group By car_share_id";

        $query3 = "DELETE FROM `car_passenger_info` WHERE passen_id=$passen_id";
        $result3 = mysqli_query($con, $query3);

        if (!$result3) {
            echo "<script> alert('MESSAGE: Your seat is not delete')</script>";
            header('location:show_car_book.php');
        } else {
            $query4 = "UPDATE `car_share_info` SET `free_seat`=`free_seat` + $book_seat WHERE `car_share_id`=$share_car_id";
            $result4 = mysqli_query($con, $query4);
            // if (!$result4) {
            //     echo "<script> alert('not update')</script>";
            // } else {
            //     echo "<script> alert('update')</script>";
            // }
            header('location:show_car_book.php');
            echo "<script> alert('MESSAGE: Your seat is succefully deleted')</script>";
        }
    }



?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Header</title>

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
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>

    <body>

    </body>

    </html>
<?php
} else {
    header('location:Final_signin_signup_module.php');
}
?>