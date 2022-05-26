<?php

if(!empty($_POST)){

    

    function getReservaCliente($conexion, $telefono){
        $sql = "SELECT * FROM reservas WHERE tlfcli = '$telefono'";
        $reservaCliente = mysqli_query($conexion, $sql);

        $resultado = array();

        if($reservaCliente && mysqli_num_rows($reservaCliente) >= 1){
            $resultado = $reservaCliente;
        }

        return $resultado;
    }
}
