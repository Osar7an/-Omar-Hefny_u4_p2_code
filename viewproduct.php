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
        <h1>View Products</h1>
    </div>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                 <th>SNO</th>
                 <th>Name</th>
                 <th>Description</th>
                 <th>VendorID</th>
                 <th>Price</th>
                 <th>Quantity</th>
                 <th>Action</th>
                </tr>
            </thead>
        <tbody>
            <?php 
                $query = viewProducts($con);
                while ($a = $query -> fetch_array()) {
                    # code...
                    $count +=1;
                    ?>
                    </tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $a["productname"];?></td>
                    <td><?php echo $a["description"];?></td>
                    <td><?php echo $a["vendorID"];?></td>
                    <td><?php echo $a["price"];?></td>
                    <td><?php echo $a["quantity"];?></td>
                    <td><a href="deleteproduct.php?productid=<?php echo $a["productID"];?>"><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></a><a href="editproduct.php?productid=<?php echo $a["productID"];?>"><button type="button" class="btn btn-outline-warning btn-sm">Edit</button></a></td>

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
