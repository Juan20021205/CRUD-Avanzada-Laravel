<?php

namespace App\Http\Controllers;

use App\Models\marca;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['marca']=Marca::paginate(15);
        return view('marca.index',$datos);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marca.create');
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
        $campos=[
            'NombreMarca'=>'required|string|max:50',
            'Descripcion'=>'required|string|max:100',
            'Foto'=>'required|mimes:jpg,jpeg,bmp,png|max:500'
        ];
        $this->validate($request,$campos);

        $datosMarca = request()->except('_token','Enviar');
        
        if($request->hasFile('Foto')){
            $datosMarca ['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Marca::insert($datosMarca);
        return redirect('marca/')->with('msg','Se inserto la marca exitosamente');
       // return response()->json($datosMarca);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit($Id)
    {
        DB::table('marcas')->where('Id', '=', $Id);
        $marca = marca::findOrFail($Id);
        return view('marca.edit',compact('marca'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id)
    {
        //
        $datosMarca=request()->except('_token','_method');

        /*if($request->hasFile('Foto'));{
            $datosMarca ['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }*/
    
        marca::where('Id','=',$Id)->update($datosMarca);

        //$marca = marca::findOrFail($Id);
        return redirect('marca/')->with('msg','Se actualizo la marca exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id)
    {
        DB::table('marcas')->where('Id','=',$Id)->delete();
        return redirect('marca/')->with('msg','Se elimino la marca exitosamente');
        //
       // return response()->json('Hola');
    
    }
}