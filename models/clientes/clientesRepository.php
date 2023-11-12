<?php
    include(__DIR__ . '/../connection.php');
    include(__DIR__ . '/../ejecutarConsultas.php');

    class ClientesRepository {
        private $conn;
    
        public function __construct($conn) {
            $this->conn = $conn;
        }
    
        public function catClientes() {
            $strSql = "SELECT * FROM CLIENTES";
            return obtenerDatos($this->conn, $strSql);
        }
    }
?>