<?php

include_once "../config/conexion.php";

class Empleado 
{

    public function __construct()
    {   
    }
    // Función para insertar un nuevo empleado
    public function insertar($nombre, $apellidos, $documento_numero, $telefono, $codigo)
    {
        $sql = "INSERT INTO empleados (nombre, apellidos, documento_numero, telefono, codigo) 
                VALUES ('nombre', 'apellidos', 'documento_numero', 'telefono', 'codigo')";
                return ejecutarConsulta($sql);
    }

    // Función para listar todos los empleados
    public function listar()
    {
        $sql = "SELECT * FROM empleados";
        return ejecutarConsulta($sql);
    }

    // Función para editar un empleado
    public function editar($empleado_id, $nombre, $apellidos, $documento_numero, $telefono, $codigo)
    {
        $sql = "UPDATE empleados 
                SET nombre = '$nombre', apellidos = '$apellidos', documento_numero = '$documento_numero',telefono = '$telefono', codigo = '$codigo' 
                WHERE empleado_id = '$empleado_id'";
        return ejecutarConsulta($sql);
    }

    // Función para mostrar un empleado por su ID
    public function mostrar($empleado_id)
    {
        $sql = "SELECT * FROM empleados WHERE empleado_id = '$empleado_id'";
        return ejecutarConsultaSimple($sql);
    }

    // Función para seleccionar un empleado por ID
    public function select($empleado_id)
    {
        $sql = "SELECT * FROM empleados";
        return ejecutarConsultaSimple($sql);
    }
}

?>
