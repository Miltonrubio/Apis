<?php

use Dompdf\Dompdf;
use Dompdf\Options;

define('METHOD', 'AES-256-CBC');
define('SECRET_KEY', '$CARLOS@2016');
define('SECRET_IV', '101712');
require_once 'BD.php';

class ModeloBD
{
  private $modelo;
  private $db;

  public function __construct()
  {
    $this->modelo = array();
    $servidor = gethostname();
    if ($servidor == "bitalaserv05") {
      //  $this->db = new PDO('mysql:host=localhost;dbname=georgio2023', 'admintaller', 'Taller2023');
      $this->db = new PDO('mysql:host=localhost;dbname=georgio2024', 'admintaller', 'Taller2023');
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } else {

      $this->db = new PDO('mysql:host=192.168.16.252;dbname=georgio2023', 'admintaller', 'Taller2023');
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //   }
      // $this->db = new PDO('mysql:host=localhost;dbname=georgio2023', 'admintaller', 'Taller2023');    
      // $this->db = new PDO('mysql:host=192.168.1.252;dbname=georgio2023', 'admintaller', 'Taller2023');    
      //    $this->db = new PDO('mysql:host=localhost;dbname=tallertemporal', 'milton', 'Taller88');
    }
  }
  function Consultarusurio($telefono, $pass)
  {
    $query = "SELECT U.idusuario,U.nombre,U.email,U.telefono,U.password,U.permisos,U.estado,U.tipo,U.foto, U.token, U.tokenreparto, U.area, U.empresa  FROM adm_usuarios as U left join adm_fotouser as F on U.idusuario=F.idusuario WHERE U.telefono  = ? AND U.password = ? AND U.estado= 'activo' ";
    $result = $this->db->prepare($query);
    $result->bindParam(1, $telefono);
    $result->bindParam(2, $pass);
    $result->execute();
    while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }


  public static function encryption($string)
  {
    $output = FALSE;
    $key = hash('sha256', SECRET_KEY);
    $iv = substr(hash('sha256', SECRET_IV), 0, 16);
    $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
    $output = base64_encode($output);
    return $output;
  }

  function ConsultarServiciosActivos()
  {
    /* $query = "SELECT  V.id_ser_venta,V.id_ser_checklist, V.id_check_mecanico, V.id_ser_anomalia,id_ser_unidad, 
   V.id_ser_refacciones, V.id_ser_usuarios, V.id_ser_cliente, V.fecha_ingreso, V.hora_ingreso, V.total_servicio,
    V.fecha_salida, V.hora_salida, V.motivoingreso, V.estatus, 
    V.observaciones,V.horas, V.kilometraje, V.gasolina, V.servidor, V.anomalias, V.tipounidad, V.marcaI, V.modeloI, 
    V.motorI, V.vinI, V.placasI, V.anioI, V.foto, V.tipo, C.nombre, C.domicilio, C.email, C.telefono
    from ser_ventas AS V 
    INNER JOIN ser_cliente AS C ON V.id_ser_cliente = C.id_ser_cliente  where V.estatus != 'baja' and V.estatus!='archivado' and V.estatus!='ENTREGADO' ORDER BY V.fecha_ingreso DESC, V.hora_ingreso DESC";
   
   */
    $query = "SELECT  
    S.id_ser_venta,
    S.id_ser_unidad,
    S.id_ser_usuarios,
    S.id_ser_cliente,
    C.nombre as NomCliente,
    S.fecha_ingreso,
    S.hora_ingreso,
    S.total_servicio,
    S.fecha_salida,
    S.hora_salida,
    S.motivoingreso,
    S.estatus,
    S.observaciones,
    S.kilometraje,
    S.gasolina,
    U.tipo AS tipounidad,
    MK.name AS marcaI,
    M.name AS modeloI,
    U.motor AS motorI,
    U.vin AS vinI,
    U.placas AS placasI,
    U.anio AS anioI,
    S.foto,
    S.tipo,
    S.hayfoto,
    S.haypago,
    S.haymecanico,
    S.haychecklist,
    S.haycheckTecnico,
    S.iddoc,
    S.haycheckSalida
    from ser_ventas as S 
    inner join ser_cliente as C ON S.id_ser_cliente=C.id_ser_cliente 
    JOIN ser_unidad U ON S.id_ser_unidad = U.id_serv_unidad
    JOIN car_marca MK ON U.marca = MK.id_car_make
    JOIN car_modelo M ON U.modelo = M.id_car_model
    WHERE S.estatus != 'baja' AND S.estatus!='ENTREGADO' 
    AND S.tipounidad != 'Inyector'
     ORDER BY S.id_ser_venta DESC";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function ConsultarRefaccion($idventa)
  {
    $query = "SELECT * FROM  ser_refacciones WHERE  idventa = '$idventa' && estatus!='baja'  ";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }


  function Actualizartoken($idusuario, $token)
  {
    $query = "UPDATE  adm_usuarios SET token = '$token' WHERE idusuario =  '$idusuario'";
    $result = $this->db->prepare($query);
    if ($result->execute()) {
      return true;
    } else {
      return false;
    }
  }
  function ConsultarUsuario()
  {
    $query = "SELECT U.idusuario,U.nombre,U.email,U.telefono,U.password,U.permisos,U.estado,U.tipo,F.foto, U.token, U.tokenreparto, U.area, U.empresa FROM adm_usuarios as U left join adm_fotouser as F on U.idusuario=F.idusuario WHERE  U.estado= 'activo' ";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function ConsultarMecanicos($idventa)
  {
    // $query = "SELECT * FROM ser_motivo_ingreso AS I INNER JOIN pro_personal AS P ON I.mec_asig = P.idpersonal WHERE id_ser_venta = '$idventa' ";
    $query = "SELECT I.id_motivo_ingreso, I.id_ser_venta,  I.fecha, I.estatus, I.tipo_servicio, I.fecha_programada, I.mec_asig, U.idusuario, U.nombre, U.tipo, U.area, U.foto FROM ser_motivo_ingreso AS I INNER JOIN adm_usuarios AS U ON I.mec_asig = U.idusuario WHERE I.id_ser_venta = '$idventa' AND U.permisos = 'MECANICO' GROUP BY U.nombre";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function BitacoraMecanicos($idventa)
  {
    // $query = "SELECT * FROM pro_bitacora AS B INNER JOIN pro_personal AS P ON B.idpersonal = P.idpersonal  WHERE id_servicio = '$idventa' ";
    $query = "SELECT B.idbitacora, B.idpersonal, B.idactividad, B.id_servicio, B.fecha, B.horainicio, B.horafin, B.observaciones, B.estatus, U.idusuario, U.nombre, U.tipo, U.area, U.foto, U.estado FROM pro_bitacora AS B INNER JOIN adm_usuarios AS U ON B.idpersonal = U.idusuario  WHERE id_servicio = '$idventa ' AND U.permisos = 'MECANICO'";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function ConsultafotosUnidad($idventa)
  {
    $query = "SELECT * FROM ser_fotos  WHERE id_ser_venta = '$idventa' AND estatus='activo' ";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function  ModificarfotosUnidad($idventa,  $foto)
  {
    /*
    // $query = "UPDATE ser_fotos  SET foto= '$foto', tipo = '$tipo' WHERE id_ser_venta =  '$idventa' AND id_ser_fotos = '$idserfoto'";
    $query = "INSERT INTO   ser_fotos(foto, id_ser_venta) VALUES ( '$foto', '$idventa')";
    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }*/

    $checkQuery = "SELECT COUNT(*) as count FROM ser_fotos WHERE id_ser_venta = '$idventa'";
    $checkResult = $this->db->query($checkQuery);
    $rowCount = $checkResult->fetchColumn();

    if ($rowCount == 0) {
      // Ya hay registros con el mismo id_ser_venta, actualizar ser_ventas
      $updateQuery = "UPDATE ser_ventas SET foto = '$foto',  hayfoto='SI' WHERE id_ser_venta = '$idventa'";
      $updateResult = $this->db->prepare($updateQuery);
      $updateResult->execute();


      $insertQueryFotos = "INSERT INTO ser_fotos(foto, id_ser_venta) VALUES ('$foto', '$idventa')";
      $insertResultFotos = $this->db->prepare($insertQueryFotos);
      $insertSuccess = $insertResultFotos->execute();
    } else {
      // No hay registros con el mismo id_ser_venta, realizar la inserción en ser_fotos
      $insertQuery = "INSERT INTO ser_fotos(foto, id_ser_venta) VALUES ('$foto', '$idventa')";
      $insertResult = $this->db->prepare($insertQuery);
      $insertSuccess = $insertResult->execute();

      if (!$insertSuccess) {
        return false; // Si la inserción falla, puedes manejar el error según tus necesidades
      }
    }

    return true;
  }



  function RegistrarFoto($idventa, $foto)
  {
    $query = "UPDATE ser_ventas SET foto = '$foto', hayfoto='SI' where id_ser_venta='$idventa'";
    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }
  function ConsultaChecks($idventa)
  {
    $query = "SELECT * FROM ser_checklist_servicio  WHERE id_ser_venta = '$idventa' ";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function ActualizarChecks($idcheck, $valoritem, $fecha, $hora)
  {
    $query = "UPDATE ser_checklist_servicio SET valorcheck = '$valoritem', fechacheck = '$fecha', horacheck = '$hora' WHERE  idcheck = '$idcheck' ";
    $consulta = $this->db->prepare($query);
    $resul = $consulta->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }
  function  ConsultarChcksID($idcheck)
  {
    $query  = "SELECT id_ser_venta FROM ser_checklist_servicio  WHERE idcheck = '$idcheck'";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }
  function ConsultaChecksSalida($idventa)
  {
    $query = "SELECT CH.idcheck, CH.iditem, CH.descripcion, CH.comentarios, CH.id_user, CH.categoria, CH.id_ser_venta, CH.urlfoto, CH.idcategoria, CH.valorcheck, CH.fechacheck, CH.horacheck, CH.estado FROM ser_checklist_servicio_salida  AS CH INNER JOIN  ser_checklist_categorias AS C ON CH.idcategoria = C.idcheckcatego  WHERE id_ser_venta = '$idventa' AND C.estado ='activo'";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function  ActualizarChecksSalida($idcheck, $valoritem, $fecha, $hora)
  {
    $query = "UPDATE ser_checklist_servicio_salida  SET valorcheck = '$valoritem', fechacheck = '$fecha', horacheck = '$hora' WHERE  idcheck = '$idcheck' ";
    $consulta = $this->db->prepare($query);
    $resul = $consulta->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }

  function  ConsultarChcksIDSalida($idcheck)
  {
    $query  = "SELECT id_ser_venta FROM ser_checklist_servicio_salida WHERE idcheck = '$idcheck'";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }
  function VerEstusUnidad($idventa)
  {
    $query  = "SELECT  * FROM ser_ventas WHERE id_ser_venta = '$idventa' AND estatus = 'LISTO PARA ENTREGA'";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function  ModificarCheckVenta($resul)
  {
    $fechaSalida =  date('Y-m-d');
    $horaSalida = date('h:i:s');
    $query = "UPDATE ser_ventas SET fecha_salida= ' $fechaSalida ',  hora_salida ='$horaSalida' WHERE id_ser_venta = '$resul' ";
    $consulta = $this->db->prepare($query);
    $resul = $consulta->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }
  function ConsultarArrastre($id)
  {

    // $query = "SELECT * FROM ser_arrastres ";
    $query = "SELECT a.id AS arrastre_id,a.id_cliente, a.foto_mapa, a.fecha_inicio, a.hora_inicio, a.fecha_final, a.hora_final, a.kilometros, a.costo_kilometro, a.importe, c.nombre AS chofer_nombre, c.telefono AS chofer_telefono, c.empresa AS chofer_empresa, u.placas AS unidad_placas, mk.name AS unidad_marca, m.name AS unidad_modelo, u.tipo AS unidad_tipo,
            cl.nombre AS cliente_nombre, cl.email AS cliente_email, cl.telefono AS cliente_telefono FROM ser_arrastres a JOIN ser_unidad u ON a.id_unidad = u.id_serv_unidad JOIN car_marca mk ON u.marca = mk.id_car_make JOIN car_modelo m ON u.modelo = id_car_model LEFT JOIN ser_cliente cl ON a.id_cliente = cl.id_ser_cliente
            LEFT JOIN arrastre_choferes ac ON a.id = ac.id_arrastre LEFT JOIN pro_choferes c ON ac.id_chofer = c.idchofer  WHERE a.id = $id";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function     ConsultarRutas($id)
  {
    $query = "SELECT * FROM ser_rutas WHERE id_arrastre = '$id'";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }
  function ConsultarChoferes()
  {
    $query = "SELECT A.id,  (C.nombre)as chofer, (M.name)as marca, (MO.name)as modelo, CL.nombre, AR.foto_mapa, AR.fecha_inicio, AR.hora_inicio, AR.fecha_final, AR.hora_final, AR.kilometros, AR.costo_kilometro, AR.importe, AR.observaciones, AR.estatus
            FROM arrastre_choferes AS A INNER JOIN pro_choferes AS C ON A.id_chofer = C.idchofer INNER JOIN ser_arrastres AS AR  ON A.id_arrastre = AR.id INNER JOIN ser_cliente AS CL  ON  AR.id_cliente = CL.id_ser_cliente 
            INNER JOIN ser_unidad AS U  ON  U.id_serv_unidad = AR.id_unidad  INNER JOIN car_marca AS M ON  U.marca = M.id_car_make INNER JOIN car_modelo AS MO ON  U.modelo = MO.id_car_model;";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }
  function ConsultarArrastresTodo()
  {
    $query = "SELECT ser_arrastres.*, ser_unidad.*, ser_cliente.* FROM ser_arrastres INNER JOIN ser_unidad ON ser_arrastres.id_unidad = ser_unidad.id_serv_unidad LEFT JOIN ser_cliente ON ser_arrastres.id_cliente = ser_cliente.id_ser_cliente;";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }
  function ModificarArrastres($horaFinal, $id, $fechafinal)
  {
    $query = "UPDATE ser_arrastres  SET fecha_final = '$fechafinal', hora_final= '$horaFinal', estatus = 'finalizado'  WHERE id = '$id' ";
    $consulta = $this->db->prepare($query);
    $resul = $consulta->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }

  function DatosChofer($idarrastre)
  {
    $query = "SELECT A.id, A.id_arrastre, A.id_chofer, C.nombre, C.empresa, C.telefono, C.estado FROM arrastre_choferes AS A INNER JOIN pro_choferes AS C ON A.id_chofer = C.idchofer WHERE A.id_arrastre = '$idarrastre'";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }
  function  ConsultarClientes()
  {
    $query = "SELECT * FROM ser_cliente WHERE estado = 'activo' ORDER BY nombre asc";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function ConsultarUnidadesCliente($idcliente)
  {
    $query = "SELECT U.id_serv_unidad,CM.name as Marca,UM.name as Modelo,U.anio,U.placas,U.motor,U.foto,U.vin, U.tipo
    FROM ser_unidad as U inner join car_marca as CM on U.marca=CM.id_car_make inner join car_modelo as UM on U.modelo=UM.id_car_model 
    WHERE U.id_ser_cliente = '$idcliente' and U.estado='activo' and U.tipo='vehiculo' order by U.id_serv_unidad DESC;";
    $consulta = $this->db->prepare(($query));
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function IngresarServicio($idunidad, $idcliente, $km, $combustible, $motivo, $fechaIngreso, $horaIngreso, $marca, $modelo, $motor, $vin, $placas, $anio)
  {
    $query = "INSERT INTO ser_ventas(id_ser_unidad, id_ser_cliente, fecha_ingreso, hora_ingreso, motivoingreso, kilometraje, gasolina, marcaI, modeloI, motorI, vinI, placasI, anioI ) VALUES ('$idunidad', '$idcliente', '$fechaIngreso', '$horaIngreso', '$motivo','$km', '$combustible' , '$marca', '$modelo', '$motor', '$vin', '$placas', '$anio')";
    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }

  function  ConsultarServicio()
  {
    $query = "SELECT adm_usuarios.nombre, adm_usuarios.area, pro_bitacora.idbitacora, pro_bitacora.fecha, pro_bitacora.observaciones, pro_bitacora.horainicio, pro_bitacora.estatus AS bitacora_estatus, adm_usuarios.idusuario  AS id_personal,
            pro_bitacora.idactividad, pro_bitacora.id_servicio, a.nombre AS actividad FROM adm_usuarios  LEFT JOIN (SELECT idpersonal, MAX(idbitacora) AS max_idbitacora FROM pro_bitacora WHERE estatus IN ('activo', 'pausada') GROUP BY idpersonal)
            AS max_bitacora ON adm_usuarios.idusuario = max_bitacora.idpersonal LEFT JOIN pro_bitacora ON max_bitacora.max_idbitacora = pro_bitacora.idbitacora LEFT JOIN pro_actividades a ON pro_bitacora.idactividad = a.idactividad
            WHERE adm_usuarios.area = 'mecanico' AND adm_usuarios.estado = 'activo';";
    $consulta = $this->db->prepare(($query));
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function ConsultarServiciosMec($idmecanico)
  {
    // $query = "SELECT pro_bitacora.*, pro_actividades.nombre AS nombre_actividad, pro_bitacora.estatus AS estatus_actividad, SEC_TO_TIME(SUM(TIME_TO_SEC(pro_horas_totales.horas_trabajadas))) AS bitacora_horasTotales FROM pro_bitacora
    //           JOIN pro_actividades ON pro_bitacora.idactividad = pro_actividades.idactividad LEFT JOIN pro_horas_totales ON pro_horas_totales.idbitacora = pro_bitacora.idbitacora WHERE DATE_FORMAT(pro_bitacora.fecha, '%Y-%m-%d') = CURDATE() 
    //           AND pro_bitacora.idpersonal = '$idmecanico' AND pro_bitacora.idactividad != '0' AND pro_bitacora.estatus = 'finalizada' GROUP BY pro_bitacora.idbitacora";
    $query = "SELECT * FROM pro_bitacora b WHERE b.idpersonal = '$idmecanico' AND b.estatus != 'finalizada' ORDER BY b.idbitacora DESC;";
    $consulta = $this->db->prepare(($query));
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }
  function Finalizar($idbitacora, $estatus, $hora)
  {
    $query = "UPDATE pro_bitacora SET horafin= '$hora', estatus = '$estatus' WHERE idbitacora = '$idbitacora'";
    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }
  function ConsultaRecorrer($idmecanico)
  {
    //  $query = "SELECT p.nombre, p.tipo, b.idbitacora, b.fecha, b.horainicio, b.estatus AS bitacora_estatus, p.idusuario AS id_personal FROM adm_usuarios p LEFT JOIN (SELECT idpersonal, MAX(idbitacora) AS max_idbitacora FROM pro_bitacora b WHERE estatus IN ('activo', 'pendiente') GROUP BY idpersonal) AS max_bitacora 
    //             ON p.idusuario = max_bitacora.idpersonal LEFT JOIN pro_bitacora b ON max_bitacora.max_idbitacora = b.idbitacora WHERE p.tipo = 'mecanico' AND p.estado = 'activo' AND p.idusuario = '$idmecanico' ;";
    $query = "SELECT U.nombre, U.tipo, P.idbitacora, P.fecha, P.horainicio, P.estatus, P.idpersonal  FROM pro_bitacora AS P INNER JOIN adm_usuarios AS U ON P.idpersonal = U.idusuario where estatus like  'activo' AND idpersonal ='$idmecanico'";
    $consulta = $this->db->prepare(($query));
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }
  function ConsultarServicioMec($idmecanico)
  {
    $query = "SELECT  V.fecha_ingreso, V.id_ser_venta, C.nombre, V.id_ser_checklist, V.total_servicio, V.horas, V.kilometraje, V.gasolina, (M.name)as marca, (Mo.name)modelo, U.placas, V.estatus, U.foto, U.anio, V.motivoingreso,V.motorI, V.modeloI, 
            V.marcaI, V.vinI, V.placasI, V.anioI, group_concat('- ', IM.motivoingreso separator '\n'  )as motivoing, ( A.nombre)as nombremec   FROM ser_ventas AS V INNER JOIN ser_cliente AS C ON V.id_ser_cliente = C.id_ser_cliente INNER JOIN
            ser_unidad AS U ON V.id_ser_unidad = U.id_serv_unidad INNER JOIN car_marca AS M ON U.marca = M.id_car_make INNER JOIN car_modelo AS Mo ON U.modelo = Mo.id_car_model INNER JOIN ser_motivo_ingreso AS IM ON V.id_ser_venta = IM.id_ser_venta 
            left JOIN adm_usuarios AS A ON IM.mec_asig = A.idusuario  WHERE V.estatus != 'baja' AND A.idusuario ='$idmecanico'  GROUP BY V.id_ser_venta;";
    $consulta = $this->db->prepare(($query));
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function ConsultarMecSer($idservicio)
  {
    // $query = "SELECT * FROM pro_bitacora b WHERE b.id_servicio = '$idservicio'  ORDER BY b.idbitacora DESC;";
    $query = "SELECT B.idbitacora, B.idpersonal, B.idactividad, B.id_servicio, B.fecha, B.horainicio, B.horafin, B.observaciones, B.estatus, U.nombre, U.telefono, U.tipo, U.area, U.foto FROM pro_bitacora  AS B 
            INNER JOIN adm_usuarios AS U ON B.idpersonal = U.idusuario WHERE B.id_servicio = '$idservicio' AND U.permisos = 'MECANICO' ORDER BY B.idbitacora DESC";
    $consulta = $this->db->prepare(($query));
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function  ConsultarVentas($idserventas)
  {
    $query = "SELECT id_ser_venta, fecha_ingreso, observaciones FROM ser_ventas WHERE  id_ser_venta = $idserventas";
    $consulta = $this->db->prepare(($query));
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }
  function AgregarCliente($nombre, $domicilio, $telefono, $email, $obs)
  {
    $query = "INSERT INTO ser_cliente(nombre, domicilio, email, telefono,  obs) VALUES ('$nombre', '$domicilio', '$email', '$telefono', '$obs')";
    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }
  function  ConsultarCliente()
  {
    $query = "SELECT id_ser_cliente, nombre, domicilio, email, telefono, obs FROM ser_cliente  WHERE estado = 'activo'";
    $consulta = $this->db->prepare(($query));
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }
  function  ConsultarMarca()
  {
    $query = "SELECT * FROM car_marca ";
    $consulta = $this->db->prepare(($query));
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }
  function  ConsultarModelo()
  {
    $query = "SELECT * FROM car_modelo;";
    $consulta = $this->db->prepare(($query));
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }



  function AgregarUnidad($marca, $modelo, $anio, $placas, $vin, $motor, $tipo, $idcliente, $foto)
  {
    $query = "INSERT INTO ser_unidad(marca, modelo, anio, placas,  vin, motor, tipo, id_ser_cliente, foto) VALUE ('$marca', '$modelo', '$anio', '$placas', '$vin', '$motor', '$tipo', '$idcliente', '$foto');";
    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }


  function  AgregarMarca($marca)
  {
    $query = "INSERT INTO car_marca(id_car_make, name, date_create, date_update, id_car_type ) VALUE ('0','$marca' , '1','1','1')";
    $result = $this->db->prepare($query);
    $result->execute();
    if ($result) {
      return true;
    } else {
      return false;
    }
  }
  function  AgregarModelo($marca, $modelo)
  {
    $query = "INSERT INTO car_modelo(id_car_model, id_car_make, name, date_create, date_update, id_car_type ) VALUE ('0','$marca' , '$modelo', '1','1','1')";
    $result = $this->db->prepare($query);
    $result->execute();
    if ($result) {
      return true;
    } else {
      return false;
    }
  }
  function ConsultarServiciosEntregados()
  {


    $query = "SELECT  
   S.id_ser_venta,
   S.id_ser_unidad,
   S.id_ser_usuarios,
   S.id_ser_cliente,
   C.nombre as NomCliente,
   S.fecha_ingreso,
   S.hora_ingreso,
   S.total_servicio,
   S.fecha_salida,
   S.hora_salida,
   S.motivoingreso,
   S.estatus,
   S.observaciones,
   S.kilometraje,
   S.gasolina,
   U.tipo AS tipounidad,
   MK.name AS marcaI,
   M.name AS modeloI,
   U.motor AS motorI,
   U.vin AS vinI,
   U.placas AS placasI,
   U.anio AS anioI,
   S.foto,
   S.tipo,
   S.hayfoto,
   S.haypago,
   S.haymecanico,
   S.haychecklist,
   S.haycheckTecnico,
   S.iddoc,
   S.haycheckSalida
   from ser_ventas as S 
   inner join ser_cliente as C ON S.id_ser_cliente=C.id_ser_cliente 
   JOIN ser_unidad U ON S.id_ser_unidad = U.id_serv_unidad
   JOIN car_marca MK ON U.marca = MK.id_car_make
   JOIN car_modelo M ON U.modelo = M.id_car_model
   where S.estatus != 'baja' AND S.estatus ='ENTREGADO' 
   AND S.tipounidad != 'Inyector'
    ORDER BY S.id_ser_venta DESC";

    /*
    $query = "SELECT  
   S.id_ser_venta,
   S.id_ser_unidad,
   S.id_ser_usuarios,
   S.id_ser_cliente,
   C.nombre as NomCliente,
   S.fecha_ingreso,
   S.hora_ingreso,
   S.total_servicio,
   S.fecha_salida,
   S.hora_salida,
   S.motivoingreso,
   S.estatus,
   S.observaciones,
   S.kilometraje,
   S.gasolina,
   U.tipo AS tipounidad,
   MK.name AS marcaI,
   M.name AS modeloI,
   U.motor AS motorI,
   U.vin AS vinI,
   U.placas AS placasI,
   U.anio AS anioI,
   S.foto,
   S.tipo,
   S.hayfoto,
   S.haypago,
   S.haymecanico,
   S.haychecklist 
   from ser_ventas as S 
   inner join ser_cliente as C ON S.id_ser_cliente=C.id_ser_cliente 
   JOIN ser_unidad U ON S.id_ser_unidad = U.id_serv_unidad
   JOIN car_marca MK ON U.marca = MK.id_car_make
   JOIN car_modelo M ON U.modelo = M.id_car_model
   where S.estatus != 'baja' AND S.estatus='ENTREGADO' ORDER BY S.id_ser_venta DESC";
*/


    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }
  function ConsultaChecksTecnico($idventa)
  {
    $query = "SELECT CT.idcheck, CT.iditem, CT.descripcion, CT.comentarios, CT.id_user, CT.categoria, CT.id_ser_venta, CT.urlfoto, CT.idcategoria, CT.valorcheck, CT.fechacheck, CT.horacheck, CT.estado FROM ser_checklist_tecnico  AS CT INNER JOIN  ser_checklist_categorias AS C ON CT.idcategoria = C.idcheckcatego  WHERE id_ser_venta = '$idventa' AND C.estado ='activo'";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }
  function  ActualizarChecksTecnico($idcheck, $valoritem, $fecha, $hora)
  {
    $query = "UPDATE ser_checklist_tecnico  SET valorcheck = '$valoritem', fechacheck = '$fecha', horacheck = '$hora' WHERE  idcheck = '$idcheck' ";
    $consulta = $this->db->prepare($query);
    $resul = $consulta->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }


  function MostrarGavetas()
  {
    /*
    $query = "SELECT G.id_gabeta, G.nombre AS nombre_gaveta, C.id_cajon, C.nombre AS nombre_cajon, M.idusuario, M.nombre AS nombre_mecanico, M.foto AS foto_mecanico
    FROM inv_gabeta G
    LEFT JOIN inv_cajones C ON G.id_gabeta = C.id_gabeta 
    LEFT JOIN adm_usuarios M ON G.idmecanico = M.idusuario
    WHERE (C.estatus = 'activo' OR C.estatus IS NULL) AND G.estatus = 'activo'
    ORDER BY G.id_gabeta DESC";

    $result = $this->db->prepare($query);
    $result->execute();

    if ($result->rowCount() > 0) {
      $response = array();
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Verificar si la gaveta ya existe en el array de respuesta
        $gavetaExistente = array_filter($response, function ($item) use ($row) {
          return $item['id_gabeta'] == $row['id_gabeta'];
        });

        // Si la gaveta no existe, agregarla al array de respuesta
        if (empty($gavetaExistente)) {
          $gaveta = array(
            'id_gabeta' => $row['id_gabeta'],
            'nombre_gaveta' => $row['nombre_gaveta'],
            'idusuario' => $row['idusuario'],
            'nombre_mecanico' => $row['nombre_mecanico'],
            'foto_mecanico' => $row['foto_mecanico'],
            'cajones' => array()
          );

          $response[] = $gaveta;
        }

        if ($row['id_cajon'] !== null) {
          // Agregar información del cajón al array de cajones de la gaveta
          $cajon = array(
            'id_cajon' => $row['id_cajon'],
            'nombre_cajon' => $row['nombre_cajon']
            // Agrega más atributos del cajón si es necesario
          );

          // Encontrar la gaveta correspondiente en el array de respuesta
          $gavetaIndex = array_search($row['id_gabeta'], array_column($response, 'id_gabeta'));

          // Agregar el cajón al array de cajones de la gaveta
          $response[$gavetaIndex]['cajones'][] = $cajon;

          // Ordenar los cajones por id_cajon ascendente
          usort($response[$gavetaIndex]['cajones'], function ($a, $b) {
            return $a['id_cajon'] - $b['id_cajon'];
          });
        }
      }
      return $response;

      $this->modelo[] = $row;
    } else {
      $this->modelo;
    }
  }
*/


    $query = "SELECT G.id_gabeta, G.descripcion, G.nombre AS nombre_gaveta, G.frecuencia_dias, G.fecha_ultimo_inv, C.id_cajon, C.nombre AS nombre_cajon, M.idusuario, M.nombre AS nombre_mecanico, M.foto AS foto_mecanico
FROM inv_gabeta G
LEFT JOIN inv_cajones C ON G.id_gabeta = C.id_gabeta 
LEFT JOIN adm_usuarios M ON G.idmecanico = M.idusuario
WHERE (C.estatus = 'activo' OR C.estatus IS NULL) AND G.estatus = 'activo'
ORDER BY G.id_gabeta DESC";

    /*
    $query = "SELECT G.id_gabeta, G.descripcion, G.nombre AS nombre_gaveta, C.id_cajon, C.nombre AS nombre_cajon, M.idusuario, M.nombre AS nombre_mecanico, M.foto AS foto_mecanico
      FROM inv_gabeta G
      LEFT JOIN inv_cajones C ON G.id_gabeta = C.id_gabeta 
      LEFT JOIN adm_usuarios M ON G.idmecanico = M.idusuario
      WHERE (C.estatus = 'activo' OR C.estatus IS NULL) AND G.estatus = 'activo'
      ORDER BY G.id_gabeta DESC";

*/
    $result = $this->db->prepare($query);
    $result->execute();

    if ($result->rowCount() > 0) {
      $response = array();
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // Verificar si la gaveta ya existe en el array de respuesta
        $gavetaExistente = array_filter($response, function ($item) use ($row) {
          return $item['id_gabeta'] == $row['id_gabeta'];
        });

        // Si la gaveta no existe, agregarla al array de respuesta
        if (empty($gavetaExistente)) {
          $gaveta = array(
            'id_gabeta' => $row['id_gabeta'],
            'nombre_gaveta' => $row['nombre_gaveta'],
            'descripcion' => $row['descripcion'],
            'idusuario' => $row['idusuario'],
            'nombre_mecanico' => $row['nombre_mecanico'],
            'foto_mecanico' => $row['foto_mecanico'],
            'fecha_ultimo_inv' => $row['fecha_ultimo_inv'],
            'frecuencia_dias' => $row['frecuencia_dias'],
            'cajones' => array()
          );

          $response[] = $gaveta;
        }

        if ($row['id_cajon'] !== null) {
          // Agregar información del cajón al array de cajones de la gaveta
          $cajon = array(
            'id_cajon' => $row['id_cajon'],
            'nombre_cajon' => $row['nombre_cajon']
            // Agrega más atributos del cajón si es necesario
          );

          // Encontrar la gaveta correspondiente en el array de respuesta
          $gavetaIndex = array_search($row['id_gabeta'], array_column($response, 'id_gabeta'));

          // Agregar el cajón al array de cajones de la gaveta
          $response[$gavetaIndex]['cajones'][] = $cajon;

          // Ordenar los cajones por id_cajon ascendente
          usort($response[$gavetaIndex]['cajones'], function ($a, $b) {
            return $a['id_cajon'] - $b['id_cajon'];
          });
        }
      }
      return $response;

      $this->modelo[] = $row;
    } else {
      $this->modelo;
    }
  }


  function MostrarHerramientasPorCajonYGabeta($id_gabeta, $id_cajon)
  {

    $query = "SELECT C.nombre as cajon,H.nombre,H.descripcion,H.costo,H.piezas,H.anomalia,H.foto, H.id_cajon, H.idHerramienta, H.inventario FROM
    inv_herramienta as H INNER JOIN inv_cajones AS C ON H.id_cajon = C.id_cajon
    WHERE H.estado = 0 AND C.estatus = 'activo' AND C.id_gabeta = $id_gabeta AND C.id_cajon=$id_cajon  ORDER BY cajon ASC";

    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function MostrarHerramientasPorGabeta($id_gabeta)
  {

      $query = "SELECT * FROM `inv_herramienta` 
      LEFT JOIN  inv_cajones ON inv_cajones.id_cajon = inv_herramienta.id_cajon
      WHERE inv_cajones.id_gabeta = :id_gabeta AND inv_herramienta.inventario != 'Eliminado'";

      $result = $this->db->prepare($query);
      $result->bindParam(':id_gabeta', $id_gabeta);
      $result->execute();
      while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
          $this->modelo[] = $filas;
      }
      return $this->modelo;
  }




  


  function AgregarHerramienta($nombreHerramienta, $descripHerramienta, $cantidadHerramientas, $id_cajon)
  {
    $query = "INSERT INTO inv_herramienta (nombre, descripcion, piezas,id_cajon) VALUES ('$nombreHerramienta','$descripHerramienta',$cantidadHerramientas,$id_cajon)";
    $result = $this->db->prepare($query);
    $result->execute();
    if ($result) {
      return true;
    } else {
      return false;
    }
  }


  function EliminarHerramienta($idHerramienta)
  {

    $query =  "UPDATE inv_herramienta SET inventario = 'eliminado' WHERE idHerramienta = $idHerramienta";
    $result = $this->db->prepare($query);
    $result->execute();
    if ($result) {
      return true;
    } else {
      return false;
    }
  }


  function AgregarGaveta($nombreGaveta, $descripcionGaveta, $numCajones)
  {

    $query = "INSERT INTO inv_gabeta(nombre, descripcion, num_cajones, idmecanico, estatus) VALUES ('$nombreGaveta', '$descripcionGaveta', '$numCajones', 0, 'activo')";
    $result = $this->db->prepare($query);

    $result->execute();
    if ($result) {
      return $this->db->lastInsertId();
    } else {
      return false;
    }
  }


  function AgregarCajon($nomg, $id_gabeta)
  {
    $query = "INSERT INTO inv_cajones(nombre,id_gabeta,estatus) VALUES ('$nomg',$id_gabeta,'activo')";
    $result = $this->db->prepare($query);
    $result->execute();
    if ($result) {
      return true;
    } else {
      return false;
    }
  }



  function EliminarGavetaYCajones($id_gabeta)
  {
    $query = "UPDATE inv_gabeta SET estatus = 'inactivo' WHERE id_gabeta = $id_gabeta";
    $query2 = "UPDATE inv_cajones SET estatus = 'inactivo' WHERE id_gabeta = $id_gabeta";

    $result = $this->db->prepare($query);
    $result2 = $this->db->prepare($query2);
    $result->execute();
    $result2->execute();
    if ($result && $result2) {
      return true;
    } else {
      return false;
    }
  }


  function MostrarTodasLasHerramientas()
  {

    $query = "SELECT H.idHerramienta, H.foto, H.nombre, H.descripcion, H.costo, H.piezas, C.nombre AS nombre_cajon, G.id_gabeta AS nombre_gaveta, M.nombre AS nombre_mecanico
  FROM inv_herramienta H
  LEFT JOIN inv_cajones C ON C.id_cajon = H.id_cajon
  LEFT JOIN inv_gabeta G ON G.id_gabeta = C.id_gabeta
  LEFT JOIN adm_usuarios M ON M.idusuario = G.idmecanico
  WHERE H.inventario = 'alta'";

    $consulta = $this->db->prepare($query);
    $consulta->execute();

    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }



  function SubirFotosHerramientas($idHerramienta, $fotoHerramienta)
  {

    $opcion = 3;
    $nombreFoto = $this->subirImagenHerramientaAPI($fotoHerramienta, $opcion);
    $query = "UPDATE inv_herramienta SET foto = '$nombreFoto' WHERE idHerramienta = $idHerramienta;";
    $result = $this->db->prepare($query);
    $result->execute();
    if ($result) {
      return true;
    } else {
      return false;
    }
  }


  function ConsultarTodosLosMecanicos()
  {

    $query = "SELECT idusuario, nombre, foto FROM adm_usuarios WHERE tipo like 'MECANICO' AND estado = 'activo' ORDER BY idusuario DESC";
    $result = $this->db->prepare($query);
    $result->execute();
    while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function AsignarMecanicoAGaveta($id_gabeta, $id_mecanico)
  {
    $query = "UPDATE inv_gabeta SET idmecanico = $id_mecanico WHERE id_gabeta = $id_gabeta";;
    $result = $this->db->prepare($query);
    $result->execute();
    if ($result) {
      return true;
    } else {
      return false;
    }
  }



  function GenerarPdf($idventa)
  {
    header("Location: ../Vistas/disenioPdf.php?id=$idventa");
    exit();
  }


  function MostrarTodasMaquinas()
  {
    $query = "SELECT inv_maquinas.*, adm_usuarios.idusuario, adm_usuarios.nombre AS nombreresponsable FROM inv_maquinas
    LEFT JOIN adm_usuarios ON inv_maquinas.idresponsable = adm_usuarios.idusuario WHERE inv_maquinas.estado != 'Eliminado' ";

    $result = $this->db->prepare($query);
    $result->execute();
    while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }



  function AgregarMaquina($nombre, $marca, $modelo, $nserie, $codigo, $fadquisicion, $costo, $area, $estatus, $obs)
  {

    $idresponsable = 0;
    $foto = "default.jpg";
    $estado = "alta";
    $query = "INSERT INTO `inv_maquinas` (`nombre`, `marca`, `modelo`, `nserie`, `codigo`, `fadquisicion`, `costo`,`area`, `idresponsable`,`estatus`,`foto`, `obs`, `estado`) 
   VALUES ('$nombre','$marca','$modelo','$nserie','$codigo','$fadquisicion','$costo','$area','$idresponsable','$estatus','$foto','$obs','$estado')";
    $result = $this->db->prepare($query);
    $result->execute();

    if ($result) {
      return true;
    } else {
      return false;
    }
  }


  function EliminarMaquina($idmaquina)
  {
    $query = "UPDATE inv_maquinas SET estado='Eliminado' WHERE idmaquina= $idmaquina";
    $result = $this->db->prepare($query);
    $result->execute();

    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  function AsignarMecanicoAMaquina($idmaquina, $idresponsable)
  {
    $query = "UPDATE inv_maquinas SET idresponsable=$idresponsable WHERE idmaquina= $idmaquina";
    $result = $this->db->prepare($query);
    $result->execute();

    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  function SubirFotosMaquinas($idmaquina, $fotoMaquina)
  {
    $opcion = 13;
    $nombreFoto = $this->subirImagenHerramientaAPI($fotoMaquina, $opcion);
    $query = "UPDATE inv_maquinas SET foto = '$nombreFoto' WHERE idmaquina = $idmaquina;";
    $result = $this->db->prepare($query);
    $result->execute();
    if ($result) {
      return true;
    } else {
      return false;
    }
  }




  function LevantarInventario($idgabeta, $idencargado, $mecanico)
  {
      try {
          $this->db->beginTransaction();
          $queryInsertDocGabetas = "INSERT INTO inv_doc_gabetas (fecha, hora, idgabeta, idusuario, idencargado, estado) VALUES ( CURDATE(), CURTIME(), '$idgabeta', '$mecanico', '$idencargado', 'pendiente')";
  
          $resulDocGabeta = $this->db->prepare($queryInsertDocGabetas);
  
          if ($resulDocGabeta->execute()) {
  
              $iddocga = $this->db->lastInsertId();
  
              $queryRecorrerCajones = "SELECT * FROM inv_cajones WHERE id_gabeta = :idgabeta";
  
              $resulGavetas = $this->db->prepare($queryRecorrerCajones);
              $resulGavetas->bindParam(':idgabeta', $idgabeta, PDO::PARAM_INT);
              $resulGavetas->execute();
  
              if ($resulGavetas->rowCount() > 0) {
  
                  $herramientasEncontradas = false; // Variable para verificar si se encontraron herramientas
  
                  while ($row = $resulGavetas->fetch(PDO::FETCH_ASSOC)) {
  
                      $idcajon_actual = $row["id_cajon"];
                      $queryHerramienta = "SELECT * FROM inv_herramienta WHERE id_cajon = :idcajon_actual AND inventario = 'alta' ";
                      $resultHerramienta = $this->db->prepare($queryHerramienta);
                      $resultHerramienta->bindParam(':idcajon_actual', $idcajon_actual, PDO::PARAM_INT);
                      $resultHerramienta->execute();
  
                      if ($resultHerramienta->rowCount() > 0) {
                          $herramientasEncontradas = true; // Se encontraron herramientas
  
                          while ($rowHerramienta = $resultHerramienta->fetch(PDO::FETCH_ASSOC)) {
  
                              $idHerramienta = $rowHerramienta["idHerramienta"];
                              $foto = $rowHerramienta["foto"];
                              $nombre = $rowHerramienta["nombre"];
                              $descripcion = $rowHerramienta["descripcion"];
                              $costo = $rowHerramienta["costo"];
                              $piezas = $rowHerramienta["piezas"];
                              //  $estado = $rowHerramienta["estado"];
                              $estado = "pendiente";
                              $anomalia = $rowHerramienta["anomalia"];
                              $inventario = $rowHerramienta["inventario"];
                              $estatus_cobro = $rowHerramienta["estatus_cobro"];
                              $id_cajon_herramienta = $rowHerramienta["id_cajon"];
  
                              $queryInsertInventario = "INSERT INTO inv_herramienta_inventario (iddoc, idgabeta, idcajon, idherramienta, herramienta, idmecanico, idencargado, cantidad, estado, fecha, foto, estatus) VALUES (:iddocga, :idgabeta, :id_cajon_herramienta, :idHerramienta, :nombre, :idMecanico, :idencargado, :piezas, :estado, CURDATE(), :foto, 'activo')";
                              $resultInsertInventario = $this->db->prepare($queryInsertInventario);
                              $resultInsertInventario->bindParam(':iddocga', $iddocga);
                              $resultInsertInventario->bindParam(':idgabeta', $idgabeta);
                              $resultInsertInventario->bindParam(':id_cajon_herramienta', $id_cajon_herramienta);
                              $resultInsertInventario->bindParam(':idHerramienta', $idHerramienta);
                              $resultInsertInventario->bindParam(':nombre', $nombre);
                              $resultInsertInventario->bindParam(':idencargado', $idencargado);
                              $resultInsertInventario->bindParam(':idMecanico', $mecanico);
                              $resultInsertInventario->bindParam(':piezas', $piezas);
                              $resultInsertInventario->bindParam(':estado', $estado);
                              $resultInsertInventario->bindParam(':foto', $foto);
  
                              $resultInsertInventario->execute();
                          }
                      }
                  }
  
                  if (!$herramientasEncontradas) {
                      return "No se encontraron herramientas";
                  }
              }
          }
  
          $this->db->commit();
  
          return "success";
      } catch (\Throwable $th) {
  
          $this->db->rollBack();
          return "error";
      }
  }
  



/*
  function LevantarInventario($idgabeta, $idencargado, $mecanico)
  {

    $fecha_actual = date("Y-m-d");
    $hora_actual = date("H:i:s");

    try {
      $this->db->beginTransaction();
      $queryInsertDocGabetas = "INSERT INTO inv_doc_gabetas (fecha, hora, idgabeta, idusuario, idencargado, estado) VALUES ( CURDATE(), CURTIME(), '$idgabeta', '$mecanico', '$idencargado', 'pendiente')";

      $resulDocGabeta = $this->db->prepare($queryInsertDocGabetas);

      if ($resulDocGabeta->execute()) {


        $iddocga = $this->db->lastInsertId();

        $queryRecorrerCajones = "SELECT * FROM inv_cajones WHERE id_gabeta = :idgabeta";

        $resulGavetas = $this->db->prepare($queryRecorrerCajones);
        $resulGavetas->bindParam(':idgabeta', $idgabeta, PDO::PARAM_INT);
        $resulGavetas->execute();

        if ($resulGavetas->rowCount() > 0) {

          while ($row = $resulGavetas->fetch(PDO::FETCH_ASSOC)) {

            $idcajon_actual = $row["id_cajon"];
            $queryHerramienta = "SELECT * FROM inv_herramienta WHERE id_cajon = :idcajon_actual";
            $resultHerramienta = $this->db->prepare($queryHerramienta);
            $resultHerramienta->bindParam(':idcajon_actual', $idcajon_actual, PDO::PARAM_INT);
            $resultHerramienta->execute();

            if ($resultHerramienta->rowCount() > 0) {

              while ($rowHerramienta = $resultHerramienta->fetch(PDO::FETCH_ASSOC)) {

                $idHerramienta = $rowHerramienta["idHerramienta"];
                $foto = $rowHerramienta["foto"];
                $nombre = $rowHerramienta["nombre"];
                $descripcion = $rowHerramienta["descripcion"];
                $costo = $rowHerramienta["costo"];
                $piezas = $rowHerramienta["piezas"];
                $estado = $rowHerramienta["estado"];
                $anomalia = $rowHerramienta["anomalia"];
                $inventario = $rowHerramienta["inventario"];
                $estatus_cobro = $rowHerramienta["estatus_cobro"];
                $id_cajon_herramienta = $rowHerramienta["id_cajon"];

                $queryInsertInventario = "INSERT INTO inv_herramienta_inventario (iddoc, idgabeta, idcajon, idherramienta, herramienta, idmecanico, idencargado, cantidad, estado, fecha, foto, estatus) VALUES (:iddocga, :idgabeta, :id_cajon_herramienta, :idHerramienta, :nombre, :idMecanico, :idencargado, :piezas, :estado, CURDATE(), :foto, 'activo')";
                $resultInsertInventario = $this->db->prepare($queryInsertInventario);
                $resultInsertInventario->bindParam(':iddocga', $iddocga);
                $resultInsertInventario->bindParam(':idgabeta', $idgabeta);
                $resultInsertInventario->bindParam(':id_cajon_herramienta', $id_cajon_herramienta);
                $resultInsertInventario->bindParam(':idHerramienta', $idHerramienta);
                $resultInsertInventario->bindParam(':nombre', $nombre);
                $resultInsertInventario->bindParam(':idencargado', $idencargado);
                $resultInsertInventario->bindParam(':idMecanico', $mecanico);
                $resultInsertInventario->bindParam(':piezas', $piezas);
                $resultInsertInventario->bindParam(':estado', $estado);
                $resultInsertInventario->bindParam(':foto', $foto);

                $resultInsertInventario->execute();
              }
            }
          }
        }
      }

      $this->db->commit();

      return true;
    } catch (\Throwable $th) {

      $this->db->rollBack();
      return false;
    }
  }
  */


  function ConsultarTodosLosInventariosPorGaveta($idgabeta)
  {
    $query = "SELECT idg.*, ihi.*,idg.estado as EstadoInventario, cajones.nombre as NombreCajon, M.nombre as NombreMecanico, M.idusuario as IDMecanico
        FROM inv_doc_gabetas idg
        LEFT JOIN inv_herramienta_inventario ihi ON idg.iddocga = ihi.iddoc 
        LEFT JOIN adm_usuarios M ON ihi.idencargado = M.idusuario
        LEFT JOIN inv_cajones cajones ON ihi.idcajon = cajones.id_cajon
        WHERE (idg.idgabeta = '$idgabeta')
        ORDER BY idg.iddocga DESC";

    $result = $this->db->prepare($query);
    $result->execute();

    if ($result->rowCount() > 0) {
      $response = array();
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        // Verificar si el doc de inventario ya existe en el array de respuesta
        $docInventarioExistente = array_filter($response, function ($item) use ($row) {
          return $item['iddocga'] == $row['iddocga'];
        });

        // Si doc de inventario no existe, agregarla al array de respuesta
        if (empty($docInventarioExistente)) {
          $docInv = array(
            'iddocga' => $row['iddocga'],
            'estadoInv' => $row['EstadoInventario'],
            'NombreMecanico' => $row['NombreMecanico'],
            'fecha' => $row['fecha'],
            'hora' => $row['hora'],
            'IDMecanico' => $row['IDMecanico'],
            'listaHerramientas' => array(),
            'totalHerramientas' => 0, // Agregamos el contador de herramientas
            'totalPendientes' => 0, // Agregamos el contador de herramientas pendientes
          );

          $response[] = $docInv;
        }

        if ($row['idinv'] !== null) {
          // Incrementar el contador de herramientas
          $docInvIndex = array_search($row['iddocga'], array_column($response, 'iddocga'));
          $response[$docInvIndex]['totalHerramientas']++;

          // Agregar información de las herramientas al array del doc de inventario
          $herramientasInv = array(
            'idinv' => $row['idinv'],
            'estadoHerr' => $row['estado'],
            'estatus' => $row['estatus'],
            'herramienta' => $row['herramienta'],
            'cantidad' => $row['cantidad'],
            'comentarios' => $row['comentarios'],
            'idcajon' => $row['idcajon'],
            'NombreCajon' => $row['NombreCajon'],
            'foto' => $row['foto'],
          );

          // Verificar si la herramienta está pendiente
          if ($row['estado'] == "pendiente") {
            $response[$docInvIndex]['totalPendientes']++; // Incrementar el contador de herramientas pendientes
          }

          // Encontrar las herramientas correspondiente en el array de respuesta
          // Agregar la herramienta al array de herramientas del doc de inventario
          $response[$docInvIndex]['listaHerramientas'][] = $herramientasInv;

          // Ordenar los resultados por id de arriba a abajo
          usort($response[$docInvIndex]['listaHerramientas'], function ($a, $b) {
            return $a['idinv'] - $b['idinv'];
          });
        }
      }
      return $response;

      $this->modelo[] = $row;
    } else {
      $this->modelo;
    }
  }

  /*
  function ConsultarTodosLosInventariosPorGaveta($idgabeta)
  {

    $query = "SELECT idg.*, ihi.*,idg.estado as EstadoInventario, M.nombre as NombreMecanico, M.idusuario as IDMecanico
    FROM inv_doc_gabetas idg
    LEFT JOIN inv_herramienta_inventario ihi ON idg.iddocga = ihi.iddoc 
    LEFT JOIN adm_usuarios M ON ihi.idencargado = M.idusuario
    WHERE (idg.idgabeta = '$idgabeta')
    ORDER BY idg.iddocga DESC";

    $result = $this->db->prepare($query);
    $result->execute();

    if ($result->rowCount() > 0) {
      $response = array();
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        // Verificar si el doc de inventario ya existe en el array de respuesta
        $docInventarioExistente = array_filter($response, function ($item) use ($row) {
          return $item['iddocga'] == $row['iddocga'];
        });

        // Si doc de inventario no existe, agregarla al array de respuesta
        if (empty($docInventarioExistente)) {
          $docInv = array(
            'iddocga' => $row['iddocga'],
            'estadoInv' => $row['EstadoInventario'],
            'NombreMecanico' => $row['NombreMecanico'],
            'fecha' => $row['fecha'],
            'hora' => $row['hora'],
            'IDMecanico' => $row['IDMecanico'],
            'listaHerramientas' => array()
          );

          $response[] = $docInv;
        }

        if ($row['idinv'] !== null) {
          // Agregar información de las herramientas al array del doc de inventario
          $herramientasInv = array(
            'idinv' => $row['idinv'],
            'estadoHerr' => $row['estado'],
            'estatus' => $row['estatus'],
            'herramienta' => $row['herramienta'],
            'cantidad' => $row['cantidad'],
            'comentarios' => $row['comentarios'],
            'idcajon' => $row['idcajon'],
            'foto' => $row['foto'],
          );

          // Encontrar las herramientas correspondiente en el array de respuesta
          $docInvIndex = array_search($row['iddocga'], array_column($response, 'iddocga'));

          // Agregar la herramienta al array de herramientas del doc de inventario
          $response[$docInvIndex]['listaHerramientas'][] = $herramientasInv;

          // Ordenar los resultados por id de arriba a abajo
          usort($response[$docInvIndex]['listaHerramientas'], function ($a, $b) {
            return $a['idinv'] - $b['idinv'];
          });
        }
      }
      return $response;

      $this->modelo[] = $row;
    } else {
      $this->modelo;
    }
  }
*/



  function actualizarEstadoHerramienta($estadoHerramienta, $idinv)
  {

    $query = "UPDATE inv_herramienta_inventario SET estado = '$estadoHerramienta' WHERE idinv=$idinv ";
    $result = $this->db->prepare($query);
    $result->execute();
    if ($result) {
      return true;
    } else {
      return false;
    }
  }


  function actualizarPiezas($cantidadHerr, $idinv)
  {
    $query = "UPDATE inv_herramienta_inventario SET cantidad = '$cantidadHerr' WHERE idinv=$idinv ";
    $result = $this->db->prepare($query);
    $result->execute();
    if ($result) {
      return true;
    } else {
      return false;
    }
  }



  function ActualizarEstadoInventario($iddocga)
  {

    $query = "UPDATE inv_doc_gabetas SET estado = 'Revisado' WHERE iddocga=$iddocga";
    $result = $this->db->prepare($query);
    $result->execute();
    if ($result) {
      return true;
    } else {
      return false;
    }
  }


  function VerTodosLosUsuarios()
  {
    $query = "SELECT * FROM adm_usuarios 
                WHERE estado = 'activo' 
                ORDER BY permisos ASC";

    $result = $this->db->prepare($query);
    $result->execute();

    $usuarios = array();

    while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
      $filas['password'] = $this->decryption($filas['password']); // Desencriptar la contraseña
      $usuarios[] = $filas;
    }

    return $usuarios;
  }


  /*

  function VerTodosLosUsuarios()
  {

    $query = "SELECT * FROM adm_usuarios 
    WHERE estado = 'activo' 
    ORDER BY permisos ASC";    

    $result = $this->db->prepare($query);
    $result->execute();
    while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }
  */


  public static function decryption($string)
  {
    $output = FALSE;
    $key = hash('sha256', SECRET_KEY);
    $iv = substr(hash('sha256', SECRET_IV), 0, 16);
    $string = base64_decode($string);
    $output = openssl_decrypt($string, METHOD, $key, 0, $iv);
    return $output;
  }




  function SubirFotosActividades($fotoActividad, $id_bitacora, $tipo)
  {
    $opcion = 12;
    $nombreFoto = $this->subirImagenHerramientaAPI($fotoActividad, $opcion);
    $query = "INSERT INTO fotos_actividades (id_bitacora, nombre, tipo) VALUES ('$id_bitacora', '$nombreFoto', '$tipo')";
    $result = $this->db->prepare($query);
    $result->execute();
    if ($result) {
      return true;
    } else {
      return false;
    }
  }


  function consultarTodasLasEvidenciasPorActividad($idbitacora)
  {

    $query = "SELECT * FROM fotos_actividades WHERE id_bitacora= $idbitacora";

    $result = $this->db->prepare($query);
    $result->execute();
    while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }


  function validarSiEstaOcupado($idpersonal)
  {

    $query = "SELECT * FROM pro_bitacora WHERE idpersonal=$idpersonal && estatus like '%act%'";
    $result = $this->db->prepare($query);
    $result->execute();

    while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }

    return $this->modelo;
  }


  function CambiarEstadoActividad($hora, $estatus, $idbitacora, $observaciones)
  {

    $query = "UPDATE pro_bitacora SET horafin= '$hora', estatus = '$estatus', comentarios='$observaciones' WHERE idbitacora = '$idbitacora'";
    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }


  function ConsultarTiposActividades()
  {

    $query = "SELECT * FROM `pro_actividades`";

    $result = $this->db->prepare($query);
    $result->execute();
    while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  /*
function IniciarActividad($idpersonal, $idactividad, $observaciones){


  $fechaActual = date("Y-m-d");
  $horaActual = date("H:i:s");

  $query = "INSERT INTO pro_bitacora (idpersonal, idactividad, id_servicio, fecha, horainicio, observaciones, estatus) 
  VALUES ($idpersonal, $idactividad, 0, '$fechaActual', '$horaActual', '$observaciones', 'activo')";
  $result = $this->db->prepare($query);
  $resul = $result->execute();
  if ($resul) {
    return true;
  } else {
    return false;
  }
}
*/


  /*
function IniciarActividad($idpersonal, $idactividad, $observaciones){
  // Verificar si está ocupado
  $ocupado = $this->validarSiEstaOcupado($idpersonal);

  // Si está ocupado, retornar falso y no realizar la inserción
  if (!empty($ocupado)) {
      return false;
  }

  $fechaActual = date("Y-m-d");
  $horaActual = date("H:i:s");

  $query = "INSERT INTO pro_bitacora (idpersonal, idactividad, id_servicio, fecha, horainicio, observaciones, estatus) 
  VALUES ($idpersonal, $idactividad, 0, '$fechaActual', '$horaActual', '$observaciones', 'activo')";

  $result = $this->db->prepare($query);
  $resul = $result->execute();

  return $resul;
}
*/

  function IniciarActividad($idpersonal, $idactividad, $observaciones, $fotoActividad)
  {
    // Iniciar la transacción
    $this->db->beginTransaction();

    try {
      // Verificar si está ocupado
      $ocupado = $this->validarSiEstaOcupado($idpersonal);

      // Si está ocupado, realizar un rollback y retornar falso
      if (!empty($ocupado)) {
        $this->db->rollBack();
        return false;
      }

      $fechaActual = date("Y-m-d");
      $horaActual = date("H:i:s");

      // Primera consulta: Inserción en pro_bitacora
      $query1 = "INSERT INTO pro_bitacora (idpersonal, idactividad, id_servicio, fecha, horainicio, observaciones, estatus) 
      VALUES ($idpersonal, $idactividad, 0, '$fechaActual', '$horaActual', '$observaciones', 'activo')";

      $result1 = $this->db->prepare($query1);
      $resul1 = $result1->execute();

      // Segunda consulta: Tu lógica aquí


      $lastInsertId = $this->db->lastInsertId();

      $opcion = 12;
      $nombreFoto = $this->subirImagenHerramientaAPI($fotoActividad, $opcion);

      // Segunda consulta: Inserción en fotos_actividades utilizando el último ID insertado
      $query2 = "INSERT INTO fotos_actividades (id_bitacora, nombre, tipo) VALUES ('$lastInsertId', '$nombreFoto', 'inicio')";
      $result2 = $this->db->prepare($query2);
      $resul2 = $result2->execute();

      // Completar la transacción si ambas consultas fueron exitosas
      if ($resul1 && $resul2) {
        $this->db->commit();
      } else {
        // Si hay algún error en alguna consulta, realizar un rollback
        $this->db->rollBack();
      }

      // Retornar el resultado de ambas consultas
      return $resul1 && $resul2;
    } catch (Exception $e) {
      // Si hay una excepción, realizar un rollback y lanzar la excepción
      $this->db->rollBack();
      throw $e;
    }
  }








  /*
  function AsignarActividadAMecanicoLibre($idpersonal, $idactividad, $observaciones, $fotoActividad)
  {

    $estatus = 'activo';
    $id_servicio = 0;
    $fechaActual = date("Y-m-d");
    $horaActual = date("H:i:s");


    try {
      $this->db->beginTransaction();

      $query1 = "INSERT INTO pro_bitacora (idpersonal, idactividad, id_servicio, fecha, horainicio, observaciones, estatus) 
      VALUES ($idpersonal, $idactividad, $id_servicio, '$fechaActual', '$horaActual', '$observaciones', '$estatus')";
      $result1 = $this->db->prepare($query1);
      $resul1 = $result1->execute();

      if (!$resul1) {
        throw new Exception("Error en la primera consulta");
      }

      $idInsertado = $this->db->lastInsertId();

      $opcion = 12;
      $nombreFoto = $this->subirImagenHerramientaAPI($fotoActividad, $opcion);

      $query2 = "INSERT INTO fotos_actividades (id_bitacora, nombre, tipo) VALUES ($idInsertado, '$nombreFoto', 'Inicio')";

      $result2 = $this->db->prepare($query2);
      $resul2 = $result2->execute();

      if (!$resul2) {
        throw new Exception("Error en la segunda consulta");
      }

      $this->db->commit();

      return "Todo correcto";
    } catch (Exception $e) {
      $this->db->rollBack();



      return "Error en la transacción: " . $e->getMessage();
    }
  }
*/




  function ConsultarServiciosActivosPorID($id_ser_venta)
  {
    $query = "SELECT  V.id_ser_venta,V.id_ser_checklist, V.id_check_mecanico, V.id_ser_anomalia,id_ser_unidad, V.id_ser_refacciones, V.id_ser_usuarios, V.id_ser_cliente, V.fecha_ingreso, V.hora_ingreso, V.total_servicio, V.fecha_salida, V.hora_salida, V.motivoingreso, V.estatus, 
    V.observaciones,V.horas, V.kilometraje, V.gasolina, V.servidor, V.anomalias, V.tipounidad, V.marcaI, V.modeloI, V.motorI, V.vinI, V.placasI, V.anioI, V.foto, V.tipo, C.nombre, C.domicilio, C.email, C.telefono
    from ser_ventas AS V INNER JOIN ser_cliente AS C ON V.id_ser_cliente = C.id_ser_cliente  where V.estatus != 'baja' and V.estatus!='archivado' and V.estatus!='ENTREGADO' AND V.id_ser_venta=$id_ser_venta ORDER BY V.fecha_ingreso DESC, V.hora_ingreso DESC";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }





  function ConsultarChecksDeUnServicioPorId()
  {

    $query = "SELECT * FROM ser_checklist_categorias  WHERE estado ='activo'";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }


  function ConsultarCheck_servicio_salida($idventa, $idcategoria)
  {
    // $query = "SELECT idcheck,iditem,descripcion,comentarios,id_user,idcategoria,categoria,id_ser_venta,urlfoto,valorcheck FROM ser_checklist_servicio where id_ser_venta=$idventa and idcategoria=$idcatego and estado='activo';";
    $query = "SELECT * FROM ser_checklist_servicio_salida where id_ser_venta=$idventa and idcategoria=$idcategoria  and estado='activo'";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }


  function ConusltaManoObra($idventa)
  {
    $query = "SELECT * FROM  ser_motivo_ingreso  AS M INNER JOIN adm_usuarios  AS P ON M.mec_asig = P.idusuario WHERE id_ser_venta = '$idventa' AND M.estatus != 'baja'";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }






  function GenerarPdfInventariosPorGaveta($idgabeta)
  {
    header("Location: ../Vistas/inventariospdf.php?id=$idgabeta");
    exit();
  }



  function ConsultarFotosPorActividad($id_bitacora)
  {

    //SELECT * FROM `fotos_actividades`
    $query = "SELECT * FROM `fotos_actividades` WHERE id_bitacora=$id_bitacora";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }


  function ConsultarActividadesFinalizadas($idpersonal)
  {

    //SELECT * FROM `fotos_actividades`
    $query = "SELECT * FROM `pro_bitacora` WHERE idpersonal=$idpersonal && estatus like 'fin'";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }








  function NuevaApiParaMostrarActividadesPorRegistro($registro_actividades)
  {

    //SELECT * FROM `fotos_actividades`
    $query = "SELECT *
    FROM check_actividades
    JOIN listado_actividades ON check_actividades.ID_listado_actividades = listado_actividades.ID_listado_actividad WHERE ID_registro_actividades=$registro_actividades";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }


  function AgregarRegistroDeActividades($fecha, $ID_usuario)
  {

    $queryExists = "SELECT `ID_registro_actividades` FROM `registro_actividades` WHERE `fecha` = '$fecha' AND `ID_usuario` = $ID_usuario";
    $resultExists = $this->db->query($queryExists);
    $existingRecord = $resultExists->fetch(PDO::FETCH_ASSOC);

    if ($existingRecord) {
      return $existingRecord['ID_registro_actividades'];
    }

    $query1 = "INSERT INTO `registro_actividades`(`fecha`, `hora`, `ID_usuario`, `estado`) VALUES ('$fecha',CURTIME(),$ID_usuario,'iniciado')";
    $result1 = $this->db->prepare($query1);
    $resul = $result1->execute();

    if ($resul) {
      return $resul;
    } else {
      return "Algo fallo";
    }
  }



  /*
  function AgregarRegistroDeActividades($fecha, $ID_usuario)
  {
    try {
      $this->db->beginTransaction();

      $queryExists = "SELECT `ID_registro_actividades` FROM `registro_actividades` WHERE `fecha` = '$fecha' AND `ID_usuario` = $ID_usuario";
      $resultExists = $this->db->query($queryExists);
      $existingRecord = $resultExists->fetch(PDO::FETCH_ASSOC);

      if ($existingRecord) {
        return $existingRecord['ID_registro_actividades'];
      }

      $query1 = "INSERT INTO `registro_actividades`(`fecha`, `hora`, `ID_usuario`, `estado`) VALUES ('$fecha',CURTIME(),$ID_usuario,'iniciado' )";
      $result1 = $this->db->prepare($query1);
      $resul1 = $result1->execute();

      $ID_registro_actividades = $this->db->lastInsertId();

      if ($resul1) {
        // Segunda consulta para obtener ID_listado_actividades
        $query2 = "SELECT ID_listado_actividad FROM `listado_actividades` WHERE `estatus` = 'alta'";
        $result2 = $this->db->prepare($query2);
        $result2->execute();

        // Recorrer los resultados y agregar registros en la tabla `check_actividades`
        while ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
          $ID_listado_actividad = $row['ID_listado_actividad'];

          // Tercera consulta para insertar registros en la tabla `check_actividades`
          $query3 = "INSERT INTO `check_actividades`(`valor_check`, `ID_listado_actividades`, `ID_registro_actividades`) VALUES ('', $ID_listado_actividad, $ID_registro_actividades)";
          $result3 = $this->db->prepare($query3);
          $result3->execute();
        }

        // Confirmar la transacción
        $this->db->commit();

        return true;
      } else {
        // Si la primera consulta falla, lanza una excepción
        throw new Exception("Error en la primera consulta");
      }
    } catch (Exception $e) {
      // En caso de error, realiza un rollback
      $this->db->rollBack();
      // Devuelve el mensaje de error
      return "Error: " . $e->getMessage();
    }
  }
*/


  function ConsultarRegistroActividadesActivos($fecha, $ID_usuario)
  {

    $queryExists = "SELECT * FROM `registro_actividades` WHERE `fecha` = '$fecha' AND `ID_usuario` = $ID_usuario LIMIT 1";
    $consulta = $this->db->prepare($queryExists);
    $consulta->execute();

    // Verificar si hay resultados
    if ($consulta->rowCount() > 0) {
      // Si hay resultados, obtener el ID_registro_actividades
      $filas = $consulta->fetch(PDO::FETCH_ASSOC);
      $this->modelo[] = $filas;
    } else {
      // Si no hay resultados, asignar "Esta libre"
      $this->modelo = "Esta libre";
    }

    return $this->modelo;
  }








  function ActualizarCheckActividad($ID_check_actividad, $valor_check)
  {

    $query = "UPDATE check_actividades SET valor_check = '$valor_check' WHERE ID_check_actividad = '$ID_check_actividad'";
    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }



  function FinalizarRegistroActividades($ID_registro_actividades)
  {
    $query = "UPDATE registro_actividades SET estado = 'finalizado' WHERE ID_registro_actividades = $ID_registro_actividades";
    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }



  function ConsultarActividadesPorUsuarioYFecha($ID_usuario, $fechaInicio, $fechaFin)
  {
    $query = "SELECT ra.ID_registro_actividades, ra.fecha, ra.hora, ra.ID_usuario, ra.estado, 
    COUNT(ca.ID_check_actividad) AS cantidad_checks,
    la.ID_listado_actividad, la.nombre_actividad, ca.*
FROM registro_actividades ra 
LEFT JOIN check_actividades ca ON ra.ID_registro_actividades = ca.ID_registro_actividades
LEFT JOIN listado_actividades la ON ca.ID_listado_actividades = la.ID_listado_actividad
WHERE ra.ID_usuario = ? AND ra.fecha BETWEEN ? AND ?
GROUP BY ra.ID_registro_actividades, ra.fecha, ra.hora, ra.ID_usuario, ra.estado, la.ID_listado_actividad, la.nombre_actividad
ORDER BY ra.ID_registro_actividades DESC";

    $result = $this->db->prepare($query);
    $result->execute([$ID_usuario, $fechaInicio, $fechaFin]);

    $desglose_actividades = array();

    while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
      $id_registro = $fila['ID_registro_actividades'];

      // Verificar si ya existe una entrada con este ID_registro_actividades
      if (!isset($desglose_actividades[$id_registro])) {
        // Si no existe, agregar una nueva entrada
        $desglose_actividades[$id_registro] = array(
          'ID_registro_actividades' => $id_registro,
          'fecha' => $fila['fecha'],
          'hora' => $fila['hora'],
          'ID_usuario' => $fila['ID_usuario'],
          'estado' => $fila['estado'],
          'cantidad_checks' => $fila['cantidad_checks'],

          'desglose_actividades' => array(),

        );
      }

      // Agregar la información de check_actividades al campo desglose_actividades
      $desglose_actividades[$id_registro]['desglose_actividades'][] = array(
        'ID_check_actividad' => $fila['ID_check_actividad'],
        'valor_check' => $fila['valor_check'],
        'nombre_actividad' => $fila['nombre_actividad'],
        'ID_listado_actividades' => $fila['ID_listado_actividades']
      );
    }

    // Convertir el array asociativo en un array numérico
    return array_values($desglose_actividades);
  }


  /*

  function GenerarPdfCheckEntrada($idventa, $idcliente)
  {
    header("Location: http://tallergeorgio.hopto.org:5611/georgiotemp/web/Controlador/ReportesPDF/PdfCheckEntrada.php?idventa=$idventa&idcliente=$idcliente");
    exit();
  }
*/


  function GenerarPdfCheckSalida($idventa, $idcliente)
  {
    // header("Location:  http://tallergeorgio.hopto.org:5611/georgiotemp/web/Controlador/ReportesPDF/PdfCheckSalida.php?idventa=$idventa&idcliente=$idcliente");
    header("Location:  http://tallergeorgio.hopto.org:5611/georgioapp/georgio/web/Controlador/ReportesPDF/PdfCheckSalida.php?idventa=$idventa&idcliente=$idcliente");

    exit();
  }


  function GenerarPdfCheckTecnico($idventa, $idcliente)
  {
    // header("Location:  http://tallergeorgio.hopto.org:5611/georgiotemp/web/Controlador/ReportesPDF/PDFReporteCheckTecnico.php?idventa=$idventa&idcliente=$idcliente");
    header("Location:  http://tallergeorgio.hopto.org:5611/georgioapp/georgio/web/Controlador/ReportesPDF/PDFReporteCheckTecnico.php?idventa=$idventa&idcliente=$idcliente");
    exit();
  }





  function GenerarPdfMecanico($idventa, $idcliente)
  {
    //  header("Location:  http://tallergeorgio.hopto.org:5611/georgiotemp/web/Controlador/ReportesPDF/PdfMecanicos.php?idventa=$idventa&idcliente=$idcliente");
    header("Location:  http://tallergeorgio.hopto.org:5611/georgioapp/georgio/web/Controlador/ReportesPDF/PdfMecanicos.php?idventa=$idventa&idcliente=$idcliente");
    exit();
  }


  function GenerarPdfRefacciones($idventa, $idcliente)
  {
    // header("Location:  http://tallergeorgio.hopto.org:5611/georgiotemp/web/Controlador/ReportesPDF/PdfRefacciones.php?idventa=$idventa&idcliente=$idcliente");
    header("Location:  http://tallergeorgio.hopto.org:5611/georgioapp/georgio/web/Controlador/ReportesPDF/PdfRefacciones.php?idventa=$idventa&idcliente=$idcliente");
    exit();
  }


  function GenerarPdfRecepcion($idventa, $idcliente)
  {
    //  header("Location:  http://tallergeorgio.hopto.org:5611/georgiotemp/web/Controlador/ReportesPDF/PDFReporteREcepcion.php?idventa=$idventa&idcliente=$idcliente");

    header("Location:  http://tallergeorgio.hopto.org:5611/georgioapp/georgio/web/Controlador/ReportesPDF/PDFReporteREcepcion.php?idventa=$idventa&idcliente=$idcliente");

    exit();
  }
  function GenerarPDFActividades($ID_usuario, $fechaInicio, $fechaFin)
  {
    header("Location: ../Vistas/pdfActividades.php?id=$ID_usuario&fechaInicio=$fechaInicio&fechaFin=$fechaFin");

    exit();
  }

  function ConsultarDatosPorUsuario($ID_usuario)
  {

    //SELECT * FROM `fotos_actividades`
    $query = "SELECT * FROM adm_usuarios WHERE idusuario = $ID_usuario";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }




  function ConsultarListadoActividades()
  {


    $query = "SELECT * FROM `listado_actividades` ORDER BY estatus ASC";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }




  function RegistrarNuevaActividad($nombre_actividad)
  {
    $query = "INSERT INTO `listado_actividades`(`nombre_actividad`, `estatus`) VALUES ('$nombre_actividad','alta')";
    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }


  function EliminarActividad($ID_listado_actividad)
  {
    $query = "UPDATE `listado_actividades` SET estatus='baja' WHERE ID_listado_actividad= $ID_listado_actividad";
    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }

  function EditarListadoActividad($ID_listado_actividad, $nombre_actividad)
  {
    $query = "UPDATE `listado_actividades` SET nombre_actividad='$nombre_actividad' WHERE ID_listado_actividad= $ID_listado_actividad";
    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }



  function MostrarTiposUnidades()
  {

    $query = "SELECT * FROM `tipos_unidades` WHERE estado like 'alta'";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }



  function AgregarNuevoTipoUnidad($nombre_tipo, $foto)
  {

    $opcion = 7;
    $nombreFoto = $this->subirImagenHerramientaAPI($foto, $opcion);


    $query = "INSERT INTO tipos_unidades (nombre, estado, foto) 
    VALUES ('$nombre_tipo', 'alta', '$nombreFoto')";

    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }



  function EditarNombreTipoUnidad($nombre_tipo, $ID_tipo_unidad)
  {

    $query = "UPDATE tipos_unidades SET nombre='$nombre_tipo' WHERE ID_tipo_unidad=$ID_tipo_unidad";

    $result = $this->db->prepare($query);
    $respuesta = $result->execute();

    if ($respuesta) {
      return true;
    } else {
      return false;
    }
  }



  function EditarTipoUnidad($nombre_tipo, $foto, $ID_tipo_unidad)
  {
    $opcion = 7;
    $nombreFoto = $this->subirImagenHerramientaAPI($foto, $opcion);

    $query = "UPDATE tipos_unidades SET nombre='$nombre_tipo', foto='$nombreFoto' WHERE ID_tipo_unidad='$ID_tipo_unidad'";

    try {
      $result = $this->db->prepare($query);
      $result->execute();

      if ($result->rowCount() > 0) {
        return true; // La actualización fue exitosa
      } else {
        return "No se encontró ninguna fila para actualizar. Puede que el ID_tipo_unidad no exista.";
      }
    } catch (PDOException $e) {
      // En caso de error, capturamos la excepción y devolvemos un mensaje de error
      return "Error al actualizar el tipo de unidad: " . $e->getMessage();
    }
  }







  function EliminarTipoUnidad($ID_tipo_unidad)
  {

    $query = "UPDATE tipos_unidades SET estado='baja' WHERE ID_tipo_unidad=$ID_tipo_unidad";

    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }


  function ReactivarListadoActividad($ID_listado_actividad)
  {

    $query = "UPDATE listado_actividades SET estatus='alta' WHERE ID_listado_actividad=$ID_listado_actividad";

    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }



  function EditarCheckTipoUnidades($ID_tipo_unidad, $tipo_check, $valor_check)
  {
    $query = "UPDATE tipos_unidades SET $tipo_check='$valor_check' WHERE ID_tipo_unidad=$ID_tipo_unidad";

    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }



  function MostrarChecksPorUnidad($id_ser_venta, $tipo_check)
  {
    $query = " SELECT valor_checks.*, nombres_checks.nombre_check FROM registro_checks 
    INNER JOIN valor_checks ON registro_checks.ID_registro_check = valor_checks.ID_registro_check 
    INNER JOIN nombres_checks ON valor_checks.ID_check = nombres_checks.ID_check 
    WHERE registro_checks.ID_ser_venta = $id_ser_venta AND nombres_checks.tipo_check AND nombres_checks.status = 1 like '$tipo_check'";


    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }


  function ActualizarNuevosChecks($ID_valor_check, $valor_check)
  {


    $query = "UPDATE `valor_checks` SET `valor_check`= '$valor_check' WHERE `ID_valor_check` =  $ID_valor_check";

    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }

  /*
  function ConsultarChecksVacios($id_ser_venta, $tipo_check){
    $query = "SELECT COUNT(*) AS total_registros_con_valor_nulo_o_vacio
        FROM registro_checks 
        INNER JOIN valor_checks ON registro_checks.ID_registro_check = valor_checks.ID_registro_check 
        INNER JOIN nombres_checks ON valor_checks.ID_check = nombres_checks.ID_check 
        WHERE registro_checks.ID_ser_venta = $id_ser_venta 
        AND nombres_checks.tipo_check LIKE '$tipo_check'
        AND (valor_checks.valor_check = 'Pendiente' OR valor_checks.valor_check IS NULL);";

    $consulta = $this->db->prepare($query);
    $consulta->execute();
    $resultado = $consulta->fetchColumn(); // Obtiene el valor del conteo

    return $resultado;
}

*/


  function ConsultarChecksVacios($id_ser_venta, $tipo_check)
  {
    $query = "SELECT valor_checks.*, nombres_checks.nombre_check
FROM registro_checks 
INNER JOIN valor_checks ON registro_checks.ID_registro_check = valor_checks.ID_registro_check 
INNER JOIN nombres_checks ON valor_checks.ID_check = nombres_checks.ID_check 
WHERE registro_checks.ID_ser_venta = $id_ser_venta
AND nombres_checks.status = 1
AND nombres_checks.tipo_check LIKE '$tipo_check'
AND (valor_checks.valor_check LIKE 'Pendiente' OR valor_checks.valor_check IS NULL);";

    $queryChecks = "SELECT valor_checks.*, nombres_checks.nombre_check
FROM registro_checks 
INNER JOIN valor_checks ON registro_checks.ID_registro_check = valor_checks.ID_registro_check 
INNER JOIN nombres_checks ON valor_checks.ID_check = nombres_checks.ID_check 
WHERE registro_checks.ID_ser_venta = $id_ser_venta 
AND nombres_checks.status = 1
AND nombres_checks.tipo_check LIKE '$tipo_check'";

    $consulta = $this->db->prepare($query);
    $consulta->execute();

    $consultaChecks = $this->db->prepare($queryChecks);
    $consultaChecks->execute();
    $total_registros = $consulta->rowCount();

    // Obtener los registros
    $registros = $consultaChecks->fetchAll(PDO::FETCH_ASSOC);

    $mensaje = "Aun sin Finalizar";

    // Verificar si algún registro tiene status_revision igual a "Finalizado"
    foreach ($registros as $row) {
      if ($row['status_revision'] === "Finalizado") {
        $mensaje = "Finalizados";
        break;
      }
    }

    // Devolver un arreglo que contiene el conteo y los registros
    return array('faltantes' => $total_registros, 'registros' => $registros, 'mensaje' => $mensaje);
  }


  /*
function ConsultarChecksVacios($id_ser_venta, $tipo_check){
  $query = "SELECT valor_checks.*, nombres_checks.nombre_check
FROM registro_checks 
INNER JOIN valor_checks ON registro_checks.ID_registro_check = valor_checks.ID_registro_check 
INNER JOIN nombres_checks ON valor_checks.ID_check = nombres_checks.ID_check 
WHERE registro_checks.ID_ser_venta = $id_ser_venta
AND nombres_checks.tipo_check LIKE '$tipo_check'
AND (valor_checks.valor_check LIKE 'Pendiente' OR valor_checks.valor_check IS NULL);";


$queryChecks = "SELECT valor_checks.*,
 nombres_checks.nombre_check
FROM registro_checks 
INNER JOIN valor_checks ON registro_checks.ID_registro_check = valor_checks.ID_registro_check 
INNER JOIN nombres_checks ON valor_checks.ID_check = nombres_checks.ID_check 
WHERE registro_checks.ID_ser_venta = $id_ser_venta 
AND nombres_checks.tipo_check LIKE '$tipo_check'";

  $consulta = $this->db->prepare($query);
  $consulta->execute();

  $consultaChecks = $this->db->prepare($queryChecks);
  $consultaChecks->execute();
  $total_registros = $consulta->rowCount();

  // Obtener los registros
  $registros = $consultaChecks->fetchAll(PDO::FETCH_ASSOC);




  // Devolver un arreglo que contiene el conteo y los registros
  return array('total_registros' => $total_registros, 'registros' => $registros);
}
*/




  function FinalizarRevisionChecks($ID_ser_venta, $tipo_check, $observaciones)
  {

    $query = "UPDATE valor_checks
  INNER JOIN registro_checks ON registro_checks.ID_registro_check = valor_checks.ID_registro_check
  INNER JOIN nombres_checks ON valor_checks.ID_check = nombres_checks.ID_check
  SET valor_checks.status_revision = 'Finalizado'
  WHERE registro_checks.ID_ser_venta = $ID_ser_venta AND nombres_checks.tipo_check LIKE '$tipo_check'";
    $result = $this->db->prepare($query);
    $resul = $result->execute();


    if ($tipo_check == "Entrada") {

      $query2 = "UPDATE `ser_ventas` SET haychecklist= 'SI' WHERE id_ser_venta=$ID_ser_venta";
    } else if ($tipo_check == "Tecnico") {

      $query2 = "UPDATE `ser_ventas` SET haycheckTecnico= 'SI', comentario_tecnico='$observaciones'  WHERE id_ser_venta=$ID_ser_venta";
    } else if ($tipo_check == "Salida") {

      $query2 = "UPDATE `ser_ventas` SET observaciones='$observaciones', haycheckSalida= 'SI'  WHERE id_ser_venta=$ID_ser_venta";
    }

    $result2 = $this->db->prepare($query2);
    $result2 = $result2->execute();

    if ($resul && $result2) {
      return true;
    } else {
      return false;
    }
  }




  function ConsultarUnidadesDeUnCliente($id_ser_cliente)
  {
    $query = "SELECT ser_unidad.*,
  CM.name as marca,
  UM.name as modelo
  FROM `ser_unidad` 
  inner join car_marca as CM on ser_unidad.marca=CM.id_car_make 
  inner join car_modelo as UM on ser_unidad.modelo=UM.id_car_model WHERE id_ser_cliente=$id_ser_cliente and ser_unidad.estado='activo'
  order by ser_unidad.id_serv_unidad DESC;";
    $consulta = $this->db->prepare(($query));
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }


  function IngresarServicioConFoto($idunidad, $idcliente, $km, $combustible, $motivo, $fechaIngreso, $horaIngreso, $marca, $modelo, $motor, $vin, $placas, $anio, $foto, $tipounidad)
  {
    $query = "INSERT INTO ser_ventas(id_ser_unidad, id_ser_cliente, fecha_ingreso, hora_ingreso, motivoingreso, kilometraje, gasolina, marcaI, modeloI, motorI, vinI, placasI, anioI, foto, tipounidad ) 
                VALUES ('$idunidad', '$idcliente', '$fechaIngreso', '$horaIngreso', '$motivo','$km', '$combustible' , '$marca', '$modelo', '$motor', '$vin', '$placas', '$anio', '$foto', '$tipounidad')";
    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      // Devolver el último ID insertado
      return true;
    } else {
      return false;
    }
  }


  function IngresarServicioDeInyector($idunidad, $motivo)
  {


    $query = "INSERT INTO ser_servicio_inyector (ID_unidad, fecha_ingreso, hay_foto,status_servicio, hora_ingreso, motivo_ingreso) 
      VALUES ($idunidad, NOW(),'NO','Pendiente', NOW(), '$motivo')";

    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      // Devolver el último ID insertado
      // return $this->db->lastInsertId();
      return $this->db->lastInsertId();
    } else {
      return false;
    }
  }



  function InsertarInyectores($id_ser_ventas, $numeroInyectores)
  {
    $status_inyector = "Pendiente";


    $query = "INSERT INTO inyectores (nombre_inyector, ID_servicio, status_inyector) VALUES (:nombre_inyector, :ID_servicio, :status_inyector)";
    $result = $this->db->prepare($query);

    for ($i = 1; $i <= $numeroInyectores; $i++) {
      $nombreInyector = "Inyector " . $i;
      $result->bindParam(':nombre_inyector', $nombreInyector);
      $result->bindParam(':ID_servicio', $id_ser_ventas);
      $result->bindParam(':status_inyector', $status_inyector);
      $result->execute();

      if (!$result) {
        return false;
      }
    }

    return true;
  }




  function ActualizarEstadoUnidad($ID_ser_venta, $nuevoEstado)
  {

    if ($nuevoEstado == "ENTREGADO" || $nuevoEstado == "Entregado" ) {

      $query = "UPDATE `ser_ventas` SET `estatus`='$nuevoEstado', `fecha_salida` =NOW(), `hora_salida`=CURDATE() WHERE id_ser_venta= $ID_ser_venta";
    } else {

      $query = "UPDATE `ser_ventas` SET `estatus`='$nuevoEstado' WHERE id_ser_venta= $ID_ser_venta";
    }


    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }







  function ConusltaManoObraPorServicio($ID_ser_venta)
  {
    $query = "SELECT p.nombre, p.foto, p.idusuario, b.idbitacora, b.observaciones, b.fecha FROM pro_bitacora b
    JOIN adm_usuarios p ON b.idpersonal = p.idusuario
    WHERE b.id_servicio = :idventa";
    $result = $this->db->prepare($query);
    $result->bindParam(':idventa', $ID_ser_venta);
    if ($result->execute()) {
      if ($result->rowCount() > 0) {
        while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
          $datos[] = $fila;
        }
        return $datos;
      } else {
        echo "";
      }
    }
    return false;
  }





  function AsignarActividadAServicio($ID_ser_venta, $observaciones, $idpersonal)
  {

    $query = " INSERT INTO `pro_bitacora`(`idpersonal`, `idactividad`, `id_servicio`, `fecha`, `horainicio`, `horafin`, `observaciones`, `estatus`, `comentarios`) 
    VALUES ($idpersonal, 0, $ID_ser_venta, CURDATE(), CURTIME(), null, '$observaciones', 'activo', null)";


    $query2 = "UPDATE `ser_ventas` SET haymecanico= 'SI' WHERE id_ser_venta=$ID_ser_venta";


    $result = $this->db->prepare($query);
    $result2 = $this->db->prepare($query2);

    $resul = $result->execute();
    $resul2 = $result2->execute();


    if ($resul && $resul2) {
      return true;
    } else {
      return false;
    }
  }



  function ConsultarChecksVaciosActvidadesMecanicos($id_registro_actividades)
  {
    $query = "SELECT check_actividades.*, listado_actividades.nombre_actividad
                FROM check_actividades
                JOIN listado_actividades ON check_actividades.ID_listado_actividades = listado_actividades.ID_listado_actividad
                WHERE check_actividades.ID_registro_actividades = $id_registro_actividades";

    $queryVacios = "SELECT check_actividades.*, listado_actividades.nombre_actividad
                      FROM check_actividades
                      JOIN listado_actividades ON check_actividades.ID_listado_actividades = listado_actividades.ID_listado_actividad
                      WHERE check_actividades.ID_registro_actividades = $id_registro_actividades && valor_check=''";


    $consulta = $this->db->prepare($query);
    $consulta->execute();


    $consulta2 = $this->db->prepare($queryVacios);
    $consulta2->execute();



    $total_registros = $consulta2->rowCount();

    $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);

    // Devolver un arreglo que contiene el conteo y los registros
    return array('faltantes' => $total_registros, 'registros' => $registros);
  }





  function ObtenerEncargado()
  {
    $query = "SELECT * FROM adm_usuarios  WHERE encargado = 1 AND estado='activo' ORDER BY idusuario DESC LIMIT 1 ";

    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }



  function ActualizarEncargado($idusuario)
  {
    $query = "UPDATE adm_usuarios SET encargado=0";
    $query2 = "UPDATE adm_usuarios SET encargado=1 WHERE idusuario= $idusuario";


    $result = $this->db->prepare($query);
    $resul = $result->execute();

    $result2 = $this->db->prepare($query2);
    $resul2 = $result2->execute();
    if ($resul && $resul2) {
      return true;
    } else {
      return false;
    }
  }


  function ActualizarIDDoc($iddoc, $id_ser_venta)
  {

    $query = "UPDATE ser_ventas SET iddoc=$iddoc, haypago='SI' WHERE id_ser_venta= $id_ser_venta";

    $result = $this->db->prepare($query);
    $resul = $result->execute();



    if ($resul) {
      return true;
    } else {
      return false;
    }
  }



  function AgregarNuevoUsuario($nombre, $email, $telefono, $password, $permisos, $empresa, $area)
  {

    $contraCodificada = $this->encryption($password);

    $query = "INSERT INTO `adm_usuarios`(`nombre`, `email`, `telefono`, `password`, `token`, `tokenreparto`, `permisos`, `estado`, `tipo`, `area`, `empresa`, `foto`, `encargado`) 
                                VALUES ('$nombre','$email','$telefono', '$contraCodificada','0','0','$permisos', 'activo','$permisos','$area','$empresa','user.jpg',0)  ";

    $result = $this->db->prepare($query);
    $resul = $result->execute();

    if ($resul) {
      return true;
    } else {
      return false;
    }
  }





  function EditarUsuario($nombre, $email, $telefono, $password, $permisos, $empresa, $area, $idusuario)
  {

    $contraCodificada = $this->encryption($password);


    $query = "UPDATE adm_usuarios SET nombre='$nombre', email='$email', telefono='$telefono', password='$contraCodificada', permisos='$permisos', tipo='$permisos', area='$area', empresa='$empresa' WHERE idusuario= $idusuario";


    $result = $this->db->prepare($query);
    $resul = $result->execute();

    if ($resul) {
      return true;
    } else {
      return false;
    }
  }

  function AsignarHerramientaAServicio($idventa, $clave, $cantidad, $descripcion, $precio, $unidad, $importe, $descuento, $tipo)
  {
    $query = "INSERT INTO `ser_refacciones`(`clave`, `cantidad`, `unidad`, `descripcion`, `precio`, `importe`, `descuento`, `tipo`, `estatus`, `idventa`, `fecha`) VALUES 
    ('$clave','$cantidad','$unidad','$descripcion',$precio,'$importe','$descuento','$tipo','activo','$idventa', CURDATE())";

    $result = $this->db->prepare($query);
    $resul = $result->execute();

    if ($resul) {
      return true;
    } else {
      return false;
    }


    /*
      // Consulta para verificar si ya existe un registro con la misma clave
      $check_query = "SELECT COUNT(*) as count FROM `ser_refacciones` WHERE `clave` = '$clave'";
      $check_result = $this->db->query($check_query);
      $check_row = $check_result->fetch(PDO::FETCH_ASSOC);
  
      // Si el conteo es mayor que 0, significa que ya existe un registro con esa clave
      if ($check_row['count'] > 0) {
          // Realizar actualización del registro existente

        $update_query = "UPDATE `ser_refacciones` SET 
    `precio` = $precio, 
    `descuento` = `descuento` + $descuento,
    `importe` = ((`cantidad` + $cantidad) * $precio) - `descuento`, 
    `cantidad` = `cantidad` + $cantidad 
    WHERE `clave` = '$clave' AND idventa = $idventa";

  
       $update_result = $this->db->exec($update_query);
  
          if ($update_result !== false) {
              return true; // La actualización fue exitosa
          } else {
              return false; // Hubo un error en la actualización
          }
      }
  
      // Si no hay registros con la misma clave, procede con la inserción
      $query = "INSERT INTO `ser_refacciones`(`clave`, `cantidad`, `unidad`, `descripcion`, `precio`, `importe`, `descuento`, `tipo`, `estatus`, `idventa`) VALUES 
      ('$clave','$cantidad','$unidad','$descripcion',$precio,'$importe','$descuento','$tipo','activo','$idventa')"; 
  
      $result = $this->db->prepare($query);
      $resul = $result->execute();
  
      if ($resul) {
          return true;
      } else {
          return false;
      }

      */
  }


  //($idventa, $clave, $cantidad, $descripcion, $precio, $unidad, $importe, $descuento, $tipo)

  function AgregarMasRefaccionesAlServicio($idrefaccion, $precio, $cantidad, $descuento)
  {

    $importeTotal = (($precio * $cantidad) - $descuento);
    $query = "UPDATE ser_refacciones SET precio =$precio, cantidad= $cantidad, descuento= $descuento, importe=$importeTotal  WHERE idrefaccion = $idrefaccion";

    $result = $this->db->prepare($query);
    $resul = $result->execute();

    if ($resul) {
      return true;
    } else {
      return false;
    }
  }




  function EliminarRefaccionDeServicio($idrefaccion)
  {

    $query = "UPDATE ser_refacciones SET estatus ='baja' WHERE idrefaccion = $idrefaccion";

    $result = $this->db->prepare($query);
    $resul = $result->execute();

    if ($resul) {
      return true;
    } else {
      return false;
    }
  }




  function AgregarComentarioARefaccion($idrefaccion, $observaciones)
  {

    $query = "UPDATE ser_refacciones SET observaciones ='$observaciones' WHERE idrefaccion = $idrefaccion";

    $result = $this->db->prepare($query);
    $resul = $result->execute();

    if ($resul) {
      return true;
    } else {
      return false;
    }
  }





  function EditarActividadDeMecanico($idbitacora, $observaciones)
  {

    $query = "UPDATE pro_bitacora SET observaciones ='$observaciones' WHERE idbitacora = $idbitacora";

    $result = $this->db->prepare($query);
    $resul = $result->execute();

    if ($resul) {
      return true;
    } else {
      return false;
    }
  }

  function ConsultarInyectores($id_ser_venta)
  {

    $query = "SELECT * FROM `inyectores` WHERE ID_servicio= $id_ser_venta AND status_inyector != 'Eliminado' ";

    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }
  /*
  function ConsultarServiciosInyectores()
  {

    $query = "SELECT ser_unidad.*, ser_cliente.*, ser_servicio_inyector.*, car_marca.name AS MarcaCoche, car_modelo.name AS ModeloCoche
    FROM `ser_servicio_inyector`
    JOIN ser_unidad ON ser_unidad.id_serv_unidad = ser_servicio_inyector.ID_unidad
    JOIN car_marca ON car_marca.id_car_make = ser_unidad.marca
    JOIN car_modelo ON car_modelo.id_car_model = ser_unidad.modelo
    JOIN ser_cliente ON ser_cliente.id_ser_cliente = ser_unidad.id_ser_cliente
    WHERE status_servicio != 'Eliminado' ";



    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

*/



  function ConsultarServiciosInyectores()
  {
    $query = "SELECT ser_unidad.*, ser_cliente.*, ser_servicio_inyector.*, car_marca.name AS MarcaCoche, car_modelo.name AS ModeloCoche
        FROM `ser_servicio_inyector`
        JOIN ser_unidad ON ser_unidad.id_serv_unidad = ser_servicio_inyector.ID_unidad
        JOIN car_marca ON car_marca.id_car_make = ser_unidad.marca
        JOIN car_modelo ON car_modelo.id_car_model = ser_unidad.modelo
        JOIN ser_cliente ON ser_cliente.id_ser_cliente = ser_unidad.id_ser_cliente
        WHERE ser_servicio_inyector.status_servicio != 'Eliminado' AND ser_servicio_inyector.status_servicio != 'Entregado' AND ser_servicio_inyector.status_servicio != 'baja' 
        ORDER BY  ser_servicio_inyector.ID_serv_inyector DESC ";

    $consulta = $this->db->prepare($query);
    $consulta->execute();

    $resultados = array();

    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $ID_serv_inyector = $fila['ID_serv_inyector'];

      $query_inyectores = "SELECT * FROM `inyectores` WHERE ID_servicio = :id_serv_inyector AND status_inyector != 'Eliminado'";
      $consulta_inyectores = $this->db->prepare($query_inyectores);
      $consulta_inyectores->bindParam(':id_serv_inyector', $ID_serv_inyector);
      $consulta_inyectores->execute();

      $inyectores = array();
      $total_registros = 0;
      $finalizados = 0;

      while ($fila_inyector = $consulta_inyectores->fetch(PDO::FETCH_ASSOC)) {
        $inyectores[] = $fila_inyector;
        $total_registros++;
        if ($fila_inyector['status_inyector'] == 'Finalizado') {
          $finalizados++;
        }
      }

      $fila['listado_inyectores'] = array(
        'inyectores' => $inyectores,
        'total_registros' => $total_registros,
        'finalizados' => $finalizados
      );

      $resultados[] = $fila;
    }

    return $resultados;
  }





  function ConsultarServiciosInyectoresEntregados()
  {
    $query = "SELECT ser_unidad.*, ser_cliente.*, ser_servicio_inyector.*, car_marca.name AS MarcaCoche, car_modelo.name AS ModeloCoche
        FROM `ser_servicio_inyector`
        JOIN ser_unidad ON ser_unidad.id_serv_unidad = ser_servicio_inyector.ID_unidad
        JOIN car_marca ON car_marca.id_car_make = ser_unidad.marca
        JOIN car_modelo ON car_modelo.id_car_model = ser_unidad.modelo
        JOIN ser_cliente ON ser_cliente.id_ser_cliente = ser_unidad.id_ser_cliente
        WHERE ser_servicio_inyector.status_servicio = 'Entregado' ";

    $consulta = $this->db->prepare($query);
    $consulta->execute();

    $resultados = array();

    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $ID_serv_inyector = $fila['ID_serv_inyector'];

      $query_inyectores = "SELECT * FROM `inyectores` WHERE ID_servicio = :id_serv_inyector AND status_inyector != 'Eliminado'";
      $consulta_inyectores = $this->db->prepare($query_inyectores);
      $consulta_inyectores->bindParam(':id_serv_inyector', $ID_serv_inyector);
      $consulta_inyectores->execute();

      $inyectores = array();
      $total_registros = 0;
      $finalizados = 0;

      while ($fila_inyector = $consulta_inyectores->fetch(PDO::FETCH_ASSOC)) {
        $inyectores[] = $fila_inyector;
        $total_registros++;
        if ($fila_inyector['status_inyector'] == 'Finalizado') {
          $finalizados++;
        }
      }

      $fila['listado_inyectores'] = array(
        'inyectores' => $inyectores,
        'total_registros' => $total_registros,
        'finalizados' => $finalizados
      );

      $resultados[] = $fila;
    }

    return $resultados;
  }





  function ConsultarCheckXInyector($ID_inyector)
  {
    // Consulta para obtener los registros pendientes
    $queryPendientes = "SELECT COUNT(*) AS num_pendientes FROM valores_checks_inyectores 
    WHERE ID_inyector = :ID_inyector 
    AND valor_check = 'Pendiente'";
    $consultaPendientes = $this->db->prepare($queryPendientes);
    $consultaPendientes->bindParam(':ID_inyector', $ID_inyector);
    $consultaPendientes->execute();
    $num_pendientes = $consultaPendientes->fetchColumn();

    // Consulta para obtener todos los registros relacionados con el inyector
    $queryTodos = "SELECT * FROM valores_checks_inyectores 
  JOIN nombres_checks ON nombres_checks.ID_check = valores_checks_inyectores.ID_check
    WHERE ID_inyector = :ID_inyector";
    $consultaTodos = $this->db->prepare($queryTodos);
    $consultaTodos->bindParam(':ID_inyector', $ID_inyector);
    $consultaTodos->execute();
    $registrosTodos = $consultaTodos->fetchAll(PDO::FETCH_ASSOC);

    $mensaje = "Aun sin Finalizar";

    // Verificar si algún registro tiene estatus igual a "Finalizado"
    foreach ($registrosTodos as $registro) {
      if ($registro['estatus'] === "Finalizado") {
        $mensaje = "Finalizados";
        break;
      }
    }

    // Devolver un arreglo que contiene el conteo y los registros pendientes, todos los registros y el mensaje
    return array('faltantes' => $num_pendientes, 'registros' => $registrosTodos, 'mensaje' => $mensaje);
  }


  function ActualizarChecksInyectores($ID_check_inyector, $valor_check)
  {
    $query = "UPDATE `valores_checks_inyectores` SET `valor_check`= '$valor_check' WHERE `ID_check_inyector` =  $ID_check_inyector";

    $result = $this->db->prepare($query);
    $resul = $result->execute();
    if ($resul) {
      return true;
    } else {
      return false;
    }
  }


  function FinalizarRevisionCheckInyectores($ID_inyector, $comentario)
  {
    $query = "UPDATE `valores_checks_inyectores` SET `estatus`= 'Finalizado' WHERE `ID_inyector` =  $ID_inyector";
    $result = $this->db->prepare($query);
    $resul = $result->execute();


    if ($comentario == "Vacio") {

      $query2 = "UPDATE inyectores SET hay_check = 'SI' WHERE `ID_inyector` =  $ID_inyector";
      $result2 = $this->db->prepare($query2);
      $resul2 = $result2->execute();
    } else {

      $query2 = "UPDATE inyectores SET hay_check = 'SI', comentario = '$comentario' WHERE ID_inyector =  $ID_inyector";
      $result2 = $this->db->prepare($query2);
      $resul2 = $result2->execute();
    }


    if ($resul && $resul2) {
      return true;
    } else {
      return false;
    }
  }


  function ConsultarFotosInyectores($ID_inyector)
  {
    $query = "SELECT * FROM fotos_inyectores WHERE ID_inyector = $ID_inyector AND status_foto = 'Activo'";


    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }

  function SubirFotoInyector($ID_inyector, $fotoInyector)
  {
    $query = "UPDATE inyectores SET foto_inyector	= :fotoInyector WHERE ID_inyector = :ID_inyector";
    $result = $this->db->prepare($query);
    $result->bindParam(':ID_inyector', $ID_inyector);
    $result->bindParam(':fotoInyector', $fotoInyector);
    $result->execute();
    if ($result) {
      return true;
    } else {
      return false;
    }
  }


  function ConsultarManoDeObraInyectores($id_inyector)
  {

    $query = "SELECT pro_bitacora.*,   adm_usuarios.nombre, adm_usuarios.idusuario, adm_usuarios.foto
    FROM pro_bitacora 
   LEFT JOIN adm_usuarios ON pro_bitacora.idpersonal = adm_usuarios.idusuario
    WHERE id_inyector = $id_inyector";

    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }




  function AgregarManoDeObraInyector($ID_inyector, $observaciones, $ID_mecanico, $costo)
  {
    $query = " INSERT INTO `pro_bitacora`(`idpersonal`, `idactividad`, `id_servicio`, `fecha`, `horainicio`, `observaciones`, `estatus`, `id_inyector`, `costo`) VALUES (:ID_mecanico, 0, 0, now(), now(), :observaciones, :status, :ID_inyector, :costo)";
    $status = 'Pendiente';
    $result = $this->db->prepare($query);
    $result->bindParam(':ID_inyector', $ID_inyector);
    $result->bindParam(':observaciones', $observaciones);
    $result->bindParam(':costo', $costo);
    $result->bindParam(':status', $status);
    $result->bindParam(':ID_mecanico', $ID_mecanico);
    $result->execute();

    $hay_foto = "SI";
    $query2 = "UPDATE inyectores SET  hay_mecanico = :hay_foto WHERE ID_inyector = :ID_inyector";
    $result2 = $this->db->prepare($query2);
    $result2->bindParam(':hay_foto', $hay_foto);
    $result2->bindParam(':ID_inyector', $ID_inyector);
    $result2->execute();


    if ($result && $result2) {
      return true;
    } else {
      return false;
    }
  }




  function CambiarStatusServicioInyector($ID_serv_inyector, $status_servicio)
  {

    $query = "UPDATE ser_servicio_inyector SET status_servicio=:status_servicio WHERE ID_serv_inyector = :ID_serv_inyector";
    $result = $this->db->prepare($query);
    $result->bindParam(':status_servicio', $status_servicio);
    $result->bindParam(':ID_serv_inyector', $ID_serv_inyector);
    $result->execute();


    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  function AsignarNotaAServInyector($ID_serv_inyector, $iddoc)
  {

    $query = "UPDATE ser_servicio_inyector SET iddoc=:iddoc WHERE ID_serv_inyector = :ID_serv_inyector";
    $result = $this->db->prepare($query);
    $result->bindParam(':iddoc', $iddoc);
    $result->bindParam(':ID_serv_inyector', $ID_serv_inyector);
    $result->execute();


    if ($result) {
      return true;
    } else {
      return false;
    }
  }




  function ConsultarRefaccionXInyector($id_inyector)
  {
    $query = "SELECT * FROM  ser_refacciones WHERE  id_inyector = $id_inyector && estatus!='baja'  ";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }





  function AsignarRefaccionesAInyector($id_inyector, $clave, $cantidad, $descripcion, $precio, $unidad, $importe, $descuento, $tipo)
  {
    $query = "INSERT INTO `ser_refacciones`(`clave`, `cantidad`, `unidad`, `descripcion`, `precio`, `importe`, `descuento`, `tipo`, `estatus`, `idventa`,`id_inyector`, `fecha`) VALUES 
  ('$clave','$cantidad','$unidad','$descripcion',$precio,'$importe','$descuento','$tipo','activo',0,$id_inyector, CURDATE())";

    $result = $this->db->prepare($query);
    $resul = $result->execute();

    if ($resul) {
      return true;
    } else {
      return false;
    }
  }



  function AsignarInsumoAServicioInyector($ID_servicio_inyector, $clave, $cantidad, $descripcion, $precio, $unidad, $importe, $descuento, $tipo)
  {
    $query = "INSERT INTO `ser_refacciones`(`clave`, `cantidad`, `unidad`, `descripcion`, `precio`, `importe`, `descuento`, `tipo`, `estatus`, `idventa`,`ID_servicio_inyector`, `fecha`) 
    VALUES  ('$clave','$cantidad','$unidad','$descripcion',$precio,'$importe','$descuento','$tipo','activo',0,$ID_servicio_inyector, CURDATE())";

    $result = $this->db->prepare($query);
    $resul = $result->execute();

    if ($resul) {
      return true;
    } else {
      return false;
    }
  }





  function EliminarInsumoAServicio($idrefaccion)
  {
    $query = "UPDATE ser_refacciones SET estatus ='baja' WHERE idrefaccion = $idrefaccion";

    $result = $this->db->prepare($query);
    $resul = $result->execute();

    if ($resul) {
      return true;
    } else {
      return false;
    }
  }




  function ConsultarInsumosXServInyector($ID_serv_inyector)
  {
    $query = "SELECT * FROM  ser_refacciones WHERE  ID_servicio_inyector = $ID_serv_inyector && estatus!='baja'  ";
    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }



  function FinalizarRevisionInyector($ID_inyector)
  {

    $query = "UPDATE inyectores SET status_inyector ='Finalizado' WHERE ID_inyector = $ID_inyector";

    $result = $this->db->prepare($query);
    $resul = $result->execute();

    if ($resul) {
      return true;
    } else {
      return false;
    }
  }



  function AsinarTraspasoAServicioDeInyector($ID_serv_inyector, $DOCID, $NOMBRE, $EMISOR, $NUMERO, $ESTADO, $FECHA, $FECCAN, $TOTAL, $NOTA)
  {

    $query = "INSERT INTO traspasos (NOMBRE, DOCID, ID_serv_inyector, NUMERO, ESTADO,EMISOR, FECHA, FECCAN, TOTAL, NOTA) 
                          VALUES ('$NOMBRE',$DOCID,$ID_serv_inyector, '$NUMERO', '$ESTADO','$EMISOR', '$FECHA', '$FECCAN', '$TOTAL', '$NOTA')";

    $result = $this->db->prepare($query);
    $resul = $result->execute();

    if ($resul) {
      return true;
    } else {
      return false;
    }
  }


  function AsinarTraspasoInyector($ID_inyector, $DOCID, $NOMBRE, $EMISOR, $NUMERO, $ESTADO, $FECHA, $FECCAN, $TOTAL, $NOTA){

    $query = "INSERT INTO traspasos (NOMBRE, DOCID, ID_inyector, NUMERO, ESTADO,EMISOR, FECHA, FECCAN, TOTAL, NOTA) 
                          VALUES ('$NOMBRE',$DOCID,$ID_inyector, '$NUMERO', '$ESTADO','$EMISOR', '$FECHA', '$FECCAN', '$TOTAL', '$NOTA')";

    $result = $this->db->prepare($query);
    $resul = $result->execute();

    if ($resul) {
      return true;
    } else {
      return false;
    }
  }

  function validarQueNoSeaMismoTraspaso($DOCID, $ID_inyector){
    $query = "SELECT COUNT(*) as count FROM traspasos  WHERE DOCID = :docid AND ID_inyector = :inyector AND STATUS_TRASPASO = 1";

    $consulta = $this->db->prepare($query);
    $consulta->bindParam(':docid', $DOCID);
    $consulta->bindParam(':inyector', $ID_inyector);
    $consulta->execute();
    
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    // Si count es mayor a 0, significa que se encontraron resultados
    return $resultado['count'] > 0 ? true : false;
}


function validarQueNoSeaMismoTraspasoServicio($DOCID, $ID_serv){
  $query = "SELECT COUNT(*) as count FROM traspasos  WHERE DOCID = :docid AND ID_servicio = :ID_serv AND STATUS_TRASPASO = 1";

  $consulta = $this->db->prepare($query);
  $consulta->bindParam(':docid', $DOCID);
  $consulta->bindParam(':ID_serv', $ID_serv);
  $consulta->execute();
  
  $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

  // Si count es mayor a 0, significa que se encontraron resultados
  return $resultado['count'] > 0 ? true : false;
}


function validarQueNoSeaMismoTraspasoServicioInyector($DOCID, $ID_serv_inyector){
  $query = "SELECT COUNT(*) as count FROM traspasos  WHERE DOCID = :docid AND ID_serv_inyector = :ID_serv_inyector AND STATUS_TRASPASO = 1";

  $consulta = $this->db->prepare($query);
  $consulta->bindParam(':docid', $DOCID);
  $consulta->bindParam(':ID_serv_inyector', $ID_serv_inyector);
  $consulta->execute();
  
  $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
  return $resultado['count'] > 0 ? true : false;
}





  function recorrerEInsertarTraspasoDeSerInyector($listaContenidoTraspaso, $ID_servicio_inyector, $DOCID)
  {

    $listaContenidoTraspaso = json_encode($listaContenidoTraspaso);
    $datos_decodificados = json_decode($listaContenidoTraspaso, true);

    if ($datos_decodificados === null) {
      throw new Exception("Error al decodificar los datos JSON.");
    }

    foreach ($datos_decodificados as $elemento) {
      $clave = $elemento['CLAVE'];
      $cantidad = $elemento['DESCANTIDAD'];
      $unidad = $elemento['UNIDAD'];
      $descripcion = $elemento['DESCRIPCIO'];
      $precio = $elemento['PRECIO'];
      $articulo_id = $elemento['ARTICULOID'];
      $ubicacion = $elemento['UBICACION'];
      $tipo = "traspaso";
      //   $observaciones = '';
      $estatus = 'activo';
      $precio_unitario = ($precio / $cantidad);

      $query = "INSERT INTO `ser_refacciones`(`clave`, `cantidad`, `unidad`, `descripcion`, `precio`, `importe`, `descuento`, `tipo`, `estatus`, `idventa`, `fecha`, `id_inyector`, `ID_servicio_inyector`, `IDDOC`) 
                          VALUES (:clave,:cantidad, :unidad, :descripcion, :precio_unitario, :importe, 0, :tipo , :estatus, 0, now(), 0, :ID_servicio_inyector, :DOCID)";

      $consulta = $this->db->prepare($query);
      $consulta->bindParam(':clave', $clave);
      $consulta->bindParam(':cantidad', $cantidad);
      $consulta->bindParam(':unidad', $unidad);
      $consulta->bindParam(':descripcion', $descripcion);
      $consulta->bindParam(':importe', $precio);
      $consulta->bindParam(':precio_unitario', $precio_unitario);
      $consulta->bindParam(':tipo', $tipo);
      $consulta->bindParam(':estatus', $estatus);
      $consulta->bindParam(':ID_servicio_inyector', $ID_servicio_inyector);
      $consulta->bindParam(':DOCID', $DOCID);

      if (!$consulta->execute()) {
        throw new Exception("Error al insertar el registro con la clave: " . $clave);
      }
    }

    return "Inserciones realizadas exitosamente.";
  }




  function recorrerEInsertarTraspasoInyector($listaContenidoTraspaso, $ID_inyector, $DOCID)
  {

    $listaContenidoTraspaso = json_encode($listaContenidoTraspaso);
    $datos_decodificados = json_decode($listaContenidoTraspaso, true);

    if ($datos_decodificados === null) {
      throw new Exception("Error al decodificar los datos JSON.");
    }

    foreach ($datos_decodificados as $elemento) {
      $clave = $elemento['CLAVE'];
      $cantidad = $elemento['DESCANTIDAD'];
      $unidad = $elemento['UNIDAD'];
      $descripcion = $elemento['DESCRIPCIO'];
      $precio = $elemento['PRECIO'];
      $articulo_id = $elemento['ARTICULOID'];
      $ubicacion = $elemento['UBICACION'];
      $tipo = "traspaso";
      //   $observaciones = '';
      $estatus = 'activo';
      $precio_unitario = ($precio / $cantidad);

      $query = "INSERT INTO `ser_refacciones`(`clave`, `cantidad`, `unidad`, `descripcion`, `precio`, `importe`, `descuento`, `tipo`, `estatus`, `idventa`, `fecha`, `id_inyector`, `ID_servicio_inyector`, `IDDOC`) 
                          VALUES (:clave,:cantidad, :unidad, :descripcion, :precio_unitario, :importe, 0, :tipo , :estatus, 0, now(), :ID_inyector, 0, :DOCID)";

      $consulta = $this->db->prepare($query);
      $consulta->bindParam(':clave', $clave);
      $consulta->bindParam(':cantidad', $cantidad);
      $consulta->bindParam(':unidad', $unidad);
      $consulta->bindParam(':descripcion', $descripcion);
      $consulta->bindParam(':importe', $precio);
      $consulta->bindParam(':precio_unitario', $precio_unitario);
      $consulta->bindParam(':tipo', $tipo);
      $consulta->bindParam(':estatus', $estatus);
      $consulta->bindParam(':ID_inyector', $ID_inyector);
      $consulta->bindParam(':DOCID', $DOCID);

      if (!$consulta->execute()) {
        throw new Exception("Error al insertar el registro con la clave: " . $clave);
      }
    }

    return "Inserciones realizadas exitosamente.";
  }


  function AsinarTraspasoAServicio($ID_serv, $DOCID, $NOMBRE, $EMISOR, $NUMERO, $ESTADO, $FECHA, $FECCAN, $TOTAL, $NOTA)
  {

    $query = "INSERT INTO traspasos (NOMBRE, DOCID, ID_servicio, NUMERO, ESTADO,EMISOR, FECHA, FECCAN, TOTAL, NOTA) 
                          VALUES ('$NOMBRE',$DOCID,$ID_serv, '$NUMERO', '$ESTADO','$EMISOR', '$FECHA', '$FECCAN', '$TOTAL', '$NOTA')";

    $result = $this->db->prepare($query);
    $resul = $result->execute();

    if ($resul) {
      return true;
    } else {
      return false;
    }
  }




  function consultarContenidoTraspaso($iddoc)
  {
    $ch = curl_init();
    $post = [
      'opcion' => '73',
      'iddoc' => $iddoc
    ];
    $url = "http://tallergeorgio.hopto.org:5611/monge/tallerapp/Panel.php";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $json = json_decode($response, true);
    return $json;
  }



  function recorrerEInsertarTraspaso($listaContenidoTraspaso, $ID_serv, $DOCID)
  {

    $listaContenidoTraspaso = json_encode($listaContenidoTraspaso);
    $datos_decodificados = json_decode($listaContenidoTraspaso, true);

    if ($datos_decodificados === null) {
      throw new Exception("Error al decodificar los datos JSON.");
    }

    foreach ($datos_decodificados as $elemento) {
      $clave = $elemento['CLAVE'];
      $cantidad = $elemento['DESCANTIDAD'];
      $unidad = $elemento['UNIDAD'];
      $descripcion = $elemento['DESCRIPCIO'];
      $precio = $elemento['PRECIO'];
      $articulo_id = $elemento['ARTICULOID'];
      $ubicacion = $elemento['UBICACION'];
      $tipo = "traspaso";
      //   $observaciones = '';
      $estatus = 'activo';
      $precio_unitario = ($precio / $cantidad);

      $query = "INSERT INTO `ser_refacciones`(`clave`, `cantidad`, `unidad`, `descripcion`, `precio`, `importe`, `descuento`, `tipo`, `estatus`, `idventa`, `fecha`, `id_inyector`, `ID_servicio_inyector`, `IDDOC`) 
                          VALUES (:clave,:cantidad, :unidad, :descripcion, :precio_unitario, :importe, 0, :tipo , :estatus, :ID_serv, now(), 0, 0, :DOCID)";

      $consulta = $this->db->prepare($query);
      $consulta->bindParam(':clave', $clave);
      $consulta->bindParam(':cantidad', $cantidad);
      $consulta->bindParam(':unidad', $unidad);
      $consulta->bindParam(':descripcion', $descripcion);
      $consulta->bindParam(':importe', $precio);
      $consulta->bindParam(':precio_unitario', $precio_unitario);
      $consulta->bindParam(':tipo', $tipo);
      $consulta->bindParam(':estatus', $estatus);
      $consulta->bindParam(':ID_serv', $ID_serv);
      $consulta->bindParam(':DOCID', $DOCID);

      if (!$consulta->execute()) {
        throw new Exception("Error al insertar el registro con la clave: " . $clave);
      }
    }

    return "Inserciones realizadas exitosamente.";
  }



  function DesvincularTraspaso($ID_traspaso)
  {

    $query = "UPDATE traspasos SET STATUS_TRASPASO = 0 WHERE ID_traspaso = $ID_traspaso";

    $result = $this->db->prepare($query);
    $resul = $result->execute();

    if ($resul /* && $result->rowCount() > 0 */) {
      return true;
    } else {
      return false;
    }
  }


  function EliminarRefaccionesTraspasos($DOCID)
  {
    $query = "UPDATE ser_refacciones SET estatus = 'baja' WHERE IDDOC = $DOCID";

    $result = $this->db->prepare($query);

    if ($result->execute()) {
      return true;
    } else {
      return false;
    }
  }


  function ConsultarNumFinalizados($ID_serv_inyector)
  {
    $resultados = array();

    $query_inyectores = "SELECT * FROM `inyectores` WHERE ID_servicio = :id_serv_inyector AND status_inyector != 'Eliminado'";
    $consulta_inyectores = $this->db->prepare($query_inyectores);
    $consulta_inyectores->bindParam(':id_serv_inyector', $ID_serv_inyector);
    $consulta_inyectores->execute();

    $inyectores = array();
    $total_registros = 0;
    $finalizados = 0;

    while ($fila_inyector = $consulta_inyectores->fetch(PDO::FETCH_ASSOC)) {
      $inyectores[] = $fila_inyector;
      $total_registros++;
      if ($fila_inyector['status_inyector'] == 'Finalizado') {
        $finalizados++;
      }
    }

    // Eliminar la parte del arreglo de listado_inyectores
    // $fila['listado_inyectores'] = array(
    //     'total_registros' => $total_registros,
    //     'finalizados' => $finalizados
    // );

    // Asignar directamente los valores a $resultados
    $resultados['total_registros'] = $total_registros;
    $resultados['finalizados'] = $finalizados;

    return $resultados;
  }


  function ConsultaTraspasosPorServicio($id_ser_venta)
  {

    $query = "SELECT * FROM traspasos  WHERE ID_servicio= $id_ser_venta AND STATUS_TRASPASO = 1 ORDER BY ID_traspaso DESC ";

    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }


  function ConsultaTraspasosPorServicioInyector($ID_serv_inyector)
  {

    $query = "SELECT * FROM traspasos  WHERE ID_serv_inyector = $ID_serv_inyector AND STATUS_TRASPASO = 1 ORDER BY ID_traspaso DESC ";

    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }



  function ConsultaTraspasosPorInyector($ID_inyector)
  {

    $query = "SELECT * FROM traspasos  WHERE ID_inyector = $ID_inyector AND STATUS_TRASPASO = 1 ORDER BY ID_traspaso DESC ";

    $consulta = $this->db->prepare($query);
    $consulta->execute();
    while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {

      $this->modelo[] = $filas;
    }
    return $this->modelo;
  }




  function GenerarPDFRecepcionInyector($idventa)
   {
  //   header("Location:  http://tallergeorgio.hopto.org:5611/georgiotemp/web/Controlador/ReportesPDF/PDFReporteCheckTecnico.php?idventa=$idventa&idcliente=$idcliente");
    header("Location:   http://tallergeorgio.hopto.org:5611/georgioapp/georgio/web/Controlador/ReportesPDF/PDFRecepcionInyector.php?idserv=$idventa");
    exit();
  }


  function GenerarPDFSalidaInyector($idventa)
  {
    // header("Location:  http://tallergeorgio.hopto.org:5611/georgiotemp/web/Controlador/ReportesPDF/PDFReporteCheckTecnico.php?idventa=$idventa&idcliente=$idcliente");
    header("Location:   http://tallergeorgio.hopto.org:5611/georgioapp/georgio/web/Controlador/ReportesPDF/PDFSalidaInyector.php?idserv=$idventa");
    exit();
  }

  function GenerarPDFRefaccionesDeInyector($idventa)
  {
    // header("Location:  http://tallergeorgio.hopto.org:5611/georgiotemp/web/Controlador/ReportesPDF/PDFReporteCheckTecnico.php?idventa=$idventa&idcliente=$idcliente");
    header("Location:   http://tallergeorgio.hopto.org:5611/georgioapp/georgio/web/Controlador/ReportesPDF/PDFRefaccionesInyector.php?idserv=$idventa");
    exit();
  }
  


  function GenerarPDFManoDeObraDeInyector($idventa)
  {
    // header("Location:  http://tallergeorgio.hopto.org:5611/georgiotemp/web/Controlador/ReportesPDF/PDFReporteCheckTecnico.php?idventa=$idventa&idcliente=$idcliente");
    header("Location:  http://tallergeorgio.hopto.org:5611/georgioapp/georgio/web/Controlador/ReportesPDF/PDFMecanicosInyector.php?idserv=$idventa");
    exit();
  }
  




  function EditarActividadDeInyector($idbitacora, $actividadCorregida, $nuevoCosto)
  {
    $query = "UPDATE pro_bitacora SET observaciones = '$actividadCorregida', costo = $nuevoCosto WHERE idbitacora = $idbitacora";

    $result = $this->db->prepare($query);

    if ($result->execute()) {
      return true;
    } else {
      return false;
    }
  }



  function asignarAlarmaAGaveta($id_gabeta, $frecuencia)
  {
      $query = "UPDATE `inv_gabeta` SET `frecuencia_dias`=:frecuencia WHERE id_gabeta = :id_gabeta";
      $result = $this->db->prepare($query);
      $result->bindParam(':id_gabeta', $id_gabeta);
      $result->bindParam(':frecuencia', $frecuencia);
      
      if ($result->execute()) {
        return true;
      } else {
        return false;
      }

  }





  function FinalizarRevisionInventario($iddocga)
  {
      $estado = "Revisado";
      $query = "UPDATE inv_doc_gabetas SET estado = :estado WHERE iddocga = :iddocga";
      $result = $this->db->prepare($query);
      $result->bindParam(':iddocga', $iddocga);
      $result->bindParam(':estado', $estado);
      $result->execute();

      $num_rows_affected = $result->rowCount();

      return $num_rows_affected > 0 ? true : false;
  }



  function ActualizarFechaRev($id_gabeta)
  {
      $query = "UPDATE inv_gabeta SET fecha_ultimo_inv = NOW() WHERE id_gabeta = $id_gabeta";

      $result = $this->db->prepare($query);

      if ($result->execute()) {
          return true;
      } else {
          return false;
      }
  }





  function EditarGaveta($EditnombreGaveta, $EditdescripcionGaveta, $idgabeta)
  {

      $query = "UPDATE inv_gabeta SET nombre=:EditnombreGaveta, descripcion = :EditdescripcionGaveta WHERE id_gabeta = :idgabeta ";
      $result = $this->db->prepare($query);
      $result->bindParam(':EditnombreGaveta', $EditnombreGaveta);
      $result->bindParam(':EditdescripcionGaveta', $EditdescripcionGaveta);
      $result->bindParam(':idgabeta', $idgabeta);

      $result->execute();
      if ($result) {
          return true;
      } else {
          return false;
      }
  }





  function mostrarPDFDeGaveta($id_gabeta) 
    {
      header("Location: http://192.168.16.153:8888/taller/web/Controlador/ReportesPDF/pdfContenidoGaveta.php?id_gabeta=$id_gabeta");
      exit();
    }
  

    function mostrarPDFDeInventarios($id_gabeta) 
    {
      header("Location: http://192.168.16.153:8888/taller/web/Controlador/ReportesPDF/pdfInventariosPorGaveta.php?id_gabeta=$id_gabeta");
      exit();
    }
  
  



  function subirImagenHerramientaAPI($foto, $opcion)
  {
    $apiUrl = 'http://tallergeorgio.hopto.org:5613/tallergeorgio/api/subirimagenes.php';
    $method = 'post';

    $postData = array(
      'method' => $method,
      'opcion' => $opcion,
      'image' => new CURLFile($foto['tmp_name'])
    );

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);

    $response = curl_exec($curl);

    //Error en la subida de imagenes
    if (curl_errno($curl)) {
      $error = curl_error($curl);
      return false;
    }

    curl_close($curl);

    // Procesar la respuesta de la API y obtener el nombre del archivo subido
    $uploadedFileName = $response;
    return $uploadedFileName;
  }
}
