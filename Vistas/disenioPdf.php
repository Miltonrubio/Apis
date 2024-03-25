<?php

ob_start();

require_once "../Models/BD.php";


$id_ser_venta = $_GET['id'];;



$modelo = new ModeloBD();
$datos = $modelo->ConsultarServiciosActivosPorID($id_ser_venta);


$modeloChecks = new ModeloBD();
$todosLosChecks = $modeloChecks->ConsultarChecksDeUnServicioPorId();


$modeloRefacciones = new ModeloBD();
$todosLasRefacciones = $modeloRefacciones->ConsultarRefaccion($id_ser_venta);



$modeloManoDeObra = new ModeloBD();
$manoDeObra = $modeloManoDeObra->ConusltaManoObra($id_ser_venta);




$modeloFotos = new ModeloBD();
$fotos = $modeloFotos->ConsultafotosUnidad($id_ser_venta);


if (!empty($datos)) {

    if (is_array($datos)) {
        $datos = json_encode($datos);
    }
    $datosDelServicio = json_decode($datos);
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

    <!--  <link href="http://<?php // echo $_SERVER['HTTP_HOST'] 
                                ?>/apitallergeorgio-georgiomovil/librerias/Bootstrap5/css/bootstrap.min.css" rel="stylesheet"> -->

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

            <H5 class="texto-tabla-centrado"> DATOS DEL CLIENTE </H5>
            <table>
                <tbody>

                    <tr>
                        <td class="fondogris texto-izquierda">Nombre: </td>
                        <td><?php echo  $datosCliente->nombre; ?> </td>

                        <td class="fondogris texto-izquierda">Direccion: </td>
                        <td><?php echo  $datosCliente->domicilio; ?> </td>

                        <td class="fondogris texto-izquierda">Telefono: </td>
                        <td><?php echo  $datosCliente->telefono; ?> </td>

                        <td class="fondogris texto-izquierda">Email: </td>
                        <td><?php echo  $datosCliente->email; ?> </td>
                    </tr>
                    <tr>
                        <td class="fondogris texto-izquierda">Marca:</td>
                        <td><?php echo  $datosCliente->marcaI; ?> </td>

                        <td class="fondogris texto-izquierda ">Modelo </td>
                        <td><?php echo  $datosCliente->modeloI; ?> </td>

                        <td class="fondogris texto-izquierda">Año: </td>
                        <td><?php echo  $datosCliente->anioI; ?> </td>

                        <td class="fondogris texto-izquierda">Placas: </td>

                        <td><?php echo  $datosCliente->placasI; ?> </td>
                    </tr>
                    <tr>
                        <td class="fondogris texto-izquierda">VIN: </td>
                        <td><?php echo  $datosCliente->vinI; ?> </td>

                        <td class="fondogris texto-izquierda" rowspan="2">Motor: </td>
                        <td rowspan="2"><?php echo  $datosCliente->motorI; ?> </td>


                        <td class="fondogris texto-izquierda">Kilometraje: </td>
                        <td><?php echo  $datosCliente->kilometraje; ?> </td>

                        <td class="fondogris texto-izquierda" rowspan="2">Combustible: </td>
                        <td rowspan="2"><?php echo  $datosCliente->gasolina; ?> </td>
                    </tr>
                    <tr>
                        <td class="fondogris texto-izquierda">Fecha Entrada</td>
                        <td><?php echo  $datosCliente->fecha_ingreso; ?> </td>

                        <td class="fondogris texto-izquierda">Fecha salida: </td>
                        <td><?php echo  $datosCliente->fecha_salida; ?> </td>
                    </tr>
                </tbody>
            </table>


            <H5 class="texto-tabla-centrado"> MOTIVO DE INGRESO</H5>
            <table>
                <tbody>
                    <tr>
                        <td class="fondogris texto-izquierda">FECHA: </td>
                        <td class="fondogris texto-izquierda">DESCRIPCION</td>
                        <td class="fondogris texto-izquierda">SERVICIO </td>
                    </tr>
                    <tr>
                        <td><?php echo  $datosCliente->fecha_ingreso; ?> </td>
                        <td><?php echo  $datosCliente->motivoingreso; ?> </td>
                        <td><?php echo  $datosCliente->estatus; ?> </td>
                    </tr>
                </tbody>
            </table>
    <?php
        }
    }

    ?>



    <div class="contenedor clearfix">
        <div class="mitad-izquierda">

            <H5 class="texto-tabla-centrado"> CHECKS </H5>

            <table>
                <tbody>
                    <?php

                    if (empty($todosLosChecks)) {
                        echo "No se encontraron datos";
                    } else {

                        foreach ($todosLosChecks as $Checks) {
                            $modeloChekListValor = new ModeloBD();

                            $idcategoria = $Checks['idcheckcatego'];
                            $checklist = $modeloChekListValor->ConsultarCheck_servicio_salida($id_ser_venta, $idcategoria);

                    ?>
                            <tr>

                                <td class="fondogris texto-izquierda"><?php echo  $Checks['nombre'] ?> </td>
                                <td class="fondogris texto-izquierda">BNO: </td>
                                <td class="fondogris texto-izquierda">REG: </td>
                                <td class="fondogris texto-izquierda">MALO: </td>
                                <td class="fondogris texto-izquierda">N/A: </td>
                            </tr>

                            <?php

                            if (empty($checklist)) {
                            } else {
                                foreach ($checklist as $ChecksMondongo) {

                            ?>
                                    <tr>

                                        <td><?php echo  $ChecksMondongo['descripcion']   ?></td>

                                        <?php

                                        $valorCheck = $ChecksMondongo['valorcheck'];
                                        if ($valorCheck == "M") {

                                            $bueno = "";
                                            $regular = "";
                                            $malo = "x";
                                            $NA = "";
                                        } else if ($valorCheck == "B") {

                                            $bueno = "x";
                                            $regular = "";
                                            $malo = "";
                                            $NA = "";
                                        } else if ($valorCheck == "R") {

                                            $bueno = "";
                                            $regular = "x";
                                            $malo = "";
                                            $NA = "";
                                        } else if ($valorCheck == "PENDIENTE") {

                                            $bueno = "";
                                            $regular = "";
                                            $malo = "";
                                            $NA = "";
                                        } else {

                                            $bueno = "";
                                            $regular = "";
                                            $malo = "";
                                            $NA = "x";
                                        }

                                        ?>
                                        <td><?php echo $bueno  ?></td>
                                        <td><?php echo $regular ?></td>
                                        <td><?php echo $malo ?></td>
                                        <td><?php echo $NA  ?></td>


                                    </tr>
                            <?php


                                }
                            }
                            ?>
                    <?php

                        }
                    }
                    ?>



                </tbody>
            </table>
        </div>

        <div class="mitad-derecha">

            <H5 class="texto-tabla-centrado"> FOTOS DE UNIDAD</H5>
            <br>

            <div class="contenedor-imagenes">
                <?php


                if (empty($fotos)) {
                } else {
                    foreach ($fotos as $fotoUnidad) {
                ?>
                        <img class="imagen" src="http://tallergeorgio.hopto.org:5613/tallergeorgio/imagenes/unidades/<?php echo  $fotoUnidad['foto'] ?>">

                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <br>





    <H5 class="texto-tabla-centrado"> REFACCIONES </H5>
    <table>
        <tbody>
            <tr>
                <td class="fondogris texto-izquierda">CLAVE: </td>
                <td class="fondogris texto-izquierda">CANTIDAD</td>
                <td class="fondogris texto-izquierda">UNIDAD</td>
                <td class="fondogris texto-izquierda">DESCRIPCION</td>
                <td class="fondogris texto-izquierda">PRECIO</td>
                <td class="fondogris texto-izquierda">IMPORTE</td>
                <td class="fondogris texto-izquierda">DESCUENTO</td>

            </tr>


            <?php
            if (empty($todosLasRefacciones)) {
                echo "No se encontraron datos";
            } else {
                foreach ($todosLasRefacciones as $refacciones) {
            ?>

                    <tr>
                        <td><?php echo  $refacciones['clave'] ?></td>
                        <td><?php echo  $refacciones['cantidad'] ?></td>
                        <td><?php echo  $refacciones['unidad'] ?></td>
                        <td><?php echo  $refacciones['descripcion'] ?></td>
                        <td><?php echo  $refacciones['precio'] ?></td>
                        <td><?php echo  $refacciones['importe'] ?></td>
                        <td><?php echo  $refacciones['descuento'] ?></td>
                    </tr>
            <?php
                }
            }

            ?>
        </tbody>
    </table>




    <H5 class="texto-tabla-centrado"> MANO DE OBRA </H5>
    <table>
        <tbody>
            <tr>
                <td class="fondogris texto-izquierda">FECHA: </td>
                <td class="fondogris texto-izquierda">DESCRIPCION</td>
                <td class="fondogris texto-izquierda">MECANICO</td>
            </tr>

            <?php


            if (empty($manoDeObra)) {
                echo "No se encontraron datos";
            } else {
                foreach ($manoDeObra as $mano) {
            ?>

                    <tr>
                        <td><?php echo  $mano['fecha'] ?></td>
                        <td><?php echo  $mano['motivoingreso'] ?></td>
                        <td><?php echo  $mano['nombre'] ?></td>
                    </tr>
            <?php

                }
            }


            ?>
        </tbody>
    </table>





    <footer>

        <div class="contenedor clearfix elemento-fijo">
            <div class="mitad-izquierda">
                <p class="text-center linea-debajo"> <?php echo $nombreCliente ?></p>
                <p class="text-center "> Nombre y firma del cliente </p>
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