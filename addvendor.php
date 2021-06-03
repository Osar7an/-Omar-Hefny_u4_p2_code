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
  <div class="row">
  <div class="alert alert-info" role="alert">
  Only users with Admin Role can see this page!
</div>
    <div class="col-md-6 offset-md-3">
    <h4>Add vendor</h4>
      <form action="includes/addvendor.inc.php" method="POST">


      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Vendor Name</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Vendor Name" name="vendorname">
      </div>


      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Address</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Address" name="address">
      </div>

      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Phone</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="+1233543645654" name="phone">
      </div>


      <button name="submit" type="submit" class="btn btn-primary mb-3">Add Vendor</button>
       </form>
    </div>
  </div>
</div>


<?php 
require_once 'includes/footer.php';
?>