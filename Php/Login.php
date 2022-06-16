<?php
header('Content-Type: text/html; charset=UTF-8');
$var = $_GET["Email"];
$var2 = $_GET["Password"];
$server="bxqheeukutfa3by8nscd-mysql.services.clever-cloud.com";
$user="uoknsn97hhefuctz";
$Sqlpassword="fDpHK3OfXHPOFPexy9ry";

$conn = new mysqli($server,$user,$Sqlpassword);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }else{
    $query = "SELECT * from bxqheeukutfa3by8nscd.Usuarios where Correo= '$var' and Contrasena = '$var2' ;";
    $result = $conn->query($query);
    if($result->num_rows> 0){
        echo "Exito";
        session_start();
        $_SESSION['Sesion'] = $var;
        $conn->close();
    }else{
      $conn->close();
      echo "Error";
    }
  }
?>