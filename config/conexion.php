<?php 

require_once "global.php";

$conexion = new mysqli(DB_HOST,DB_USERNAME, DB_PASSWORD, DB_NAME);

mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');

if (mysqli_connect_errno()) {
    printf("Ups parece que fallo en la conexion con la base de datos: %s\n",mysqli_connect_errno());
    exit();
}

if (!function_exists('ejecitarConsulta')) {
    function ejecutarConsulta($sql){
        global $conexion;
        $query = $conexion->query($sql);
        return $query;
    }
    function ejecutarConsultaSimple($sql){
        global $conexion;
        $query = $conexion->query($sql);
        $row = $query->fetch_assoc();
        return $row;
    }

    // Función para ejecutar una consulta de tipo INSERT y retornar el último ID insertado
    function ejecutarConsulta_retornarID($sql) {
        global $conexion;
        $query = $conexion->query($sql);
        if ($query) {
            // Retorna el último ID insertado en la base de datos
            return $conexion->insert_id;
        } else {
            // Si no se ejecutó correctamente, retornamos un error
            return false;
        }
    }

    // Función para limpiar una cadena de caracteres y evitar inyecciones SQL
    function limpiarCadena($str) {
        global $conexion;
        // Escapa los caracteres especiales y elimina los espacios innecesarios
        $str = mysqli_real_escape_string($conexion, trim($str));
        // También puedes agregar otras limpiezas adicionales, como convertir caracteres a minúsculas o eliminar etiquetas HTML
        return htmlspecialchars($str); // Previene ataques XSS (cross-site scripting)
    }
}

