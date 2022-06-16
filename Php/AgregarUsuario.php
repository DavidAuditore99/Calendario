<?php


    $nombre = $_POST["Nombre"];
    $appat = $_POST["ApPat"];
    $appmat = $_POST["ApMat"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];

    $server="bxqheeukutfa3by8nscd-mysql.services.clever-cloud.com";
    $user="uoknsn97hhefuctz";
    $Sqlpassword="fDpHK3OfXHPOFPexy9ry";

    $conn = new mysqli($server,$user,$Sqlpassword);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
            $query = "INSERT INTO bxqheeukutfa3by8nscd.Usuarios(`Correo`,`Contrasena`,`Nombre`,`ApPat`,`ApMat`) VALUES('$email','$password','$nombre','$appat','$appmat');";
            if ($conn->query($query) === TRUE) {
                echo "Exito";
              } else {
                echo "Error: " . $query . "<br>" . $conn->error;
              }
        }
?>