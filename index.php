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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <!-- Boton Modal -->
            <button type="button" class="btn btn-primary" id="botonCrear" data-bs-toggle="modal" data-bs-target="#modalUsuario">
                Agregar Personas
            </button>
            <div class="input-group">
                <input type="search" placeholder="Buscar datos...">
                <img src="images/search.png" alt="">
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Exportar &nbsp; &#10140;</label>
                    <label for="export-file" id="toEXCEL" onclick="exportarExcel()">EXCEL <img src="images/excel.png" alt=""></label>
                </div>
            </div>
        </section>
        <section class="table__body">
            <table id="tabla">
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nombre <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Apellido <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Edad <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Correo electrónico <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Teléfono <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Dirección <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Ciudad <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Código postal<span class="icon-arrow">&UpArrow;</span></th>
                        <th> País <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Tipo documento <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Fecha de expedición <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Fecha de nacimiento <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Obtener los datos y recorrerlos para mostrar en la tabla
                    $datos = obtenerDatos();
                    if ($datos) {
                        foreach ($datos as $dato) {
                            // Generar filas de la tabla con los datos de cada dato
                            echo "<tr>";
                                echo "<td>" . $dato['id'] . "</td>";
                                echo "<td>" . $dato['nombre'] . "</td>";
                                echo "<td>" . $dato['apellido'] . "</td>";
                                echo "<td>" . $dato['edad'] . "</td>";
                                echo "<td>" . $dato['correo_electronico'] . "</td>";
                                echo "<td>" . $dato['telefono'] . "</td>";
                                echo "<td>" . $dato['direccion'] . "</td>";
                                echo "<td>" . $dato['ciudad'] . "</td>";
                                echo "<td>" . $dato['codigo_postal'] . "</td>";
                                echo "<td>" . $dato['pais'] . "</td>";
                                echo "<td>" . $dato['tipo_documento'] . "</td>";
                                echo "<td>" . $dato['fecha_expedicion'] . "</td>";
                                echo "<td>" . $dato['fecha_nacimiento'] . "</td>";
                                echo "<td>";
                                echo "<a href='formEditar.php?Id=" . $dato['id'] . "'><svg class='icon icon-tabler icon-tabler-edit' width='30' height='30' viewBox='0 0 24 24' stroke-width='1.5' stroke='#363949' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><path d='M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1' /><path d='M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z' /><path d='M16 5l3 3' /></svg></a>";

                                echo "<a onclick='eliminar(" . $dato['id'] . ")' href='#'><svg class='icon icon-tabler icon-tabler-trash-x' width='30' height='30' viewBox='0 0 24 24' stroke-width='1.5' stroke='#363949' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><path d='M4 7h16' /><path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12' /><path d='M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3' /><path d='M10 12l4 4m0 -4l-4 4' /></svg></a>";
                                echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='12'>No hay datos disponibles</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <!-- Modal Agregar -->
    <div class="modal fade mod" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog diag">
            <div class="modal-content ">
                <div class="modal-header mohe">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Persona</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="formulario" action="php/funciones.php">
                    <div class="modal-body">
                        <label for="nombres">Ingrese el nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" require>
                        <br>

                        <label for="apellidos">Ingrese los apellidos</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" require>
                        <br>

                        <label for="edad">Ingrese su edad</label>
                        <input type="number" name="edad" id="edad" class="form-control" require>
                        <br>

                        <label for="correo_electronico">Ingrese su email</label>
                        <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" required>

                        <br>

                        <label for="telefono">Ingrese su numero de telefono</label>
                        <input type="number" name="telefono" id="telefono" class="form-control" require>
                        <br>

                        <label for="direccion">Ingrese su dirección</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" require>
                        <br>

                        <label for="ciudad">Ingrese su ciudad de origen</label>
                        <input type="text" name="ciudad" id="ciudad" class="form-control" require>
                        <br>

                        <label for="codigo_postal">Ingrese codigo postal de la ciudad</label>
                        <input type="text" name="codigo_postal" id="codigo_postal" class="form-control" require>
                        <br>

                        <label for="pais">Ingrese su pais de origen</label>
                        <input type="text" name="pais" id="pais" class="form-control" require>
                        <br>

                        <label for="rol">Tipo de documento</label>
                        <select name="tipo_documento" id="tipo_documento" class="form-control" require>
                            <option selected disabled>---Seleccionar rol---</option>
                            <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                            <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                            <option value="Pasaporte">Pasaporte</option>
                        </select>
                        <br>

                        <label for="fecha_expedicion">Fecha de expedición</label>
                        <input type="date" name="fecha_expedicion" id="fecha_expedicion" class="form-control" require>
                        <br>

                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" require>
                        <br>
                        
                        <div class="modal-footer">
                        <input type="hidden" name="agregar" value="agregar">
                        <button type="submit" class="btn btn-primary">Agregar Persona</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Agregar-->

    <script src="script.js"></script>
</body>
</html>
