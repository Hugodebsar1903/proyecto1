$("form").on("submit", function (e) {
    e.preventDefault();

    const formData = $(this).serializeArray();

    let data = {};

    $.each(formData, function (i, field) {
        data[field.name] = field.value; // Convertir a objeto JSON
    });

    Swal.fire({
        title: "Atención!",
        icon: "warning",
        text: "Confirmas que deseas agregar el curso al alumno?",
        showCancelButton: true,
        confirmButtonText: "Agregar",
        denyButtonText: `Cancelar`,
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post(`/estudiante/guardar-curso`, data).then((r) => {
                Swal.fire({
                    title: "Hecho",
                    icon: "success",
                    text: "Curso Agregado",
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

$("a.btn-danger").on('click', function(){

    var data = {
        estudiante: $(this).attr('data-estudiante'),
        curso: $(this).attr('data-curso')
    }

    Swal.fire({
        title: "Atención!",
        icon: "warning",
        text: "Confirmas que deseas eliminar el curso al alumno?",
        showCancelButton: true,
        confirmButtonText: "Eliminar",
        denyButtonText: `Cancelar`,
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post(`/estudiante/eliminar-curso`, data).then((r) => {
                Swal.fire({
                    title: "Hecho",
                    icon: "success",
                    text: "Curso Eliminado",
                    timer: 3000,
                    timerProgressBar: true,
                    didClose: function () {
                        window.location.reload();
                    },
                });
            });
        }
    });

})
