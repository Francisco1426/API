<?php

namespace App\Http\Controllers;
use App\producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Transformers\clienteTransformers;
use App\Http\Controllers\ApiController;


class productoscontroller extends ApiController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $producto = producto::all();
    
        return $this->showAll($producto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $producto = producto::create($campos);

        // return Autos::create ($campos);
        return response()->json(['data' =>$producto]);  




           /* $reglas = [
            'nombre' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required',
            'costo' => 'required'
            
        ];

        
        $this->validate($request, $reglas);

/*
        

        $producto = producto::create($producto);

        return $this->showOne($producto, 201);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = producto::findOrfail($id);
        
        return $this->showOne($producto);
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
        $producto = producto::findOrfail($id);

            if ($request->has('nombre')){
                $cliente->nombre =$request->nombre;
            }

            if ($request->has('descripcion') && $producto->descripcion != $request->descripcion){
                $producto->descripcion = $request->descripcion;
            }

             if ($request->has('cantidad') && $producto->cantidad != $request->cantidad){
                $producto->cantidad = $request->cantidad;
            }

         if ($request->has('costo') && $producto->costo != $request->costo){
                $producto->costo = $request->costo;
            }
        
        if (!$producto->isDirty()){
           return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
            
        }

        $producto->save();
        return response()->json(['data'=> $producto],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $producto = producto::findOrfail($id);
        $producto->delete();
        
        return $this->showOne($producto);
    }
}
