<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sterla's Paradise</title>
        <link rel="stylesheet" href="../Homes/Home/css/estilo.css"/>
        <link rel="stylesheet" href="../Homes/Home/css/button-style.css"/>
	<link rel="shortcut icon" href="../Homes/Home/images/logo_principal.png" />
    </head>
    <body>
        <div id="central">

            <div><img src="../Homes/Home/images/logo_principal.png" alt="sterlaParadise" title="sterlaParadise"></div>
	
        </div>
        
        <div class="sinReserva">
            <img class="gato-sinReserva" src='../Homes/Home/images/reserva-cancelada.gif' alt='gato sin reserva' title='gato sin reserva'/>
            <h1 class="h1-sinReserva">Su reserva ha sido cancelada...</h1>
        </div>
        <?php
            header("Refresh: 2.5; URL=../Homes/Home/Index.html");
        ?>
    </body>
</html>