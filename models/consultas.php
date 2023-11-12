<?php

    function catClientes() {
        $strSql = 'SELECT * FROM CLIENTES';
        return $strSql;
    }

    function catVehiculos() {
        $strSql = 'SELECT * FROM VEHICULOS';
        return $strSql;
    }

    function catReparaciones() {
        $sqlStr = 'SELECT * FROM REPARACIONES';
        return $sqlStr;
    }

    function consultaGeneral() {
        $strSql = 'SELECT c.NOMBRE,c.TELEFONO, CONCAT(v.MARCA, " ", v.MODELO) as COCHE,
        r.COSTO_TOTAL, r.COSTO_PENDIENTE, r.DESCRIPCION AS REPARACION, r.FECHA_REPARACION, r.CON_FACTURA
        FROM CLIENTES AS c
        LEFT JOIN VEHICULOS AS v ON c.ID_CLIENTE = v.ID_CLIENTE
        LEFT JOIN REPARACIONES AS r ON v.ID_VEHICULO = r.ID_VEHICULO WHERE r.ID_REPARACION IS NOT NULL';
        return $strSql;
    }
?>