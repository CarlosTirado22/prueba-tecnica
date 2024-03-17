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

    // Preparar la consulta de inserción
    $sql = "INSERT INTO personas (nombre, apellido, edad, correo_electronico, telefono, direccion, ciudad, codigo_postal, pais, tipo_documento, fecha_expedicion, fecha_nacimiento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Preparar la declaración
    $stmt = mysqli_prepare($conexion, $sql);
    
    // Esto protege el código contra la inyección SQL
    mysqli_stmt_bind_param($stmt, "ssisssssssss", 
                              $datos['nombre'], 
                              $datos['apellido'], 
                              $datos['edad'], 
                              $datos['correo_electronico'], 
                              $datos['telefono'], 
                              $datos['direccion'], 
                              $datos['ciudad'], 
                              $datos['codigo_postal'], 
                              $datos['pais'], 
                              $datos['tipo_documento'], 
                              $datos['fecha_expedicion'], 
                              $datos['fecha_nacimiento']);
    
    // Ejecutar la consulta
    $resultado = mysqli_stmt_execute($stmt);
    
    // Verificar si la consulta se ejecutó correctamente
    if ($resultado) {
        return "Los datos se agregaron correctamente.";
    } else {
        return "Error al agregar los datos: " . mysqli_stmt_error($stmt);
    }
}

// Verifico si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar'])) {
    // Llamo a la función para agregar un nuevo dato
    if (agregarDato($_POST)) {
        header("location:../index.php");
    } else {
        echo "<script>alert('Hubo un error al agregar el dato.');</script>";
    }
}

//Función para actualizar

//primero obtengo el ID de la persona
function obtenerPersona($id) {
    global $conexion;

    // Preparo la consulta
    $sql = "SELECT * FROM personas WHERE id = ?";
    
    // Preparo la declaración
    $stmt = mysqli_prepare($conexion, $sql);
    
    // Esto protege el código contra la inyección SQL
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    // Ejecuto la consulta
    mysqli_stmt_execute($stmt);

    // Obtengo el resultado
    $resultado = mysqli_stmt_get_result($stmt);

    // Obtengo los datos de la persona
    $persona = mysqli_fetch_assoc($resultado);

    return $persona;
}

//realizo la función para actualizar
function actualizarPersona($id, $datos) {
    global $conexion;

    // Preparo la consulta
    $sql = "UPDATE personas SET nombre=?, apellido=?, edad=?, correo_electronico=?, telefono=?, direccion=?, ciudad=?, codigo_postal=?, pais=?, tipo_documento=?, fecha_expedicion=?, fecha_nacimiento=? WHERE id=?";
    
    // Preparo la declaración
    $stmt = mysqli_prepare($conexion, $sql);
    
    // Esto protege el código contra la inyección SQL
    mysqli_stmt_bind_param($stmt, "ssisssssssssi", 
                              $datos['nombre'], 
                              $datos['apellido'], 
                              $datos['edad'], 
                              $datos['correo_electronico'], 
                              $datos['telefono'], 
                              $datos['direccion'], 
                              $datos['ciudad'], 
                              $datos['codigo_postal'], 
                              $datos['pais'], 
                              $datos['tipo_documento'], 
                              $datos['fecha_expedicion'], 
                              $datos['fecha_nacimiento'], 
                              $id);
    
    // Ejecuto la consulta
    $resultado = mysqli_stmt_execute($stmt);
    
    // Verifico si la consulta se ejecutó correctamente
    if ($resultado) {
        header("location:../index.php");
    } else {
        return "Error al actualizar los datos: " . mysqli_stmt_error($stmt);
    }
}

// Verifico si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['actualizar'])) {
    // Obtengo los datos actualizados del formulario
    $id = $_POST['id'];
    $datos = array(
        'nombre' => $_POST['nombre'],
        'apellido' => $_POST['apellido'],
        'edad' => $_POST['edad'],
        'correo_electronico' => $_POST['correo_electronico'],
        'telefono' => $_POST['telefono'],
        'direccion' => $_POST['direccion'],
        'ciudad' => $_POST['ciudad'],
        'codigo_postal' => $_POST['codigo_postal'],
        'pais' => $_POST['pais'],
        'tipo_documento' => $_POST['tipo_documento'],
        'fecha_expedicion' => $_POST['fecha_expedicion'],
        'fecha_nacimiento' => $_POST['fecha_nacimiento']
    );

    // Llamo a la función para actualizar los datos
    $mensaje = actualizarPersona($id, $datos);
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

