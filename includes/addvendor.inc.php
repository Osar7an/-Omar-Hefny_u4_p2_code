<?php 
require_once 'db.inc.php';
require_once 'resources.php';


$vendorname= (getvalues("vendorname"));
$address= cleaninput(getvalues("address"));
$phone= cleaninput(getvalues("phone"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($vendorname) || empty($address) || empty($phone) ) {
        # code...
        header("Location: ../addvendor.php?error=emptyfields");
    } else {
        $query = "INSERT INTO vendors (vendorname,address,phone) VALUES (?,?,?)";
        $stmt = $con -> prepare($query);
        $stmt -> bind_param("sss", $vendorname, $address,$phone);
        header("Location: ../home.php?success=addedvendor");
        $stmt -> execute();
        $stmt -> close();
        $con -> close();
    }
}
?>