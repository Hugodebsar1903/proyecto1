@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-2 offset-10 text-end">
                <a href="/cursos/crear" class="btn btn-primary">Agregar Curso</a>
            </div>
        </div>
        <div class="row mt-4">
            <table class="table table-bordered" id="cursosTable">
                <thead>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Profesor</th>
                    <th class="text-center">Acciones</th>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection