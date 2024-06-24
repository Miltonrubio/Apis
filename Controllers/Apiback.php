<?php
require_once 'Controler.php';



if (!empty($_POST['opcion'])) {
  $opcion = $_POST['opcion'];
  $control = new Peticiones();
  switch ($opcion) {
    case 1:
      $telefono = $_POST['telefono'];
      $password = $_POST['password'];
      $dato = $control->Login($telefono, $password);

      break;
    case 2:
      $dato =  $control->ConsultarServiciosActivos();
      break;
    case 3:
      $idventa = $_POST['idventa'];
      $dato =  $control->ConsultarRefaccion($idventa);
      break;
    case 4:
      $idusuario = $_POST['idusuario'];
      $token = $_POST['token'];
      $dato =  $control->Actualizartoken($idusuario, $token);
      break;
    case 5:

      $dato =  $control->ConsultarUsuario();
      break;
    case 6:
      $idventa = $_POST['idventa'];
      $dato =  $control->ConsultarMecanicos($idventa);
      break;
    case 7:
      $idventa = $_POST['idventa'];
      $dato =  $control->BitacoraMecanicos($idventa);
      break;
    case 8:
      $idventa = $_POST['idventa'];
      $dato =  $control->ConsultafotosUnidad($idventa);
      break;
    case 9:
      $idventa = $_POST['idventa'];
      $foto = $_FILES['image'];
      // $tipo = $_POST['tipo'];
      // $idserfoto  = $_POST['id_ser_fotos'];
      $dato =  $control->ModificarfotosUnidad($idventa, $foto);
      break;
    case 10:
      $idventa = $_POST['idventa'];
      $foto = $_POST['foto'];
      // $tipo = $_POST['tipo'];
      // $idserfoto  = $_POST['id_ser_fotos'];
      $dato =  $control->EstablecerfotoVenta($idventa, $foto);
      break;
    case 11:
      $idventa = $_POST['idventa'];
      $dato = $control->ConsultaChecks($idventa);
      break;
    case 12:
      // $idventa = $_POST['idventa'];
      date_default_timezone_set('America/Mexico_City');
      $idcheck = $_POST['idcheck'];
      $valoritem = $_POST['valorcheck'];
      $fecha =  date('Y-m-d');
      $hora = date('h:i:s');
      $dato = $control->ActualizarChecks($idcheck, $valoritem, $fecha, $hora);
      break;
    case 13:
      $id = $_POST['id'];
      $dato = $control->ConsultarArrastre($id);
      break;
    case 14:
      $id = $_POST['id_arrastre'];
      $dato = $control->ConsultarRutas($id);
      break;
    case 15:
      $dato = $control->ConsultarChoferes();
      break;
    case 16:
      $dato = $control->ConsultarArrastresTodo();
      break;
    case 17:
      date_default_timezone_set('America/Mexico_City');
      $horaFinal = date('h:i:s');
      $fechafinal =  date('Y-m-d');
      $id = $_POST['id'];
      $dato = $control->ModificarArrastres($horaFinal, $id, $fechafinal);

      break;
    case 18:
      $idarrastre  = $_POST['id_arrastre'];
      $dato  = $control->DatosChofer($idarrastre);

      break;
    case 19:

      $dato  = $control->ConsultarClientes();

      break;
    case 20:
      $idcliente = $_POST['id_ser_cliente'];
      $dato = $control->ConsultarUnidadesCliente($idcliente);
      break;
    case 21:
      date_default_timezone_set('America/Mexico_City');
      $idunidad = $_POST['idunidad'];
      $idcliente = $_POST['id_ser_cliente'];
      $km = $_POST['km'];
      $combustible = $_POST['gas'];
      $motivo  =  $_POST['motivo'];
      $fechaIngreso = date('Y-m-d');
      $horaIngreso  = date('H:i:s', time());
      $marca = $_POST['marca'];
      $modelo = $_POST['modelo'];
      $motor  = $_POST['motor'];
      $vin  = $_POST['vin'];
      $placas = $_POST['placas'];
      $anio = $_POST['anio'];
      $dato = $control->IngresarServicio($idunidad, $idcliente, $km, $combustible, $motivo, $fechaIngreso, $horaIngreso, $marca, $modelo, $motor, $vin, $placas, $anio);

      break;
    case 22:

      $dato = $control->ConsultarServicio();

      break;
    case 23:
      $idmecanico = $_POST['idmecanico'];
      $dato = $control->ConsultarServiciosMec($idmecanico);

      break;

    case 24:
      $idmecanico = $_POST['idmecanico'];
      // $idbitacora = $_POST['idbitacora'];
      // $estatus = $_POST['estatus'];
      // $hora = date("H:i:s");
      $dato = $control->Finalizar($idmecanico);

      break;
    case 27:

      /*
      $idmecanico = $_POST['idmecanico'];
      $idbitacora = $_POST['idbitacora'];
      $estatus = $_POST['estatus'];
      $hora = date("H:i:s");
      $dato = $control->PausaroFinalizado($idmecanico, $idbitacora, $estatus, $hora);
*/


      $idpersonal = $_POST['idmecanico'];
      $idbitacora = $_POST['idbitacora'];
      $estatus = $_POST['estatus'];
      $hora = date("H:i:s");
      $observaciones = $_POST['observacion'];

      $control->CambiarEstadoActividad($idpersonal, $hora, $estatus, $idbitacora, $observaciones);


      break;
    case 25:
      $idmecanico = $_POST['idmecanico'];
      $dato = $control->ConsultarServicioMec($idmecanico);

      break;
    case 26:
      $idservicio = $_POST['idservicio'];
      $dato = $control->ConsultarMecSer($idservicio);

      break;
    case 28:
      $idserventa = $_POST['idserventa'];
      $dato = $control->ConsultarVentas($idserventa);
      break;
    case 29:
      $idventa = $_POST['idventa'];
      $dato = $control->ConsultaChecksSalida($idventa);
      break;
    case 30:
      // $idventa = $_POST['idventa'];
      date_default_timezone_set('America/Mexico_City');
      $idcheck = $_POST['idcheck'];
      $valoritem = $_POST['valorcheck'];
      $fecha =  date('Y-m-d');
      $hora = date('h:i:s');
      $dato = $control->ActualizarChecksSalida($idcheck, $valoritem, $fecha, $hora);
      break;
    case 31:
      // $idventa = $_POST['idventa'];
      $nombre = $_POST['nombre'];
      $domicilio = $_POST['domicilio'];
      $telefono = $_POST['telefono'];
      $email = $_POST['email'];
      $obs = $_POST['obs'];
      $dato = $control->AgregarCliente($nombre, $domicilio, $telefono, $email, $obs);
      break;
    case 32:

      $dato = $control->ConsultarMarca();
      break;
    case 33:

      $dato = $control->ConsultarModelo();
      break;

    case 34:
      $idcliente = $_POST['idcliente'];
      $marca = $_POST['idmarca'];
      $modelo = $_POST['idmodelo'];
      $anio = $_POST['anio'];
      $placas = $_POST['placas'];
      $vin = $_POST['vin'];
      $motor = $_POST['motor'];
      $tipo = $_POST['tipo'];
      $foto = $_POST['foto'];

      $dato = $control->AgregarUnidad($marca, $modelo, $anio, $placas, $vin, $motor, $tipo, $idcliente, $foto);
      break;
    case 35:
      $marca = $_POST['marca'];
      $dato = $control->AgregarMarca($marca);
      break;
    case 36:
      $marca = $_POST['idmarca'];
      $modelo = $_POST['modelo'];
      $dato = $control->AgregarModelo($marca, $modelo);
      break;
    case 37:
      $dato =  $control->ConsultarServiciosEntregados();
      break;
    case 38:
      $idventa = $_POST['idventa'];
      $dato = $control->ConsultaChecksTecnico($idventa);
      break;
    case 39:
      date_default_timezone_set('America/Mexico_City');
      $idcheck = $_POST['idcheck'];
      $valoritem = $_POST['valorcheck'];
      $fecha =  date('Y-m-d');
      $hora = date('h:i:s');
      $dato = $control->ActualizarChecksTecnico($idcheck, $valoritem, $fecha, $hora);
      break;
    case 40:
      $dato = $control->ConsultaGavetas();
      break;
    case 41:
      $idHerramienta = $_POST['idHerramienta'];
      $fotoHerramienta = $_FILES['fotoHerramienta'];


      $dato = $control->CambiarFotoHerramienta($idHerramienta, $fotoHerramienta);

      break;
    case 42:

      $id_gabeta = $_POST['id_gabeta'];
      $id_cajon = $_POST['id_cajon'];
      $dato = $control->ConsultarHerramienrtasPorCajonYGaveta($id_gabeta, $id_cajon);

      break;
    case 43:

      $nombreHerramienta = $_POST['nombreHerramienta'];
      $descripHerramienta = $_POST['descripHerramienta'];
      $cantidadHerramientas = $_POST['cantidadHerramientas'];
      $id_cajon = $_POST['id_cajon'];
      $dato = $control->AgregarHerramienta($nombreHerramienta, $descripHerramienta, $cantidadHerramientas, $id_cajon);

      break;
    case 44:

      $idHerramienta = $_POST['idHerramienta'];
      $dato = $control->EliminarHerramienta($idHerramienta);

      break;
    case 45:

      $nombreGaveta = $_POST['nombreGaveta'];
      $descripcionGaveta = $_POST['descripcionGaveta'];
      $numCajones = $_POST['numCajones'];


      $control->AgregarGaveta($nombreGaveta, $descripcionGaveta, $numCajones);

      break;
    case 46:
      $id_gabeta = $_POST['id_gabeta'];

      $control->EliminarGaveta($id_gabeta);
      break;
    case 47:

      $control->ConsultarTodasLasHerramientas();
      break;
    case 48:

      $control->ConsultarTodosMecanicos();
      break;
    case 49:

      $id_gabeta = $_POST['id_gabeta'];
      $id_mecanico = $_POST['id_mecanico'];

      $control->AsignarMecanicoAGaveta($id_gabeta, $id_mecanico);
      break;

    case 50:

      $idventa = $_POST['idventa'];
      $control->GenerarPdf($idventa);

      break;
    case 51:

      $control->MostrarTodasMaquinas();
      break;
    case 52:

      $nombre = $_POST['nombreMaquina'];
      $marca = $_POST['marcaMaquina'];
      $modelo = $_POST['modeloMaquina'];
      $nserie = $_POST['nserieMaquina'];
      $codigo = $_POST['codigoMaquina'];
      $fadquisicion = $_POST['fadquisicionMaquina'];
      $costo = $_POST['costoMaquina'];
      $area = $_POST['area'];
      $estatus = $_POST['estatus'];
      $obs = $_POST['obs'];

      $control->AgregarMaquina($nombre, $marca, $modelo, $nserie, $codigo, $fadquisicion, $costo, $area, $estatus, $obs);
      break;
    case 53:

      $idmaquina = $_POST['idmaquina'];
      $control->EliminarMaquina($idmaquina);
      break;
    case 54:
      $idresponsable = $_POST['idresponsable'];
      $idmaquina = $_POST['idmaquina'];
      $control->AsignarMecanicoAMaquina($idmaquina, $idresponsable);
      break;
    case 55:

      $idmaquina = $_POST['idmaquina'];
      $fotoMaquina = $_FILES['fotoMaquina'];

      $control->SubirFotosMaquinas($idmaquina, $fotoMaquina);
      break;


    case 56:


      $idgabeta = $_POST['idgabeta'];
      $idencargado = $_POST['idencargado'];
      $mecanico = $_POST['idmecanico'];

      $control->LevantarInventario($idgabeta, $idencargado, $mecanico);

      break;

    case 57:


      $idgabeta = $_POST['idgabeta'];

      $control->ConsultarTodosLosInventariosPorGaveta($idgabeta);

      break;

    case 58:

      $estadoHerramienta = $_POST['estadoHerramienta'];
      $idinv = $_POST['idinv'];
      $control->actualizarEstadoHerramienta($estadoHerramienta, $idinv);
      break;

    case 59:
      $iddocga = $_POST['iddocga'];
      $control->ActualizarEstadoInventario($iddocga);
      break;

    case 60:


      $control->VerTodosLosUsuarios();
      break;

    case 61:

      $id_bitacora = $_POST['id_bitacora'];
      $tipo = $_POST['tipo'];
      $fotoActividad = $_FILES['fotoActividad'];
      $control->SubirFotosActividades($fotoActividad, $id_bitacora, $tipo);

      break;



    case 62:
      $id_bitacora = $_POST['id_bitacora'];
      $control->consultarTodasLasEvidenciasPorActividad($id_bitacora);

      break;

    case 63:

      $idpersonal = $_POST['idpersonal'];

      $control->validarSiEstaOcupado($idpersonal);
      break;

    case 64:
      $control->ConsultarTiposActividades();
      break;

    case 65:

      $idpersonal = $_POST['idpersonal'];
      $idactividad = $_POST['idactividad'];
      $observaciones = $_POST['observaciones'];
      $fotoActividad = $_FILES['fotoActividad'];

      $control->IniciarActividad($idpersonal, $idactividad, $observaciones, $fotoActividad);

      //  $control->AsignarActividadAMecanicoLibre($idpersonal, $idactividad, $observaciones, $fotoActividad);
      break;

    case 66:
      $control->ConsultarCategoriaCheck();
      break;

    case 67:

      $idcategoria = $_POST['idcategoria'];
      $idventa = $_POST['idventa'];
      $control->ConsultarCheck_servicio_salida($idventa, $idcategoria);
      break;

    case 68:

      $idventa = $_POST['idventa'];
      $control->ConusltaManoObra($idventa);
      break;

    case 69:

      $cantidadHerr = $_POST['cantidadHerr'];
      $idinv = $_POST['idinv'];

      $control->actualizarPiezas($cantidadHerr, $idinv);
      break;

    case 70:

      $idgabeta = $_POST['idgabeta'];
      $control->GenerarPdfInventariosPorGaveta($idgabeta);

      break;

    case 71:

      $id_bitacora = $_POST['id_bitacora'];
      $control->ConsultarFotosPorActividad($id_bitacora);

      break;


    case 72:

      $idpersonal = $_POST['idpersonal'];
      $control->ConsultarActividadesFinalizadas($idpersonal);
      break;

    case 73:

      $registro_actividades = $_POST['registro_actividades'];
      $control->NuevaApiParaMostrarActividadesPorRegistro($registro_actividades);
      break;



    case 74:

      $fecha = $_POST['fecha'];
      $ID_usuario = $_POST['ID_usuario'];
      $control->AgregarRegistroDeActividades($fecha, $ID_usuario);
      break;


    case 75:

      $fecha = $_POST['fecha'];
      $ID_usuario = $_POST['ID_usuario'];
      $control->ConsultarRegistroActividadesActivos($fecha, $ID_usuario);
      break;


    case 76:

      $ID_check_actividad = $_POST['ID_check_actividad'];
      $valor_check = $_POST['valor_check'];
      $control->ActualizarCheckActividad($ID_check_actividad, $valor_check);
      break;


    case 77:

      $ID_registro_actividades = $_POST['ID_registro_actividades'];
      $control->FinalizarRegistroActividades($ID_registro_actividades);
      break;

      /*
    case 78:

      $idcliente = $_POST['idcliente'];
      $idventa = $_POST['idventa'];

      $control->GenerarPdfCheckEntrada($idventa, $idcliente);

      break;
*/


    case 79:

      $idcliente = $_POST['idcliente'];
      $idventa = $_POST['idventa'];

      $control->GenerarPdfCheckSalida($idventa, $idcliente);

      break;


    case 80:

      $idcliente = $_POST['idcliente'];
      $idventa = $_POST['idventa'];

      $control->GenerarPdfCheckTecnico($idventa, $idcliente);

      break;


    case 81:

      $idcliente = $_POST['idcliente'];
      $idventa = $_POST['idventa'];

      $control->GenerarPdfMecanico($idventa, $idcliente);

      break;


    case 82:

      $idcliente = $_POST['idcliente'];
      $idventa = $_POST['idventa'];

      $control->GenerarPdfRefacciones($idventa, $idcliente);

      break;

    case 83:

      $idcliente = $_POST['idcliente'];
      $idventa = $_POST['idventa'];

      $control->GenerarPdfRecepcion($idventa, $idcliente);

      break;


    case 84:

      $ID_usuario = $_POST['ID_usuario'];
      $fechaInicio = $_POST['fechaInicio'];
      $fechaFin = $_POST['fechaFin'];

      $control->ConsultarActividadesPorUsuarioYFecha($ID_usuario, $fechaInicio, $fechaFin);

      break;

    case 85:

      $ID_usuario = $_POST['ID_usuario'];
      $fechaInicio = $_POST['fechaInicio'];
      $fechaFin = $_POST['fechaFin'];

      $control->GenerarPDFActividades($ID_usuario, $fechaInicio, $fechaFin);

      break;


    case 86:


      $control->ConsultarListadoActividades();

      break;

    case 87:

      $nombre_actividad = $_POST['nombre_actividad'];

      $control->RegistrarNuevaActividad($nombre_actividad);

      break;


    case 88:

      $ID_listado_actividad = $_POST['ID_listado_actividad'];

      $control->EliminarActividad($ID_listado_actividad);

      break;


    case 89:

      $ID_listado_actividad = $_POST['ID_listado_actividad'];
      $nombre_actividad = $_POST['nombre_actividad'];

      $control->EditarListadoActividad($ID_listado_actividad, $nombre_actividad);

      break;


    case 90:

      $control->MostrarTiposUnidades();
      break;

    case 91:

      $nombre_tipo = $_POST['nombre_tipo'];
      $foto = $_FILES['foto'];

      $control->AgregarNuevoTipoUnidad($nombre_tipo, $foto);

      break;

    case 92:

      $nombre_tipo = $_POST['nombre_tipo'];
      $ID_tipo_unidad = $_POST['ID_tipo_unidad'];
      $control->EditarNombreTipoUnidad($nombre_tipo, $ID_tipo_unidad);
      break;



    case 93:
      $ID_tipo_unidad = $_POST['ID_tipo_unidad'];
      $control->EliminarTipoUnidad($ID_tipo_unidad);
      break;


    case 94:
      $ID_listado_actividad = $_POST['ID_listado_actividad'];
      $control->ReactivarListadoActividad($ID_listado_actividad);
      break;


    case 95:

      $nombre_tipo = $_POST['nombre_tipo'];
      $foto = $_FILES['foto'];
      $ID_tipo_unidad = $_POST['ID_tipo_unidad'];
      $control->EditarTipoUnidad($nombre_tipo, $foto, $ID_tipo_unidad);

      break;




    case 96:

      $ID_tipo_unidad = $_POST['ID_tipo_unidad'];
      $tipo_check = $_POST['tipo_check'];
      $valor_check = $_POST['valor_check'];


      $control->EditarCheckTipoUnidades($ID_tipo_unidad, $tipo_check, $valor_check);

      break;


    case 97:
      $tipo_check = $_POST['tipo_check'];
      $id_ser_venta = $_POST['id_ser_venta'];

      $control->MostrarChecksPorUnidad($id_ser_venta, $tipo_check);
      break;



    case 98:
      $valor_check = $_POST['valor_check'];
      $ID_valor_check = $_POST['ID_valor_check'];

      $control->ActualizarNuevosChecks($ID_valor_check, $valor_check);
      break;


    case 99:
      $tipo_check = $_POST['tipo_check'];
      $id_ser_venta = $_POST['id_ser_venta'];

      $control->ConsultarChecksVacios($id_ser_venta, $tipo_check);
      break;


    case 100:
      $tipo_check = $_POST['tipo_check'];
      $id_ser_venta = $_POST['id_ser_venta'];
      $observaciones = $_POST['observaciones'];

      $control->FinalizarRevisionChecks($id_ser_venta, $tipo_check, $observaciones);
      break;


    case 101:
      $id_ser_cliente = $_POST['id_ser_cliente'];
      $control->ConsultarUnidadesDeUnCliente($id_ser_cliente);
      break;


    case 102:
      date_default_timezone_set('America/Mexico_City');
      $idunidad = $_POST['idunidad'];
      $idcliente = $_POST['id_ser_cliente'];
      $km = $_POST['km'];
      $combustible = $_POST['gas'];
      $motivo  =  $_POST['motivo'];
      $fechaIngreso = date('Y-m-d');
      $horaIngreso  = date('H:i:s', time());
      $marca = $_POST['marca'];
      $modelo = $_POST['modelo'];
      $motor  = $_POST['motor'];
      $vin  = $_POST['vin'];
      $placas = $_POST['placas'];
      $anio = $_POST['anio'];
      $foto = $_POST['foto'];
      $tipounidad = $_POST['tipounidad'];
      //  $numeroInyectores = $_POST['numeroInyectores'];
      $dato = $control->IngresarServicioConFoto($idunidad, $idcliente, $km, $combustible, $motivo, $fechaIngreso, $horaIngreso, $marca, $modelo, $motor, $vin, $placas, $anio, $foto, $tipounidad /*, $numeroInyectores */);
      break;




    case 103:

      $ID_ser_venta = $_POST['ID_ser_venta'];
      $nuevoEstado = $_POST['nuevoEstado'];
      $dato = $control->ActualizarEstadoUnidad($ID_ser_venta, $nuevoEstado);
      break;


    case 104:
      $ID_ser_venta = $_POST['ID_ser_venta'];
      $dato = $control->ConusltaManoObraPorServicio($ID_ser_venta);
      break;


    case 105:
      $ID_ser_venta = $_POST['ID_ser_venta'];
      $observaciones = $_POST['observaciones'];
      $idpersonal = $_POST['idpersonal'];
      $control->AsignarActividadAServicio($ID_ser_venta, $observaciones, $idpersonal);
      break;


    case 106:
      $id_registro_actividades = $_POST['id_registro_actividades'];
      $dato = $control->ConsultarChecksVaciosActvidadesMecanicos($id_registro_actividades);
      break;


    case 107:
      $control->ObtenerEncargado();
      break;

    case 108:
      $idusuario = $_POST['idusuario'];
      $dato = $control->ActualizarEncargado($idusuario);
      break;

    case 109:
      $id_ser_venta = $_POST['id_ser_venta'];
      $iddoc = $_POST['iddoc'];
      $control->ActualizarIDDoc($iddoc, $id_ser_venta);
      break;



    case 110:
      $nombre = $_POST['nombre'];
      $email = $_POST['email'];
      $telefono = $_POST['telefono'];
      $password = $_POST['password'];
      $permisos = $_POST['permisos'];
      $empresa = $_POST['empresa'];
      $area = $_POST['area'];

      $control->AgregarNuevoUsuario($nombre, $email, $telefono, $password, $permisos, $empresa, $area);


      break;


    case 111:

      $nombre = $_POST['nombre'];
      $email = $_POST['email'];
      $telefono = $_POST['telefono'];
      $password = $_POST['password'];
      $permisos = $_POST['permisos'];
      $empresa = $_POST['empresa'];
      $area = $_POST['area'];
      $idusuario = $_POST['idusuario'];

      $control->EditarUsuario($nombre, $email, $telefono, $password, $permisos, $empresa, $area, $idusuario);

      break;


    case 112:
      $idventa = $_POST['idventa'];
      $clave = $_POST['clave'];
      $cantidad = $_POST['cantidad'];


      $descripcion = $_POST['descripcion'];
      $precio = $_POST['precio'];
      $unidad = $_POST['unidad'];
      $importe = $_POST['importe'];
      $descuento = $_POST['descuento'];
      $tipo = $_POST['tipo'];


      $control->AsignarHerramientaAServicio($idventa, $clave, $cantidad, $descripcion, $precio, $unidad, $importe, $descuento, $tipo);
      break;

    default:
      echo 'Opcion no registrada';
      break;


    case 113:
      $idrefaccion = $_POST['idrefaccion'];

      $control->EliminarRefaccionDeServicio($idrefaccion);
      break;


    case 114;


      $idrefaccion = $_POST['idrefaccion'];
      $observaciones = $_POST['observaciones'];

      $control->AgregarComentarioARefaccion($idrefaccion, $observaciones);
      break;



    case 115:

      $idbitacora = $_POST['idbitacora'];
      $observaciones = $_POST['observaciones'];

      $control->EditarActividadDeMecanico($idbitacora, $observaciones);
      break;




    case 116:

      $id_ser_venta = $_POST['id_ser_venta'];

      $control->ConsultarInyectores($id_ser_venta);
      break;



    case 117:
      $control->ConsultarServiciosInyectores();
      break;



    case 118:
      $ID_unidad = $_POST['ID_unidad'];
      $motivo_ingreso = $_POST['motivo_ingreso'];
      $numeroInyectores = $_POST['numeroInyectores'];
      // $tipo = $_POST['tipo'];

      $control->AgregarServicioInyectores($ID_unidad, $motivo_ingreso, $numeroInyectores);
      break;



    case 119:
      $ID_inyector = $_POST['ID_inyector'];
      $control->ConsultarCheckXInyector($ID_inyector);
      break;

    case 120:
      $ID_check_inyector = $_POST['ID_check_inyector'];
      $valor_check = $_POST['valor_check'];
      $control->ActualizarChecksInyectores($ID_check_inyector, $valor_check);

      break;


    case 121:
      $ID_inyector = $_POST['ID_inyector'];
      $comentarios = $_POST['comentarios'];
      $control->FinalizarRevision($ID_inyector, $comentarios);

      break;

    case 122:

      $ID_inyector = $_POST['ID_inyector'];
      $control->ConsultarFotosInyectores($ID_inyector);
      break;

    case 123:

      $fotoInyector = $_FILES['foto'];
      $ID_inyector = $_POST['ID_inyector'];
      $control->SubirFotoInyector($ID_inyector, $fotoInyector);

      break;


    case 124:


      $ID_inyector = $_POST['ID_inyector'];
      $control->ConsultarManoDeObraInyectores($ID_inyector);
      break;

    case 125:

      $ID_inyector = $_POST['ID_inyector'];
      $observaciones = $_POST['observaciones'];
      $costo = $_POST['costo'];
      $ID_mecanico = $_POST['ID_mecanico'];
      $control->AgregarManoDeObraInyector($ID_inyector, $observaciones, $ID_mecanico, $costo);
      break;

    case 126:

      $ID_serv_inyector = $_POST['ID_serv_inyector'];
      $nuevoStatus = $_POST['nuevoStatus'];
      $control->CambiarStatusServicioInyector($ID_serv_inyector, $nuevoStatus);
      break;


    case 127:

      $ID_serv_inyector = $_POST['ID_serv_inyector'];
      $iddocSelec = $_POST['iddocSelec'];
      $control->AsignarNotaAServInyector($ID_serv_inyector, $iddocSelec);
      break;

    case 128:


      $id_inyector = $_POST['id_inyector'];
      $control->ConsultarRefaccionXInyector($id_inyector);
      break;



    case 129:


      $id_inyector = $_POST['id_inyector'];
      $clave = $_POST['clave'];
      $cantidad = $_POST['cantidad'];


      $descripcion = $_POST['descripcion'];
      $precio = $_POST['precio'];
      $unidad = $_POST['unidad'];
      $importe = $_POST['importe'];
      $descuento = $_POST['descuento'];
      $tipo = $_POST['tipo'];


      $control->AsignarRefaccionesAInyector($id_inyector, $clave, $cantidad, $descripcion, $precio, $unidad, $importe, $descuento, $tipo);
      break;

    case 130:

      $ID_servicio_inyector = $_POST['ID_servicio_inyector'];
      $clave = $_POST['clave'];
      $cantidad = $_POST['cantidad'];


      $descripcion = $_POST['descripcion'];
      $precio = $_POST['precio'];
      $unidad = $_POST['unidad'];
      $importe = $_POST['importe'];
      $descuento = $_POST['descuento'];
      $tipo = $_POST['tipo'];

      $control->AsignarInsumoAServicioInyector($ID_servicio_inyector, $clave, $cantidad, $descripcion, $precio, $unidad, $importe, $descuento, $tipo);


      break;



    case 131:
      $idrefaccion = $_POST['idrefaccion'];

      $control->EliminarInsumoAServicio($idrefaccion);
      break;



    case 132:
      $ID_serv_inyector = $_POST['ID_serv_inyector'];
      $control->ConsultarInsumosXServInyector($ID_serv_inyector);
      break;

    case 133:


      $ID_inyector = $_POST['ID_inyector'];
      $control->FinalizarRevisionInyector($ID_inyector);

      break;

    case 134:



      $ID_serv_inyector = $_POST['ID_serv_inyector'];
      $control->ConsultarNumFinalizados($ID_serv_inyector);

      break;



    case 135:
      $control->ConsultarServiciosInyectoresEntregados();
      break;

    case 138:

      $ID_serv = $_POST['ID_serv'];
      $DOCID = $_POST['DOCID'];
      $NOMBRE = $_POST['NOMBRE'];
      $EMISOR = $_POST['EMISOR'];
      $NUMERO = $_POST['NUMERO'];
      $ESTADO = $_POST['ESTADO'];
      $FECHA = $_POST['FECHA'];
      $FECCAN = $_POST['FECCAN'];
      $TOTAL = $_POST['TOTAL'];
      $NOTA = $_POST['NOTA'];


      $control->AsinarTraspasoAServicio($ID_serv, $DOCID, $NOMBRE, $EMISOR, $NUMERO, $ESTADO, $FECHA, $FECCAN, $TOTAL, $NOTA);

      break;





    case 139:
      $id_ser_venta = $_POST['id_ser_venta'];
      $control->ConsultaTraspasosPorServicio($id_ser_venta);
      break;

    case 140:
      $ID_traspaso = $_POST['ID_traspaso'];
      $DOCID = $_POST['DOCID'];

      $control->DesvincularTraspaso($ID_traspaso, $DOCID);

      break;



    case 141:


      $ID_serv_inyector = $_POST['ID_serv_inyector'];
      $DOCID = $_POST['DOCID'];
      $NOMBRE = $_POST['NOMBRE'];
      $EMISOR = $_POST['EMISOR'];
      $NUMERO = $_POST['NUMERO'];
      $ESTADO = $_POST['ESTADO'];
      $FECHA = $_POST['FECHA'];
      $FECCAN = $_POST['FECCAN'];
      $TOTAL = $_POST['TOTAL'];
      $NOTA = $_POST['NOTA'];


      $control->AsinarTraspasoAServicioDeInyector($ID_serv_inyector, $DOCID, $NOMBRE, $EMISOR, $NUMERO, $ESTADO, $FECHA, $FECCAN, $TOTAL, $NOTA);
      break;


    case 142:
      $id_serv_inyector = $_POST['id_serv_inyector'];
      $control->ConsultaTraspasosPorServicioInyectores($id_serv_inyector);
      break;




    case 143:


      $ID_inyector = $_POST['ID_inyector'];
      $DOCID = $_POST['DOCID'];
      $NOMBRE = $_POST['NOMBRE'];
      $EMISOR = $_POST['EMISOR'];
      $NUMERO = $_POST['NUMERO'];
      $ESTADO = $_POST['ESTADO'];
      $FECHA = $_POST['FECHA'];
      $FECCAN = $_POST['FECCAN'];
      $TOTAL = $_POST['TOTAL'];
      $NOTA = $_POST['NOTA'];


      $control->AsinarTraspasoAInyector($ID_inyector, $DOCID, $NOMBRE, $EMISOR, $NUMERO, $ESTADO, $FECHA, $FECCAN, $TOTAL, $NOTA);
      break;




    case 144:
      $ID_inyector = $_POST['ID_inyector'];
      $control->ConsultaTraspasosPorInyectores($ID_inyector);
      break;

    case 145:
      $ID_serv_inyector = $_POST['ID_serv_inyector'];
      $control->GenerarPDFRecepcionInyector($ID_serv_inyector);
      break;


    case 146:
      $ID_serv_inyector = $_POST['ID_serv_inyector'];
      $control->GenerarPDFSalidaInyector($ID_serv_inyector);
      break;


    case 147:
      $ID_serv_inyector = $_POST['ID_serv_inyector'];
      $control->GenerarPDFRefaccionesDeInyector($ID_serv_inyector);
      break;


    case 148:
      $ID_serv_inyector = $_POST['ID_serv_inyector'];
      $control->GenerarPDFManoDeObraDeInyector($ID_serv_inyector);
      break;


    case 149:

      $idbitacora = $_POST['idbitacora'];
      $actividadCorregida = $_POST['actividadCorregida'];
      $nuevoCosto = $_POST['nuevoCosto'];
      $control->EditarActividadDeInyector($idbitacora, $actividadCorregida, $nuevoCosto);

      break;


    case 150:
      $id_gabeta = $_POST['id_gabeta'];
      $frecuencia = $_POST['frecuencia'];
      $control->asignarAlarmaAGaveta($id_gabeta, $frecuencia);
      break;


    case 151:
      $iddocga = $_POST['iddocga'];
      $id_gabeta = $_POST['id_gabeta'];
      $control->FinalizarRevisionInventario($iddocga, $id_gabeta);
      break;


    case 152:

      $idgabeta = $_POST['idgabeta'];
      $EditdescripcionGaveta = $_POST['EditdescripcionGaveta'];
      $EditnombreGaveta = $_POST['EditnombreGaveta'];
      $control->EditarGaveta($EditnombreGaveta, $EditdescripcionGaveta, $idgabeta);
      break;


    case 153:

      $id_gabeta = $_POST['id_gabeta'];
      $control->mostrarPDFDeGaveta($id_gabeta);
      break;



    case 154:

      $id_gabeta = $_POST['id_gabeta'];
      $control->mostrarPDFDeInventarios($id_gabeta);
      break;




    case 155:

      $ID_usuario = $_POST['ID_usuario'];
      $control->ConsultarTokenCheckTaller($ID_usuario);
      break;

    case 156:

      $ID_usuario = $_POST['ID_usuario'];
      $tokenreparto = $_POST['tokenreparto'];
      $control->ActualizarTokenReparto($ID_usuario, $tokenreparto);
      break;


      case 157:

      $marca = $_POST['marca'];
      $control->InsertarMarca($marca);

      break;


    case 158:


      $idMarca = $_POST['idMarca'];
      $modelo = $_POST['modelo'];
      $control->InsertarModelo($idMarca, $modelo);
      break;

      /*

function mostrarPDFDeInventarios(id_gabeta) {
  var url = '../Controlador/ReportesPDF/pdfInventariosPorGaveta.php?id_gabeta=' + id_gabeta;
  window.open(url, '_blank');
}



function mostrarPDFDeGaveta(id_gabeta) {
  var url = '../Controlador/ReportesPDF/pdfContenidoGaveta.php?id_gabeta=' + id_gabeta;
  window.open(url, '_blank');
}

*/
  }
}
