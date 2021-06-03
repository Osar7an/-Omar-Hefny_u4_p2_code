<?php 
  $server = "localhost";
  $user = "root";
  $password = "SarhaN2001";
  $databasename = "Hamzastore";

  $con = new mysqli($server, $user, $password, $databasename);
  if ($con -> connect_error) {
      die("Connection Error");
  }

?>