<?php
include(__DIR__ . '/../connection.php');
include(__DIR__ . '/../ejecutarConsultas.php');

class TrabajosRepository {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function saveTrabajo($costoTotal, $costoParcial, $descripcionReparacion, $factura, $idVehiculo) {
        // Preparar la consulta
        $stmt = $this->conn->prepare("INSERT INTO REPARACIONES (COSTO_TOTAL, COSTO_PENDIENTE, DESCRIPCION, FECHA_REPARACION, 
        CON_FACTURA, ID_VEHICULO) VALUES (?, ?, ?, NOW(), ?, ?)");

        if ($stmt) {
            // Vincular los parámetros a la declaración
            $stmt->bind_param("ddssi", $costoTotal, $costoParcial, $descripcionReparacion, $factura, $idVehiculo);
            // Ejecutar la consulta
            $stmt->execute();
            $stmt->close();
            return true;
        } else {
            die("Error en la preparación de la consulta: " . $this->conn->error);
        }
    }
}

?>