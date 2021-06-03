<?php 

require_once 'includes/header.php';
require_once 'includes/db.inc.php';
require_once 'includes/resources.php';

// check if username is admin
if($_SESSION['role'] !== 'admin'){
    // isn't admin, redirect them to a different page
    header("Location: store.php");
}

?>
<div class="container">
<div class="alert alert-info" role="alert">
  Only users with Admin Role can see this page!
</div>
<div class="row">
    <div class="page-header">
        <h1>Outstanding Payments</h1>
    </div>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th>#ID</th>
              <th>ProductID/Name/Description</th>
              <th>Vendor / Address / Phone</th>
              <th>Quantity</th>
              <th>OrderTotal</th>
              <th>UserID/Name</th>
              <th>User Email</th>
              <th>Ordered At</th>
              <th>Order Status</th>
                </tr>
            </thead>
        <tbody>
            <?php 
                $query = viewUnpaidOrders($con);
                $count = 0; 
                while ($order = $query -> fetch_array()) {
                    $productid = $order["productID"];
                    $userid = $order["userID"];

                    // get product info from order
                    $product_query = viewProductID($con, $productid);
                    $product = $product_query -> fetch_array();
                    $vendorid = $product["vendorID"];
    
                    // get user info from order 
                    $user_query = viewUserID($con, $userid);
                    $user = $user_query -> fetch_array();
                    // get vendor info from order
                    $vendor_query = viewVendorID($con, $vendorid);
                    $vendor = $vendor_query -> fetch_array();

                    $count +=1;
                    ?>
                    </tr>
                    <td><?php echo $order["orderID"];?></td>
                    <td><?php echo $product["productID"];?>- <?php echo $product["productname"];?> / <?php echo $product["description"];?></td>
                    <td><?php echo $vendor["vendorname"];?>- <?php echo $vendor["address"];?> / <?php echo $vendor["phone"];?></td>
                    <td><?php echo $order["quantity"];?></td>
                    <td>$<?php echo $order["orderTotal"];?></td>
                    <td><?php echo $user["userID"];?>-<?php echo $user["firstname"];?> <?php echo $user["lastname"];?></td>
                    <td><?php echo $user["email"];?></td>
                    <td><?php echo $order["orderDate"];?></td>
                    <td><?php echo $order["orderStatus"];?></td>
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
