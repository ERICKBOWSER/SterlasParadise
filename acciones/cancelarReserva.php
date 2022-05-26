<?php

if(!empty($_POST)){
    require_once '../inclusiones/conexion.php';
    
    $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($db, $_POST['telefono']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    
    // Añadir datos en la base de datos
    $sql = "DELETE FROM reservas WHERE tlfcli = '$telefono' AND emailcli = '$email'";
    
    $cancelarReserva = mysqli_query($db, $sql);    
    
    header("Location: reservaCancelada.php");

    
}