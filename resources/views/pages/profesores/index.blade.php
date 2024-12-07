@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-2 offset-10 text-end">
                <a href="/profesores/crear" class="btn btn-primary">Agregar Profesor</a>
            </div>
        </div>
        <div class="row mt-4">
            <table class="table table-bordered" id="profesoresTable">
                <thead>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellido Paterno</th>
                    <th class="text-center">Apellido Materno</th>
                    <th class="text-center">Cursos</th>
                    <th class="text-center">Acciones</th>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection