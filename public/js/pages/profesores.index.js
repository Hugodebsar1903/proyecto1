$(document).ready(function () {
    axios.get("/api/profesores").then((r) => {
        const profesores = r.data;
        const tableBody = document.querySelector("#profesoresTable tbody");

        // Llena la tabla con los datos
        profesores.forEach((profesor) => {
            const row = `
                    <tr>
                        <td>${profesor.id}</td>
                        <td class="text-center">${profesor.nombre}</td>
                        <td class="text-center">${profesor.apellido_paterno}</td>
                        <td class="text-center">${profesor.apellido_materno}</td>
                        <td class="text-center">
                            <ul class="list-unstyled mb-0">
                                ${profesor.cursos.map(curso => `<li>${curso.nombre}</li>`).join('')}
                            </ul>
                        </td>
                        <td class="d-flex justify-content-around">
                            <a class="btn btn-danger" data-id="${profesor.id}" href="javascript:void(0)"">Eliminar</a>
                        </td>
                    </tr>
                `;
            tableBody.innerHTML += row;
        });

        // Inicializa DataTables
        $("#profesoresTable").DataTable({
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
        text: "Confirmas que deseas eliminar al profesor?",
        showCancelButton: true,
        confirmButtonText: "Eliminar",
        denyButtonText: `Cancelar`,
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/api/profesores/${id}`).then((r) => {
                Swal.fire({
                    title: "Hecho",
                    icon: "success",
                    text: "Profesor eliminado",
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
