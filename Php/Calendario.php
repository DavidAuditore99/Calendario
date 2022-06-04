<?php
session_start();
if(isset($_SESSION['Sesion']))
{
    $_SESSION['Sesion'] = time();
    echo  $_SESSION['Sesion'];
}
echo $_SESSION["Sesion"];
if (isset($_SESSION['Sesion']) && (time() - $_SESSION['Sesion'] >3600)) {
    session_unset();
    session_destroy();
}
?>