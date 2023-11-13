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
    }
?>