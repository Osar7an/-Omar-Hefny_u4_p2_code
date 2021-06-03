<?php  

require_once 'includes/header.php';
require_once 'includes/db.inc.php';
require_once 'includes/resources.php';

if(isset($_GET['orderid'])){
    $orderid = htmlentities(strip_tags($_GET['orderid']));
}
    $order_query = viewOrderID($con, $orderid);
    $order = $order_query -> fetch_array();
    $productid = $order["productID"];
    $userid = $order["userID"];


    $product_query = viewProductID($con, $productid);
    $product = $product_query -> fetch_array();
    $vendorid = $product["vendorID"];


    $user_query = viewUserID($con, $userid);
    $user = $user_query -> fetch_array();

    $vendor_query = viewVendorID($con, $vendorid);
    $vendor = $vendor_query -> fetch_array();
?>

<div class="container">
<div class="alert" role="alert">
      <h5>Receipt for order No. <?php echo $order["orderID"];?> - <a href="myaccount.php">Click here to go back!</a></h5>
</div>
<div class="row">
<div class="col-md-6 offset-md-3">

     <div class="mb-3">
          <h4>Order Info:</h4>
          <p>Order ID: <?php echo $order["orderID"];?></p>
          <p>Date: <?php echo $order["orderDate"];?></p>
          <p>Order Status: <?php echo $order["orderStatus"];?></p>

          <hr>
          <h4>Customer Info:</h4>
          <p>Customer ID: <?php echo $user["userID"];?></p>
          <p>Firstname: <?php echo $user["firstname"];?></p>
          <p>Lastname: <?php echo $user["lastname"];?></p>
          <p>Country: <?php echo $user["country"];?></p>
          <p>Email: <?php echo $user["email"];?></p>
          <hr>
          <h4>Vendor Info:</h4>
          <p>Vendor ID: <?php echo $vendor["vendorID"];?></p>
          <p>Name: <?php echo $vendor["vendorname"];?></p>
          <p>Address: <?php echo $vendor["address"];?></p>
          <p>Phone: <?php echo $vendor["phone"];?></p>
          <hr>
          <h4>Product Info:</h4>
          <p>Product ID: <?php echo $product["productID"];?></p>
          <p>Price: $ <?php echo $product["price"];?></p>
          <p>Quantity: <?php echo $order["quantity"];?></p>
          <?php if ($order["orderDiscount"] == "true") { ?>
          <p style="color:green;">10% discount for orders over 50: Applied</p>
          <p>Price before discount: $<?php echo $order["quantity"]*$product["price"];?></p>
          <?php }?>
           <hr>
          <h4>Total: <?php echo $order["quantity"];?>pcs *  $<?php echo $product["price"];?> = <b>$<?php echo $order["quantity"]*$product["price"];?></b></h4>
          <?php if ($order["orderDiscount"] == "true") { ?>
            <h4>Total after discount: $<?php echo $order["orderTotal"];?></h4>
          <?php }?>
          <?php if ($order["orderStatus"] == "unpaid") { ?>
        <a href="pay.php?orderid=<?php echo $order["orderID"];?>"><button type="button" class="btn btn-success">Complete Payment</button></a>
        <?php } ?>
      </div>
    </div>
    </div>
</div>


<?php 
require_once 'includes/footer.php';
?>