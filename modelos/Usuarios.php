<?php

include_once "../config/conexion.php";

class Usuario
{

    public function __construct() {}

    //
    public function insertar($nombre, $apellidos, $login, $email, $chavehash, $imagen)
    {

        $sql = "INSERT INTO usuarios (nombre, apellidos, login, email, password, imagen, estado)VALUES ('nombre', 'apellidos', 'login', 'email', 'password', 'imagen', '1')";
        return ejecutarConsulta($sql);
    }

    // Función para editar un usuario
    public function editar($idusuario, $nombre, $apellidos, $login, $email, $chavehash, $imagen)
    {
        if (!empty($clavehash)) {
            $sql = "UPDATE usuarios 
                SET nombre = '$nombre', apellidos = '$apellidos', login = '$login', email = '$email', password = '$chavehash', imagen = '$imagen'
                WHERE idusuario = '$idusuario'";
        } else {
            $sql = "UPDATE usuarios 
                SET nombre = '$nombre', apellidos = '$apellidos', login = '$login', email = '$email', imagen = '$imagen'
                WHERE idusuario = '$idusuario'";
        }
        return ejecutarConsulta($sql);
    }

    // Función para desactivar un usuario
    public function desactivar($idusuario)
    {
        $sql = "UPDATE usuarios SET estado = '0' 
        WHERE idusuario = '$idusuario'";
        return ejecutarConsulta($sql);
    }

    // Función para activar un usuario
    public function activar($idusuario)
    {
        $sql = "UPDATE usuarios SET estado = '1' 
        WHERE idusuario = '$idusuario'";
        return ejecutarConsulta($sql);
    }

    public function mostrar($idusuario){
        $sql = "SELECT * FROM usuarios WHERE idusuario='$idusuario'";
        return ejecutarConsultaSimple($sql);
    }

    public function listar(){
        $sql = "SELECT * FROM usuarios";
        return ejecutarConsulta($sql);
    }

    public function cantidad_usuario(){
        $sql = "SELECT COUNT(*) as nombre FROM usuarios";
        return ejecutarConsulta($sql);
    }

    public function verificar($login, $clave){
        $sql = "SELECT * FROM usuarios WHERE login='$login' AND password='$clave' AND estado='1'";
        return ejecutarConsulta($sql);
    }

}
