 <?php
    session_start();
    include_once("conn.php");
    ?>
 <!-- <a href="logout.php">Logout</a> -->

 <!DOCTYPE html>
 <html>

 <head>
     <title>CAR SHARING</title>

     <!--============= META tag =============-->
     <meta name="viewport" content="width=device-width ,initial-scale=1.0">

     <!--============= Style Sheet =============-->
     <link rel="user/stylesheet" type="text/css" href="style.css">

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
     <script src="https://kit.fontawesome.com/0c04773b83.js" crossorigin="anonymous"></script>

 </head>

 <body>
     <!--============================================================== -->
     <!--======================== HEADER ============================== -->

     <?php
        include_once("navbar2.php");
        ?>

     <section class="page" id="home">
         <header>
             <section class="" id="header">
                 <div class="container">
                     <div class="content-row">
                         <div class="left-col">
                             <hr>
                             <h1>Search your destination with your favourite car </h1>
                             <p>Choose your destination with your favourite car with your on
                                 budget and as per situation and enjoy your journey
                             </p>
                             <div class="indicator">
                                 <button class="more">More</button>
                             </div>
                         </div>
                         <div class="right-col">
                             <img width="100px" height="100px" src="../images/3339154.jpg">
                         </div>
                     </div>
                 </div>
         </header>
     </section>

     <!--======================== HEADER END ============================== -->

     <!--======================== CONTENT ============================== -->
     <section class="" id="content">
         <div class="container">
             <div class="row">
                 <div class="col-md-6">
                     <img src="../images/8724.jpg" alt="" class="w-100" />
                 </div>
                 <div class="col-md-6">
                     <div class="row align-items-left h-100">
                         <div class="col">
                             <h1 style="color: black;">Find a ride</h1>
                             <p class="lead">You can search car in your city and you can
                                 reach
                                 your destination city
                                 <br /><br />
                                 <a href="car_search2.php"><button class="btn-cmn content-search">Find a ride</button></a>
                             </p>
                         </div>
                     </div>
                 </div>
             </div>
             <br>
             <br>
             <div class="row">
                 <div class="col-md-6 order-md-2">
                     <img src="../images/3411096.jpg" alt="" class="w-100" />
                 </div>
                 <div class="col-md-6 order-md-1 ">
                     <div class="row align-items-center h-100">
                         <div class="col">
                             <h1 style="color: black;">Register Car</h1>
                             <p class="lead">You can register your car in your city and you pick any person of different requirements with person fees
                                 <br /><br />
                                 <a href="car_register_maiin_page.php"><button class="btn-cmn content-registar">Registar Car</button></a>
                             </p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     </section>


     <?php
        include_once("footer.php")
        ?>
     <!--======================== CONTENT END ========================= -->
     <!--============================================================== -->

     <!--============================================================== -->
     <!--======================== SERVICES ============================ -->


     <!--======================== SERVICES END ======================== -->
     <!--============================================================== -->


     <!--============================================================== -->
     <!--======================== FEEDBACK ============================ -->

     <!--======================== FEEDBACK END========================= -->
     <!--============================================================== -->

     <!--============================================================== -->
     <!--======================== FOOTER ============================== -->


     <!--======================== FOOTER END ========================== -->
     <!--============================================================== -->
 </body>

 </html>