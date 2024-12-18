$(document).ready(function () {
    axios.get("/api/estudiantes").then((r) => {
        const users = r.data;
        const tableBody = document.querySelector("#estudiantesTable tbody");

        // Llena la tabla con los datos
        users.forEach((user) => {
            const row = `
                    <tr>
                        <td>${user.id}</td>
                        <td class="text-center">${user.nombre}</td>
                        <td class="text-center">${user.apellido_paterno}</td>
                        <td class="text-center">${user.apellido_materno}</td>
                        <td class="text-center">${user.created_at}</td>
                        <td class="d-flex justify-content-around">
                            <a class="btn btn-success" href="/estudiante/agregar-curso/${user.id}">Cursos</a>
                            <a class="btn btn-danger" data-id="${user.id}" href="javascript:void(0)"">Alumno</a>
                        </td>
                    </tr>
                `;
            tableBody.innerHTML += row;
        });

        // Inicializa DataTables
        $("#estudiantesTable").DataTable({
            columnDefs: [
                {
                    targets: 0, // Índice de la primera columna
                    className: 'text-center' // Clase para alinear al centro
                }
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/es-ES.json',
            },
        });
    });
});

$(document).on("click", "a.btn-danger", function () {
    var id = $(this).attr("data-id");

    Swal.fire({
        title: "Atención!",
        icon: "warning",
        text: "Confirmas que deseas eliminar al alumno?",
        showCancelButton: true,
        confirmButtonText: "Eliminar",
        denyButtonText: `Cancelar`,
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/estudiantes/${id}`).then((r) => {
                Swal.fire({
                    title: "Hecho",
                    icon: "success",
                    text: "Estudiante eliminado",
                    timer: 3000,
                    timerProgressBar: true,
                    didClose: function () {
                        window.location.reload();
                    },
                });
            });
        }
    });
});
