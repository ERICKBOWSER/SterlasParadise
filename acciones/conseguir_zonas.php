<?php

if(!empty($_GET)){

    

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




/*
function getZonasHawai($conexion){
        $sql = "SELECT * FROM zonas WHERE codrest = 1;";
        $zonas = mysqli_query($conexion, $sql);

        $resultado = array();

        if($zonas && mysqli_num_rows($zonas) >= 1){
            $resultado = $zonas;
        }

        return $resultado;
    }
*/