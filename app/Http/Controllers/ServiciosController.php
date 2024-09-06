<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\Servicio;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Servicio::all();
        $datos1 = categoria::all();

        return view('servicios.index',compact('datos','datos1'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos = categoria::all();
        return view('servicios.new',compact('datos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);

        $validator = Validator::make($request->all(),[
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:300',
            'categoria_id' => 'required|max:20'
        ]);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        Servicio::create($request->all());
        return redirect('servicios')->with('type','success')
                                     ->with('msn','Registro creado exitosamente');
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
        $datos = Servicio::find($id);
        $datos1 = categoria::all();
        return view('servicios.edit',compact('datos','datos1'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:300',
            'categoria_id' => 'required|max:20'
        ]);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $servicio = Servicio::find($id);
        $servicio->update($request->all());
        return redirect('servicios')->with('type','success')
                                     ->with('msn','Registro creado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
