<?php
//Iniciamos la sesion 
session_start();
//inlcuimos el archivo de clase usuario 
require_once "../modelos/Usuarios.php";

//creamos una instancia del objeto Usuario 
$usuario = new Usuario();

//recibimos los datos enviados por el formulario
$idusuario  = isset($_POST["idusuario"])    ? limpiarCadena($_POST["idusuario"]) : "";
$nombre     = isset($_POST["nombre"])       ? limpiarCadena($_POST["nombre"]) : "";
$apellidos  = isset($_POST["apellidos"])    ? limpiarCadena($_POST["apellidos"]) : "";
$login      = isset($_POST["login"])        ? limpiarCadena($_POST["login"]) : "";
$email      = isset($_POST["email"])        ? limpiarCadena($_POST["email"]) : "";
$password   = isset($_POST["clave"])        ? limpiarCadena($_POST["clave"]) : "";
$imagen     = isset($_POST["imagen"])       ? limpiarCadena($_POST["imagen"]) : "";

//Dependiendo de la operacion solicitada mediante la variable $_GET["op"]
switch ($_GET["op"]) {
    case 'guardaryeditar':
        //iniciamos la variable que contrenda el hash de la contraseña 
        $clavehash = '' ;
        //verificamos si se ha subido una iamgen 
        if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            // si no se ha subido una imagen, sonservamos la imagen actual
            $imagen = $_POST["imagenactual"];
        } else {
            // si se ha subido una imagen, lamovemos al directorio correspondiente
            $ext = explode(".", $_FILES["imagen"]["tmp_name"]);
            if ($_FILES['imagen']['type'] == "imagen/jpg" || $_FILES) {
                # code...
            }
        }
        
}
