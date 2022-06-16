<?php

class Event{
    public function __construct($id,$Nombre,$Contacto,$Horario,$Fecha,$Descripcion)
    {
        $this->Id = $id;
        $this->Nombre = $Nombre;
        $this->Contacto = $Contacto;
        $this->Horario = $Horario;
        $this->Fecha = $Fecha;
        $this->Descripcion = $Descripcion;
    }
}

$server="bxqheeukutfa3by8nscd-mysql.services.clever-cloud.com";
$user="uoknsn97hhefuctz";
$Sqlpassword="fDpHK3OfXHPOFPexy9ry";
$Eventos = array();
$conn = new mysqli($server,$user,$Sqlpassword);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }else{
        $query = "SELECT * From bxqheeukutfa3by8nscd.eventos;";
        $result = $conn->query($query);
        if ($result->num_rows>0) {
            while($row = $result->fetch_assoc()){
                $Evento = new Event($row["idEventos"],$row["Nombre"],$row["Contacto"],$row["Horario"],$row["Fecha"],$row["Descripcion"]);
                array_push($Eventos,$Evento);
            }
            echo json_encode($Eventos);
          } else {
            echo "Error: " . $query . "<br>" . $conn->error;
          }
    } 


?>