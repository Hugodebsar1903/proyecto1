<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Profesor;
use Exception;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function index(){

        $cursos = Curso::with(['profesor'])->get();

        return response()->json($cursos);

    }

    public function create(){

        $data = [
            'active_page'   =>  'cursos',
            'jsPage'        =>  ['cursos.crear.js'],
            'profesores'    =>  Profesor::orderBy("nombre", "asc")->get()
        ];

        return view('pages.cursos.crear')->with($data);

    }

    public function store(Request $request){

        $curso = new Curso();

        $curso->nombre          = $request->nombre;
        $curso->profesor_id     = $request->profesor;

        try{
            $curso->save();

            return response()->json([], 200);

        }catch(Exception $e){
            return response()->json($e, 422);
        }

    }

    public function list(){
        $data = [
            'active_page'   =>  'cursos',
            'jsPage'        =>  ['cursos.index.js']
        ];

        return view('pages.cursos.index')->with($data);
    }

    public function destroy($id){

        try{
            Curso::findOrFail($id)->delete();
            return response()->json([],200);
        }catch(Exception $e){
            return response()->json($e, 422);
        }

    }
}
