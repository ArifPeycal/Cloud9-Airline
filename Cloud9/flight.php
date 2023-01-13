<?php include_once 'header.php'; ?>
<?php include_once 'footer.php'; ?>
<?php require 'init_conn_db.php'; ?>

<link rel="stylesheet" href="assets/css/flight_form.css">
<link rel="stylesheet" href="assets/css/form.css">

<?php if(isset($_SESSION['adminId'])) { ?>

<style>
  input {
    border :0px !important;
    border-bottom: 2px solid #5c5c5c !important;
    /* color :cornflowerblue !important; */
    border-radius: 0px !important;
    font-weight: bold !important;
    background-color: whitesmoke !important;    
  }
  *:focus {
    outline: none !important;
  }
  label {
    /* color : #79BAEC !important; */
    color: #5c5c5c !important;
    font-size: 19px;
  }
  h5.form-name {
    /* color: cornflowerblue; */
    font-family: 'product sans'; */
    font-weight: 50;
    margin-bottom: 0px !important;
    margin-top: 10px;
  }
  h1 {
    font-size: 45px !important;
    font-family: 'product sans';  
    margin-bottom: 20px;  
  }
  body {
    /* padding-top: 20px; */
     background-image: url('assets/images/bg5.jpg'); */
    background-color: #efefef;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;     */
  }
  div.form-out {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
    background-color: whitesmoke !important;
    padding: 40px;
    margin-top: 30px;
  }
  .input-group {
    font-weight : bold;
  }
  @media screen and (max-width: 900px){
    body {
      background-color: lightblue;
      background-image: none;
    }
    div.form-out {
    padding: 20px;
    background-color: none !important;
    margin-top: 20px;
  }   
}  
</style>
<main>
<div class="container mt-0">
  <div class="row">
    <?php
    if(isset($_GET['error'])) {
        if($_GET['error'] === 'destless') {
            echo "<script>alert('Dest. date/time is less than src.');</script>";
        } else if($_GET['error'] === 'sqlerr') {
          echo "<script>alert('Database error');</script>";
        } else if($_GET['error'] === 'same') {
          echo "<script>alert('Same city specified in source and destination');</script>";
        }
    }
    ?>
    <div class="bg-light form-out col-md-12">
    <h1 class="text-secondary text-center">ADD FLIGHT DETAILS</h1>

    <form method="POST" class=" text-center" action="flight.inc.php">

      <div class="form-row mb-4">
        <div class="col-md-3 p-0">
            <h5 class="mb-0 form-name">DEPARTURE</h5>
        </div>
        <div class="col">           
            <input type="date" name = "source_date" class="form-control"
            required >
        </div>
        <div class="col">         
            <input type="time" name = "source_time" class="form-control"
              required >
        </div>
      </div>


      <div class="form-row mb-4">
        <div class="col-md-3 ">
            <h5 class="form-name mb-0">ARRIVAL</h5>
        </div>          
        <div class="col">
            <input type="date" name = "dest_date" class="form-control"
            required >
        </div>
        <div class="col">
            <input type="time" name = "dest_time" class="form-control"
            required >
        </div>
      </div>

      <div class="form-row mb-4">
        <div class="col">                
              <select class="mt-4" name="dep_city" style="border: 0px; border-bottom: 
              2px solid #5c5c5c; background-color: whitesmoke !important;
              font-weight: bold !important;
              width:80%">
              <option selected>From</option>';
              <option value = 'Kuala Lumpur'>Kuala Lumpur</option>";
              <option value = 'Kota Kinabalu'>Kota Kinabalu</option>";
              <option value = 'London'>London</option>";
              <option value = 'Seoul'>Seoul</option>";
            }
            </select>             
        </div>
        <div class="col">
              <select class="mt-4" name="arr_city" style="border: 0px; border-bottom: 
                2px solid #5c5c5c; background-color: whitesmoke !important;
                font-weight: bold !important;
                width:80%">
                
                <option selected>To</option>';
                <option value = 'Kuala Lumpur'>Kuala Lumpur</option>";
                <option value = 'Kota Kinabalu'>Kota Kinabalu</option>";
                <option value = 'London'>London</option>";
                <option value = 'Seoul'>Seoul</option>";
              }
              </select>                
          </div>
        </div>
        <div class="form-row mb-4">           
          <div class="col">
            <div class="input-group">
                <label for="flight_no">Flight No</label>
                <input type="text" style="border: 0px; border-bottom: 2px solid #5c5c5c; width : 20%;" 
                  name="flight_no" id="flight_no" required />
            </div>            
        </div>
        <div class="col">
            <div class="input-group">
                <label for="available_seat">Seat</label>
                <input type="number" style="border: 0px; border-bottom: 2px solid #5c5c5c; width : 20%;" 
                  name="available_seat" id="available_seat" required />
          </div>            
        </div>          
      </div>              

        <button name="flight_but" type="submit" 
          class="btn btn-success mt-5">
          <div style="font-size: 1.5rem;">
          <i class="fa fa-lg fa-arrow-right"></i> Proceed
          </div>
        </button>
    </form>
    </div>
  </div>
</div>
</main>
<script>
$(document).ready(function(){
  $('.input-group input').focus(function(){
    me = $(this) ;
    $("label[for='"+me.attr('id')+"']").addClass("animate-label");
  }) ;
  $('.input-group input').blur(function(){
    me = $(this) ;
    if ( me.val() == ""){
      $("label[for='"+me.attr('id')+"']").removeClass("animate-label");
    }
  }) ;
});
</script>
<?php } ?>
