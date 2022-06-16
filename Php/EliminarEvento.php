<?php
$server="bxqheeukutfa3by8nscd-mysql.services.clever-cloud.com";
$user="uoknsn97hhefuctz";
$Sqlpassword="fDpHK3OfXHPOFPexy9ry";
$Eventos = array();
$conn = new mysqli($server,$user,$Sqlpassword);
$id = $_POST["id"];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }else{
        $query = "DELETE FROM bxqheeukutfa3by8nscd.eventos WHERE idEventos = '$id';";
        $result = $conn->query($query);
        if ($conn->query($query) === TRUE) {
            echo "Exito";
          } else {
            echo "Error:" . $conn->error;
          }
    } 

?>