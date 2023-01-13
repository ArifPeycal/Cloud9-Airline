
<?php 
require 'init_conn_db.php';?>
<?php
    $customer_ID = "";
    $flight_no = "";
    $transaction_ID = "";


    $errorMessage = "";
    $successMessage = "";


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if (!isset($_GET["customer_ID"])) {
            header("Location: customer.php");
            exit;
        }
        $customer_ID = $_GET["customer_ID"];
        $sql = "SELECT * FROM Customer c, Ticket t, Payment p, Flight f WHERE c.customer_ID='$customer_ID' and c.customer_ID = t.customer_ID and t.transaction_ID = p.transaction_ID and t.flight_no = f.flight_no";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();                                    

        if (!$row) {
            header("Location: customer.php");
            exit;
        }
        $customer_ID = $row["customer_ID"];
        $flight_no = $row["flight_no"];
        $transaction_ID = $row["transaction_ID"];
    }
    else {

        $customer_ID = $_POST["customer_ID"];
        $flight_no = $_POST["flight_no"];
        $transaction_ID = $_POST["transaction_ID"];

        do {
            if (empty($customer_ID) || empty($flight_no) || empty($transaction_ID) ){
                $errorMessage = "All the fields are required";
                break;
            }

            $sql = "UPDATE Ticket " . 
                    "SET flight_no = '$flight_no', transaction_ID = $transaction_ID " . 
                    "WHERE customer_ID = $customer_ID";
            $result = $conn->query($sql);
    
            if (!$result) {
                $errorMessage = "Invalid Query" . $conn->error;
                break;
            }
            $fname = "";
            $lname = "";
            $age = "";
            $mobile = "";
    
            header("Location: customer.php");
            exit;
    
        } while (false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Create</title>
</head>
<div class= 'container my-5'> 
    <h2>Edit Customer Information</h2><br>
    <?php
    if (!empty($errorMessage)) {
        echo "
        <div class = 'alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$errorMessage</strong>
        <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button>
        </div>
        ";
    }
    ?>
    <form method="POST">
        <input type="hidden" name = "customer_ID" value = "<?php echo $customer_ID; ?>">
        <div class = "row mb-3">
            <label class= "col-sm-3 col-form-label" name = "flight_no"></label>
            <div class= "col-sm-6">
                <h5>Flight No</h5>
                <input type="text" class= "form-control" name= "flight_no" value = "<?php echo $flight_no; ?>">
            </div>
        </div>
        <div class = "row mb-3">
            <label class= "col-sm-3 col-form-label" name = "transaction_ID"></label>
            <div class= "col-sm-6">
                <h5>Transaction ID</h5>
                <input type="number" class= "form-control" name= "transaction_ID" value = "<?php echo $transaction_ID; ?>">
            </div>
        </div>


        <?php
        if (!empty($successMessage)) {
            echo "
            <div class = 'row mb-3'>
                <div class = 'offset-sm-3 col-sm-6'>
                    <div class = 'alert alert-success alert-dismissible fade show' role='alert'><strong>$errorMessage</strong>
                    <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = Close'></button>
                    </div>
                </div>
            </div>
            ";
            
        }
        ?>
        <div class = "row mb-3">
          <div class = "offset-sm-3 col-sm-3 d-grid">
            <button type = "submit" class="btn btn-primary">Submit</button>
          </div>
          <div class= "col-sm-3 d-grid">
            <a class = "btn btn-outline-primary" href="/Cloud9/customer.php" role = "button">Cancel</a>
          </div>
        </div>

    </form>
</div>
<body>
    
</body>
</html>