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
        <h2 class="display-4 text-center text-secondary">List of Transaction</h2>
        <a class="btn btn-primary" href ="/Cloud9/create.php" role = "button">New Transaction</a>
        <br>
        <table class = "table table-sm table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM Payment";
                $result = $conn->query($sql);

                while ($row = $result-> fetch_assoc()) {
                    echo "
                    <tr class = 'text-center'>
                    <td><a href='ticket.php?transaction_ID=".$row['transaction_ID']."'>".$row['transaction_ID']."</a></td>
                    <td>$row[payment_mode]</td>
                    <td>$row[price]</td>

                    <td><a class= 'btn btn-primary btn-sm' href='/Cloud9/edit.php?transaction_ID=$row[transaction_ID]'>Edit</a></td>
                    <td><a class= 'btn btn-danger btn-sm' href='/Cloud9/delete.php?transaction_ID=$row[transaction_ID]'>Delete</a></td>
                </tr>";
                }
                ?>
 
            </tbody>

        </table>

    </div>
</body>
</html>