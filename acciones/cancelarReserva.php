<?php

if(!empty($_GET)){
    require_once '../inclusiones/conexion.php';
    
    $telefono = isset($_GET['telefono']) ? mysqli_real_escape_string($db, $_GET['telefono']) : false;
    $email = isset($_GET['email']) ? mysqli_real_escape_string($db, $_GET['email']) : false;
    
    // Añadir datos en la base de datos
    $sql = "DELETE FROM reservas WHERE tlfcli = '$telefono' AND emailcli = '$email'";
    
    $cancelarReserva = mysqli_query($db, $sql);    
    
    header("Location: reservaCancelada.php");

    
}