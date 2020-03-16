<?php

namespace App\Http\Controllers;

use App\cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Transformers\clienteTransformers;
use App\Http\Controllers\ApiController;

class clientescontroller extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $cliente = cliente::all();
    
        return $this->showAll($cliente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $campos = $request->all();
        $cliente = cliente::create($campos);

        // return Autos::create ($campos);
        return response()->json(['data' =>$cliente]);






       /* $reglas = [
            'nombre' => 'required',
          'apellidos' => 'required',
          'ubicacion' => 'required',
          'email' => 'required',
          'password' => 'required',
          'telefono' => 'required'
        ];

        
        $this->validate($request, $reglas);

/*
        

        //$cliente = cliente::create($cliente);

        //return $this->showOne($cliente, 201);

         $cliente = new cliente($request->all());
        $cliente->save();

        return 'Exitoso';*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = cliente::findOrfail($id);
        
        return $this->showOne($cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $cliente = cliente::findOrfail($id);

            if ($request->has('nombre')){
                $cliente->nombre =$request->nombre;
            }

            if ($request->has('apellidos') && $cliente->apellidos != $request->apellidos){
                $cliente->apellidos = $request->apellidos;
            }

             if ($request->has('ubicacion') && $cliente->ubicacion != $request->ubicacion){
                $cliente->ubicacion = $request->ubicacion;
            }

             if ($request->has('email') && $cliente->email !=$request->email){
                $cliente->email = $request->email;
            }

            if ($request->has('password')) {
           $cliente->password = bcrypt($request->password);
         }

         if ($request->has('telefono') && $cliente->telefono != $request->telefono){
                $cliente->telefono = $request->telefono;
            }
        
        if (!$cliente->isDirty()){
           
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
            
        }

        $cliente->save();
        return response()->json(['data'=> $cliente],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $cliente = cliente::findOrfail($id);
        $cliente->delete();
        
        return $this->showOne($cliente);
    }
}
