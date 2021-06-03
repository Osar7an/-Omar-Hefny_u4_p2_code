<?php 

require_once 'includes/header.php';
require_once 'includes/db.inc.php';
require_once 'includes/resources.php';
?>
   <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
<section class="py-5 text-center container">
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">Hamza Store</h1>
      <p class="lead text-muted">For all kinds of facemasks</p>
      <p>
        <a href="store.php" class="btn btn-primary my-2">Go to Store</a>
        <?php if(isset($_SESSION['isloggedin'])) { ?>
            <a href="myaccount.php" class="btn btn-secondary my-2">My Account</a>
              <?php } else { ?>
               <a href="register.php" class="btn btn-secondary my-2">Register</a>
            <?php } ?>
      </p>
    </div>
  </div>
</section>

<div class="album py-5 bg-light">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <?php 
                $query = viewProducts($con);
                $count = 0;
                while ($a = $query -> fetch_array()) {
                    # code...
                    $count +=1;
                    ?>
                     <div class="col">
                           <div class="card shadow-sm">
                                  <img class="card-img-top" src="<?php echo $a["image"];?>" alt="Card image cap">
                              <div class="card-body">
                                 <a style='color:black;' href="store.php"><h5 class="card-title"><?php echo $a["productname"];?></h5></a>
                                 <p class="card-text"><?php echo $a["description"];?></p>
                                 <div class="d-flex justify-content-between align-items-center">
                                 <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">$<?php echo $a["price"];?></button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Quantity: <?php echo $a["quantity"];?></button>
                                 </div>
                                 <small class="text-muted">VendorID: <?php echo $a["vendorID"];?></small>
                                 </div>
                              </div>
                           </div>
                           </div>
            <?php
                }
            ?>


    </div>
  </div>
</div>


<?php 
require_once 'includes/footer.php';
?>