<?php 
require_once 'db.inc.php';
require_once 'resources.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $productname= (getvalues("productname"));
    $productprice= cleaninput(getvalues("productprice"));
    $productdescription= cleaninput(getvalues("productdescription"));
    $productquantity= cleaninput(getvalues("productquantity"));
    $vendorID= cleaninput(getvalues("vendorID"));
    $image= (getvalues("image"));

    if (empty($productname) || empty($productprice) || empty($productdescription) || empty($productquantity) || empty($vendorID) || empty($image)) {
        # code...
        header("Location: ../addproduct.php?error=emptyfields");
    } else {
        $addproduct = addProduct($con,$productname,$productprice,$productdescription,$productquantity,$vendorID,$image);
        ($addproduct  == 1 ) ? header("Location: ../addproduct.php?success=productadded") : header("Location: ../addproduct.php?error=failed");
    }
}
?>