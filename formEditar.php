<?php

require("php/funciones.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba Tecnica</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

</head>

<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1 class="actu">Actualizar datos</h1>
        </section>
        <section class="table__body tbody">
        <?php
            

            // Verificar si se recibió el ID de la persona
            if(isset($_GET['Id'])) {
                $id = $_GET['Id']; 
            
                // Obtener los datos de la persona
                $persona = obtenerPersona($id, $conexion);
            
                if ($persona) {
        ?>
            <form method="POST" class="form" action="php/funciones.php">
                <div class="modal-body mbody">

                    <input type="hidden" name="id" value="<?php echo isset($persona['id']) ? $persona['id'] : ''; ?>">


                    <div class="form-group">
                        <label for="nombres">Ingrese el nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control inputform" value="<?php echo $persona['nombre']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Ingrese los apellidos</label>
                        <input type="text" name="apellido" id="apellido" class="form-control inputform" value="<?php echo $persona['apellido']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="edad">Ingrese su edad</label>
                        <input type="number" name="edad" id="edad" class="form-control inputform" value="<?php echo $persona['edad']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="correo_electronico">Ingrese su email</label>
                        <input type="email" name="correo_electronico" id="correo_electronico" class="form-control inputform" value="<?php echo $persona['correo_electronico']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Ingrese su numero de telefono</label>
                        <input type="number" name="telefono" id="telefono" class="form-control inputform" value="<?php echo $persona['telefono']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Ingrese su dirección</label>
                        <input type="text" name="direccion" id="direccion" class="form-control inputform" value="<?php echo $persona['direccion']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ingrese su ciudad de origen</label>
                        <input type="text" name="ciudad" id="ciudad" class="form-control inputform" value="<?php echo $persona['ciudad']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="codigo_postal">Ingrese codigo postal de la ciudad</label>
                        <input type="text" name="codigo_postal" id="codigo_postal" class="form-control inputform" value="<?php echo $persona['codigo_postal']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pais">Ingrese su pais de origen</label>
                        <input type="text" name="pais" id="pais" class="form-control inputform" value="<?php echo $persona['pais']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="rol">Tipo de documento</label>
                        <select name="tipo_documento" id="tipo_documento" class="form-control inputform" value="<?php echo $persona['tipo_documento']; ?>">
                            <option selected value="<?php echo $persona['tipo_documento']; ?>"><?php echo $persona['tipo_documento']; ?></option>
                            <option disabled>---Seleccionar rol---</option>
                            <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                            <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                            <option value="Pasaporte">Pasaporte</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_expedicion">Fecha de expedición</label>
                        <input type="text" name="fecha_expedicion" id="fecha_expedicion" class="form-control inputform" value="<?php echo $persona['fecha_expedicion']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control inputform" value="<?php echo $persona['fecha_nacimiento']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="actualizar" class="btn btn-primary">Actualizar Persona</button>
                    <a href="index.php" class="btn btn-primary" style="margin:10px;">Cancelar</a>
                </div>
            </form>    
            <?php
                } else {
                    echo "No se encontró la persona.";
                }
            } else {
                echo "ID de persona no proporcionado.";
            }
        ?>  
        </section>
    </main>  
</body>
</html>
