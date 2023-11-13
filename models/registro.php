<?php
    include("connection.php");
    include(__DIR__ . '/trabajos/trabajosRepository.php');
    include(__DIR__ . '/vehiculos/vehiculosRepository.php');
    include(__DIR__ . '/clientes/clientesRepository.php');

    $trabajosRepository = new TrabajosRepository($conn);
    $vehiculosRepository = new VehiculosRepository($conn);
    $clientesRepository = new ClientesRepository($conn);

    try {
        $nombreCliente = $_POST['nombre'];
        $telefonoCliente = $_POST['telefono'];
        $marcaVehiculo = $_POST['marca'];
        $modeloVehiculo = $_POST['modelo'];
        $placasVehiculo = $_POST['placas'];
        $colorVehiculo = $_POST['color'];
        $descripcionReparacion = $_POST['descripcion'];
        // $facturaReparacion = $_POST['factura'];
        
        $factura = $_POST['factura'] === 'si' ? 1 : 0;

        $costo = $_POST['costo'];
        if ($costo == 'parcial') {
            $costoParcial = $_POST['costoParcial'];
            $costoTotal = floatval($_POST['costo-total']);
        } elseif ($costo == 'completo') {
            $costoParcial = 0;
            $costoTotal = floatval($_POST['costo-total']);
        }

        $cliente = $clientesRepository->findByNombreTelefono($nombreCliente,$telefonoCliente);
        if ($cliente != null) {
            $idCliente = $cliente['ID_CLIENTE'];
        } else {
            $clientesRepository->insertCliente($nombreCliente,$telefonoCliente);
        }

        $vehiculo = $vehiculosRepository->findByPlacas($placasVehiculo);
        if ($vehiculo != null) {
            $idVehiculo = $vehiculo['ID_VEHICULO'];
        } else {
            $vehiculosRepository->insertVehiculo($marcaVehiculo,$modeloVehiculo,$colorVehiculo,$placasVehiculo,$idCliente);
            $vehiculo = $vehiculosRepository->findByPlacas($placasVehiculo);
            $idVehiculo = $idVehiculo['ID_VEHICULO'];
        }
        
        
        $trabajosRepository->saveTrabajo($costoTotal, $costoParcial, $descripcionReparacion, $factura, $idVehiculo);
        echo "Factura: $factura";

        header('Location: ../views/inicio.php');
    } catch (Exception $e) {
        die("Error: " . $e->getMessage() . ", Código: " . $e->getCode());
    }
?>