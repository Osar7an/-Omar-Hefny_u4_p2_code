<?php 

require_once 'includes/header.php';
require_once 'includes/db.inc.php';
require_once 'includes/resources.php';

// check if username is admin
if($_SESSION['role'] !== 'admin'){
    // isn't admin, redirect them to a different page
    header("Location: store.php");
}

$count = 0; 

?>
<div class="container">
<div class="alert alert-info" role="alert">
  Only users with Admin Role can see this page!
</div>
<div class="row">
    <div class="page-header">
        <h1>View Orders</h1>
    </div>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                 <th>OrderID</th>
                 <th>ProductID</th>
                 <th>Quantity</th>
                 <th>Order Total</th>
                 <th>User ID</th>
                 <th>Order Date</th>
                 <th>Action</th>
                </tr>
            </thead>
        <tbody>
            <?php 
                $query = viewOrders($con);
                while ($a = $query -> fetch_array()) {
                    # code...
                    $count +=1;
                    ?>
                    </tr>
                    <td><?php echo $a["orderID"];?></td>
                    <td><?php echo $a["productID"];?></td>
                    <td><?php echo $a["quantity"];?></td>
                    <td>$<?php echo $a["orderTotal"];?></td>
                    <td><?php echo $a["userID"];?></td>
                    <td><?php echo $a["orderDate"];?></td>
                    <td><a href="receipt.php?orderid=<?php echo $a["orderID"];?>"><button type="button" class="btn btn-outline-warning btn-sm">View Receipt</button></a></td>

            <?php
                }
            ?>

            <tr>
        </tbody>
        </table>
    </div>
</div>
</div>

<?php 
require_once 'includes/footer.php';
?>
