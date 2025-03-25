<?php

namespace App\Http\Controllers\ResponsableInscripcion;

use App\Http\Controllers\Controller;
use App\Models\ResponsableInscripcion\ResponsableInscripcionModel;
use Illuminate\Http\Request;

class ResponsableInscripcionController extends Controller
{
    
    public function index()
    {
        $responsable = ResponsableInscripcionModel::all();

        return response()->json([
            'status' => 200,
            'data' => $responsable,
        ]);
    }

    public function store(Request $request)
    {
        $responsable = new ResponsableInscripcionModel();
        
        $responsable->nombre = $request->nombre;
        $responsable->apellido_pa = $request->apellido_pa;
        $responsable->apellido_ma = $request->apellido_ma;
        $responsable->ci = $request->ci;
        $responsable->complemento = $request->complemento;
        $responsable->save();
  
          return response()->json([
              'status' => 200,
              'message' => 'Responsable de inscripcion agregado exitosamente',
          ]);
    }

    
    public function show($id)
    {
        $responsable = ResponsableInscripcionModel::findOrFail($id);

        return response()->json([
            'status' => 200,
            'data' => $responsable,
        ]);
    }
 
    public function update(Request $request, $id)
    {
        $responsable = ResponsableInscripcionModel::findOrFail($id);

        $responsable->nombre = $request->nombre;
        $responsable->apellido_pa = $request->apellido_pa;
        $responsable->apellido_ma = $request->apellido_ma;
        $responsable->ci = $request->ci;
        $responsable->complemento = $request->complemento;

        $responsable->save();

        return response()->json([
            'status' => 200,
            'message' => 'Responsable de inscripcion actualizado exitosamente',
        ]);
    }

    public function destroy($id)
    {
        $responsable = ResponsableInscripcionModel::findOrFail($id);
        $responsable->delete();

       
        return response()->json([
            'status' => 200,
            'message' => '  Responsable de inscripcion eliminado exitosamente',
        ]);
    }
}
