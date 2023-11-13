<?php
    include(__DIR__ . '/../connection.php');
    include(__DIR__ . '/../ejecutarConsultas.php');

    class VehiculosRepository {
        private $conn;
    
        public function __construct($conn) {
            $this->conn = $conn;
        }
    
        public function catClientes() {
            $strSql = "SELECT v.*,c.NOMBRE FROM VEHICULOS AS v
                LEFT JOIN CLIENTES AS c ON c.ID_CLIENTE = v.ID_CLIENTE";
            return obtenerDatos($this->conn, $strSql);
        }

        public function findByPlacas($placasVehiculo) {
            $stmt = $this->conn->prepare("SELECT * FROM VEHICULOS WHERE PLACAS = ?");
            $stmt->bind_param("s", $placasVehiculo);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
        

        public function insertVehiculo($marcaVehiculo,$modeloVehiculo,$colorVehiculo,$placasVehiculo,$idCliente) {
            // Preparar la consulta
            $stmt = $this->conn->prepare("INSERT INTO VEHICULOS (MARCA,MODELO,COLOR,PLACAS,ID_CLIENTE) VALUES
            (?,?,?,?,?)");

            if ($stmt) {
                // Vincular los parámetros a la declaración
                $stmt->bind_param("ssssi",$marcaVehiculo,$modeloVehiculo,$colorVehiculo,$placasVehiculo,$idCliente);
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