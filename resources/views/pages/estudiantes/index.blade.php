@extends('welcome')

@section('content')
    <table>
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Curso</th>
            <th>Profesor</th>
        </thead>
        <tbody>
            @foreach ($estudiantes as $e)
            <tr>
                <td>{{ $e->id }}</td>
                <td>{{ $e->nombre }}</td>
                <td>{{ $e->apellido_paterno }} {{ $e->apellido_materno }}</td>
                <td>
                    <ul>
                        @foreach ($e->cursos as $c)
                            <li>{{ $c->nombre }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($e->cursos as $c)
                            <li>{{ $c->profesor->nombre }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection