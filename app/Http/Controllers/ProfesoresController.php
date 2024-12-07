<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Exception;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{

    public function index(){

        $profesores = Profesor::with(['cursos'])->get();

        return response()->json($profesores, 200);

    }

    public function list()
    {
        $data = [
            'active_page'   =>  'profesores',
            'jsPage'        =>  ['profesores.index.js'],
            'profesores'    =>  Profesor::with(['cursos'])->get()
        ];

        return view('pages.profesores.index')->with($data);
    }

    public function create()
    {
        $data = [
            'active_page'   =>  'profesores',
            'jsPage'        =>  ['profesores.crear.js']
        ];

        return view('pages.profesores.crear')->with($data);
    }

    public function store(Request $request)
    {
        $profesor = new Profesor();

        $profesor->nombre           =   $request->nombre;
        $profesor->apellido_paterno =   $request->apellido_paterno;
        $profesor->apellido_materno =   $request->apellido_materno;

        try{
            $profesor->save();

            return response()->json([], 200);
        }catch(Exception $e){
            return response()->json($e, 422);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        try{
            
            Profesor::find($id)->delete();

            return response()->json([], 200);

        }catch(Exception $e){
            return response()->json($e, 422);
        }
    }
}
