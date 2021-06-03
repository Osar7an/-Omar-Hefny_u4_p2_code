<?php 
require_once 'db.inc.php';
require_once 'resources.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $productid= getvalues("productid");
    $productname= getvalues("productname");
    $productprice= cleaninput(getvalues("productprice"));
    $productdescription= cleaninput(getvalues("productdescription"));
    $productquantity= cleaninput(getvalues("productquantity"));
    $vendorID= cleaninput(getvalues("vendorID"));
    $image= getvalues("image");

    if (empty($productname) || empty($productprice) || empty($productdescription) || empty($productquantity) || empty($vendorID) || empty($image) || empty($productid)) {
        # code...
        header("Location: ../editproduct.php?error=emptyfields");
    } else {
        $updateproduct = updateProduct($con,$productid,$productname,$productprice,$productdescription,$productquantity,$vendorID,$image);
        ($updateproduct  == 1 ) ? header("Location: ../editproduct.php?productid=$productid&success=productupdated") : header("Location: ../editproduct.php?productid=$productid&error=failed");
    }
}
?>