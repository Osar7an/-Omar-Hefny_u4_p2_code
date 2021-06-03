<?php 
    function cleaninput($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function getvalues($value){
        return $_POST["$value"];
    }

    function addVendor(){
      $sql = "INSERT INTO vendors (vendorname,address,phone) VALUES (?,?,?)";
      return $sql;
    }

    function addProduct($con,$productname,$productprice,$productdescription,$productquantity,$vendorID,$image){
        $sql = "INSERT INTO products (productname,price,description,quantity,vendorID,image) VALUES (?,?,?,?,?,?)";
        $stmt = $con -> prepare($sql);
        $stmt -> bind_param("ssssss", $productname,$productprice,$productdescription,$productquantity,$vendorID,$image);
        return $stmt -> execute();
    }

    function viewVendor($con){
        $sql = "SELECT * FROM vendors";
        return $con -> query($sql);
    }
     
     function viewProducts($con){
        $sql = "SELECT * FROM products";
        return $con -> query($sql);
    }
    function viewProductID($con, $productid){
        $sql = "SELECT * FROM products WHERE productID = $productid";
        return $con -> query($sql); 
    }
    function viewVendorID($con, $vendorID){
        $sql = "SELECT * FROM vendors WHERE vendorID = $vendorID";
        return $con -> query($sql);
    }
    function deleteProduct($con, $productid){
        $sql = "DELETE FROM products WHERE productID = $productid";
        return $con -> query($sql);
    }
    function updateProduct($con,$productid,$productname,$productprice,$productdescription,$productquantity,$vendorID,$image){
        $sql = "UPDATE products SET productname = '$productname', price = '$productprice' ,description = '$productdescription',quantity = '$productquantity',vendorID = '$vendorID',image = '$image' WHERE productID = $productid";
        return $con -> query($sql);
    } 
    function viewOrders($con){
        $sql = "SELECT * FROM orders";
        return $con -> query($sql);
    }
    function viewUserOrder($con, $userid){
        $sql = "SELECT * FROM orders WHERE userID = $userid";
        return $con -> query($sql);
    }
    function viewUserID($con, $userid){
        $sql = "SELECT * FROM users WHERE userID = $userid";
        return $con -> query($sql);
    }
    function updateUser($con,$userid,$firstname,$lastname,$email,$gender,$country){
        $sql = "UPDATE users SET firstname = '$firstname', lastname = '$lastname' ,email = '$email',gender = '$gender',country = '$country' WHERE userID = $userid";
        return $con -> query($sql);
    }
    function viewOrderID($con, $orderid){
        $sql = "SELECT * FROM orders WHERE orderID = $orderid";
        return $con -> query($sql);
    }
    function updateOrder($con,$orderID){
        $sql = "UPDATE orders SET orderStatus = 'paid' WHERE orderID = $orderID";
        return $con -> query($sql);
    }
    function viewUnpaidOrders($con){
        $sql = "SELECT * FROM orders WHERE orderStatus = 'unpaid'";
        return $con -> query($sql);
    }
?>