<?php include_once 'header.php'; ?>
<?php include_once 'footer.php';
require 'init_conn_db.php';?>
<style>
table {
  background-color: white;
}
h1 {
  margin-top: 20px;
  margin-bottom: 20px;
  font-family: 'product sans';  
  font-size: 50px !important; 
  font-weight: lighter;
}
body {
  background-color: #efefef;
}
th {
  font-size: 22px;
  /* font-weight: lighter; */
  /* font-family: 'Courier New', Courier, monospace; */
}
td {
  margin-top: 10px !important;
  font-size: 16px;
  font-weight: bold;
  font-family: 'Assistant', sans-serif !important;
}
</style>
    <main>
        <?php if(isset($_SESSION['adminId'])) { ?>
          <div class="container-md mt-2">
            <h1 class="display-4 text-center text-secondary"
              >Passenger List</h1>
            <table class="table table-bordered table-sm">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Customer ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Seat</th>
                  <th scope="col">Class</th>
                  <th scope="col">Transaction ID</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $flight_no = $_GET['flight_no'];
                $sql_t = "SELECT * FROM Ticket, Customer,Flight WHERE Ticket.flight_no='$flight_no' and Ticket.customer_ID = Customer.customer_ID and Ticket.flight_no = Flight.flight_no";
                $result_t = $conn->query($sql_t);
                while($row = mysqli_fetch_assoc($result_t)) {                  
                              echo "                  
                              <tr class='text-center'>
                                <td>".$row['customer_ID']."</td>
                                <td>".$row['first_name']."</td>
                                <td>".$row['last_name']."</td>
                                <td>".$row['seat_no']."</td>
                                <td>".$row['class_type']."</td>
                                <td>".$row['transaction_ID']."</td>

                              </tr>
                              "; 
                                               
                                        
                     }
                      
                ?>

              </tbody>
            </table>
          </div>
        <?php } ?>

    </main>
