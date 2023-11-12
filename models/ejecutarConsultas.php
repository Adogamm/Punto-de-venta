<?php
    function ejecutarConsulta($sql) {
        global $conn;
        try {
            $stmt = $conn -> prepare($sql);
            $stmt -> execute();
            return $stmt;
        } catch (PDOException $e) {
            die("Error en la DB: ".$e->getMessage());
        }
    }

    function obtenerDatos($conn, $sql) {
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            echo "Error en la preparación de la consulta: " . $conn->error;
            return false;
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $data;
    }
?>