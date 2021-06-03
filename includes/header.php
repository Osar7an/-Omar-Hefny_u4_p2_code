<?php 
  session_start();
  require_once "db.inc.php";
  // require_once "register.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <title>HamzaStore</title>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="#" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <h4>HamzaStore</h4>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="home.php" class="nav-link px-2 link-dark">Home</a></li>
        <li><a href="store.php" class="nav-link px-2 link-dark">Store</a></li>
        <li><a href="myaccount.php" class="nav-link px-2 link-dark">My Account</a></li>
        <?php if(isset($_SESSION['role']) && ($_SESSION['role'] == 'admin')) { ?>
          <li class="nav-item dropdown">
        <a class="nav-link px-2 link-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a href="addproduct.php" class="nav-link px-2 link-dark">Add Product</a>
          <a href="addvendor.php" class="nav-link px-2 link-dark">Add Vendor</a>
      </li>
          <li class="nav-item dropdown">
        <a class="nav-link px-2 link-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          View
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a href="viewproduct.php" class="nav-link px-2 link-dark">View Products</a>
        <a href="vieworders.php" class="nav-link px-2 link-dark">View Orders</a>
        <a href="outstandingpayments.php" class="nav-link px-2 link-dark">View Outstanding payments</a>

      </li>


        <?php } ?>
      </ul>

      <div class="col-md-3 text-end">
      <?php if(isset($_SESSION['isloggedin'])) { ?>
                <a href="includes/logout.php"><button type="button" class="btn btn-outline-danger">Logout</button></a>
              <?php } else { ?>
                <a href="login.php"><button type="button" class="btn btn-outline-primary me-2">Login</button></a>
                <a href="register.php"><button type="button" class="btn btn-primary">Sign-up</button></a>
            <?php } ?>
      </div>
    </header>
  </div>