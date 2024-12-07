$(document).ready(function(){
    axios.get('/api/estudiantes').then((r) => {
        const users = r.data;
            const tableBody = document.querySelector('#estudiantesTable tbody');

            console.log(users);

            // Llena la tabla con los datos
            users.forEach(user => {
                const row = `
                    <tr>
                        <td>${user.id}</td>
                        <td class="text-center">${user.nombre}</td>
                        <td class="text-center">${user.apellido_paterno} ${user.apellido_materno}</td>
                        <td class="d-flex justify-content-between">
                            <a class="btn btn-primary" href="/estudiantes/${user.id}">Ver Cursos</a>
                            <a class="btn btn-success" href="/estudiantes/${user.id}">Actualizar Datos</a>
                            <a class="btn btn-danger" href="/estudiantes/${user.id}">Eliminar</a>
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });

            // Inicializa DataTables
            $('#myTable').DataTable();
    });
});