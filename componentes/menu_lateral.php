<link rel="stylesheet" href="../css/menulateral.css">
<nav class="navbar navbar-dark fixed-top bg menu">
  <div class="container-fluid navv">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon tachanav"></span>
    </button>
    <a class="navbar-brand" href="#" id="TituloEmpresa">Abarrotera Hidalgo</a>
    <div class="offcanvas offcanvas-start bg" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title titlemenu" id="offcanvasNavbarLabel"><span class="tipo-menu"> Hola  <?php echo $_SESSION['usuario']; ?></span></h5>
        <button type="button" class="btn-close text-reset tachanavv" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <?php
          switch ($_SESSION['TipoMenu']) {
            case '1':
              echo '<li class="nav-item item">
                        <a class="opciones" href="../Vistas/VistaAuditor.php"><i class="fa-solid fa-clipboard-check"></i> Notas - Ferrum</a>
                      </li>
                      <li class="nav-item item">
                        <a class="opciones" href="../Vistas/ListadoPedidos.php"><i class="fa-solid fa-truck-ramp-box"></i> Listado de  Pedidos</a>
                      </li>                      
                      <li class="nav-item item">
                        <a class="opciones" href="../Vistas/FacturasCompra.php"><i class="fa-solid fa-file-invoice-dollar"></i> Facturas Compras</a>
                      </li>
                      <li class="nav-item item">                   
                        <a class="opciones" href="../Vistas/Contabilidad.php"><i class="fas fa-money-check-alt"></i>Facturas Contabilidad</a>
                      </li> 
                      <li class="nav-item item">
                        <a class="opciones" href="../Vistas/VentasCoronaG.php"><i class="fa-solid fa-arrow-trend-up" style="color: #ffffff;"></i>Pedidos Corona</a>
                      </li>
                      <li class="nav-item item">
                          <a class="opciones" href="../Vistas/Gastos.php"><i class="fas fa-file-invoice-dollar"></i> Gastos</a>
                      </li>
                      <li class="nav-item item ">
                        <a class="opciones " href="../Controllers/Salir.php"><i class="fa-solid fa-door-open"></i> Salir</a>
                      </li>';
              break;
            case '2':
              echo '<li class="nav-item item">                        
                        <a class="opciones" href="../Vistas/FacturasCompra.php"><i class="fa-solid fa-cart-shopping"></i>Compras</a>
                      </li>
                      <li class="nav-item item">
                        <a class="opciones" href="../Vistas/Reportes.php"><i class="fa-solid fa-clipboard-check"></i> Notas - Ferrum</a>
                      </li>
                      <li class="nav-item item">
                        <a class="opciones" href="../Vistas/Gastos.php"><i class="fas fa-file-invoice-dollar"></i>Gastos</a>
                      </li>
                      <li class="nav-item item ">
                        <a class="opciones " href="../Controllers/Salir.php"><i class="fa-solid fa-door-open"></i> Salir</a>
                      </li>';
              break;
            case '3':
              echo ' <li class="nav-item item">
                        <a class="opciones" href="../Vistas/PedidosP.php"><i class="fa-solid fa-truck-ramp-box"></i> Pedidos</a>
                      </li>
                      <li class="nav-item item">
                        <a class="opciones" href="../Vistas/ListadoPedidos.php"><i class="fa-solid fa-truck"></i> Listado de pedidos</a>
                      </li>
                      <li class="nav-item item ">
                        <a class="opciones " href="../Controllers/Salir.php"><i class="fa-solid fa-door-open"></i> Salir</a>
                      </li>';
              break;
            case '4':
              echo '<li class="nav-item item">                 
                      <a class="opciones" href="../Vistas/Reportes.php"><i class="fa-solid fa-clipboard-check"></i>Reportes</a>
                      </li>
                      <li class="nav-item item ">
                        <a class="opciones " href="../Controllers/Salir.php"><i class="fa-solid fa-door-open"></i> Salir</a>
                      </li>';
              break;
              case '5':
                echo '<li class="nav-item item">                   
                        <a class="opciones" href="../Vistas/ListadoPedidos.php"><i class="fa-solid fa-truck"></i> Lista de Pedidos</a>
                        </li>
                        <li class="nav-item item ">
                          <a class="opciones " href="../Controllers/Salir.php"><i class="fa-solid fa-door-open"></i> Salir</a>
                        </li>';
                break;
                case '7':
                  echo '<li class="nav-item item">                   
                          <a class="opciones" href="../Vistas/Contabilidad.php"><i class="fas fa-money-check-alt"></i> Contabilidad</a>
                          </li>
                          <li class="nav-item item">
                            <a class="opciones" href="../Vistas/Gastos.php"><i class="fas fa-file-invoice-dollar"></i> Gastos</a>
                          </li>
                          <li class="nav-item item ">
                            <a class="opciones " href="../Controllers/Salir.php"><i class="fa-solid fa-door-open"></i> Salir</a>
                          </li>
                          ';
                  break;
            default:
              echo '<li class="nav-item item ">
                      <a class="opciones " href="../Controllers/Salir.php"><i class="fa-solid fa-door-open"></i> Salir</a>
                    </li>';
              break;
          }
          ?>
        </ul>
        </li>
        </ul>
      </div>
    </div>
  </div>
</nav>