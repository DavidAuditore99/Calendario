<?php
$var = $_GET["Email"];
$var2 = $_GET["Password"];
$server="127.0.0.1";
$user="root";
$Sqlpassword="Contrasena";

$conn = new mysqli($server,$user,$Sqlpassword);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }else{
    $query = "SELECT * from carpascb.usuarios where Correo= '$var' and Contrasena = '$var2' ;";
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