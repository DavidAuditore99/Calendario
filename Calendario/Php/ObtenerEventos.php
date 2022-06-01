<?php

class Event{
    public function __construct($Nombre,$Contacto,$Horario,$Fecha,$Descripcion)
    {
        $this->Nombre = $Nombre;
        $this->Contacto = $Contacto;
        $this->Horario = $Horario;
        $this->Fecha = $Fecha;
        $this->Descripcion = $Descripcion;
    }
}

$server="127.0.0.1";
$user="root";
$Sqlpassword="Contrasena";
$Eventos = array();
$conn = new mysqli($server,$user,$Sqlpassword);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }else{
        $query = "SELECT * From carpascb.eventos;";
        $result = $conn->query($query);
        if ($result->num_rows>0) {
            while($row = $result->fetch_assoc()){
                $Evento = new Event($row["Nombre"],$row["Contacto"],$row["Horario"],$row["Fecha"],$row["Descripcion"]);
                array_push($Eventos,$Evento);
            }
            echo json_encode($Eventos);
          } else {
            echo "Error: " . $query . "<br>" . $conn->error;
          }
    } 


?>