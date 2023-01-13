
<?php 
require 'init_conn_db.php';?>
<?php
    $customer_ID = "";
    $fname = "";
    $lname = "";
    $age = "";
    $mobile = "";

    $errorMessage = "";
    $successMessage = "";


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if (!isset($_GET["customer_ID"])) {
            header("Location: customer.php");
            exit;
        }
        $customer_ID = $_GET["customer_ID"];
        $sql = "SELECT * FROM Customer WHERE customer_ID = $customer_ID";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();                                    

        if (!$row) {
            header("Location: customer.php");
            exit;
        }

        $fname = $row["first_name"];
        $lname = $row["last_name"];
        $age = $row["age"];
        $mobile = $row["mobile_no"];
    }
    else {

        $customer_ID = $_POST["customer_ID"];
        $fname = $_POST["first_name"];
        $lname = $_POST["last_name"];
        $age = $_POST["age"];
        $mobile = $_POST["mobile_no"];

        do {
            if (empty($customer_ID) || empty($fname) || empty($lname) || empty($age) || empty($mobile) ){
                $errorMessage = "All the fields are required";
                break;
            }

            $sql = "UPDATE Customer " . 
                    "SET first_name = '$fname', last_name = '$lname', age = $age, mobile_no = '$mobile' " . 
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
            <label class= "col-sm-3 col-form-label" name = "first_name"></label>
            <div class= "col-sm-6">
                <h5>First name</h5>
                <input type="text" class= "form-control" name= "first_name" value = "<?php echo $fname; ?>">
            </div>
        </div>
        <div class = "row mb-3">
            <label class= "col-sm-3 col-form-label" name = "last_name"></label>
            <div class= "col-sm-6">
                <h5>Last Name</h5>
                <input type="text" class= "form-control" name= "last_name" value = "<?php echo $lname; ?>">
            </div>
        </div>
        <div class = "row mb-3">
            <label class= "col-sm-3 col-form-label" name = "age"></label>
            <div class= "col-sm-6">
                <h5>Age</h5>
                <input type="number" class= "form-control" name= "age" value = "<?php echo $age; ?>">
            </div>
        </div>
        <div class = "row mb-3">
            <label class= "col-sm-3 col-form-label" name = "mobile_no"></label>
            <div class= "col-sm-6">
                <h5>Mobile No</h5>
                <input type="text" class= "form-control" name= "mobile_no" value = "<?php echo $mobile; ?>">
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