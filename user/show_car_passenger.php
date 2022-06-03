<?php
session_start();

include_once("conn.php");
if ($_SESSION["email"]  == true) {
    // echo "your username is " . $_SESSION['email'] . "<br>";

    $query1 = "select * from login where email='$_SESSION[email]'";
    $result1 = mysqli_query($con, $query1);
    $row = mysqli_fetch_array($result1);
    $user_id = $row['user_id'];

    if (isset($_GET['car_share_id']) && isset($_GET['car_id'])) {
        $car_share_id = $_GET['car_share_id'];
        $car_id = $_GET['car_id'];
        // echo "<br>car_share_id: " . $car_share_id;
        // echo "<br>car_id: " . $car_id;
    }

    $query2 = "select * from car_register_info where car_id=$car_id";
    $result2 = mysqli_query($con, $query2);
    $rowcount2 = mysqli_num_rows($result2);
    $query4 = "select * from `car_passenger_info` where car_id=$car_id";
    $result5 = mysqli_query($con, $query4);
    $rowcount4 = mysqli_num_rows($result5);
    // $query3 = "SELECT * FROM `login` WHERE `user_id` IN (select `user_id` from `car_passenger_info` where car_id=$car_id)";
    // $result3 = mysqli_query($con, $query3);
    // $rowcount3 = mysqli_num_rows($result3);
    // echo "<br>".$rowcount3;
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
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Amiri&display=swap,Arvo&family=Libre+Baskerville&display=swap,Rokkitt:wght@600&display=swap,Amiri&display=swap');

            * {
                font-family: 'Amiri', serif;
            }

            #show-car-passenger-more-details td {
                font-size: 20px;
                text-transform: capitalize;
            }
        </style>
    </head>

    <body>
        <section id="show-car-passenger-more-details" class="show-car-passenger-more-details">
            <div class="container-fluid mt--6" style="text-transform: capitalize;">
                <div class="col-xl-12">
                    <div class="card">
                        <div class=" border-1">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="m-2">car details</h4>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive-xl" style="text-transform: capitalize;">
                            <table class="center table table-hover" id="cssTable" style="width: 100%; font-size: 15px;">
                                <thead style="background-color: #F6F9FC; ">
                                    <tr style="font-size: 16px; font-weight: 500;">
                                        <th scope="col">car no</th>
                                        <th scope="col">car name</th>
                                        <th scope="col">car details</th>
                                        <th scope="col">licence</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < $rowcount2; $i++) {
                                        $row1 = mysqli_fetch_array($result2);
                                    ?>
                                        <tr>
                                            <td><?php echo $row1['car_no'] ?></td>
                                            <td><?php echo $row1['car_name'] ?></td>
                                            <td><?php echo $row1['car_details'] ?></td>
                                            <td><img src="<?php echo $row1['licence'] ?>" height="150px" width="300px"></td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </tbody>
                            </table>

                            <div class=" border-1">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="m-2">car passenger details</h4>
                                    </div>
                                </div>
                            </div>
                            <table class="center table table-hover" id="cssTable" style="width: 100%; font-size: 15px;">
                                <thead style="background-color: #F6F9FC; ">
                                    <tr style="font-size: 16px; font-weight: 500;">
                                        <th scope="col">first name</th>
                                        <th scope="col">last name</th>
                                        <th scope="col">email</th>
                                        <th scope="col">gender</th>
                                        <th scope="col">phone no</th>
                                        <th scope="col">date of birth</th>
                                        <th scope="col">book seat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < $rowcount4; $i++) {
                                        $row4 = mysqli_fetch_array($result5);
                                        $user_id = $row4['user_id'];
                                        $query5 = "select * from `login` where user_id=$user_id";
                                        $result6 = mysqli_query($con, $query5);
                                        $row5 = mysqli_fetch_array($result6);
                                    ?>
                                        <tr>
                                            <td><?php echo $row5['first_name'] ?></td>
                                            <td><?php echo $row5['last_name'] ?></td>
                                            <td><?php echo $row5['email'] ?></td>
                                            <td><?php echo $row5['gender'] ?></td>
                                            <td><?php echo $row5['phone_no'] ?></td>
                                            <td><?php echo $row5['DOB'] ?></td>
                                            <td><?php echo $row4['book_seat'] ?></td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
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