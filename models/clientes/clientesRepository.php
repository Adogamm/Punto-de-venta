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

        public function findByNombreTelefono($nombreCliente, $telefonoCliente) {
            $stmt = $this->conn->prepare("SELECT * FROM CLIENTES WHERE NOMBRE = ? OR TELEFONO = ?");
            $stmt->bind_param("ss", $nombreCliente, $telefonoCliente);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
        

        public function insertCliente($nombreCliente,$telefonoCliente) {
            $stmt = $this->conn->prepare("INSERT INTO CLIENTES (NOMBRE,TELEFONO) VALUES (?,?)");
            if ($stmt) {
                // Vincular los parámetros a la declaración
                $stmt->bind_param("ss", $nombreCliente, $telefonoCliente);
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