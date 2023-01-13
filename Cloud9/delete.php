<?php 
require 'init_conn_db.php';?>

<?php

        if (!isset($_GET["customer_ID"])) {
            header("Location: customer.php");
            exit;
        }
        else {
            $customer_ID = $_GET["customer_ID"];
            $sql = "DELETE FROM Customer WHERE customer_ID = $customer_ID";
            $result = $conn->query($sql);

        }
        header("Location: customer.php");
        exit;

                                      
?>