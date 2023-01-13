
<?php 
require 'init_conn_db.php';?>
<?php
    $customer_ID = "";
    $flight_no = "";
    $departure = "";
    $arrival = "";
    $seat_no ="";
    $class_type = "";
    $transaction_ID = "";
    $price = "";

    $errorMessage = "";
    $successMessage = "";

    if ( $_SERVER['REQUEST_METHOD'] == 'POST') {

        $customer_ID = $_POST["customer_ID"];
        $flight_no = $_POST["flight_no"];
        $departure = $_POST["departure"];
        $arrival = $_POST["arrival"];
        $seat_no =$_POST["seat_no"];
        $class_type = $_POST["class_type"];
        $transaction_ID = $_POST["transaction_ID"];
        $price = $_POST["price"];

    
    do {
        if (empty($customer_ID) || empty($transaction_ID)){
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "INSERT INTO Ticket (customer_ID, flight_no,transaction_ID,seat_no,class_type)" . "VALUES ('$customer_ID','$flight_no','$transaction_ID','$seat_no','$class_type')";
        $result = $conn->query($sql);


        if (!$result) {
            $errorMessage = "Invalid Query" . $conn->error;
            break;
        }
        $payment_method = "";
        $price = "";

        header("Location: ticket.php");
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
    <h2>New Ticket</h2>
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
        <div class = "row mb-3">
            <label class= "col-sm-3 col-form-label" name = "customer_ID"></label>
            <div class= "col-sm-6">
                <h5>Customer ID</h5>
                <input type="number" class= "form-control" name= "customer_ID" value = "<?php echo $customer_ID; ?>">
            </div>
        </div>
        <div class = "row mb-3">
            <label class= "col-sm-3 col-form-label" name = "flight_no"></label>
            <div class= "col-sm-6">
                <h5>Flight No</h5>
                <input type="text" class= "form-control" name= "flight_no" value = "<?php echo $flight_no; ?>">
            </div>
        </div>
        <div class = "row mb-3">
            <label class= "col-sm-3 col-form-label" name = "seat_no"></label>
            <div class= "col-sm-6">
                <h5>Seat No</h5>
                <input type="text" class= "form-control" name= "seat_no" value = "<?php echo $seat_no; ?>">
            </div>
        </div>
        <div class = "row mb-3">
            <label class= "col-sm-3 col-form-label" name = "class_type"></label>
            <div class= "col-sm-6">
                <h5>Class</h5>
                <input type="text" class= "form-control" name= "class_type" value = "<?php echo $class_type; ?>">
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
            <a class = "btn btn-outline-primary" href="/Cloud9/ticket.php" role = "button">Cancel</a>
          </div>
        </div>

    </form>
</div>
<body>
    
</body>
</html>