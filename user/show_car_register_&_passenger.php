<?php
session_start();

include_once("conn.php");
if ($_SESSION["email"]  == true) {
    // echo "your username is " . $_SESSION['email'] . "<br>";

    $query1 = "select * from login where email='$_SESSION[email]'";
    $result1 = mysqli_query($con, $query1);
    $row = mysqli_fetch_array($result1);
    $user_id = $row['user_id'];

    $query2 = "select * from car_share_info where user_id=$user_id";
    $result2 = mysqli_query($con, $query2);
    $rowcount2 = mysqli_num_rows($result2);


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
            #show-car-passenger td{
                font-size: 20px;
            }
            #show-car-passenger button{
                text-transform: capitalize;
            }
        </style>
    </head>

    <body>
        <?php
        include_once("navbar2.php");
        ?>
        <!-- <h1>car details</h1> -->
        <section class="show-car-passenger" id="show-car-passenger">
            <div class="container-fluid mt--6">
                <div class="col-xl-12 card">
                    <div class="table-responsive-xl" style="text-transform: capitalize;">
                        <div class="border-1">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="ml-1">your share car with passenger</h4>
                                </div>
                            </div>
                        </div>
                        <table class="center table table-hover" id="cssTable" style="width: 100%; font-size: 15px;">
                            <thead style="background-color: #F6F9FC; ">
                                <tr style="font-size: 16px; font-weight: 500;">
                                    <th scope="col">Source</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">start date</th>
                                    <th scope="col">stop date</th>
                                    <th scope="col">More details</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < $rowcount2; $i++) {
                                    $row = mysqli_fetch_array($result2);
                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $row['source'] ?></th>
                                        <td><?php echo $row['destination'] ?></td>
                                        <td><?php echo $row['start_date'] ?></td>
                                        <td><?php echo $row['stop_date'] ?></td>
                                        <td><a href="show_car_passenger.php?car_share_id=<?php echo $row['car_share_id'] ?>  &amp; car_id=<?php echo $row['car_id'] ?>"><button class="btn btn-primary">car passenger & more details</button></a></td>
                                        <td><a href="car_share.php?car_share_id=<?php echo $row['car_share_id'] ?>"><button class="btn btn-warning">Edit</button></a></td>
                                        <td><a href="delete.php?car_share_id=<?php echo $row['car_share_id'] ?>"><button class="btn btn-danger">Delete</button></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
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