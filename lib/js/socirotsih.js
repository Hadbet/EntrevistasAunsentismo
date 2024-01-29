
var rol = '<?php echo $_SESSION["rol"];?>';

if (rol==='2'){
    window.location.href = 'index.php';
}
function inicializarTabla() {
    $('#miTabla').DataTable({
        ajax: {
            url: 'https://arketipo.mx/RH/Entrevistas/dao/daoHistoricoGeneral.php',
            dataSrc: 'data'
        },
        columns: [
            {data: 'NominaEntrevistado'},
            {data: 'FechaAusentismo'},
            {data: 'TipoAusencia'},
            {data: 'Motivo'},
            {data: 'Area'},
            {data: 'Encargado'},
            {data: 'Supervisor'},
            {data: 'ShiftLeader'},
            {data: 'Tag'}
        ]
    });
}

// Llama a la función al cargar la página
$(document).ready(function () {
    inicializarTabla();
});

function toggleMenu() {
    var menu = document.getElementById("menuNavegacion");
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
}