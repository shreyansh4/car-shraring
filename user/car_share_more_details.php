<?php
session_start();

include_once("conn.php");

if ($_SESSION["email"]  == true) {
    // extract($_POST);
    // echo "your username is " . $_SESSION['email'] . "<br>";

    if (isset($_GET['car_id']) &&  isset($_GET['user_id']) &&  isset($_GET['car_share_id'])) {
        $user_id = $_GET['user_id'];
        $car_id = $_GET['car_id'];
        $car_share_id = $_GET['car_share_id'];
        // $car_id = $_GET['car'];
        // echo "<br>user_id: " . $user_id;
        // echo "<br>car_id: " . $car_id;
        // echo "<br>car_share_id: " . $car_share_id;
        // echo $car_id;
        $query1 = "select * from login where user_id=$user_id";
        $result1 = mysqli_query($con, $query1);
        $rowcount1 = mysqli_num_rows($result1);

        $query2 = "select * from car_register_info where car_id=$car_id";
        $result2 = mysqli_query($con, $query2);
        $rowcount2 = mysqli_num_rows($result2);

        $query3 = "select * from car_share_info where car_share_id=$car_share_id";
        $result3 = mysqli_query($con, $query3);
        $rowcount3 = mysqli_num_rows($result3);
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
            #car_more_details{
                text-transform: capitalize;
                font-family: 'Amiri', serif;
            }
            #car_more_details tr{
                font-size: 18px;
            }
           
        </style>
    </head>

    <body>
        <section id="car_more_details" class="car_more_details">
            <div class="container-fluid mt--6" style="text-transform: capitalize;">
                <div class="col-xl-12">
                    <div class="card">
                        <div class=" border-1">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="m-2">car owner details</h4>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive-xl" style="text-transform: capitalize;">
                            <!-- <h3 class="ml-1">car owner details</h3> -->
                            <table class="center table table-hover" id="cssTable" style="width: 100%; font-size: 15px;">
                                <thead style="background-color: #F6F9FC; ">
                                    <tr style="font-weight: 500;">
                                        <th scope="col">first name</th>
                                        <th scope="col">last name</th>
                                        <th scope="col">email</th>
                                        <th scope="col">gender</th>
                                        <th scope="col">phone no</th>
                                        <th scope="col">dob</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < $rowcount1; $i++) {
                                        $row = mysqli_fetch_array($result1);
                                    ?>
                                        <tr>
                                            <td><?php echo $row['first_name'] ?></td>
                                            <td><?php echo $row['last_name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['gender'] ?></td>
                                            <td><?php echo $row['phone_no'] ?></td>
                                            <td><?php echo $row['DOB'] ?></td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </tbody>
                            </table>

                            <div class="border-1">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="m-2">car details</h4>
                                    </div>
                                </div>
                            </div>
                            <table class="center table table-hover" id="cssTable" style="width: 100%; font-size: 15px;">
                                <thead style="background-color: #F6F9FC; ">
                                    <tr style="font-weight: 500;">
                                        <th scope="col">car no</th>
                                        <th scope="col">car name</th>
                                        <th scope="col">car details</th>
                                        <th scope="col">licence</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < $rowcount2; $i++) {
                                        $row = mysqli_fetch_array($result2);
                                    ?>
                                        <tr>
                                            <td><?php echo $row['car_no'] ?></td>
                                            <td><?php echo $row['car_details'] ?></td>
                                            <td><?php echo $row['car_name'] ?></td>
                                            <td><img src="<?php echo $row['licence'] ?>" height="150px" width="300px"></td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </tbody>
                            </table>


                            <div class="border-1">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="m-2">car share details</h4>
                                    </div>
                                </div>
                            </div>
                            <table class="center table table-hover" id="cssTable" style="width: 100%; font-size: 15px;">
                                <thead style="background-color: #F6F9FC; ">
                                    <tr style="font-weight: 500;">
                                        <th scope="col">Source</th>
                                        <th scope="col">Destination</th>
                                        <th scope="col">route</th>
                                        <th scope="col">free seat</th>
                                        <th scope="col">start at</th>
                                        <th scope="col">stop at</th>
                                        <th scope="col">start date</th>
                                        <th scope="col">stop date</th>
                                        <th scope="col">rent</th>
                                        <th scope="col">Car info</th>
                                        <th scope="col">Loaction</th>
                                        <th scope="col">other info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < $rowcount3; $i++) {
                                        $row = mysqli_fetch_array($result3);
                                    ?>
                                        <tr>
                                            <td><?php echo $row['source'] ?></td>
                                            <td><?php echo $row['destination'] ?></td>
                                            <td><?php echo $row['route'] ?></td>
                                            <td><?php echo $row['free_seat'] ?></td>
                                            <td><?php echo $row['start_time'] ?></td>
                                            <td><?php echo $row['stop_time'] ?></td>
                                            <td><?php echo $row['start_date'] ?></td>
                                            <td><?php echo $row['stop_date'] ?></td>
                                            <td><?php echo $row['rent'] ?></td>
                                            <td><?php echo $row['ac_non_ac'] ?></td>
                                            <td><?php echo $row['location'] ?></td>
                                            <td><?php echo $row['other_info'] ?></td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="car_book.php?source=<?php echo $row['source']; ?> &amp; destination=<?php echo $row['destination'] ?>&amp; car_id=<?php echo $row['car_id'] ?>&amp; car_share_id=<?php echo $row['car_share_id'] ?>&amp; car_owner_id=<?php echo $row['user_id'] ?>"><button class="btn btn-primary btn-block mb-5" style="font-size: 25px;">Book car</button></a>
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