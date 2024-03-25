<?php

use Sabberworm\CSS\Value\URL;

require_once '../Models/BD.php';
require_once '../Controllers/PeticionesFotoApi.php';

class Peticiones
{
    private $model;
    private $modelo;

    function __construct()
    {
        $this->model = new ModeloBD();
        $this->modelo = new PeticionApi();
    }
    function Login($telefono, $password)
    {
        if (isset($telefono, $password) && !empty($telefono) && !empty($password)) {
            $model = new ModeloBD();
            $passwordE = $model->encryption($password);
            $dato = $model->Consultarusurio($telefono, $passwordE);
            if ($dato) {
                $response = $dato;
            } else {
                $response = 'fallo';
            }
        } else {
            $response = "requerido";
        }
        echo json_encode($response);
    }
    function ConsultarServiciosActivos()
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarServiciosActivos();
        if ($dato) {
            $result = $dato;
        } else {
            $result = 'fallo';
        }
        echo json_encode($result);
    }
    function ConsultarRefaccion($idventa)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarRefaccion($idventa);
        if ($dato) {
            $result = $dato;
        } else {
            $result = 'fallo';
        }
        echo json_encode($result);
    }
    function  Actualizartoken($idusuario, $token)
    {
        $model = new ModeloBD();
        $dato = $model->Actualizartoken($idusuario, $token);
        if ($dato) {
            $result = 'exitoso';
        } else {
            $result = 'fallo';
        }
        echo json_encode($result);
    }
    function  ConsultarUsuario()
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarUsuario();
        if ($dato) {
            $result = $dato;
        } else {
            $result = 'fallo';
        }
        echo json_encode($result);
    }
    function  ConsultarMecanicos($idventa)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarMecanicos($idventa);
        if ($dato) {
            $result = $dato;
        } else {
            $result = 'fallo';
        }
        echo json_encode($result);
    }

    function  BitacoraMecanicos($idventa)
    {
        $model = new ModeloBD();
        $dato = $model->BitacoraMecanicos($idventa);
        if ($dato) {
            $result = $dato;
        } else {
            $result = 'fallo';
        }
        echo json_encode($result);
    }
    function  ConsultafotosUnidad($idventa)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultafotosUnidad($idventa);
        if ($dato) {
            $result = $dato;
        } else {
            $result = 'fallo';
        }
        echo json_encode($result);
    }

    function  ModificarfotosUnidad($idventa,  $foto)
    {
        $model = new ModeloBD();
        $modelo = new PeticionApi();
        $dato = $modelo->subirUnidad($foto);
        // echo $dato;
        if ($dato) {
            $fotos = str_replace('"', '', $dato);
            $datos = $model->ModificarfotosUnidad($idventa, $fotos);
            if ($datos) {
                $result = 'exitoso';
            } else {
                $result = 'fallo';
            }
        } else {
            $result = 'fallo';
        }
        echo json_encode($result);
    }


    function  EstablecerfotoVenta($idventa,  $foto)
    {
        $model = new ModeloBD();
        $dato = $model->RegistrarFoto($idventa, $foto);
        if ($dato) {
            $result = 'exitoso';
        } else {
            $result = 'fallo';
        }
        echo json_encode($result);
    }
    function ConsultaChecks($idventa)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultaChecks($idventa);
        if ($dato) {
            $result = $dato;
        } else {
            $result = 'fallo';
        }
        echo json_encode($result);
    }

    function ActualizarChecks($idcheck, $valoritem, $fecha, $hora)
    {
        $model = new ModeloBD();
        $dato = $model->ActualizarChecks($idcheck, $valoritem, $fecha, $hora);
        if ($dato) {
            // $result = $dato;
            $datos = $model->ConsultarChcksID($idcheck);
            if ($datos) {
                $venta = $datos[0]['id_ser_venta'];
                $idventa = str_replace('"', '', $venta);
                $resul = $idventa;
                $Modificar = $model->ModificarCheckVenta($resul);
                if ($Modificar) {
                    $result = 'exitoso';
                } else {
                    $result =  'fallo';
                }
            } else {
                $result = 'fallo';
            }
        } else {
            $result = 'fallo';
        }
        echo json_encode($result);
    }
    function ConsultarArrastre($id)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarArrastre($id);
        if ($dato) {
            $result = $dato;
        } else {
            $result = 'fallo';
        }
        echo json_encode($result);
    }
    function ConsultarRutas($id)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarRutas($id);
        if ($dato) {
            $resul  = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
    function ConsultarChoferes()
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarChoferes();
        if ($dato) {
            $resul  = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
    function ConsultarArrastresTodo()
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarArrastresTodo();
        if ($dato) {
            $resul  = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
    function ModificarArrastres($horaFinal, $id, $fechafinal)
    {
        $model = new ModeloBD();
        $dato = $model->ModificarArrastres($horaFinal, $id, $fechafinal);
        if ($dato) {
            $resul  = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
    function DatosChofer($idarrastre)
    {
        $model = new ModeloBD();
        $dato = $model->DatosChofer($idarrastre);
        if ($dato) {
            $resul  = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
    function  ConsultarClientes()
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarClientes();
        if ($dato) {
            $resul  = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
    function ConsultarUnidadesCliente($idcliente)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarUnidadesCliente($idcliente);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
    function IngresarServicio($idunidad, $idcliente, $km, $combustible, $motivo, $fechaIngreso, $horaIngreso, $marca, $modelo, $motor, $vin, $placas, $anio)
    {
        $model = new ModeloBD();
        $dato = $model->IngresarServicio($idunidad, $idcliente, $km, $combustible, $motivo, $fechaIngreso, $horaIngreso, $marca, $modelo, $motor, $vin, $placas, $anio);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function ConsultarServicio()
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarServicio();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
    function ConsultarServiciosMec($idmecanico)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarServiciosMec($idmecanico);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
    function Finalizar($idmecanico)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultaRecorrer($idmecanico);
        if ($dato) {
            if ($dato[0]['estatus'] == 'activo') {
                $resul = $dato;
                // $resul=$dato;
            } else {

                $resul = $dato;
            }
        } else {
            $resul = 'fallo';
        }

        echo json_encode($resul);
    }
    function PausaroFinalizado($idmecanico, $idbitacora, $estatus, $hora)
    {
        $model = new ModeloBD();
        $resul   = "";
        switch ($estatus) {
            case 'activo':
                $dato = $model->ConsultaRecorrer($idmecanico);
                if ($dato) {
                    if ($dato[0]['estatus'] == 'activo') {
                        $resul = 'esta activo';
                    } else {
                        $datos = $model->Finalizar($idbitacora, $estatus, $hora);
                        if ($datos) {
                            $resul = 'exitoso';
                        } else {
                            $resul = 'fallo';
                        }
                    }
                } else {
                    $datos = $model->Finalizar($idbitacora, $estatus, $hora);
                    if ($datos) {
                        $resul = 'exitoso';
                    } else {
                        $resul = 'fallo';
                    }
                }
                break;
            case 'pausado' || 'finalizada':
                $datos = $model->Finalizar($idbitacora, $estatus, $hora);
                if ($datos) {
                    $resul = 'exitoso';
                } else {
                    $resul = 'fallo';
                }

                break;
        }
        echo json_encode($resul);
    }

    function ConsultarServicioMec($idmecanico)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarServicioMec($idmecanico);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    function ConsultarMecSer($idservicio)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarMecSer($idservicio);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
    function ConsultarVentas($idserventas)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarVentas($idserventas);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
    function ConsultaChecksSalida($idventa)
    {
        $model = new ModeloBD();
        $VerEstado = $model->VerEstusUnidad($idventa);
        if ($VerEstado) {
            $dato = $model->ConsultaChecksSalida($idventa);
            if ($dato) {
                $resul = $dato;
            } else {
                $resul = 'fallo';
            }
        } else {
            $resul = 'No esta listo';
        }

        echo json_encode($resul);
    }
    function ActualizarChecksSalida($idcheck, $valoritem, $fecha, $hora)
    {
        $model = new ModeloBD();


        $dato = $model->ActualizarChecksSalida($idcheck, $valoritem, $fecha, $hora);
        if ($dato) {
            // $result = $dato;
            $datos = $model->ConsultarChcksIDSalida($idcheck);
            if ($datos) {
                $venta = $datos[0]['id_ser_venta'];
                $idventa = str_replace('"', '', $venta);
                $resul = $idventa;
                $Modificar = $model->ModificarCheckVenta($resul);
                if ($Modificar) {
                    $result = 'exitoso';
                } else {
                    $result =  'fallo';
                }
            } else {
                $result = 'fallo';
            }
        } else {
            $result = 'fallo';
        }
        echo json_encode($result);
    }

    function AgregarCliente($nombre, $domicilio, $telefono, $email, $obs)
    {
        $model = new ModeloBD();
        $dato = $model->AgregarCliente($nombre, $domicilio, $telefono, $email, $obs);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    function  ConsultarCliente()
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarCliente();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
    function  ConsultarMarca()
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarMarca();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
    function  ConsultarModelo()
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarModelo();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function AgregarUnidad($marca, $modelo, $anio, $placas, $vin, $motor, $tipo, $idcliente, $foto)
    {
        $model = new ModeloBD();
        $dato = $model->AgregarUnidad($marca, $modelo, $anio, $placas, $vin, $motor, $tipo, $idcliente, $foto);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }




    function AgregarMarca($marca)
    {
        $model = new ModeloBD();
        $dato = $model->AgregarMarca($marca);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
    function AgregarModelo($marca, $modelo)
    {
        $model = new ModeloBD();
        $dato = $model->AgregarModelo($marca, $modelo);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
    function ConsultarServiciosEntregados()
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarServiciosEntregados();
        if ($dato) {
            $result = $dato;
        } else {
            $result = 'fallo';
        }
        echo json_encode($result);
    }
    function ConsultaChecksTecnico($idventa)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultaChecksTecnico($idventa);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }

        echo json_encode($resul);
    }
    function ActualizarChecksTecnico($idcheck, $valoritem, $fecha, $hora)
    {
        $model = new ModeloBD();


        $dato = $model->ActualizarChecksTecnico($idcheck, $valoritem, $fecha, $hora);
        if ($dato) {
            // $result = $dato;
            $datos = $model->ConsultarChcksIDSalida($idcheck);
            if ($datos) {
                $venta = $datos[0]['id_ser_venta'];
                $idventa = str_replace('"', '', $venta);
                $resul = $idventa;
                $Modificar = $model->ModificarCheckVenta($resul);
                if ($Modificar) {
                    $result = 'exitoso';
                } else {
                    $result =  'fallo';
                }
            } else {
                $result = 'fallo';
            }
        } else {
            $result = 'fallo';
        }
        echo json_encode($result);
    }

    function ConsultaGavetas()
    {
        $model = new ModeloBD();
        $dato = $model->MostrarGavetas();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    /*
    function  GenerarPdfCheckEntrada($idventa, $idcliente)
    {
        $model = new ModeloBD();
        $dato = $model->GenerarPdfCheckEntrada($idventa, $idcliente);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
*/



    function GenerarPdfCheckSalida($idventa, $idcliente)
    {
        $model = new ModeloBD();
        $dato = $model->GenerarPdfCheckSalida($idventa, $idcliente);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    /*
    function ConsultarCajonesPorGaveta($id_gabeta)
    {
        $model = new ModeloBD();
        $dato = $model->MostrarCajonesPorGaveta($id_gabeta);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }
*/
    function ConsultarHerramienrtasPorCajonYGaveta($id_gabeta, $id_cajon)
    {
        $model = new ModeloBD();
        $dato = $model->MostrarHerramientasPorCajonYGabeta($id_gabeta, $id_cajon);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    function AgregarHerramienta($nombreHerramienta, $descripHerramienta, $cantidadHerramientas, $id_cajon)
    {
        $model = new ModeloBD();
        $dato = $model->AgregarHerramienta($nombreHerramienta, $descripHerramienta, $cantidadHerramientas, $id_cajon);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function EliminarHerramienta($idHerramienta)
    {
        $model = new ModeloBD();
        $dato = $model->EliminarHerramienta($idHerramienta);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }




    function AgregarGaveta($nombreGaveta, $descripcionGaveta, $numCajones)
    {
        $model = new ModeloBD();

        $dato = $model->AgregarGaveta($nombreGaveta, $descripcionGaveta, $numCajones);
        if ($dato) {

            $id_gabeta = $dato;
            for ($i = 1; $i <= $numCajones; $i++) {
                $nomg = 'Cajon ' . $i;
                if ($model->AgregarCajon($nomg, $id_gabeta)) {
                } else {
                    echo 'fallo al insertar el cajon';
                    return;
                }
            }
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function EliminarGaveta($id_gabeta)
    {
        $model = new ModeloBD();
        $dato = $model->EliminarGavetaYCajones($id_gabeta);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    function ConsultarTodasLasHerramientas()
    {
        $model = new ModeloBD();
        $dato = $model->MostrarTodasLasHerramientas();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    function CambiarFotoHerramienta($idHerramienta, $fotoHerramienta)
    {
        $model = new ModeloBD();
        $dato = $model->SubirFotosHerramientas($idHerramienta, $fotoHerramienta);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function ConsultarTodosMecanicos()
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarTodosLosMecanicos();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function AsignarMecanicoAGaveta($id_gabeta, $id_mecanico)
    {
        $model = new ModeloBD();
        $dato = $model->AsignarMecanicoAGaveta($id_gabeta, $id_mecanico);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    function GenerarPdf($idventa)
    {
        $model = new ModeloBD();
        $dato = $model->GenerarPdf($idventa);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    function GenerarDatosTabla()
    {
        $model = new ModeloBD();
        $dato = $model->MostrarTodasLasHerramientas();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    function MostrarTodasMaquinas()
    {
        $model = new ModeloBD();
        $dato = $model->MostrarTodasMaquinas();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function AgregarMaquina($nombre, $marca, $modelo, $nserie, $codigo, $fadquisicion, $costo, $area, $estatus, $obs)
    {
        $model = new ModeloBD();
        $dato = $model->AgregarMaquina($nombre, $marca, $modelo, $nserie, $codigo, $fadquisicion, $costo, $area, $estatus, $obs);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function EliminarMaquina($idmaquina)
    {
        $model = new ModeloBD();
        $dato = $model->EliminarMaquina($idmaquina);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function AsignarMecanicoAMaquina($idmaquina, $idresponsable)
    {
        $model = new ModeloBD();
        $dato = $model->AsignarMecanicoAMaquina($idmaquina, $idresponsable);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function SubirFotosMaquinas($idmaquina, $fotoMaquina)
    {
        $model = new ModeloBD();
        $dato = $model->SubirFotosMaquinas($idmaquina, $fotoMaquina);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function LevantarInventario($idgabeta, $idencargado, $mecanico)
    {
        $model = new ModeloBD();
        $dato = $model->LevantarInventario($idgabeta, $idencargado, $mecanico);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    function ConsultarTodosLosInventariosPorGaveta($idgabeta)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarTodosLosInventariosPorGaveta($idgabeta);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function actualizarEstadoHerramienta($estadoHerramienta, $idinv)
    {
        $model = new ModeloBD();
        $dato = $model->actualizarEstadoHerramienta($estadoHerramienta, $idinv);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function actualizarPiezas($cantidadHerr, $idinv)
    {
        $model = new ModeloBD();
        $dato = $model->actualizarPiezas($cantidadHerr, $idinv);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }





    function ActualizarEstadoInventario($iddocga)
    {
        $model = new ModeloBD();
        $dato = $model->ActualizarEstadoInventario($iddocga);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function VerTodosLosUsuarios()
    {

        $model = new ModeloBD();
        $dato = $model->VerTodosLosUsuarios();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function SubirFotosActividades($fotoActividad, $id_bitacora, $tipo)

    {
        $model = new ModeloBD();
        $dato = $model->SubirFotosActividades($fotoActividad, $id_bitacora, $tipo);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    function consultarTodasLasEvidenciasPorActividad($idbitacora)
    {

        $model = new ModeloBD();
        $dato = $model->consultarTodasLasEvidenciasPorActividad($idbitacora);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function validarSiEstaOcupado($idpersonal)
    {
        $model = new ModeloBD();
        $dato = $model->validarSiEstaOcupado($idpersonal);
        if ($dato) {
            $resul = 'esta ocupado';
        } else {
            $resul = 'esta libre';
        }
        echo $resul;
    }


    function CambiarEstadoActividad($idpersonal, $hora, $estatus, $idbitacora, $observaciones)
    {

        $model = new ModeloBD();

        if ($estatus == "activo") {

            $disponibilidad = $model->validarSiEstaOcupado($idpersonal);
            if ($disponibilidad) {
                $resul = 'esta ocupado';
            } else {

                $dato = $model->CambiarEstadoActividad($hora, $estatus, $idbitacora, $observaciones);
                if ($dato) {
                    $resul = 'exitoso';
                } else {
                    $resul = 'fallo';
                }
            }
        } else {

            $dato = $model->CambiarEstadoActividad($hora, $estatus, $idbitacora, $observaciones);
            if ($dato) {
                $resul = 'exitoso';
            } else {
                $resul = 'fallo';
            }
        }

        echo ($resul);
    }


    function ConsultarCategoriaCheck()
    {

        $model = new ModeloBD();
        $dato = $model->ConsultarChecksDeUnServicioPorId();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function ConsultarTiposActividades()
    {

        $model = new ModeloBD();
        $dato = $model->ConsultarTiposActividades();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function ConsultarCheck_servicio_salida($idventa, $idcategoria)
    {

        $model = new ModeloBD();
        $dato = $model->ConsultarCheck_servicio_salida($idventa, $idcategoria);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    function  ConusltaManoObra($idventa)
    {

        $model = new ModeloBD();
        $dato = $model->ConusltaManoObra($idventa);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function GenerarPdfInventariosPorGaveta($idgabeta)
    {
        $model = new ModeloBD();
        $dato = $model->GenerarPdfInventariosPorGaveta($idgabeta);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    function GenerarPdfCheckTecnico($idventa, $idcliente)
    {
        $model = new ModeloBD();
        $dato = $model->GenerarPdfCheckTecnico($idventa, $idcliente);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function GenerarPdfMecanico($idventa, $idcliente)
    {
        $model = new ModeloBD();
        $dato = $model->GenerarPdfMecanico($idventa, $idcliente);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function GenerarPdfRefacciones($idventa, $idcliente)
    {
        $model = new ModeloBD();
        $dato = $model->GenerarPdfRefacciones($idventa, $idcliente);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function GenerarPdfRecepcion($idventa, $idcliente)
    {
        $model = new ModeloBD();
        $dato = $model->GenerarPdfRecepcion($idventa, $idcliente);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }





    function ConsultarFotosPorActividad($id_bitacora)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarFotosPorActividad($id_bitacora);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    function IniciarActividad($idpersonal, $idactividad, $observaciones, $fotoActividad)
    {
        $model = new ModeloBD();
        $dato = $model->IniciarActividad($idpersonal, $idactividad, $observaciones, $fotoActividad);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'Ocupado';
        }
        echo json_encode($resul);
    }


    function ConsultarActividadesFinalizadas($idpersonal)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarActividadesFinalizadas($idpersonal);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'Ocupado';
        }
        echo json_encode($resul);
    }

    function NuevaApiParaMostrarActividadesPorRegistro($registro_actividades)
    {

        $model = new ModeloBD();
        $dato = $model->NuevaApiParaMostrarActividadesPorRegistro($registro_actividades);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'Ocupado';
        }
        echo json_encode($resul);
    }



    function AgregarRegistroDeActividades($fecha, $ID_usuario)
    {
        $model = new ModeloBD();
        $dato = $model->AgregarRegistroDeActividades($fecha, $ID_usuario);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'Ocupado';
        }
        echo json_encode($resul);
    }



    function ConsultarRegistroActividadesActivos($fecha, $ID_usuario)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarRegistroActividadesActivos($fecha, $ID_usuario);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'Ocupado';
        }
        echo json_encode($resul);
    }



    function ActualizarCheckActividad($ID_check_actividad, $valor_check)
    {
        $model = new ModeloBD();
        $dato = $model->ActualizarCheckActividad($ID_check_actividad, $valor_check);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }




    function FinalizarRegistroActividades($ID_registro_actividades)
    {
        $model = new ModeloBD();
        $dato = $model->FinalizarRegistroActividades($ID_registro_actividades);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }




    function ConsultarActividadesPorUsuarioYFecha($ID_usuario, $fechaInicio, $fechaFin)
    {

        $model = new ModeloBD();
        $dato = $model->ConsultarActividadesPorUsuarioYFecha($ID_usuario, $fechaInicio, $fechaFin);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'Sin Datos';
        }
        echo json_encode($resul);
    }

    function  GenerarPDFActividades($ID_usuario, $fechaInicio, $fechaFin)
    {
        $model = new ModeloBD();
        $dato = $model->GenerarPDFActividades($ID_usuario, $fechaInicio, $fechaFin);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function ConsultarListadoActividades()
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarListadoActividades();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function RegistrarNuevaActividad($nombre_actividad)
    {
        $model = new ModeloBD();
        $dato = $model->RegistrarNuevaActividad($nombre_actividad);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }




    function EliminarActividad($ID_listado_actividad)
    {
        $model = new ModeloBD();
        $dato = $model->EliminarActividad($ID_listado_actividad);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }




    function EditarListadoActividad($ID_listado_actividad, $nombre_actividad)
    {
        $model = new ModeloBD();
        $dato = $model->EditarListadoActividad($ID_listado_actividad, $nombre_actividad);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function MostrarTiposUnidades()
    {
        $model = new ModeloBD();
        $dato = $model->MostrarTiposUnidades();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }




    function AgregarNuevoTipoUnidad($nombre_tipo, $foto)
    {
        $model = new ModeloBD();
        $dato = $model->AgregarNuevoTipoUnidad($nombre_tipo, $foto);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }




    function EditarNombreTipoUnidad($nombre_tipo, $ID_tipo_unidad)
    {
        $model = new ModeloBD();
        $dato = $model->EditarNombreTipoUnidad($nombre_tipo, $ID_tipo_unidad);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function EditarTipoUnidad($nombre_tipo, $foto, $ID_tipo_unidad)
    {
        $model = new ModeloBD();
        $dato = $model->EditarTipoUnidad($nombre_tipo, $foto, $ID_tipo_unidad);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }






    function EliminarTipoUnidad($ID_tipo_unidad)
    {

        $model = new ModeloBD();
        $dato = $model->EliminarTipoUnidad($ID_tipo_unidad);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function ReactivarListadoActividad($ID_listado_actividad)
    {
        $model = new ModeloBD();
        $dato = $model->ReactivarListadoActividad($ID_listado_actividad);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function EditarCheckTipoUnidades($ID_tipo_unidad, $tipo_check, $valor_check)
    {
        $model = new ModeloBD();
        $dato = $model->EditarCheckTipoUnidades($ID_tipo_unidad, $tipo_check, $valor_check);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function  MostrarChecksPorUnidad($id_ser_venta, $tipo_check)
    {
        $model = new ModeloBD();
        $dato = $model->MostrarChecksPorUnidad($id_ser_venta, $tipo_check);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }




    function ConsultarChecksVacios($id_ser_venta, $tipo_check)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarChecksVacios($id_ser_venta, $tipo_check);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 0;
        }
        echo json_encode($resul);
    }



    function ActualizarNuevosChecks($ID_valor_check, $valor_check)
    {
        $model = new ModeloBD();
        $dato = $model->ActualizarNuevosChecks($ID_valor_check, $valor_check);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }




    function FinalizarRevisionChecks($ID_ser_venta, $tipo_check, $observaciones)
    {

        $model = new ModeloBD();
        $dato = $model->FinalizarRevisionChecks($ID_ser_venta, $tipo_check, $observaciones);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function ConsultarUnidadesDeUnCliente($id_ser_cliente)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarUnidadesDeUnCliente($id_ser_cliente);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    /*

    function IngresarServicioConFoto($idunidad, $idcliente, $km, $combustible, $motivo, $fechaIngreso, $horaIngreso, $marca, $modelo, $motor, $vin, $placas, $anio, $foto, $tipounidad, $numeroInyectores)
    {
        $model = new ModeloBD();

        $dato = $model->IngresarServicioConFoto($idunidad, $idcliente, $km, $combustible, $motivo, $fechaIngreso, $horaIngreso, $marca, $modelo, $motor, $vin, $placas, $anio, $foto, $tipounidad, $numeroInyectores);


        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    

    function IngresarServicioConFoto($idunidad, $idcliente, $km, $combustible, $motivo, $fechaIngreso, $horaIngreso, $marca, $modelo, $motor, $vin, $placas, $anio, $foto, $tipounidad, $numeroInyectores)
    {
        $model = new ModeloBD();
        $id_ser_ventas = $model->IngresarServicioConFoto($idunidad, $idcliente, $km, $combustible, $motivo, $fechaIngreso, $horaIngreso, $marca, $modelo, $motor, $vin, $placas, $anio, $foto, $tipounidad);

        if ($id_ser_ventas) {

            $resultado = $model->InsertarInyectores($id_ser_ventas, $numeroInyectores);
            if ($resultado) {
                $resul = 'exitoso';
            } else {
                $resul = 'fallo en la inserción de inyectores';
            }
        } else {
            $resul = 'fallo en la inserción de servicio con foto';
        }

        echo json_encode($resul);
    }
    */

    function IngresarServicioConFoto($idunidad, $idcliente, $km, $combustible, $motivo, $fechaIngreso, $horaIngreso, $marca, $modelo, $motor, $vin, $placas, $anio, $foto, $tipounidad, $numeroInyectores)
    {
        $model = new ModeloBD();

     
            $resultado = $model->IngresarServicioConFoto($idunidad, $idcliente, $km, $combustible, $motivo, $fechaIngreso, $horaIngreso, $marca, $modelo, $motor, $vin, $placas, $anio, $foto, $tipounidad);
      

        if ($resultado) {
            $resul = $resultado;
        } else {
            $resul = 'fallo';
        }

        echo json_encode($resul);
    }




    function ActualizarEstadoUnidad($ID_ser_venta, $nuevoEstado)
    { {
            $model = new ModeloBD();
            $dato = $model->ActualizarEstadoUnidad($ID_ser_venta, $nuevoEstado);
            if ($dato) {
                $resul = 'exitoso';
            } else {
                $resul = 'fallo';
            }
            echo json_encode($resul);
        }
    }


    function  ConusltaManoObraPorServicio($ID_ser_venta)
    {
        $model = new ModeloBD();
        $dato = $model->ConusltaManoObraPorServicio($ID_ser_venta);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function AsignarActividadAServicio($ID_ser_venta, $observaciones, $idpersonal)
    { {
            $model = new ModeloBD();
            $dato = $model->AsignarActividadAServicio($ID_ser_venta, $observaciones, $idpersonal);
            if ($dato) {
                $resul = 'exitoso';
            } else {
                $resul = 'fallo';
            }
            echo json_encode($resul);
        }
    }



    function ConsultarChecksVaciosActvidadesMecanicos($id_registro_actividades)
    {

        $model = new ModeloBD();
        $dato = $model->ConsultarChecksVaciosActvidadesMecanicos($id_registro_actividades);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'Ocupado';
        }
        echo json_encode($resul);
    }



    function ObtenerEncargado()
    {

        $model = new ModeloBD();
        $dato = $model->ObtenerEncargado();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'Ocupado';
        }
        echo json_encode($resul);
    }





    function  ActualizarEncargado($idusuario)
    {
        $model = new ModeloBD();
        $dato = $model->ActualizarEncargado($idusuario);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    function ActualizarIDDoc($iddoc, $id_ser_venta)
    {

        $model = new ModeloBD();
        $dato = $model->ActualizarIDDoc($iddoc, $id_ser_venta);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function AgregarNuevoUsuario($nombre, $email, $telefono, $password, $permisos, $empresa, $area)
    {
        $model = new ModeloBD();
        $dato = $model->AgregarNuevoUsuario($nombre, $email, $telefono, $password, $permisos, $empresa, $area);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function EditarUsuario($nombre, $email, $telefono, $password, $permisos, $empresa, $area, $idusuario)
    {
        $model = new ModeloBD();
        $dato = $model->EditarUsuario($nombre, $email, $telefono, $password, $permisos, $empresa, $area, $idusuario);
        if ($dato) {
            $resul = 'exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function AsignarHerramientaAServicio($idventa, $clave, $cantidad, $descripcion, $precio, $unidad, $importe, $descuento, $tipo)
    {

        $model = new ModeloBD();
        $dato = $model->AsignarHerramientaAServicio($idventa, $clave, $cantidad, $descripcion, $precio, $unidad, $importe, $descuento, $tipo);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }




    function EliminarRefaccionDeServicio($idrefaccion)
    {
        $model = new ModeloBD();
        $dato = $model->EliminarRefaccionDeServicio($idrefaccion);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function AgregarComentarioARefaccion($idrefaccion, $observaciones)
    {

        $model = new ModeloBD();
        $dato = $model->AgregarComentarioARefaccion($idrefaccion, $observaciones);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function EditarActividadDeMecanico($idbitacora, $observaciones)
    {


        $model = new ModeloBD();
        $dato = $model->EditarActividadDeMecanico($idbitacora, $observaciones);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function ConsultarInyectores($id_ser_venta)
    {
        $model = new ModeloBD();
        $dato = $model->ConsultarInyectores($id_ser_venta);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function ConsultarServiciosInyectores()
    {

        $model = new ModeloBD();
        $dato = $model->ConsultarServiciosInyectores();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }





    function ConsultarServiciosInyectoresEntregados()
    {

        $model = new ModeloBD();
        $dato = $model->ConsultarServiciosInyectoresEntregados();
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function AgregarServicioInyectores($idunidad, $motivo, $numeroInyectores, $tipo)
    {
        $model = new ModeloBD();
        $id_servicio_inyec = $model->IngresarServicioDeInyector($idunidad, $motivo, $tipo);

        try {
            $model->InsertarInyectores($id_servicio_inyec, $numeroInyectores, $tipo);

            $resul = 'exitoso';
        } catch (\Throwable $th) {
            $resul = 'fallo ' + $th;
        }
        echo json_encode($resul);
    }


    function ConsultarCheckXInyector($ID_inyector)
    {

        $model = new ModeloBD();

        $dato = $model->ConsultarCheckXInyector($ID_inyector);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }




    function ActualizarChecksInyectores($ID_check_inyector, $valor_check)
    {

        $model = new ModeloBD();
        $dato = $model->ActualizarChecksInyectores($ID_check_inyector, $valor_check);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function FinalizarRevision($ID_inyector, $comentarios)
    {

        $model = new ModeloBD();
        $dato = $model->FinalizarRevisionCheckInyectores($ID_inyector, $comentarios);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }



    function ConsultarFotosInyectores($ID_inyector)
    {

        $model = new ModeloBD();

        $dato = $model->ConsultarFotosInyectores($ID_inyector);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function SubirFotoInyector($ID_inyector, $fotoInyector)
    {


        $model = new ModeloBD();

        $opcion = 7;
        $nombreFoto = $model->subirImagenHerramientaAPI($fotoInyector, $opcion);

        $dato = $model->SubirFotoInyector($ID_inyector, $nombreFoto);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

    function ConsultarManoDeObraInyectores($ID_inyector)
    {

        $model = new ModeloBD();

        $dato = $model->ConsultarManoDeObraInyectores($ID_inyector);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function AgregarManoDeObraInyector($ID_inyector, $observaciones, $ID_mecanico)
    {
        $model = new ModeloBD();

        $dato = $model->AgregarManoDeObraInyector($ID_inyector, $observaciones, $ID_mecanico);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function CambiarStatusServicioInyector($ID_serv_inyector, $nuevoStatus)
    {

        $model = new ModeloBD();

        $dato = $model->CambiarStatusServicioInyector($ID_serv_inyector, $nuevoStatus);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }


    function AsignarNotaAServInyector($ID_serv_inyector, $iddocSelec)
    {

        $model = new ModeloBD();

        $dato = $model->AsignarNotaAServInyector($ID_serv_inyector, $iddocSelec);
        if ($dato) {
            $resul = 'Exitoso';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }




    function ConsultarRefaccionXInyector($id_inyector)
    {

        $model = new ModeloBD();

        $dato = $model->ConsultarRefaccionXInyector($id_inyector);
        if ($dato) {
            $resul = $dato;
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }





    function AsignarRefaccionesAInyector($id_inyector, $clave, $cantidad, $descripcion, $precio, $unidad, $importe, $descuento, $tipo)
    {

        $model = new ModeloBD();
        $dato = $model->AsignarRefaccionesAInyector($id_inyector, $clave, $cantidad, $descripcion, $precio, $unidad, $importe, $descuento, $tipo);
        if ($dato) {
            $resul = 'Exito';
        } else {
            $resul = 'fallo';
        }
        echo json_encode($resul);
    }

function AsignarInsumoAServicioInyector($ID_servicio_inyector, $clave, $cantidad, $descripcion, $precio, $unidad, $importe, $descuento, $tipo){
    
    $model = new ModeloBD();
    $dato = $model->AsignarInsumoAServicioInyector($ID_servicio_inyector, $clave, $cantidad, $descripcion, $precio, $unidad, $importe, $descuento, $tipo);
    if ($dato) {
        $resul = 'Exito';
    } else {
        $resul = 'fallo';
    }
    echo json_encode($resul);
}



function EliminarInsumoAServicio($idrefaccion)
{
    $model = new ModeloBD();
    $dato = $model->EliminarInsumoAServicio($idrefaccion);
    if ($dato) {
        $resul = 'Exitoso';
    } else {
        $resul = 'fallo';
    }
    echo json_encode($resul);
}



function ConsultarInsumosXServInyector($ID_serv_inyector)
{

    $model = new ModeloBD();

    $dato = $model->ConsultarInsumosXServInyector($ID_serv_inyector);
    if ($dato) {
        $resul = $dato;
    } else {
        $resul = 'fallo';
    }
    echo json_encode($resul);
}


function FinalizarRevisionInyector($ID_inyector){


    $model = new ModeloBD();

    $dato = $model->FinalizarRevisionInyector($ID_inyector);
    if ($dato) {
        $resul = 'Exito';
    } else {
        $resul = 'fallo';
    }
    echo json_encode($resul);

}






function ConsultarNumFinalizados($ID_serv_inyector){

    $model = new ModeloBD();

    $dato = $model->ConsultarNumFinalizados($ID_serv_inyector);
    if ($dato) {
        $resul = $dato;
    } else {
        $resul = 'fallo';
    }
    echo json_encode($resul);
}




}
