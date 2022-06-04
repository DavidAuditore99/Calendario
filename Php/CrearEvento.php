<?php
    $nombre = $_POST["nombre"];
    $contacto = $_POST["contacto"];
    $horario = $_POST["horario"];
    $fecha = $_POST["fecha"];
    $detalles = $_POST["detalles"];

    $server="bxqheeukutfa3by8nscd-mysql.services.clever-cloud.com";
    $user="uoknsn97hhefuctz";
    $Sqlpassword="fDpHK3OfXHPOFPexy9ry";

    $conn = new mysqli($server,$user,$Sqlpassword);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
            $query = "INSERT INTO bxqheeukutfa3by8nscd.eventos(`Nombre`,`Contacto`,`Horario`,`Fecha`,`Descripcion`) VALUES('$nombre','$contacto','$horario','$fecha','$detalles');";
            if ($conn->query($query) === TRUE) {
                echo "Exito";
              } else {
                echo "Error: " . $query . "<br>" . $conn->error;
              }
        }
?>