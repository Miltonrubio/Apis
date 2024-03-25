<?php

ob_start();

require_once "../Models/BD.php";


$ID_usuario = $_GET['id'];
$fechaInicio = $_GET['fechaInicio'];
$fechaFin = $_GET['fechaFin'];



$modelo = new ModeloBD();
$datos = $modelo->ConsultarDatosPorUsuario($ID_usuario);



$modeloFecha = new ModeloBD();
$Actividades = $modeloFecha->ConsultarActividadesPorUsuarioYFecha($ID_usuario, $fechaInicio, $fechaFin);


if (!empty($datos)) {

    if (is_array($datos)) {
        $datos = json_encode($datos);
    }
    $datosDelServicio = json_decode($datos);
}


if (!empty($Actividades)) {

    if (is_array($Actividades)) {
        $Actividades = json_encode($Actividades);
    }
    $datosActividades = json_decode($Actividades);
}




/*
if (!empty($todosLasRefacciones)) {
   
    if (is_array($todosLasRefacciones)) {
        $todosLasRefacciones = json_encode($todosLasRefacciones);
    }
    $refaccionesServicio = json_decode($todosLasRefacciones);
}
*/




/*
if (!empty($todosLosChecks)) {
    if (is_array($todosLosChecks)) {
        $todosLosChecks = json_encode($todosLosChecks);
    }
    $checksServicio = json_decode($todosLosChecks);
}
*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api</title>

     <link href="http://<?php echo $_SERVER['HTTP_HOST'] 
                                ?>/apitallergeorgio-georgiomovil/librerias/Bootstrap5/css/bootstrap.min.css" rel="stylesheet">

    <link href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/apitallergeorgio-georgiomovil/css/diseniopdf.css" rel="stylesheet">
    <link href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/georgioapi/css/diseniopdf.css" rel="stylesheet">


    <link href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/georgioapp/georgioapi/css/diseniopdf.css" rel="stylesheet">

</head>



<body>

    <?php


    if (empty($datosDelServicio)) {
        echo "No se encontraron datos";
    } else {
        foreach ($datosDelServicio as $datosCliente) {
            $nombreCliente = $datosCliente->nombre;

    ?>

            <div class="contenedorImagen">
                <img src="http://tallergeorgio.hopto.org:5613/tallergeorgio/imagenes/usuarios/0f5fb4db5e8fa7c2c6ebb83f8f6347b5.jpg" class="imagen-centrada">
            </div>

            <p class=" text-center"> SERVICIO TECNICO AUTOMOTRIZ GEORGIO SA DE CV CALLE 17 SUR #704 COL. LA PURISIMA, CP:75784
                TEHUACAN PUEBLA</p>

            <H5 class="texto-tabla-centrado"> DATOS DEL EMPLEADO </H5>
            <table>
                <tbody>

                    <tr>
                        <td class="fondogris texto-izquierda">Nombre: </td>
                        <td><?php echo  $datosCliente->nombre; ?> </td>

                        <td class="fondogris texto-izquierda">Telefono: </td>
                        <td><?php echo  $datosCliente->telefono; ?> </td>

                    </tr>
                    <tr>
                        <td class="fondogris texto-izquierda">Area:</td>
                        <td><?php echo  $datosCliente->permisos; ?> </td>

                        <td class="fondogris texto-izquierda ">Empresa </td>
                        <td><?php echo  $datosCliente->empresa; ?> </td>


                    </tr>
                </tbody>
            </table>

    <?php
        }
    }

    ?>

<br>

<H3 class="text-center"> DESGLOSE DE ACTIVIDADES</H3>
    <br>

    <?php


    if (empty($datosActividades)) {
        echo "No se encontraron datos";
    } else {
        foreach ($datosActividades as $Actividades) {

    ?>
    <H5 class="texto-tabla-centrado"> ACTIVIDADES DEL <?php echo  $Actividades->fecha; ?> </H5>


            <table>
                <tbody>
                    <tr>
                        <td class="fondogris texto-izquierda">ACTIVIDAD</td>
                        <td class="fondogris texto-izquierda">CHECK </td>
                    </tr>


                    <?php

                    $desglose =  $Actividades->desglose_actividades;
                    if (empty($desglose)) {
                        echo "No se encontraron datos";
                    } else {
                        foreach ($desglose as $desgloseActividades) {

                    ?>
                            <tr>
                                <td><?php echo  $desgloseActividades->nombre_actividad; ?> </td>
                                <td><?php echo  $desgloseActividades->valor_check; ?></td>
                            </tr>
                    <?php

                        }
                    }
                    ?>

                </tbody>
            </table>

    <?php

        }
    }
    ?>
    <footer>

        <div class="contenedor clearfix elemento-fijo">
            <div class="mitad-izquierda">
                <p class="text-center linea-debajo"> <?php echo $nombreCliente ?></p>
                <p class="text-center "> Nombre y firma del empleado </p>
            </div>

            <div class="mitad-derecha">
                <p class="text-center linea-debajo"> ELVIS EDUARDO CRUZ AGUILA</p>

                <p class="text-center  "> Nombre y firma del encargado </p>
            </div>
        </div>

    </footer>



    <script src="../librerias/Bootstrap5/js/bootstrap.min.js"></script>
</body>

</html>

<?php

$html = ob_get_clean();


//echo $html;


require "../librerias/domviejito/dompdf/autoload.inc.php";
require "../librerias/domviejito/dompdf/vendor/autoload.php";

/*

use Dompdf\Dompdf;
$html = ob_get_clean();

require_once '../../librerias2023/dompdf/autoload.inc.php';
include_once '../../librerias2023/vendor/autoload.php';
*/

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
//tamaño carta vertical
$dompdf->setPaper('letter', 'portrait');
$dompdf->render();
$x          = 270;
$y          = 750;
$text       = "Página {PAGE_NUM} de {PAGE_COUNT}";
$font       = $dompdf->getFontMetrics()->get_font('Helvetica', 'normal');
$size       = 10;
$color      = array(0, 0, 0);
$word_space = 0.0;
$char_space = 0.0;
$angle      = 0.0;

$dompdf->getCanvas()->page_text(
    $x,
    $y,
    $text,
    $font,
    $size,
    $color,
    $word_space,
    $char_space,
    $angle
);
$dompdf->stream('Reporte.pdf', array("Attachment" => false));



?>