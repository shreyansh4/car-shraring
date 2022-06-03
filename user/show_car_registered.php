<?php
session_start();

include_once("conn.php");

if ($_SESSION["email"]  == true) {
    // echo "your username is " . $_SESSION['email'] . "<br>";

    $query1 = "select * from login where email='$_SESSION[email]'";
    $result1 = mysqli_query($con, $query1);
    $row = mysqli_fetch_array($result1);
    $user_id = $row['user_id'];

    $query2 = "select * from car_register_info where user_id=$user_id";
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
    
            #registered #cssTable td {
                /* text-align: center; */
                vertical-align: middle;
                font-size: 18px;
                font-family: 'Amiri', serif;
                text-transform: capitalize;
            }

            #registered .center {
                margin-left: auto;
                margin-right: auto;
            }

            #registered .container-fluid .col-xl-12 h4 {
                font-family: 'Libre Baskerville', serif;
                font-family: 'Amiri', serif;
                font-size: 34px;
                text-transform: capitalize;
            }
        </style>
    </head>

    <body>
        <?php
        include_once("navbar2.php");
        ?>
        <style>

        </style>
        <section id="registered" class="registerd">
            <div class="container-fluid mt--6">
                <div class="col-xl-12">
                    <h4 class="ml-1">Registered car details</h4>
                    <div class="card">
                        <div class="table-responsive-xl" style="text-transform: capitalize;">
                            <table class="center table table-hover" id="cssTable" style="width: 100%; font-size: 15px;">
                                <thead style="background-color: #F6F9FC; ">
                                    <tr style="font-size: 16px; font-weight: 500;">
                                        <td scope="col">Index</td>
                                        <td scope="col">car no</td>
                                        <td scope="col">car name</td>
                                        <td scope="col">car details</td>
                                        <td scope="col">licence</td>
                                        <!-- <td scope="col">Edit</td> -->
                                        <td scope="col">Delete</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 0; $i < $rowcount2; $i++) {
                                        $row = mysqli_fetch_array($result2);
                                    ?>
                                        <tr>
                                            <td scope="row"><?php echo $i + 1 ?></td>
                                            <td><?php echo $row['car_no'] ?></td>
                                            <td><?php echo $row['car_name'] ?></td>
                                            <td><?php echo $row['car_details'] ?></td>
                                            <td><img src="<?php echo $row['licence'] ?>" height="150px" width="300px"></td>
                                            <!-- <td><a href="car_register?car_id=<?php //echo $row['car_id'] 
                                                                                    ?>"><button name="edit" class="btn btn-warning">Edit</button></a></td> -->
                                            <td><a href="delete.php?car_id=<?php echo $row['car_id'] ?> &amp; img_url=<?php echo $row['licence'] ?>"><button name="delete" class="btn btn-danger">Delete</button></a></td>

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