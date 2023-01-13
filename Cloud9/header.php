<?php
session_start();
$_SESSION['adminId'] = true;
$_SESSION['adminUname'] = true;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200&display=swap" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
        <title>Online Flight Booking</title>          
        <link rel = "icon" href =  
            "../assets/images/brand.png" 
        type = "image/x-icon">          
    </head>
<style>
@font-face {
  font-family: 'product sans';
  src: url('assets/css/Product Sans Bold.ttf');
}
button.btn-outline-light:hover {
  color: cornflowerblue !important;
}
  .navbar-custom {
    /* background-color: #6495ED; */
    background-color: #3a3a3a;
    /* font-family: 'Bangers', cursive; */
    font-family: 'product sans', cursive;    
  }
  h4 {
    font-size: 23px !important;
  }
  
.table .thead-dark th{
  background-color: #316b83;
}
</style>
    <body>

        <nav class="navbar navbar-custom navbar-expand-lg navbar-dark bg-primary">
          <a class="navbar-brand text-light" href="all_flights.php"><h4>Cloud9 Airline</h4></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <?php if(isset($_SESSION['adminId'])) { ?>
                <ul class="navbar-nav mr-auto">

                  <li class="nav-item">
                    <a class="nav-link" href="all_flights.php">
                      <h5 class="ml-2"> Flights</h5>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="flight.php">
                      <h5>Create Flight</h5>
                    </a>
                  </li>   
                  <li class="nav-item">
                    <a class="nav-link" href="customer.php">
                      <h5>Customers</h5>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="payment.php">
                      <h5>Payment</h5>
                    </a>
                  </li>                                
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li class="nav-item  p-1 border-light ">
                      <a class="nav-link" href="">
                          <i class="ml-1 fa fa-user text-light"></i>
                          <span class="nav_link text-light"
                            style="font-size: 20px;">
                          <?php echo  $_SESSION['adminUname']; ?>
                          </span>
                      </a>
                  </li>            
                </ul>                 
            </div>
            <?php } ?>
        </nav>
