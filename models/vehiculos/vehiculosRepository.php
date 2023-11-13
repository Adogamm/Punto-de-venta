<?php
    include(__DIR__ . '/../connection.php');
    include(__DIR__ . '/../ejecutarConsultas.php');

    class VehiculosRepository {
        private $conn;
    
        public function __construct($conn) {
            $this->conn = $conn;
        }
    
        public function catClientes() {
            $strSql = "SELECT * FROM VEHICULOS";
            return obtenerDatos($this->conn, $strSql);
        }
    }
?>