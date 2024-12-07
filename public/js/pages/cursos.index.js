$(document).ready(function () {
    axios.get("/api/cursos").then((r) => {
        const cursos = r.data;
        const tableBody = document.querySelector("#cursosTable tbody");

        // Llena la tabla con los datos
        cursos.forEach((cursos) => {
            const row = `
                    <tr>
                        <td>${cursos.id}</td>
                        <td class="text-center">${cursos.nombre}</td>
                        <td class="text-center">${cursos.profesor.fullname}</td>
                        <td class="d-flex justify-content-around">
                            <a class="btn btn-danger" data-id="${cursos.id}" href="javascript:void(0)"">Eliminar</a>
                        </td>
                    </tr>
                `;
            tableBody.innerHTML += row;
        });

        // Inicializa DataTables
        $("#cursosTable").DataTable({
            columnDefs: [
                {
                    targets: 0,
                    className: 'text-center'
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
            axios.delete(`/api/cursos/${id}`).then((r) => {
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
