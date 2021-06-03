<?php 
require_once 'includes/db.inc.php';
require_once 'includes/resources.php';


$productid= getvalues("productid");
$quantity= getvalues("quantity");
$userid = getvalues("userid");
$query = viewProductID($con, $productid);
$a = $query -> fetch_array();
$productprice = $a["price"];

if ($productprice * $quantity > 50) {
    $ordertotal = $productprice * $quantity * 0.9;
    $orderDiscount = "true";
} else {
    $ordertotal = $productprice * $quantity;
    $orderDiscount = "false";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($productid) || empty($quantity) || empty($userid) ) {
        # code...
        header("Location: store.php?error=emptyfields");
    } else {
        $query = "INSERT INTO orders (productID,quantity,orderTotal,userID,orderDiscount) VALUES (?,?,?,?,?)";
        $stmt = $con -> prepare($query);
        $stmt -> bind_param("sssss", $productid,$quantity,$ordertotal,$userid,$orderDiscount);
        header("Location: myaccount.php?success=orderadded");
        $stmt -> execute();
        $stmt -> close();
        $con -> close();

    }
}
?>