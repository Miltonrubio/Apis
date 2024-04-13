<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apis taller</title>
  <link rel="stylesheet" href="../librerias/Bootstrap5/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="shortcut icon" href="../img/iconoab.png">
</head>

<body>
  <div class="container mt-4">
    <h1 class="titulo">Api Taller Georgio </h1>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Login</label></div>
        <input type="hidden" name="opcion" value="1">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="1"<br />
          name="telefono" value ="2381323648"<br />
          name="password" value = "123456"
        </code><br>
        <div class="form-floating contenedor-inputs padre">
          <input type="hidden" name="opcion" value="1"><br>
          <input type="number" name="telefono" value="2381323648"><br>
          <label for="floatingInput">Telefono</label>

        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="password" value="123456">
          <label for="floatingInput">password</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <!--  -->
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Servicios Activos</label></div>
        <input type="hidden" name="opcion" value="2">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="2"<br />
        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consulta de Servicios ENTREGADO</label></div>
        <input type="hidden" name="opcion" value="37">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="37"<br />
        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Refacciones</label></div>
        <input type="hidden" name="opcion" value="3">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="3"<br />
          name = "idventa" value = "60"
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="60">
          <label for="floatingInput">idventa</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <!--  -->
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Actualizar Token </label></div>
        <input type="hidden" name="opcion" value="4">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="4"<br />
          name="idusuario" value="2"<br />
          name="token" value ="JKIU884UG"
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idusuario" value="2">
          <label for="floatingInput">idusuario</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="token" value="JKIU884UG">
          <label for="floatingInput">Token</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <!--  -->
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Usuarios </label></div>
        <input type="hidden" name="opcion" value="5">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="5"<br />
        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Mecanicos </label></div>
        <input type="hidden" name="opcion" value="6">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="6"<br />
          name="idventa" value="60"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="60">
          <label for="floatingInput">idventa</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Bitacora Mecanicos </label></div>
        <input type="hidden" name="opcion" value="7">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="7"<br />
          name="idventa" value="63"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="63">
          <label for="floatingInput">idventa</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Fotos de Unidad </label></div>
        <input type="hidden" name="opcion" value="8">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="8"<br />
          name="idventa" value="60"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="63">
          <label for="floatingInput">idventa</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Fotos de Unidad </label></div>
        <input type="hidden" name="opcion" value="9">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="9"<br />
          <!-- name="id_ser_fotos" value="7425"<br/> -->
          name="idventa" value="60"<br />
          input type="file" name="image"<br />
          <!-- name= "tipo" value = "Frontal"  -->
        </code><br>
        <!-- <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_ser_fotos" value="7425">
          <label for="floatingInput">id_ser_fotos</label>
        </div> -->
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="63">
          <label for="floatingInput">idventa</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="file" name="image" accept=".jpeg,.png,.JPG,.JPEG,.PNG">
          <label for="floatingInput">Selecciona una imagen:</label>
        </div>
        <!-- <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="tipo" value="Frontal">
          <label for="floatingInput">Tipo</label>
        </div> -->
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Establecer Foto </label></div>
        <input type="hidden" name="opcion" value="10">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="10"<br />
          name="idventa" value="63"<br />
          name="foto" value = "e7a508586c893bbf530ab64309a95762.jpg"<br />

        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="63">
          <label for="floatingInput">idventa</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="foto" value="e7a508586c893bbf530ab64309a95762.jpg">
          <label for="floatingInput">Nombre foto</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Consultar Checks de Entrada </label></div>
        <input type="hidden" name="opcion" value="11">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="11"<br />
          name="idventa" value="6167"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6167">
          <label for="floatingInput">idventa</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Actualizar Checks de Entrada</label></div>
        <input type="hidden" name="opcion" value="12">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="12"<br />
          name="idcheck" value="466"<br />
          name="valorcheck" value = "NA"
        </code><br>
        <!-- <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6043">
          <label for="floatingInput">idventa</label>
        </div> -->
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idcheck" value="466">
          <label for="floatingInput">idcheck</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="valorcheck" value="NA">
          <label for="floatingInput">Valor Checks</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Consultar Checks de Salida </label></div>
        <input type="hidden" name="opcion" value="29">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="29 "<br />
          name="idventa" value="6167"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6167">
          <label for="floatingInput">idventa</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Actualizar Checks de Salida </label></div>
        <input type="hidden" name="opcion" value="30">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="30"<br />
          name="idcheck" value="466"<br />
          name="valorcheck" value = "NA"
        </code><br>
        <!-- <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6043">
          <label for="floatingInput">idventa</label>
        </div> -->
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idcheck" value="466">
          <label for="floatingInput">idcheck</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="valorcheck" value="NA">
          <label for="floatingInput">Valor Checks</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Consultar Checks List Tecnico </label></div>
        <input type="hidden" name="opcion" value="38">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="38"<br />
          name="idventa" value="6176"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6176">
          <label for="floatingInput">idventa</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Actualizar Checks List Tecnico </label></div>
        <input type="hidden" name="opcion" value="39">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="39"<br />
          name="idcheck" value="46"<br />
          name="valorcheck" value = "B/R/NA"
        </code><br>
        <!-- <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6043">
          <label for="floatingInput">idventa</label>
        </div> -->
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idcheck" value="46">
          <label for="floatingInput">idcheck</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="valorcheck" value="B">
          <label for="floatingInput">Valor Checks</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Arrastres </label></div>
        <input type="hidden" name="opcion" value="13">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="13"<br />
          name="id" value = "77"
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id" value="77">
          <label for="floatingInput">id</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Rutas </label></div>
        <input type="hidden" name="opcion" value="14">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="14"<br />
          name="id_arrastre" value = "84"

        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_arrastre" value="84">
          <label for="floatingInput">id arrastre</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Choferes </label></div>
        <input type="hidden" name="opcion" value="15">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="15"<br />

        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Ver todos arrastres </label></div>
        <input type="hidden" name="opcion" value="16">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="16"<br />

        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Finalizar arrastres </label></div>
        <input type="hidden" name="opcion" value="17">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="17"<br />
          name="id" value = "77"
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id" value="77">
          <label for="floatingInput">id</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Datos del choferes </label></div>
        <input type="hidden" name="opcion" value="18">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="18"<br />
          name = "id_arrastre" value = "92"
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_arrastre" value="92">
          <label for="floatingInput">id arrastre</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Consultar Clientes</label></div>
        <input type="hidden" name="opcion" value="19">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="19"<br />
        </code><br>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Consultar Unidades del Cliente</label></div>
        <input type="hidden" name="opcion" value="20">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="20"<br />
          name= " id_ser_cliente" value = "26"
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_ser_cliente" value="26">
          <label for="floatingInput">id_ser_cliente</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Registrar un nuevo servicio</label></div>
        <input type="hidden" name="opcion" value="21">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="21"<br />
          name= "id_ser_cliente" value = "26" <br />
          name = "idunidad" value = "963"<br />
          name = "km" value = "2500"<br />
          name = "gas" value = "3/4"<br />
          name = "motivo" value = "Falla Motor" <br />
          name = "marca" value = "Ford" <br />
          name = "modelo" value = "Ranger" <br />
          name = "motor" value = "2.4" <br />
          name = "vin" value = "8AFDT50D476047962" <br />
          name = "placas" value = "SL-38-058" <br />
          name = "anio" value = "2002" <br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_ser_cliente" value="26">
          <label for="floatingInput">id_ser_cliente</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idunidad" value="963">
          <label for="floatingInput">idunidad</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="km" value="2500">
          <label for="floatingInput">kilometraje</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <label for="floatingInput">Gasolina</label>
          <select class="form-floating" aria-label="Default select example" name="gas">
            <option value="Lleno">Lleno</option>
            <option value="3/4">3/4</option>
            <option value="1/2">1/2</option>
            <option value="1/4">1/4</option>
            <option value="Reserva">Reserva</option>
          </select>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="motivo" value="Motor">
          <label for="floatingInput">Motivo ingreso</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="marca" value="Ford">
          <label for="floatingInput">Marca</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="modelo" value="Ranger">
          <label for="floatingInput">Modelo</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="motor" value="2.4">
          <label for="floatingInput">Motor</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="vin" value="8AFDT50D476047962">
          <label for="floatingInput">VIN</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="placas" value="SL-38-058">
          <label for="floatingInput">Placas</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="anio" value="2002">
          <label for="floatingInput">Año</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Productividad servicios</label></div>
        <input type="hidden" name="opcion" value="22">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="22"<br />

        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Servicios del mecanico </label></div>
        <input type="hidden" name="opcion" value="23">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="23"<br />
          name = "idmecanico" value = "22"<br />


        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idmecanico" value="22">
          <label for="floatingInput">idmecanico</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Estatus de Servicios si estan activos </label></div>
        <input type="hidden" name="opcion" value="24">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="24"<br />
          name = "idmecanico" value = "22"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idmecanico" value="22">
          <label for="floatingInput">idmecanico</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Pausar o Finalizar un servicio para mecanico </label></div>
        <input type="hidden" name="opcion" value="27">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="27"<br />
          name = "idbitacora" value = "5793"<br />
          name = "estatus" value = "activo"<br />
          name = "idmecanico" value = "18"<br />
          name = "observacion" value = "Todo correcto"


        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idmecanico" value="18">
          <label for="floatingInput">ID de mecanico</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idbitacora" value="5793">
          <label for="floatingInput">idbitacora</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="estatus" value="activo">
          <label for="floatingInput">Estatus</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="observacion" value="">
          <label for="floatingInput">observacion</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Mecanicos Unidades asignadas </label></div>
        <input type="hidden" name="opcion" value="25">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="25"<br />
          name = "idmecanico" value = "25"<br />


        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idmecanico" value="25">
          <label for="floatingInput">idmecanico</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Bitacora del mecanico servicio </label></div>
        <input type="hidden" name="opcion" value="26">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="26"<br />
          name = "idservicio" value = "6078"<br />


        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idservicio" value="6078">
          <label for="floatingInput">idservicio</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Bitacora del mecanico servicio </label></div>
        <input type="hidden" name="opcion" value="26">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="28"<br />
          name = "idserventa" value = "6078"<br />


        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idserventa" value="6078">
          <label for="floatingInput">idserventa</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <!-- <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Bitacora del mecanico servicio </label></div>
        <input type="hidden" name="opcion" value="26">
        <code>
          <br />
          method = "POST"<br /> 
          name="opcion" value="28"<br />
          name = "idserventa"  value = "6078"<br />
          name = "obs" value = "Alinear los frenos"
         
        </code><br> 
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idserventa" value="6078">
          <label for="floatingInput">idserventa</label>
        </div> 
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="obs" value="Alinear los frenos">
          <label for="floatingInput">Observaciones</label>
        </div> 
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div> -->
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Agregar Clientes </label></div>
        <input type="hidden" name="opcion" value="31">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="31"<br />
          name = "nombre" value = "Cabanzo"<br />
          name = "domicilio" value = "Purisima"<br />
          name = "telefono" value = "2381325256"<br />
          name = "email" value = "cabazo@gmail.com"<br />
          name = "obs" value = " "<br />


        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="nombre" value="Cabanzo">
          <label for="floatingInput">Nombre</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="domicilio" value="Purisima">
          <label for="floatingInput">Domicilio</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="telefono" value="2381325256">
          <label for="floatingInput">Telefono</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="email" value="cabazo@gmail.com ">
          <label for="floatingInput">Correo Eletronico</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="obs" value="Nuevo usuario">
          <label for="floatingInput">Observaciones</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Consulta Marca </label></div>
        <input type="hidden" name="opcion" value="32">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="32"<br />

        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Conuslta Modelo </label></div>
        <input type="hidden" name="opcion" value="33">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="33"<br />

        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Agregar Unidades </label></div>
        <input type="hidden" name="opcion" value="34">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="34"<br />
          name = "idcliente" value= '479'
          name = "idmarca" value = "2"<br />
          name = "idmodelo" value = "5"<br />
          name = "anio" value = "2022"<br />
          name = "placas" value = "BI-85-TA"<br />
          name = "vin" value = "N4555456f6"<br />
          name = "motor" value = "1.2L"<br />
          name = "foto" value = "Nombre de foto"<br />
          name = "tipo" value = "vehiculo/motocicleta/grua/plataforma/montacargas/patin "<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idcliente" value="479">
          <label for="floatingInput">Cliente</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idmarca" value="2">
          <label for="floatingInput">Marca</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idmodelo" value="5">
          <label for="floatingInput">Modelo</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="anio" value="2022">
          <label for="floatingInput">Año</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="placas" value="BI-85-TA">
          <label for="floatingInput">Placas</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="vin" value="N4555456f6">
          <label for="floatingInput">VIN</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="motor" value="1.2L">
          <label for="floatingInput">Motor</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="tipo" value="vehiculo">
          <label for="floatingInput">Tipo</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="foto" value="foto">
          <label for="floatingInput">foto</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Conuslta Modelo </label></div>
        <input type="hidden" name="opcion" value="35">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="35"<br />
          name="marca" value="Mercedez"<br />

        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="marca" value="Mercedez">
          <label for="floatingInput">Marca</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Conuslta Modelo </label></div>
        <input type="hidden" name="opcion" value="36">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="36"<br />
          name="idmarca" value="4216"<br />
          name="modelo" value="CVR"<br />

        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idmarca" value="4216">
          <label for="floatingInput">Marca</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="modelo" value="CVR">
          <label for="floatingInput">Modelo</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>
    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Conuslta Gavetas </label></div>
        <input type="hidden" name="opcion" value="40">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="40"<br />

        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Cambiar foto de herramienta</label></div>
        <input type="hidden" name="opcion" value="41">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="41"<br />
          name="idHerramienta" value="71"<br />
          name="fotoHerramienta" value="foto"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idHerramienta" value="71">
          <label for="floatingInput">Id de herramienta</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="file" name="fotoHerramienta" value="foto">
          <label for="floatingInput">Foto de la herramienta </label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Herramientas por cajon </label></div>
        <input type="hidden" name="opcion" value="42">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="42"<br />
          name="id_gabeta" value="35"<br />
          name="id_cajon" value="193"<br />

        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_gabeta" value="35">
          <label for="floatingInput">Id de gaveta</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_cajon" value="193">
          <label for="floatingInput">Id de cajon</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Agregar Herramienta a Cajon </label></div>
        <input type="hidden" name="opcion" value="43">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="43"<br />
          name="nombreHerramienta" value="Martillo Madera"<br />
          name="descripHerramienta" value="Esto es una prueba"<br />
          name="cantidadHerramientas" value="1"<br />
          name="id_cajon" value="193"<br />

        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="nombreHerramienta" value="Martillo Madera">
          <label for="floatingInput">Nombre de la herramienta</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="descripHerramienta" value="Esto es una prueba">
          <label for="floatingInput">Descripcion de la herramienta</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="cantidadHerramientas" value="1">
          <label for="floatingInput">Cantidad de piezas</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_cajon" value="193">
          <label for="floatingInput">ID de cajon</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Eliminar herramienta</label></div>
        <input type="hidden" name="opcion" value="44">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="44"<br />
          name="idHerramienta" value="72"<br />

        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idHerramienta" value="72">
          <label for="floatingInput">Id de herramienta</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Insertar Gaveta</label></div>
        <input type="hidden" name="opcion" value="45">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="45"<br />
          name="nombreGaveta" value="Gaveta de prueba"<br />
          name="descripcionGaveta" value="Descripcion de Gaveta de prueba"<br />
          name="numCajones" value="2"<br />

        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="nombreGaveta" value="Gaveta de prueba">
          <label for="floatingInput">Nombre de la gaveta</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="descripcionGaveta" value="Descripcion de Gaveta de prueba">
          <label for="floatingInput">Descripcion de la gaveta</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="numCajones" value="2">
          <label for="floatingInput">Numero de cajones de la gaveta</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Eliminar Gaveta</label></div>
        <input type="hidden" name="opcion" value="46">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="46"<br />
          name="id_gabeta" value="59"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="number" name="id_gabeta" value="59">
          <label for="floatingInput">ID de la gaveta</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Mostrar Todas las herramientas</label></div>
        <input type="hidden" name="opcion" value="47">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="47"<br />
        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Todos los mecanicos</label></div>
        <input type="hidden" name="opcion" value="48">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="48"<br />
        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Asignarle Gaveta a Mecanico</label></div>
        <input type="hidden" name="opcion" value="49">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="49"<br />
          name="id_mecanico" value="48"<br />
          name="id_gabeta" value="41"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="number" name="id_gabeta" value="41">
          <label for="floatingInput">ID de la gaveta</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="number" name="id_mecanico" value="48">
          <label for="floatingInput">ID del mecanico</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Descargar PDF de Servicio por ID de venta</label></div>
        <input type="hidden" name="opcion" value="50">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="50"<br />
          name="idventa" value="6177"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6177">
          <label for="floatingInput">ID de venta</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Ver Todas las maquinas </label></div>
        <input type="hidden" name="opcion" value="51">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="51"<br />
        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Registrar Maquina </label></div>
        <input type="hidden" name="opcion" value="52">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="52"<br />
          name="nombreMaquina" value="nombreMaquina"<br />
          name="marcaMaquina" value="marcaMaquina"<br />
          name="modeloMaquina" value="modeloMaquina"<br />
          name="nserieMaquinaion" value="52"<br />
          name="costoMaquina" value="52"<br />
          name="fadquisicionMaquina" value="2023-11-08"<br />
          name="area" value="area"<br />
          name="estatus" value=" Bueno/malo/regular"<br />
          name="obs" value="obs"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="nombreMaquina" value="nombreMaquina">
          <label for="floatingInput">Nombre de maquina</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="marcaMaquina" value="marcaMaquina">
          <label for="floatingInput">Marca de la maquina</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="modeloMaquina" value="modeloMaquina">
          <label for="floatingInput">Modelo de la maquina</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="nserieMaquina" value="2391821">
          <label for="floatingInput">Numero de serie</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="codigoMaquina" value="159">
          <label for="floatingInput">Codigo de maquina</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="date" name="fadquisicionMaquina">
          <label for="floatingInput">Fecha de adquisicion</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="costoMaquina" value="531">
          <label for="floatingInput">Costo de la maquina</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="area" value="area">
          <label for="floatingInput">area</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="estatus" value="bueno">
          <label for="floatingInput">estatus de la maquina</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="obs" value="Sin observaciones">
          <label for="floatingInput">observaciones</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Dar de baja maquinas </label></div>
        <input type="hidden" name="opcion" value="53">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="53"<br />
          name="idmaquina" value="1"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idmaquina" value="1">
          <label for="floatingInput">ID de maquina</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Asignar un mecanico encargo a una maquina</label></div>
        <input type="hidden" name="opcion" value="54">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="54"<br />
          name="idmaquina" value="1"<br />
          name="idresponsable" value="48"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idmaquina" value="1">
          <label for="floatingInput">ID de maquina</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idresponsable" value="48">
          <label for="floatingInput">ID del mecanico</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Subir Foto de Maquina</label></div>
        <input type="hidden" name="opcion" value="55">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="55"<br />
          name="idmaquina" value="1"<br />
          name="fotoMaquina" value="fotoMaquina"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idmaquina" value="1">
          <label for="floatingInput">ID de maquina</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="file" name="fotoMaquina" required>
          <label for="floatingInput">fotoMaquina</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Levantar Inventario de gavetas</label></div>
        <input type="hidden" name="opcion" value="56">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="56"<br />
          name="idgabeta" value="58"<br />
          name="idencargado" value="idencargado"<br />
          name="idmecanico" value="idmecanico"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idgabeta" value="58">
          <label for="floatingInput">ID de gaveta</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idencargado" value="0">
          <label for="floatingInput">ID de encargado</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idmecanico" value="0">
          <label for="floatingInput">ID del inicio de sesion</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar todos los inventarios de gavetas</label></div>
        <input type="hidden" name="opcion" value="57">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="57"<br />
          name="idgabeta" value="58"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idgabeta" value="58">
          <label for="floatingInput">ID de gaveta</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Actualizar checks del inventario de gavetas</label></div>
        <input type="hidden" name="opcion" value="58">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="58"<br />
          name="idinv" value="21"<br />
          name="estadoHerramienta" value="B/M/R/F"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idinv" value="21">
          <label for="floatingInput">ID de la herramienta en inventario</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="estadoHerramienta" value="B">
          <label for="floatingInput">Estado de la herramienta en inventario </label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Actualizar estado de inventario</label></div>
        <input type="hidden" name="opcion" value="59">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="59"<br />
          name="iddocga" value="24"<br />
        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="iddocga" value="24">
          <label for="floatingInput">ID del inventario</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar todos los usuarios</label></div>
        <input type="hidden" name="opcion" value="60">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="60"<br />
        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Subir evidencias para actividades</label></div>
        <input type="hidden" name="opcion" value="61">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="61"<br />
          name="tipo" value="Inicio"<br />
          name="fotoActividad" value="foto"<br />
          name="id_bitacora" value="5781"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="tipo" value="Inicio">
          <label for="floatingInput">Tipo de foto de evidencia: Inicio/Finalizacion</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="file" name="fotoActividad">
          <label for="floatingInput">Foto de la evidencia </label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_bitacora" value="5781">
          <label for="floatingInput">ID de la bitacora</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>






    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar todas las evidencias por bitacora</label></div>
        <input type="hidden" name="opcion" value="62">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="62"<br />
          name="id_bitacora" value="5781"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_bitacora" value="5781">
          <label for="floatingInput">ID de la bitacora</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar disponibilidad de usuario</label></div>
        <input type="hidden" name="opcion" value="63">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="63"<br />
          name="idpersonal" value="25"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idpersonal" value="25">
          <label for="floatingInput">ID de la bitacora</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Lista Actividades</label></div>
        <input type="hidden" name="opcion" value="64">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="64"<br />
        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Asignar nueva actividad a usuario</label></div>
        <input type="hidden" name="opcion" value="65">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="65"<br />
          name="idpersonal" value="25"<br />
          name="idactividad" value="25"<br />
          name="observaciones" value="25"<br />
          name="fotoActividad" value="foto"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idpersonal" value="25">
          <label for="floatingInput">ID del personal</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idactividad" value="25">
          <label for="floatingInput">ID de la actividad</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="observaciones" value="Hacer un cambio de documentacion">
          <label for="floatingInput">Observaciones</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="file" name="fotoActividad">
          <label for="floatingInput">Foto de evidencia de ingreso</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar todos los checks </label></div>
        <input type="hidden" name="opcion" value="66">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="66"<br />
        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar checks de servicio</label></div>
        <input type="hidden" name="opcion" value="67">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="67"<br />
          name="idventa" value="6156"<br />
          name="idcategoria" value="3"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6156">
          <label for="floatingInput">ID del servicio</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idcategoria" value="3">
          <label for="floatingInput">ID categoria</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar MANO DE OBRA de servicio</label></div>
        <input type="hidden" name="opcion" value="68">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="68"<br />
          name="idventa" value="6156"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6156">
          <label for="floatingInput">ID del servicio</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar MANO DE OBRA de servicio</label></div>
        <input type="hidden" name="opcion" value="68">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="68"<br />
          name="idventa" value="6156"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6156">
          <label for="floatingInput">ID del servicio</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Actualizar pzs del inventario</label></div>
        <input type="hidden" name="opcion" value="69">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="69"<br />
          name="idinv" value=105<br />
          name="cantidadHerr" value=1<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idinv" value="105">
          <label for="floatingInput">ID de la herramienta del inventario</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="cantidadHerr" value="1">
          <label for="floatingInput">Piezas de la herramienta del inventario</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Descargar PDF de Inventarios Por Gaveta</label></div>
        <input type="hidden" name="opcion" value="70">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="70"<br />
          name="idgabeta" value="58"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idgabeta" value="58">
          <label for="floatingInput">ID de gaveta</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Todos Las Fotos De Una Actividad</label></div>
        <input type="hidden" name="opcion" value="71">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="71"<br />
          name="id_bitacora" value="5781"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_bitacora" value="5781">
          <label for="floatingInput">ID de bitacora</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar actividades finalizadas por Usuario</label></div>
        <input type="hidden" name="opcion" value="72">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="72"<br />
          name="idpersonal" value="5781"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idpersonal" value="5781">
          <label for="floatingInput">ID de personal</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Todas las actividades</label></div>
        <input type="hidden" name="opcion" value="73">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="73"<br />
          name="registro_actividades" value="6"<br />


        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="registro_actividades" value="6">
          <label for="floatingInput">ID de registro_actividades</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Crear Nuevo registro de actividades</label></div>
        <input type="hidden" name="opcion" value="74">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="74"<br />
          name="fecha" value=""<br />
          name="ID_usuario" value="2"<br />
        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="date" name="fecha">
          <label for="floatingInput">Fecha</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_usuario" value="2">
          <label for="floatingInput">ID de personal</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>

      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Validar actividades del dia</label></div>
        <input type="hidden" name="opcion" value="75">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="75"<br />
          name="fecha" value=""<br />
          name="ID_usuario" value="2"<br />
        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="date" name="fecha">
          <label for="floatingInput">Fecha</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_usuario" value="2">
          <label for="floatingInput">ID de personal</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>

      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Actualizar Check de Actividades</label></div>
        <input type="hidden" name="opcion" value="76">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="76"<br />
          name="ID_check_actividad" value="5"<br />
          name="valor_check" value="No"<br />
        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_check_actividad" value="6">
          <label for="floatingInput">ID_check_actividad</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="valor_check" value="No">
          <label for="floatingInput">valorcheck</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>

      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Finalizar Registro de Actividades</label></div>
        <input type="hidden" name="opcion" value="77">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="77"<br />
          name="ID_registro_actividades" value="4"<br />
        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_registro_actividades" value="4">
          <label for="floatingInput">ID_registro_actividades</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>

    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>PDF checklist Entrada</label></div>
        <input type="hidden" name="opcion" value="78">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="78"<br />
          name="idcliente" value="4"<br />
          name="idventa" value="4"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idcliente" value="4">
          <label for="floatingInput">idcliente</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6177">
          <label for="floatingInput">idventa</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>






    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>PDF checklist Salida</label></div>
        <input type="hidden" name="opcion" value="79">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="79"<br />
          name="idcliente" value="10"<br />
          name="idventa" value="6312"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idcliente" value="10">
          <label for="floatingInput">idcliente</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6312">
          <label for="floatingInput">idventa</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>PDF checklist Tecnico</label></div>
        <input type="hidden" name="opcion" value="80">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="80"<br />
          name="idcliente" value="10"<br />
          name="idventa" value="6312"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idcliente" value="10">
          <label for="floatingInput">idcliente</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6312">
          <label for="floatingInput">idventa</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>PDF Mecanico</label></div>
        <input type="hidden" name="opcion" value="81">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="81"<br />
          name="idcliente" value="10"<br />
          name="idventa" value="6312"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idcliente" value="10">
          <label for="floatingInput">idcliente</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6312">
          <label for="floatingInput">idventa</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>PDF Refacciones</label></div>
        <input type="hidden" name="opcion" value="82">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="82"<br />
          name="idcliente" value="10"<br />
          name="idventa" value="6312"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idcliente" value="10">
          <label for="floatingInput">idcliente</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6312">
          <label for="floatingInput">idventa</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>









    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>PDF de recepcion</label></div>
        <input type="hidden" name="opcion" value="83">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="83"<br />
          name="idcliente" value="10"<br />
          name="idventa" value="6312"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idcliente" value="10">
          <label for="floatingInput">idcliente</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6312">
          <label for="floatingInput">idventa</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar los checks de actividades por usuario y fecha</label></div>
        <input type="hidden" name="opcion" value="84">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="84"<br />
          name="ID_usuario" value="2"<br />
          name="fechaInicio" value="2023-12-21"<br />
          name="fechaFin" value="2023-12-26"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_usuario" value="2">
          <label for="floatingInput">ID usuario</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="date" name="fechaInicio" value="2">
          <label for="floatingInput">fecha Inicio </label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="date" name="fechaFin" value="2">
          <label for="floatingInput">fecha Fin</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Generar PDF de reporte de actividades </label></div>
        <input type="hidden" name="opcion" value="85">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="85"<br />
          name="ID_usuario" value="2"<br />
          name="fechaInicio" value="2023-12-21"<br />
          name="fechaFin" value="2023-12-26"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_usuario" value="2">
          <label for="floatingInput">ID usuario</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="date" name="fechaInicio" value="2">
          <label for="floatingInput">fecha Inicio </label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="date" name="fechaFin" value="2">
          <label for="floatingInput">fecha Fin</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>






    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Listado de Actividades </label></div>
        <input type="hidden" name="opcion" value="86">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="86"<br />
        </code><br>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Registrar nueva actividad para lista de actividades </label></div>
        <input type="hidden" name="opcion" value="87">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="87"<br />
          name="nombre_actividad" value="2"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="nombre_actividad" value="Nombre de actividad">
          <label for="floatingInput">nombre_actividad</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Eliminar de la lista de actividades </label></div>
        <input type="hidden" name="opcion" value="88">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="88"<br />
          name="ID_listado_actividad" value="2"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_listado_actividad" value="2">
          <label for="floatingInput">ID_listado_actividad</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Reactivar Listado de actividades </label></div>
        <input type="hidden" name="opcion" value="94">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="94"<br />
          name="ID_listado_actividad" value="2"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="number" name="ID_listado_actividad" value="2">
          <label for="floatingInput">ID_listado_actividad</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Editar de la lista de actividades </label></div>
        <input type="hidden" name="opcion" value="89">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="89"<br />
          name="nombre_actividad" value="Nuevo nombre"<br />
          name="ID_listado_actividad" value="2"<br />



        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_listado_actividad" value="2">
          <label for="floatingInput">ID_listado_actividad</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="nombre_actividad" value="Nuevo nombre">
          <label for="floatingInput">nombre_actividad</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>






    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Tipos de unidad </label></div>
        <input type="hidden" name="opcion" value="90">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="90"<br />
        </code><br>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Agregar tipo de unidad </label></div>
        <input type="hidden" name="opcion" value="91">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="91"<br />
          name="nombre_tipo" value="Nuevo nombre"<br />
          name="foto" value=""<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="nombre_tipo" value="Nuevo tipo de unidad">
          <label for="floatingInput">nombre_tipo</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="file" name="foto" value="">
          <label for="floatingInput">foto</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Editar nombre de tipo de unidad </label></div>
        <input type="hidden" name="opcion" value="92">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="92"<br />
          name="nombre_tipo" value="Nuevo nombre de tipo de unidad"<br />
          name="ID_tipo_unidad" value="2"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="nombre_tipo" value="Nuevo tipo de unidad">
          <label for="floatingInput">nombre_tipo</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_tipo_unidad" value="2">
          <label for="floatingInput">ID_tipo_unidad</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Eliminar tipo de unidad </label></div>
        <input type="hidden" name="opcion" value="93">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="93"<br />
          name="ID_tipo_unidad" value="2"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="number" name="ID_tipo_unidad" value="2">
          <label for="floatingInput">ID_tipo_unidad</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>






    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Editar nombre de tipo de unidad </label></div>
        <input type="hidden" name="opcion" value="95">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="95"<br />
          name="nombre_tipo" value="Nuevo nombre de tipo de unidad"<br />
          name="foto" value=""<br />
          name="ID_tipo_unidad" value="2"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="nombre_tipo" value="Nuevo tipo de unidad">
          <label for="floatingInput">nombre_tipo</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_tipo_unidad" value="2">
          <label for="floatingInput">ID_tipo_unidad</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="file" name="foto" value="">
          <label for="floatingInput">foto</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Editar check tipo unidad</label></div>
        <input type="hidden" name="opcion" value="96">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="96"<br />
          name="ID_tipo_unidad" value="2"<br />
          name="tipo_check" value="vin/placas/km/gasolina/motor"<br />
          name="valor_check" value="1"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="valor_check" value="0">
          <label for="floatingInput">valor_check</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_tipo_unidad" value="2">
          <label for="floatingInput">ID_tipo_unidad</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="tipo_check" value="vin">
          <label for="floatingInput">tipo_check</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>








    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Mostrar checks de unidad</label></div>
        <input type="hidden" name="opcion" value="97">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="97"<br />
          name="tipo_check" value="Entrada"<br />
          name="id_ser_venta" value="6198"<br />
        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="tipo_check" value="Entrada">
          <label for="floatingInput">tipo_check</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_ser_venta" value="6198">
          <label for="floatingInput">id_ser_venta</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Actualizar un check de unidad</label></div>
        <input type="hidden" name="opcion" value="98">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="98"<br />
          name="valor_check" value="Bueno/Malo/Regular"<br />
          name="ID_valor_check" value="24"<br />
        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="valor_check" value="Bueno">
          <label for="floatingInput">valor_check</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_valor_check" value="24">
          <label for="floatingInput">ID_valor_check</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Mostrar checks Vacios de unidad</label></div>
        <input type="hidden" name="opcion" value="99">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="99"<br />
          name="tipo_check" value="Entrada"<br />
          name="id_ser_venta" value="6198"<br />
        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="tipo_check" value="Entrada">
          <label for="floatingInput">tipo_check</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_ser_venta" value="6198">
          <label for="floatingInput">id_ser_venta</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Fianlizar revision de checks</label></div>
        <input type="hidden" name="opcion" value="100">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="100"<br />
          name="tipo_check" value="Entrada"<br />
          name="id_ser_venta" value="6200"<br />
        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="tipo_check" value="Entrada">
          <label for="floatingInput">tipo_check</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_ser_venta" value="6200">
          <label for="floatingInput">id_ser_venta</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="observaciones" value="Prueba de observacion">
          <label for="floatingInput">observaciones</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Unidades de un cliente </label></div>
        <input type="hidden" name="opcion" value="101">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="101"<br />
          name="id_ser_cliente" value="487"<br />
        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_ser_cliente" value="487">
          <label for="floatingInput">id_ser_cliente</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label> Registrar un nuevo servicio con foto de unidad</label></div>
        <input type="hidden" name="opcion" value="102">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="102"<br />
          name= "id_ser_cliente" value = "26" <br />
          name = "idunidad" value = "963"<br />
          name = "km" value = "2500"<br />
          name = "gas" value = "3/4"<br />
          name = "motivo" value = "Falla Motor" <br />
          name = "marca" value = "Ford" <br />
          name = "modelo" value = "Ranger" <br />
          name = "motor" value = "2.4" <br />
          name = "vin" value = "8AFDT50D476047962" <br />
          name = "placas" value = "SL-38-058" <br />
          name = "anio" value = "2002" <br />
          name = "foto" value = "foto" <br />
          name = "tipounidad" value = "moto" <br />
          <!--
          name = "numeroInyectores" value = "1" <br />
-->

        </code><br>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_ser_cliente" value="26">
          <label for="floatingInput">id_ser_cliente</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idunidad" value="963">
          <label for="floatingInput">idunidad</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="km" value="2500">
          <label for="floatingInput">kilometraje</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <label for="floatingInput">Gasolina</label>
          <select class="form-floating" aria-label="Default select example" name="gas">
            <option value="Lleno">Lleno</option>
            <option value="3/4">3/4</option>
            <option value="1/2">1/2</option>
            <option value="1/4">1/4</option>
            <option value="Reserva">Reserva</option>
          </select>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="motivo" value="Motor">
          <label for="floatingInput">Motivo ingreso</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="marca" value="Ford">
          <label for="floatingInput">Marca</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="modelo" value="Ranger">
          <label for="floatingInput">Modelo</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="motor" value="2.4">
          <label for="floatingInput">Motor</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="vin" value="8AFDT50D476047962">
          <label for="floatingInput">VIN</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="placas" value="SL-38-058">
          <label for="floatingInput">Placas</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="anio" value="2002">
          <label for="floatingInput">Año</label>
        </div>
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="foto" value="2002">
          <label for="floatingInput">foto</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="tipounidad" value="moto">
          <label for="floatingInput">tipounidad</label>
        </div>

        <!--

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="numeroInyectores" value="1">
          <label for="floatingInput">numeroInyectores</label>
        </div>

-->
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>







    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Actualizar estatus de un servicio </label></div>
        <input type="hidden" name="opcion" value="103">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="103"<br />
          name="ID_ser_venta" value="6223"<br />
          name="nuevoEstado" value="ENTREGADO/DIAGNOSTICO/baja"<br />
        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_ser_venta" value="487">
          <label for="floatingInput">ID_ser_venta</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="nuevoEstado" value="DIAGNOSTICO">
          <label for="floatingInput">nuevoEstado</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar mano de obra </label></div>
        <input type="hidden" name="opcion" value="104">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="104"<br />
          name="ID_ser_venta" value="6239"<br />
        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_ser_venta" value="6239">
          <label for="floatingInput">ID_ser_venta</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Asignar Mano de obra a servicio </label></div>
        <input type="hidden" name="opcion" value="105">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="105"<br />
          name="ID_ser_venta" value="6239"<br />
          name="observaciones" value="observaciones"<br />
          name="idpersonal" value="idpersonal"<br />
        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_ser_venta" value="6239">
          <label for="floatingInput">ID_ser_venta</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="observaciones" value="observaciones">
          <label for="floatingInput">observaciones</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idpersonal" value="2">
          <label for="floatingInput">idpersonal</label>
        </div>



        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Todas las actividades</label></div>
        <input type="hidden" name="opcion" value="106">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="106"<br />
          name="id_registro_actividades" value="6"<br />


        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_registro_actividades" value="6">
          <label for="floatingInput">ID de registro_actividades</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar encargado actual</label></div>
        <input type="hidden" name="opcion" value="107">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="107"<br />


        </code><br>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Actualizar encargado</label></div>
        <input type="hidden" name="opcion" value="108">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="108"<br />
          name="idusuario" value="2"<br />


        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idusuario" value="2">
          <label for="floatingInput">idusuario</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Actualizar iddoc</label></div>
        <input type="hidden" name="opcion" value="109">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="109"<br />
          name="id_ser_venta" value="2"<br />
          name="iddoc" value="iddoc"<br />


        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_ser_venta" value="6247">
          <label for="floatingInput">id_ser_venta</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="iddoc" value="6247">
          <label for="floatingInput">iddoc</label>
        </div>



        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Agregar Usuario </label></div>
        <input type="hidden" name="opcion" value="110">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="110"<br />
          name="nombre" value="Milton Prueba"<br />
          name="email" value="a@gmail.com"<br />
          name="telefono" value="238211"<br />
          name="password" value="password"<br />
          name="permisos" value="permisos"<br />
          name="empresa" value="empresa"<br />
          name="area" value="area"<br />


        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="nombre" value="Milton">
          <label for="floatingInput">nombre</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="email" value="a@gmail.com">
          <label for="floatingInput">email</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="telefono" value="238211">
          <label for="floatingInput">telefono</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="password" value="1234">
          <label for="floatingInput">id_ser_venta</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="permisos" value="SUPERADMIN">
          <label for="floatingInput">permisos</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="empresa" value="Bitala">
          <label for="floatingInput">empresa</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="area" value="GERENCIA">
          <label for="floatingInput">area</label>
        </div>





        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Agregar Usuario </label></div>
        <input type="hidden" name="opcion" value="111">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="111"<br />
          name="nombre" value="Milton Prueba"<br />
          name="email" value="a@gmail.com"<br />
          name="telefono" value="238211"<br />
          name="password" value="password"<br />
          name="permisos" value="permisos"<br />
          name="empresa" value="empresa"<br />
          name="area" value="area"<br />
          name="idusuario" value="2"<br />


        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="nombre" value="Milton">
          <label for="floatingInput">nombre</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="email" value="a@gmail.com">
          <label for="floatingInput">email</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="telefono" value="238211">
          <label for="floatingInput">telefono</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="password" value="1234">
          <label for="floatingInput">id_ser_venta</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="permisos" value="SUPERADMIN">
          <label for="floatingInput">permisos</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="empresa" value="Bitala">
          <label for="floatingInput">empresa</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="area" value="GERENCIA">
          <label for="floatingInput">area</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idusuario" value="2">
          <label for="floatingInput">idusuario</label>
        </div>



        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Agregar Refaccion a Unidad </label></div>
        <input type="hidden" name="opcion" value="112">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="112"<br />
          name="idventa" value="idventa"<br />
          name="clave" value="clave"<br />
          name="cantidad" value="cantidad"<br />
          name="descripcion" value="descripcion"<br />
          name="precio" value="precio"<br />
          name="unidad" value="unidad"<br />
          name="importe" value="importe"<br />
          name="descuento" value="descuento"<br />
          name="tipo" value="tipo"<br />


        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idventa" value="6230">
          <label for="floatingInput">idventa</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="clave" value="238211">
          <label for="floatingInput">clave</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="cantidad" value="2">
          <label for="floatingInput">cantidad</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="descripcion" value="Descripcion de prueba">
          <label for="floatingInput">descripcion</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="precio" value="100">
          <label for="floatingInput">precio</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="unidad" value="pieza">
          <label for="floatingInput">unidad</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="importe" value="100">
          <label for="floatingInput">importe</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="descuento" value="0">
          <label for="floatingInput">descuento</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="tipo" value="externo">
          <label for="floatingInput">tipo</label>
        </div>





        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Eliminar Refaccion</label></div>
        <input type="hidden" name="opcion" value="113">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="113"<br />
          name="idrefaccion" value="2"<br />


        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idrefaccion" value="2">
          <label for="floatingInput">idrefaccion</label>
        </div>



        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Agregar comentario a refaccion </label></div>
        <input type="hidden" name="opcion" value="114">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="114"<br />
          name="idrefaccion" value="2"<br />
          name="observaciones" value="Comentario"<br />

        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idrefaccion" value="2">
          <label for="floatingInput">idrefaccion</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="observaciones" value="Comentario">
          <label for="floatingInput">observaciones</label>
        </div>



        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Corregir actividad de mecanico </label></div>
        <input type="hidden" name="opcion" value="115">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="115"<br />
          name="idbitacora" value="2"<br />
          name="observaciones" value="Comentario"<br />

        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idbitacora" value="2">
          <label for="floatingInput">idbitacora</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="observaciones" value="Comentario">
          <label for="floatingInput">observaciones</label>
        </div>



        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>









    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Inyectores de una unidad </label></div>
        <input type="hidden" name="opcion" value="116">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="116"<br />
          name="id_ser_venta" value="6279"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_ser_venta" value="6279">
          <label for="floatingInput">id_ser_venta</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar servicios De Inyectores </label></div>
        <input type="hidden" name="opcion" value="117">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="117"<br />
        </code><br>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Insertar Servicios de Inyectores </label></div>
        <input type="hidden" name="opcion" value="118">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="118"<br />
          name="numeroInyectores" value="2"<br />
          name="ID_unidad" value="ID_unidad"<br />
          name="motivo_ingreso" value="motivo_ingreso"<br />
          <!--
          name="tipo" value="Inyector o Turbo"<br />
-->
        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_unidad" value="564">
          <label for="floatingInput">ID_unidad</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="motivo_ingreso" value="motivo de ingreso">
          <label for="floatingInput">motivo_ingreso</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="numeroInyectores" value="2">
          <label for="floatingInput">numeroInyectores</label>
        </div>


        <!--
        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="tipo" value="Inyector">
          <label for="floatingInput">tipo</label>
        </div>
-->

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar check por inyector</label></div>
        <input type="hidden" name="opcion" value="119">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="119"<br />
          name="ID_inyector" value="35"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_inyector" value="35">
          <label for="floatingInput">ID_inyector</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Actualizar check por inyector</label></div>
        <input type="hidden" name="opcion" value="120">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="120"<br />
          name="ID_check_inyector" value="12"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_check_inyector" value="12">
          <label for="floatingInput">ID_check_inyector</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="valor_check" value="Bueno">
          <label for="floatingInput">valor_check</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Finalizar checks de un inyector</label></div>
        <input type="hidden" name="opcion" value="121">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="121"<br />
          name="ID_inyector" value="37"<br />
          name="comentarios" value="comentarios"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_inyector" value="37">
          <label for="floatingInput">ID_inyector</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="comentarios" value="comentarios">
          <label for="floatingInput">comentarios</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>






    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar fotos de un inyector</label></div>
        <input type="hidden" name="opcion" value="122">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="122"<br />
          name="ID_inyector" value="37"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_inyector" value="37">
          <label for="floatingInput">ID_inyector</label>
        </div>



        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>






    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Subir Foto de Inyector </label></div>
        <input type="hidden" name="opcion" value="123">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="123"<br />
          name="ID_inyector" value="37"<br />
          name="foto2" value="foto"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_inyector" value="37">
          <label for="floatingInput">ID_inyector</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="file" name="foto" value="foto">
          <label for="floatingInput">foto</label>
        </div>



        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>








    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Mano De Obra de Inyectores </label></div>
        <input type="hidden" name="opcion" value="124">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="124"<br /> 
          name="ID_inyector" value="37"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_inyector" value="37">
          <label for="floatingInput">ID_inyector</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Agregar Mano De Obra de Inyector </label></div>
        <input type="hidden" name="opcion" value="125">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="125"<br />
          name="ID_inyector" value="37"<br />
          name="observaciones" value="observaciones"<br />
          name="costo" value="costo"<br />
          name="ID_mecanico" value="ID_mecanico"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_inyector" value="37">
          <label for="floatingInput">ID_inyector</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="observaciones" value="observaciones">
          <label for="floatingInput">observaciones</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="costo" value="100">
          <label for="floatingInput">costo</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_mecanico" value="3">
          <label for="floatingInput">ID_mecanico</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>







    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Actualizar status de servicio de inyectores </label></div>
        <input type="hidden" name="opcion" value="126">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="126"<br />
          name="ID_serv_inyector" value="ID_serv_inyector"<br />
          name="nuevoStatus" value="nuevoStatus"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_serv_inyector" value="12">
          <label for="floatingInput">ID_serv_inyector</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="nuevoStatus" value="nuevoStatus">
          <label for="floatingInput">nuevoStatus</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Asignar Nota A Servicio de Inyector</label></div>
        <input type="hidden" name="opcion" value="127">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="127"<br />
          name="ID_serv_inyector" value="ID_serv_inyector"<br />
          name="nuevoStatus" value="nuevoStatus"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_serv_inyector" value="12">
          <label for="floatingInput">ID_serv_inyector</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="iddocSelec" value="3">
          <label for="floatingInput">iddocSelec</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>








    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Refacciones de inyectores </label></div>
        <input type="hidden" name="opcion" value="128">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="128"<br />
          name="id_inyector" value="id_inyector"<br />

        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_inyector" value="1">
          <label for="floatingInput">id_inyector</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>






    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Agregar Refaccion a inyector</label></div>
        <input type="hidden" name="opcion" value="129">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="129"<br />
          name="id_inyector" value="id_inyector"<br />
          name="clave" value="clave"<br />
          name="cantidad" value="cantidad"<br />
          name="descripcion" value="descripcion"<br />
          name="precio" value="precio"<br />
          name="unidad" value="unidad"<br />
          name="importe" value="importe"<br />
          name="descuento" value="descuento"<br />
          name="tipo" value="tipo"<br />


        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_inyector" value="18">
          <label for="floatingInput">id_inyector</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="clave" value="238211">
          <label for="floatingInput">clave</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="cantidad" value="2">
          <label for="floatingInput">cantidad</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="descripcion" value="Descripcion de prueba">
          <label for="floatingInput">descripcion</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="precio" value="100">
          <label for="floatingInput">precio</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="unidad" value="pieza">
          <label for="floatingInput">unidad</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="importe" value="100">
          <label for="floatingInput">importe</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="descuento" value="0">
          <label for="floatingInput">descuento</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="tipo" value="externo">
          <label for="floatingInput">tipo</label>

        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Agregar Refaccion a inyector</label></div>
        <input type="hidden" name="opcion" value="130">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="130"<br />
          name="id_inyector" value="id_inyector"<br />
          name="clave" value="clave"<br />
          name="cantidad" value="cantidad"<br />
          name="descripcion" value="descripcion"<br />
          name="precio" value="precio"<br />
          name="unidad" value="unidad"<br />
          name="importe" value="importe"<br />
          name="descuento" value="descuento"<br />
          name="tipo" value="tipo"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_servicio_inyector" value="18">
          <label for="floatingInput">ID_servicio_inyector</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="clave" value="238211">
          <label for="floatingInput">clave</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="cantidad" value="2">
          <label for="floatingInput">cantidad</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="descripcion" value="Descripcion de prueba">
          <label for="floatingInput">descripcion</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="precio" value="100">
          <label for="floatingInput">precio</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="unidad" value="pieza">
          <label for="floatingInput">unidad</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="importe" value="100">
          <label for="floatingInput">importe</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="descuento" value="0">
          <label for="floatingInput">descuento</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="tipo" value="externo">
          <label for="floatingInput">tipo</label>
        </div>
        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Eliminar Insumo de servicio de Inyector</label></div>
        <input type="hidden" name="opcion" value="131">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="131"<br />
          name="idrefaccion" value="2"<br />


        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idrefaccion" value="2">
          <label for="floatingInput">idrefaccion</label>
        </div>



        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Insumos de un servicio </label></div>
        <input type="hidden" name="opcion" value="132">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="132"<br />
          name="ID_serv_inyector" value="2"<br />


        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_serv_inyector" value="2">
          <label for="floatingInput">ID_serv_inyector</label>
        </div>



        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Finalizar La revision de un inyector </label></div>
        <input type="hidden" name="opcion" value="133">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="133"<br />
          name="ID_inyector" value="16"<br />


        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_inyector" value="16">
          <label for="floatingInput">ID_inyector</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>






    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar faltantes de finalizacion</label></div>
        <input type="hidden" name="opcion" value="134">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="134"<br />
          name="ID_serv_inyector" value="16"<br />


        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_serv_inyector" value="16">
          <label for="floatingInput">ID_serv_inyector</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar servicios de inyectores finalizados </label></div>
        <input type="hidden" name="opcion" value="135">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="135"<br />


        </code><br>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Asignar Traspaso a servicio</label></div>
        <input type="hidden" name="opcion" value="138">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="138"<br />
          name="ID_serv" value="6281"<br />
          name="DOCID" value="48354"<br />
          name="NOMBRE" value="RP- CRISPIN INV"<br />
          name="EMISOR" value="AH"<br />
          name="NUMERO" value="3017"<br />
          name="ESTADO" value="I"<br />
          name="FECHA" value="2024-04-02"<br />
          name="FECCAN" value="0000-00-00"<br />
          name="TOTAL" value="77.42"<br />
          name="NOTA" value="USO LABORATORIO TURBOS"<br />

        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="NOTA" value="USO LABORATORIO TURBOS">
          <label for="floatingInput">NOTA</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="TOTAL" value="77.42">
          <label for="floatingInput">TOTAL</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="FECCAN" value="0000-00-00">
          <label for="floatingInput">FECCAN</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="FECHA" value="2024-04-02">
          <label for="floatingInput">FECHA</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ESTADO" value="I">
          <label for="floatingInput">ESTADO</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="NUMERO" value="3017">
          <label for="floatingInput">NUMERO</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="EMISOR" value="AH">
          <label for="floatingInput">EMISOR</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="NOMBRE" value="RP- CRISPIN INV">
          <label for="floatingInput">NOMBRE</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_serv" value="6281">
          <label for="floatingInput">ID_serv</label>
        </div>



        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="DOCID" value="48354">
          <label for="floatingInput">DOCID</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Traspasos de un servicio</label></div>
        <input type="hidden" name="opcion" value="139">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="139"<br />
          name="id_ser_venta" value="6281"<br />


        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_ser_venta" value="6281">
          <label for="floatingInput">id_ser_venta</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Desvincular traspaso</label></div>
        <input type="hidden" name="opcion" value="140">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="140"<br />
          name="ID_traspaso" value="45"<br />
          name="DOCID" value="48306"<br />

          
        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_traspaso" value="45">
          <label for="floatingInput">ID_traspaso</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="DOCID" value="48306">
          <label for="floatingInput">DOCID</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>







    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Asignar Traspaso a servicio de inyector </label></div>
        <input type="hidden" name="opcion" value="141">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="141"<br />
          name="ID_serv_inyector" value="35"<br />
          name="DOCID" value="48354"<br />
          name="NOMBRE" value="RP- CRISPIN INV"<br />
          name="EMISOR" value="AH"<br />
          name="NUMERO" value="3017"<br />
          name="ESTADO" value="I"<br />
          name="FECHA" value="2024-04-02"<br />
          name="FECCAN" value="0000-00-00"<br />
          name="TOTAL" value="77.42"<br />
          name="NOTA" value="USO LABORATORIO TURBOS"<br />

        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="NOTA" value="USO LABORATORIO TURBOS">
          <label for="floatingInput">NOTA</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="TOTAL" value="77.42">
          <label for="floatingInput">TOTAL</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="FECCAN" value="0000-00-00">
          <label for="floatingInput">FECCAN</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="FECHA" value="2024-04-02">
          <label for="floatingInput">FECHA</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ESTADO" value="I">
          <label for="floatingInput">ESTADO</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="NUMERO" value="3017">
          <label for="floatingInput">NUMERO</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="EMISOR" value="AH">
          <label for="floatingInput">EMISOR</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="NOMBRE" value="RP- CRISPIN INV">
          <label for="floatingInput">NOMBRE</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_serv_inyector" value="35">
          <label for="floatingInput">ID_serv_inyector</label>
        </div>



        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="DOCID" value="48354">
          <label for="floatingInput">DOCID</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>






    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Traspasos de un servicio de inyector</label></div>
        <input type="hidden" name="opcion" value="142">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="142"<br />
          name="id_serv_inyector" value="34"<br />


        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_serv_inyector" value="34">
          <label for="floatingInput">id_serv_inyector</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Asignar Traspaso a un inyector </label></div>
        <input type="hidden" name="opcion" value="143">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="143"<br />
          name="ID_inyector" value="38"<br />
          name="DOCID" value="48354"<br />
          name="NOMBRE" value="RP- CRISPIN INV"<br />
          name="EMISOR" value="AH"<br />
          name="NUMERO" value="3017"<br />
          name="ESTADO" value="I"<br />
          name="FECHA" value="2024-04-02"<br />
          name="FECCAN" value="0000-00-00"<br />
          name="TOTAL" value="77.42"<br />
          name="NOTA" value="USO LABORATORIO TURBOS"<br />

        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="NOTA" value="USO LABORATORIO TURBOS">
          <label for="floatingInput">NOTA</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="TOTAL" value="77.42">
          <label for="floatingInput">TOTAL</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="FECCAN" value="0000-00-00">
          <label for="floatingInput">FECCAN</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="FECHA" value="2024-04-02">
          <label for="floatingInput">FECHA</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ESTADO" value="I">
          <label for="floatingInput">ESTADO</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="NUMERO" value="3017">
          <label for="floatingInput">NUMERO</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="EMISOR" value="AH">
          <label for="floatingInput">EMISOR</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="NOMBRE" value="RP- CRISPIN INV">
          <label for="floatingInput">NOMBRE</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_inyector" value="38">
          <label for="floatingInput">ID_inyector</label>
        </div>



        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="DOCID" value="48354">
          <label for="floatingInput">DOCID</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>






    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar Traspasos de un Inyector</label></div>
        <input type="hidden" name="opcion" value="144">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="144"<br />
          name="ID_inyector" value="38"<br />


        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_inyector" value="38">
          <label for="floatingInput">ID_inyector</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar PDF Recepcion Inyectores</label></div>
        <input type="hidden" name="opcion" value="145">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="145"<br />
          name="ID_serv_inyector" value="38"<br />


        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_serv_inyector" value="38">
          <label for="floatingInput">ID_serv_inyector</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar PDF Salida Inyectores</label></div>
        <input type="hidden" name="opcion" value="146">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="146"<br />
          name="ID_serv_inyector" value="38"<br />


        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_serv_inyector" value="38">
          <label for="floatingInput">ID_serv_inyector</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>




    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar PDF Refacciones Inyectores</label></div>
        <input type="hidden" name="opcion" value="147">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="147"<br />
          name="ID_serv_inyector" value="38"<br />


        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_serv_inyector" value="38">
          <label for="floatingInput">ID_serv_inyector</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Consultar PDF Mano De Obra Inyectores</label></div>
        <input type="hidden" name="opcion" value="148">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="148"<br />
          name="ID_serv_inyector" value="38"<br />


        </code><br>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="ID_serv_inyector" value="38">
          <label for="floatingInput">ID_serv_inyector</label>
        </div>


        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>



    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Corregir Mano De Obra de Inyectores </label></div>
        <input type="hidden" name="opcion" value="149">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="149"<br /> 
          name="idbitacora" value="37"<br />
          name="actividadCorregida" value="Activ"<br />
          name="nuevoCosto" value="35"<br />

          
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idbitacora" value="37">
          <label for="floatingInput">idbitacora</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="actividadCorregida" value="Activ">
          <label for="floatingInput">actividadCorregida</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="nuevoCosto" value="35">
          <label for="floatingInput">nuevoCosto</label>
        </div>



        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>






    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Asignar Alarma a Gaveta</label></div>
        <input type="hidden" name="opcion" value="150">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="150"<br /> 
          name="id_gabeta" value="37"<br />
          name="frecuencia" value="7"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_gabeta" value="37">
          <label for="floatingInput">id_gabeta</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="frecuencia" value="7">
          <label for="floatingInput">frecuencia</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>






    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Finalizar revision de Gaveta y actualizar fecha de revision</label></div>
        <input type="hidden" name="opcion" value="151">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="151"<br /> 
          name="iddocga" value="37"<br />
          name="id_gabeta" value="7"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="iddocga" value="37">
          <label for="floatingInput">iddocga</label>
        </div>


        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_gabeta" value="7">
          <label for="floatingInput">id_gabeta</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>





    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>Editar Gaveta </label></div>
        <input type="hidden" name="opcion" value="152">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="152"<br /> 
          name="EditdescripcionGaveta" value="EditdescripcionGaveta"<br />
          name="EditnombreGaveta" value="EditnombreGaveta"<br />
          name="idgabeta" value="67"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="EditnombreGaveta" value="EditnombreGaveta">
          <label for="floatingInput">EditnombreGaveta</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="idgabeta" value="67">
          <label for="floatingInput">idgabeta</label>
        </div>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="EditdescripcionGaveta" value="EditdescripcionGaveta">
          <label for="floatingInput">EditdescripcionGaveta</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>







    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>PDF de Contenido de Gaveta </label></div>
        <input type="hidden" name="opcion" value="153">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="153"<br /> 
          name="idgabeta" value="67"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_gabeta" value="67">
          <label for="floatingInput">id_gabeta</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>






    <div class="section">
      <form class="form" enctype="multipart/form-data" action="../Controllers/Apiback.php" method="POST">
        <div><label>PDF de Inventarios de Gaveta </label></div>
        <input type="hidden" name="opcion" value="154">
        <code>
          <br />
          method = "POST"<br />
          name="opcion" value="154"<br /> 
          name="idgabeta" value="67"<br />
        </code><br>

        <div class="form-floating contenedor-inputs padre"><br>
          <input type="text" name="id_gabeta" value="67">
          <label for="floatingInput">id_gabeta</label>
        </div>

        <button type="submit" class="btn btn-primary">consultar</button>
      </form>
    </div>


    <script src="../librerias/Bootstrap5/js/bootstrap.min.js"></script>
</body>

</html>