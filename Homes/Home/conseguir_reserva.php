<!DOCTYPE html>
<?php
    require_once '../../inclusiones/conexion.php';
    require_once '../../acciones/conseguir_zonas.php';
    
    // Guardar datos de la url 
    $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($db, $_POST['telefono']) : false;    
    
    $reservaRealizada = getReservaCliente($db, $telefono);

    $reserva = mysqli_fetch_assoc($reservaRealizada);
        if($reserva['tlfcli'] == $telefono):
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sterla's Paradise</title>
        <link rel="stylesheet" href="css/estilo.css"/>
        <link rel="stylesheet" href="css/button-style.css"/>
	<link rel="shortcut icon" href="images/logo_principal.png" />
    </head>
    <body>
        <div id="central">

            <div><img src="images/logo_principal.png" alt="sterlaParadise" title="sterlaParadise"></div>
	
        </div>
        <h1 class="h1-reserva">
            <?php
                    $reserva = getReservaCliente($db, $telefono);
                    if(!empty($reserva)):
                        while($cliente = mysqli_fetch_assoc($reserva)):
                            if($cliente['tlfcli'] == $telefono):
                ?>
                                Estimad@ <?=$cliente['nomcli']?> <?=$cliente['apecli']?> tiene una reserva en:
            <?php
                            endif;
                    endwhile;
                endif;
            ?>
            
        </h1>
        <form method='POST' action="../../acciones/cancelarReserva.php">
            
            <div class="comprobarReserva"> 
                <div class="divReserva">
                    <label for="restaurante" class="label-reserva">Restaurante:</label>
                    <?php
                        $reserva = getReservaCliente($db, $telefono);
                        if(!empty($reserva)):
                            while($cliente = mysqli_fetch_assoc($reserva)):
                                if($cliente['tlfcli'] == $telefono):
                    ?>    
                                    <?php
                                    if($cliente['codrest'] == 1):
                                    ?>
                                        <input type="text" name="zonas" id="zonas" class="reservaDatos" value="Hawai" disabled="disabled"/>
                                    <?php
                                    elseif ($cliente['codrest'] == 2):
                                    ?>
                                        <input type="text" name="zonas" id="zonas" class="reservaDatos" value="Cerdeña" disabled="disabled"/>
                                    <?php
                                    elseif ($cliente['codrest'] == 3):
                                    ?>
                                        <input type="text" name="zonas" id="zonas" class="reservaDatos" value="Marbella" disabled="disabled"/>
                                    <?php
                                    elseif ($cliente['codrest'] == 4):
                                    ?>
                                        <input type="text" name="zonas" id="zonas" class="reservaDatos" value="London" disabled="disabled"/>
                                    <?php
                                        endif;
                                    ?>
                    <?php
                                endif;
                            endwhile;
                        endif;
                    ?>
                </div>
                <div class="divReserva">                    
                    <label for="zonas" class="label-reserva">Zona: </label>
                    <?php
                        $reserva = getReservaCliente($db, $telefono);
                        if(!empty($reserva)):
                            while($cliente = mysqli_fetch_assoc($reserva)):
                                if($cliente['tlfcli'] == $telefono):
                    ?>    
                                    <?php
                                    if($cliente['codzona'] == 1):
                                    ?>
                                        <input type="text" name="zonas" id="zonas" class="reservaDatos" value="Interior" disabled="disabled"/>
                                    <?php
                                    elseif ($cliente['codzona'] == 2):
                                    ?>
                                        <input type="text" name="zonas" id="zonas" class="reservaDatos" value="Exterior" disabled="disabled"/>
                                    <?php
                                        endif;
                                    ?>
                    <?php
                                endif;
                            endwhile;
                        endif;
                    ?>
                </div>
                <div class="divReserva">
                    <label for="fecha" class="label-reserva">Fecha: </label>
                    <?php
                        $reserva = getReservaCliente($db, $telefono);
                        if(!empty($reserva)):
                            while($cliente = mysqli_fetch_assoc($reserva)):
                                if($cliente['tlfcli'] == $telefono):
                    ?>
                                    <input  type="text" name="fecha" id="fecha" class="reservaDatos" value="<?=$cliente['fecres']?>" disabled="disabled"/>
                    <?php
                                endif;
                            endwhile;
                        endif;
                    ?> 
                </div>
                <div class="divReserva">
                    <label for="hora" class="label-reserva">Hora: </label> 
                    <?php
                        $reserva = getReservaCliente($db, $telefono);
                        if(!empty($reserva)):
                            while($cliente = mysqli_fetch_assoc($reserva)):
                                if($cliente['tlfcli'] == $telefono):
                    ?>        
                                    <input type="text" name="hora" id="hora" class="reservaDatos" value="<?=$cliente['horares']?>" disabled="disabled"/>
                    <?php
                                endif;
                            endwhile;
                        endif;
                    ?>  
                </div>
                <div class="divReserva">
                    <label for="numpersonas" class="label-reserva">Número de personas: </label> 
                <?php
                    $reserva = getReservaCliente($db, $telefono);
                    if(!empty($reserva)):
                        while($cliente = mysqli_fetch_assoc($reserva)):
                            if($cliente['tlfcli'] == $telefono):
                ?>
                                <input type="text" name="numpersonas" id="numpersonas" class="reservaDatos" value="<?=$cliente['numper']?>" disabled="disabled"/>
                <?php
                            endif;
                        endwhile;
                    endif;
                ?>
                </div>
                    
                    <div class="divReserva">
                        <h2 class="h2-reserva">Datos de contacto:</h2>
                        <label for="telefono" class="label-reserva">Teléfono: </label>
                        <?php
                            $reserva = getReservaCliente($db, $telefono);
                            if(!empty($reserva)):
                                while($cliente = mysqli_fetch_assoc($reserva)):
                                    if($cliente['tlfcli'] == $telefono):
                        ?>
                                        <input type="text" name="telefono" id="telefono" class="reservaDatos" value="<?=$cliente['tlfcli']?>"/><br/>
                        <?php
                                    endif;
                                endwhile;
                            endif;
                        ?>
                    </div>
                    <div class="divReserva">
                        <label for="email" class="label-reserva">Email: </label>
                        <?php
                            $reserva = getReservaCliente($db, $telefono);
                            if(!empty($reserva)):
                                while($cliente = mysqli_fetch_assoc($reserva)):
                                    if($cliente['tlfcli'] == $telefono):
                        ?>
                                        <input type="text" name="email" id="email" class="reservaDatos" value="<?=$cliente['emailcli']?>"/><br/>
                        <?php
                                    endif;
                                endwhile;
                            endif;
                        ?>
                    </div>
                    
                <div class="comprobarReserva">
                        <a href="index.html" class="a-reserva" id="boton-inicio">Volver al inicio</a>
                        <input type="submit" name="enviar" value="Cancelar reserva" class="a-reserva" id="boton-inicio"/>
                </div>
        </form>
    </body>
</html>
<?php
        //elseif($reserva['tlfcli'] != $telefono): header("Location:Index.html");
        else: header("Location: ../../acciones/sinReserva.php");
        endif;
?>

