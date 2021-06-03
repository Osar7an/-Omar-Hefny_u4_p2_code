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
    <div class="col-md-6 offset-md-3">
<h4>Add Product</h4>

      <form action="includes/addproduct.inc.php" method="POST">


      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Product Name" name="productname">
      </div>


      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Price</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Product Price" name="productprice">
      </div>

      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Description</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Description of product" name="productdescription">
      </div>

      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Quantity</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="14" name="productquantity">
      </div>
      <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Vendor</label>
      <select class="form-select" aria-label="Default select example" name="vendorID">
            <option selected>Vendor</option>
            <?php   $sql= "SELECT * FROM vendors";
    $stmt= $con->query($sql);
    if($stmt->num_rows > 0){
        while($row= $stmt->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row["vendorID"];?>"><?php echo $row["vendorname"];?></option>
                        <?php
                       }
                   }
            ?>
    </select>
    </div>
    <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Picture URL</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Picture URL" name="image">
      </div>


      <button name="submit" type="submit" class="btn btn-primary mb-3">Add Product</button>
       </form>
    </div>
  </div>
</div>

<?php 
require_once 'includes/footer.php';
?>