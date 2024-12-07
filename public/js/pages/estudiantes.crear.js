$("form").on("submit", function (e) {
    e.preventDefault();

    const formData = $(this).serializeArray();

    let data = {};

    $.each(formData, function (i, field) {
        data[field.name] = field.value; // Convertir a objeto JSON
    });

    axios.post(`/estudiantes/crear`, data).then((r) => {
        Swal.fire({
            title: "Hecho",
            icon: "success",
            text: "Alumno Agregado",
            timer: 3000,
            timerProgressBar: true,
            didClose: function () {
                window.location.replace("/estudiantes");
            },
        });
    });
});
