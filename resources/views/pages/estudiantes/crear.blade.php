@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div-col-8 class="offset-2">
                <h4>Agregar Estudiante</h4>
            </div-col-8>
        </div>
        <div class="row mt-4">
            <div class="col-8 offset-2">
                <form id="nuevoEstudiante">
                    <div class="row form-group">
                        <div class="col-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>
                        <div class="col-4">
                            <label for="apellido_paterno">Apellido Paterno</label>
                            <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control"
                                required>
                        </div>
                        <div class="col-4">
                            <label for="apellido_materno">Apellido Materno</label>
                            <input type="text" name="apellido_materno" id="apellido_materno" class="form-control"
                                required>
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
