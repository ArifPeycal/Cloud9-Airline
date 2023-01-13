<?php include_once 'header.php'; ?>
<?php include_once 'footer.php';
require 'init_conn_db.php';?>
<?php
if(isset($_POST['del_flight']) and isset($_SESSION['adminId'])) {
  $flight_no = $_POST['flight_no'];
  $sql = "DELETE FROM Flight WHERE flight_no= '$flight_no'";
  $stmt = mysqli_stmt_init($conn);
  $result = $conn->query($sql);

  header("Location: all_flights.php");
  exit;
}

?>

<style>
table {
  background-color: white;
}
h1 {
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
    <main>
        <?php if(isset($_SESSION['adminId']))  ?>
          <div class="container-md mt-2">
            <h1 class="display-4 text-center text-secondary"
              >FLIGHT LIST</h1>
            <table class="table table-sm table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Flight No</th>
                  <th scope="col">From</th>
                  <th scope="col">To</th>
                  <th scope="col">Departure</th>
                  <th scope="col">Arrival</th>
                  <th scope="col">Seats</th>

                </tr>
              </thead>
              <tbody>
                
                <?php
                $sql = 'SELECT * FROM Flight ORDER BY dep_time asc';
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt,$sql);                
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "
                  <tr class='text-center'>                  
                    <td scope='row'><a href='pass_list.php?flight_no=".$row['flight_no']."'>".$row['flight_no']." </a> </td>
                    <td>".$row['departure']."</td>
                    <td>".$row['arrival']."</td>
                    <td>".$row['dep_time']."</td>
                    <td>".$row['arr_time']."</td>
                    <td>".$row['available_seat']."</td>
                    <td>
                    <form action='all_flights.php' method='post'>
                      <input name='flight_no' type='hidden' value=".$row['flight_no'].">
                      <button  class='btn' type='submit' name='del_flight'>
                      <i class='text-danger fa fa-trash'></i></button>
                    </form>
                    </td>                  
                  </tr>
                  ";
                }
                ?>

              </tbody>
            </table>

          </div>

    </main>
	
