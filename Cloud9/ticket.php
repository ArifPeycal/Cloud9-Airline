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
              >Ticket</h1>
              <a class="btn btn-primary" href ='/Cloud9/add_ticket.php' role = "button">Add Transaction</a>
        <br>
            <table class="table table-bordered table-sm">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Customer ID</th>
                  <th scope="col">From</th>
                  <th scope="col">To</th>
                  <th scope="col">Seat</th>
                  <th scope="col">Class</th>
                  <th scope="col">Transaction ID</th>
                  <th scope="col">Price (RM)</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $customer_ID = $_GET['customer_ID'];
                $sql_t = "SELECT * FROM Customer c, Ticket t, Payment p, Flight f WHERE c.customer_ID='$customer_ID' and c.customer_ID = t.customer_ID and t.transaction_ID = p.transaction_ID and t.flight_no = f.flight_no";
                $result_t = $conn->query($sql_t);
                while($row = mysqli_fetch_assoc($result_t)) {                  
                              echo "                  
                              <tr class='text-center'>
                                <td>".$row['customer_ID']."</td>
                                <td>".$row['departure']."</td>
                                <td>".$row['arrival']."</td>
                                <td>".$row['seat_no']."</td>
                                <td>".$row['class_type']."</td>
                                <td>".$row['transaction_ID']."</td>
                                <td>".$row['price']."</td>
                                <td><a class= 'btn btn-primary btn-sm' href='edit_ticket.php?customer_ID=$row[customer_ID]'>Edit</a></td>

                              </tr>
                              "; 
                     }  
                ?>
              </tbody>
            </table>
          </div>
        <?php } ?>
    </main>
