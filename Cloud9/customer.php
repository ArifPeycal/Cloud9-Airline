<?php include_once 'header.php'; require 'init_conn_db.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cloud 9</title>
</head>
<style>
    table {
  background-color: white;
    }
    h2 {
        margin-top: 20px;
          margin-bottom: 20px;
         font-family: 'product sans';  
         font-size: 45px !important; 
         font-weight: lighter;
    }
    a:hover {
  text-decoration: none;
}
    body {
  /* background-color: #B0E2FF; */
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
<body>
  
    <div class="container-md mt-2">
        <h2 class="display-4 text-center text-secondary">List of Customers</h2>
        <a class="btn btn-primary" href ="/Cloud9/create.php" role = "button">New Client</a>
        <br>
        <table class = "table table-sm table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Mobile No</th>
                    <th scope = "col">Flight No</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT c.*, t.flight_no FROM Customer c left join Ticket t ON c.customer_ID = t.customer_ID";
                $result = $conn->query($sql);

                while ($row = $result-> fetch_assoc()) {
                    echo "
                    <tr class = 'text-center'>
                    <td><a href='ticket.php?customer_ID=".$row['customer_ID']."'>".$row['customer_ID']."</a></td>
                    <td>$row[first_name]</td>
                    <td>$row[last_name]</td>
                    <td>$row[age]</td>
                    <td>$row[mobile_no]</td>
                    <td>$row[flight_no]</td>

                    <td><a class= 'btn btn-primary btn-sm' href='/Cloud9/edit.php?customer_ID=$row[customer_ID]'>Edit</a></td>
                    <td><a class= 'btn btn-danger btn-sm' href='/Cloud9/delete.php?customer_ID=$row[customer_ID]'>Delete</a></td>
                </tr>";
                }
                ?>
 
            </tbody>

        </table>

    </div>
</body>
</html>