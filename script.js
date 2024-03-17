

const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');

// 1. Buscando datos específicos de la tabla HTML
search.addEventListener('input', searchTable);

function searchTable() {
    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase(),
            search_data = search.value.toLowerCase();

        row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        row.style.setProperty('--delay', i / 25 + 's');
    })

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });
}

// 2. Conversión de tabla HTML a archivo EXCEL

function exportarExcel() {
    const tabla = document.getElementById('tabla');
    const nombreArchivo = 'datos.xlsx';
    
    const wb = XLSX.utils.table_to_book(tabla, {sheet: "Sheet 1"});
    XLSX.writeFile(wb, nombreArchivo);
  }

// 5. alerta
function eliminar(id) {
    // Mostrar el cuadro de confirmación
    swal({
        title: "¿Estás seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            // Si el usuario confirma, redirige a la URL de eliminación
            window.location.href = "php/funciones.php?eliminar=" + id;
        } else {
            // Si el usuario cancela, no hagas nada
            swal("¡Esta persona está a salvo!");
        }
    });
}