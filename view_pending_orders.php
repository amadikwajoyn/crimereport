<?php
ob_start();
session_start();
require_once('db.php');
    if ($_SESSION['role'] != "Admin") {
     header('Location: login.php');
}
$x = "";



if(isset($_POST['checkbox'])){
    
    foreach($_POST['checkbox'] as $oid){
       $sql = "UPDATE `priceless`.`order` SET `delivered` = 'yes' WHERE `order`.`id` = '$oid';";
        mysqli_query($conn, $sql);
         header('Location: view_pending_orders.php?data="Order Updated Successfully"');
   
    }
        }

?>

<!DOCTYPE html>
<html lang="en">

<?php
include_once('head.php');
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">View Pending Orders</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
         <div class="card-header" style="display: inline">View Pending Orders <?php if (isset($_GET['data'])) { $data = $_GET['data']; echo "<p style='color: blue'>".$data."</p>";} ?></div>
        <div class="card-body">
          <div class="table-responsive">
          <form method="POST" action="">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

              <thead>
                <tr>
                  <th width="80px"><button type="submit" class="btn btn-primary btn-block" name="del" >Delivered</button></th>
                  <th>Tracking</th>
                  <th>Order</th>
                   <th>Name</th>
                  <th>Address</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tfoot>
               <tr>
                  <th width="60px"><button type="submit" class="btn btn-primary btn-block" name="del" >Delivered</button></th>
                  <th>Tracking</th>
                  <th>Order</th>
                   <th>Name</th>
                  <th>Address</th>
                  <th>Date</th>
                </tr>
              </tfoot>
               <tbody>
               <?php
              for ($i=0; $i < $x; $i++) {          
            ?>
             
                <tr>
                <td><input type="checkbox" name="checkbox[]" value="<?php echo $id2[$i]; ?>"></td>
                  <td><?php echo $tracking2[$i]; ?></td>
                  <td><?php echo $order2[$i]; ?></td>
                  <td><?php echo $name2[$i]; ?></td>
                  <td><?php echo $address2[$i]; ?></td>
                  <td><?php echo $date2[$i]; ?></td>
                </tr>
                  <?php
                  }
                  ?>
              </tbody>
            </table>
            </form>
          </div>
        </div>
        <div class="card-footer small text-muted">Priceless Stores [Pending Orders]</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Priceless Stores 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
