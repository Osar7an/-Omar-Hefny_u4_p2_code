<?php 

require_once 'includes/header.php';
require_once 'includes/db.inc.php';
require_once 'includes/resources.php';

if(isset($_GET['productid'])){
    $productid = htmlentities(strip_tags($_GET['productid']));
    deleteProduct($con, $productid);
    header("Location: viewproduct.php?success=deleted");
}
?>  