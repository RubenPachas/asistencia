<?php

include_once "../config/conexion.php";

class Asistencia
{
    public function __construct() {}

    public function listar()
    {
        $sql = "SELECT u.*, CONCAT(e.nombre, ' ', e.apellidos) AS empleado, e.codigo 
                FROM asistencias
                INNER JOIN empleados e ON a.empleado_id = e.id OERDER BY a.id DESC";
        return ejecutarConsulta($sql);
    }

    public function lisatr_reporte($fecha_inicio, $fecha_fin, $empleado_id)
    {
        $sql = "SELECT a.*, CONCAT(e.nombre, ' ', e.apellidos) AS empleado, e.codigo 
                FROM asistencias a 
                INNER JOIN empleados e ON a.empleado_id = e.idempleado 
                WHERE DATE(a.fecha) >= '$fecha_inicio' AND DATE(a.fecha) <= '$fecha_fin' AND a.empleado_id = '$empleado_id'";
    }
}
