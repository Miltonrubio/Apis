<?php

ob_start();

require_once "../Models/BD.php";


$idgabeta = $_GET['id'];


$modelo = new ModeloBD();
$datos = $modelo->ConsultarTodosLosInventariosPorGaveta($idgabeta);


?>

<!DOCTYPE html>
<html lang="es_ES">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api</title>

    <!--  <link href="http://<?php // echo $_SERVER['HTTP_HOST'] 
                                ?>/apitallergeorgio-georgiomovil/librerias/Bootstrap5/css/bootstrap.min.css" rel="stylesheet"> -->

    <link href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/apitallergeorgio-georgiomovil/css/diseniopdf.css" rel="stylesheet">
    <link href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/georgioapi/css/diseniopdf.css" rel="stylesheet">
    <link href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/georgioapp/georgioapi/css/diseniopdf.css" rel="stylesheet">

</head>



<body>


<div class="contenedorImagen">
                <img src="http://tallergeorgio.hopto.org:5613/tallergeorgio/imagenes/usuarios/0f5fb4db5e8fa7c2c6ebb83f8f6347b5.jpg" class="imagen-centrada">
            </div>



<p class=" text-center"> SERVICIO TECNICO AUTOMOTRIZ GEORGIO SA DE CV CALLE 17 SUR #704 COL. LA PURISIMA, CP:75784
        TEHUACAN PUEBLA</p>

    <?php

    if (empty($datos)) {
        echo "No se encontraron datos";
    } else {
        foreach ($datos as $inventarios) {

            $fecha = $inventarios['fecha'];

    ?>
            <br>
            <H4 class="texto-tabla-centrado">Inventario realizado el <?php echo  $fecha ?> a las <?php echo  $inventarios['hora'] ?> </H4>

            <table>
                <tbody>
                    <tr>
                        <td class="fondogris texto-izquierda">Cantidad: </td>
                        <td class="fondogris texto-izquierda">Nombre Herramienta</td>
                        <td class="fondogris texto-izquierda">Estado</td>
                        <td class="fondogris texto-izquierda">Foto</td>
                    </tr>
                    <?php


                    foreach ($inventarios['listaHerramientas'] as $herrInventarios) {



                        $valorCheck = $herrInventarios['estadoHerr'];
                        if ($valorCheck == "M") {


                            $valorMostrar = "Malo";
                        } else if ($valorCheck == "B") {

                            $valorMostrar = "Bueno";
                        } else if ($valorCheck == "R") {

                            $valorMostrar = "Regular";
                        } else if ($valorCheck == "PENDIENTE") {


                            $valorMostrar = "Aun pendiente de revision";
                        } else {

                            $valorMostrar = "Aun pendiente de revision";
                        }

                    ?>

                        <tr>
                            <td><?php echo  $herrInventarios['cantidad'] ?></td>
                            <td><?php echo  $herrInventarios['herramienta'] ?></td>
                            <td><?php echo  $valorMostrar  ?></td>
                            <td> <img src="http://tallergeorgio.hopto.org:5613/tallergeorgio/imagenes/herramienta/" <?php echo $herrInventarios['foto'] ?> width="100px" height="auto"></td>
                        </tr>

                    <?php

                    }

                    ?>

                </tbody>
            </table>
            <br>
    <?php

        }
    }
    ?>


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