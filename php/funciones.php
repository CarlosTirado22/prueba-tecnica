<?php
require("conexion.php");

// Función para obtener todos los datos
function obtenerDatos() {
    global $conexion;
    $sql = "SELECT * FROM personas";
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        $datos = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $datos[] = $fila;
        }
        return $datos;
    } else {
        return false;
    }
}


// Función para agregar un nuevo dato
function agregarDato($datos) {
    global $conexion;
    $sql = "INSERT INTO personas (nombre, apellido, edad, correo_electronico, telefono, direccion, ciudad, codigo_postal, pais, tipo_documento, fecha_expedicion, fecha_nacimiento) VALUES ('".$datos['nombre']."', '".$datos['apellido']."', '".$datos['edad']."', '".$datos['correo_electronico']."', '".$datos['telefono']."', '".$datos['direccion']."', '".$datos['ciudad']."', '".$datos['codigo_postal']."', '".$datos['pais']."', '".$datos['tipo_documento']."', '".$datos['fecha_expedicion']."', '".$datos['fecha_nacimiento']."')";
    if (mysqli_query($conexion, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Verifico si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['apellido'])) {
    // Llamo a la función para agregar un nuevo dato
    if (agregarDato($_POST)) {
        header("location:../index.php");
    } else {
        echo "<script>alert('Hubo un error al agregar el dato.');</script>";
    }
}



// Función para eliminar un dato
function eliminarDato($id) {
    global $conexion;
    
    $sql = "DELETE FROM personas WHERE id=".$id;
    if (mysqli_query($conexion, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Verifico si se recibió el parámetro para eliminar un dato
if (isset($_GET['eliminar'])) {
    $id_a_eliminar = $_GET['eliminar'];
    // Llamo a la función para eliminar un dato
    if (eliminarDato($id_a_eliminar)) {
        header("location:../index.php");
    } else {
        echo "<script>alert('Hubo un error al eliminar el dato.');</script>";
    }
}
?>

