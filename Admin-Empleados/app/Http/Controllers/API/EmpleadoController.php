<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Empleado;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'error' => false,
            'empleados'  => Empleado::all(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[ 
            'nombre' => 'required',
            'email' => 'required|email|unique:empleados,email',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        if($validation->fails()){
            return response()->json([
                'error' => true,
                'messages'  => $validation->errors(),
            ], 200);
        }
        else
        {
            $empleado = new Empleado;
            $empleado->nombre = $request->input('nombre');
            $empleado->email = $request->input('email');
            $empleado->telefono = $request->input('telefono');
            $empleado->direccion = $request->input('direccion');
            $empleado->save();
    
            return response()->json([
                'error' => false,
                'empleado'  => $empleado,
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);

        if(is_null($empleado)){
            return response()->json([
                'error' => true,
                'message'  => "Empleado con id # $id no encontrado",
            ], 404);
        }

        return response()->json([
            'error' => false,
            'empleado'  => $empleado,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[ 
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        if($validation->fails()){
            return response()->json([
                'error' => true,
                'messages'  => $validation->errors(),
            ], 200);
        }
        else
        {
            $empleado = Empleado::find($id);
            $empleado->nombre = $request->input('nombre');
            $empleado->email = $request->input('email');
            $empleado->telefono = $request->input('telefono');
            $empleado->direccion = $request->input('direccion');
            $empleado->save();
    
            return response()->json([
                'error' => false,
                'empleado'  => $empleado,
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);

        if(is_null($empleado)){
            return response()->json([
                'error' => true,
                'message'  => "Empleado con id # $id no encontrado",
            ], 404);
        }

        $empleado->delete();
    
        return response()->json([
            'error' => false,
            'message'  => "El registro del empleado se eliminó con éxito # $id",
        ], 200);
    }
}
