<?php

if(!empty($_POST)){
    require_once '../inclusiones/conexion.php';
    
    $zona = isset($_POST['zonas']) ? mysqli_real_escape_string($db, $_POST['zonas']) : false;
    $fecha = isset($_POST['fecha']) ? mysqli_real_escape_string($db, $_POST['fecha']) : false;
    $hora = isset($_POST['hora']) ? mysqli_real_escape_string($db, $_POST['hora']) : false;
    //$minuto = isset($_POST['3A']) ? mysqli_real_escape_string($db, $_POST['3A']) : false;
    $numpersonas = isset($_POST['numpersonas']) ? mysqli_real_escape_string($db, $_POST['numpersonas']) : false;
    $restaurante = isset($_POST['restaurante']) ? mysqli_real_escape_string($db, $_POST['restaurante']) : false;
   
    // Cliente
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($db, $_POST['telefono']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : false;
    
    // Añadir datos en la base de datos
    $sql = "DELETE FROM reservas WHERE tlfcli = '$telefono' AND emailcli = '$email'";
    
    $cancelarReserva = mysqli_query($db, $sql);    
    
    header("Location: reservaCancelada.php");
    
    $sqlBorrar = "CALL borrarReserva('$numpersonas', '$zona', '$restaurante', '$hora', '$fecha', '$telefono')";
            
    $cancelar = mysqli_query($db, $$sqlBorrar);
    
}