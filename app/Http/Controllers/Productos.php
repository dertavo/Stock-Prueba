<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductosModel;


class Productos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

      
       $productos= ProductosModel::all();


        return view('productos.index',["productos"=>$productos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $producto=new ProductosModel;
        $operacion="nuevo";
        return view('productos.create',["operacion"=>$operacion,'producto'=>$producto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'sku' => 'required|min:4|',
            'nombre_producto' => 'max:60',
            'cantidad' => 'min:1',
            'precio' => 'numeric',
            'estado' => 'in:Activo,Inactivo',


        ]);

        $productos=new ProductosModel;
        $productos->sku=$request->sku;
        $productos->nombre_producto=$request->nombre_producto;
        $productos->cantidad=$request->cantidad;
        $productos->precio=$request->precio;
        $productos->estado=$request->estado;
        $productos->save();


        if($productos){
            return redirect('productos')->with('status','La solicitud se proceso
            correctamente');

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
        //
        echo "??";
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

        $operacion="editar";
        $producto=ProductosModel::find($id);
        return view('productos.edit',["operacion"=>$operacion,"producto"=>$producto]);
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
        //


        $validated = $request->validate([
            'sku' => 'required|min:4|',
            'nombre_producto' => 'max:60',
            'cantidad' => 'min:1',
            'precio' => 'numeric',
            'estado' => 'in:Activo,Inactivo',


        ]);

        $productos=ProductosModel::find($id);
        $productos->sku=$request->sku;
        $productos->nombre_producto=$request->nombre_producto;
        $productos->cantidad=$request->cantidad;
        $productos->precio=$request->precio;
        $productos->estado=$request->estado;
        $productos->save();


        if($productos){
            return redirect('productos')->with('status','La solicitud se proceso
            correctamente');

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
        //


        ProductosModel::find($id)->delete();

        return redirect('productos')->with('status','La solicitud se proceso
        correctamente');
    }
}
