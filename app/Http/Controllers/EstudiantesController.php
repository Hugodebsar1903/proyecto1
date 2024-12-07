<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Estudiante;
use Exception;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{

    public function index()
    {
        $estudiantes = Estudiante::all();

        return response()->json($estudiantes);
    }

    public function viewEstudiantes(){

        $data = [
            'active_page'   =>  'estudiantes',
            'jsPage'        =>  ['estudiantes.index.js']
        ];

        return view('pages.estudiantes.index')->with($data);
    }

    public function agregarCurso($id){

        $data = [
            'active_page'   =>  'estudiantes',
            'jsPage'        =>  ['estudiantes.agregarCurso.js'],
            'estudiante'    =>  Estudiante::where('id', $id)->with('cursos')->first(),
            'cursos'        =>  Curso::all()
        ];

        return view('pages.estudiantes.agregarCurso')->with($data);

    }

    public function guardarCurso(Request $req){

        $estudiante = Estudiante::findOrFail($req->estudiante);

        try{
            $estudiante->cursos()->attach($req->curso);
            return response()->json([], 200);
        }catch(Exception $e){
            return response()->json($e);
        }

    }

    public function eliminarCurso(Request $req){

        $estudiante = Estudiante::findOrFail($req->estudiante);

        try{
            $estudiante->cursos()->detach($req->curso);
            return response()->json([], 200);
        }catch(Exception $e){
            return response()->json($e);
        }

    }

    public function create()
    {
        $data = [
            'active_page'   =>  'estudiantes',
            'jsPage'        =>  ['estudiantes.crear.js']
        ];

        return view('pages.estudiantes.crear')->with($data);
    }

    public function store(Request $request)
    {
        $estudiante = new Estudiante();

        $estudiante->nombre = $request->nombre;
        $estudiante->apellido_paterno = $request->apellido_paterno;
        $estudiante->apellido_materno = $request->apellido_materno;

        try{

            $estudiante->save();

        }catch(Exception $e){
            return response()->json($e, 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{

            Estudiante::find($id)->delete();

            return response()->json([], 200);

        }catch(Exception $e){

            return response()->json($e, 422);

        }
    }
}
