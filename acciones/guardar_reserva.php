<?php

if(!empty($_POST)){
    require_once '../inclusiones/conexion.php';
   
    /* LECCIÓN DE HOY
        Si no estableces el tipo se guarda como boolean, no nos habia pasado porque al hacer la validación ya colocabamos que el envio tenía que ser de tipo string
    */
    
    // ---------------- Escapar datos ---------------
    
    // Reserva
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
    $sql = "SELECT realizarReserva('$fecha', '$hora', '$numpersonas', '$nombre', '$apellidos', '$telefono', '$email', '$zona', '$restaurante');";

    $guardarDatos = mysqli_query($db, $sql);
    
    $restauranteAux = $restaurante;

    function getReserva($db){
        $sql = "SELECT * FROM reservas ORDER BY codreserva DESC LIMIT 1";
        $reservaCliente = mysqli_query($db, $sql);

        $resultado = array();

        if($reservaCliente && mysqli_num_rows($reservaCliente) >= 1){
            $resultado = $reservaCliente;
        }

        return $resultado;
    }
    
    $reservaCliente = getReserva($db);
    
    while($reserva = mysqli_fetch_assoc($reservaCliente)){
        if(
               $reserva['apecli'] == $apellidos &&
               $reserva['tlfcli'] == $telefono &&
               $reserva['emailcli'] == $email
                 
        ){
            require_once 'reservaRealizada.html';
            echo "<h1 class='reservaGuardada comprobarReserva'>Su reserva se ha realizado correctamente Sr/Sra " . $reserva['nomcli'] . " " . $reserva['apecli'] . "</h1><br/>";
            
            
            
            header("Refresh: 5; URL= ../Homes/Home/index.html");
            
        }else{
            require_once 'reservaDenegada.html';
            echo "<h1 class='reservaGuardada comprobarReserva'>No se puede realizar esta reserva.</h1>";
            header("Refresh: 5; URL= ../Homes/Home/index.html");
        }
    }
}

  
   // var_dump($comprobar);
   //var_dump(mysqli_real_escape_string($db, $sql));
   // var_dump(mysqli_fetch_assoc($comprobar));
    
    
    // Mostrar la última reserva añadida
    /*$comprobacion = "SELECT * FROM reservas ORDER BY codreserva DESC LIMIT 1";
    $resultadoComprob = mysqli_query($db, $comprobacion);
    
    while($prueba = mysqli_fetch_assoc($resultadoComprob)){
        var_dump($prueba);*/
    
    // Recargar la página principal después de realizar la reserva
    
    //header("Refresh: 5; URL=/sterlas_paradise/html/index.php");

?>