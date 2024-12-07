@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row my-4">
            <h4 class="px-0">Estudiante: {{ $estudiante->fullname }}</h4>
        </div>

        <div class="row">
            <table class="table table-bordered" id="estudiantesTable">
                <thead>
                    <tr>
                        <th colspan="5" class="text-center">Cursos Actuales</th>
                    </tr>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nombre</th>
                        <th>Profesor</th>
                        <th class="text-center">Calificación</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estudiante->cursos as $c)
                        <tr>
                            <td class="text-center">{{ $c->id }}</td>
                            <td>{{ $c->nombre }}</td>
                            <td>{{ $c->profesor->fullname }}</td>
                            <td class="text-center">{{ $c->pivot->calificacion }}</td>
                            <td class="text-center">
                                <a href="javascript:void(0)" class="btn btn-danger" data-estudiante="{{ $estudiante->id }}" data-curso="{{ $c->id }}">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row mt-4">
            <div class="col-4 px-0">
                <form id="nuevoCurso">
                    <div class="form-group">
                        <input type="text" id="estudiante" name="estudiante" value="{{ $estudiante->id }}" class="d-none">
                        <select name="curso" id="curso" class="form-control form-select" required>
                            <option value="">- Seleccionar Curso -</option>
                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}">Curso: {{ $curso->nombre }} - Profesor: {{ $curso->profesor->fullname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" value="Agregar" class="btn btn-primary w-100">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
