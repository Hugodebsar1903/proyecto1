@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div-col-8 class="offset-2">
                <h4>Agregar Curso</h4>
            </div-col-8>
        </div>
        <div class="row mt-4">
            <div class="col-8 offset-2">
                <form id="nuevoEstudiante">
                    <div class="row form-group">
                        <div class="col-6">
                            <label for="nombre">Nombre del Curso</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label for="profesor">Profesor</label>
                            <select name="profesor" id="profesor" class="form-control form-select" required>
                                <option value=""></option>
                                @foreach ($profesores as $p)
                                    <option value="{{ $p->id }}">{{ $p->fullname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <input type="submit" value="Agregar" class="btn btn-primary w-100">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
