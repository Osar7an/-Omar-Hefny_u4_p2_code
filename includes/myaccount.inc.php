<?php 
require_once 'db.inc.php';
require_once 'resources.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userid= getvalues("userid");
    $firstname= cleaninput(getvalues("firstname"));
    $lastname= cleaninput(getvalues("lastname"));
    $email= cleaninput(getvalues("email"));
    $gender= cleaninput(getvalues("gender"));
    $country= cleaninput(getvalues("country"));

    if (empty($userid) || empty($firstname) || empty($lastname) || empty($email) || empty($gender) || empty($country)) {
        # code...
        header("Location: ../myaccount.php?error=emptyfields");
    } else {
        $updateuser = updateUser($con,$userid,$firstname,$lastname,$email,$gender,$country);
        ($updateuser  == 1 ) ? header("Location: ../myaccount.php?success=infoupdated") : header("Location: ../myaccount.php?error=updatefailed");
    }
}
?>