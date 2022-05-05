<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['rol']=Rol::paginate(15);
        return view('rol.index',$datos);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rol.create');
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
            'Nombre'=>'required|string|max:50',
            'Foto'=>'required|mimes:jpg,jpeg,bmp,png|max:500'
        ];
        $this->validate($request,$campos);

        $datosRol = request()->except('_token','Enviar');

        if($request->hasFile('Foto')){
            $datosRol ['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Rol::insert($datosRol);
        return redirect('rol/')->with('msg','Se inserto el rol exitosamente');

        //return response()->json($datosRol);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit($Id)
    {
        //DB::table('rols')->where('Id', '=', $Id);
        $rol=rol::findOrFail($Id);
        return view('rol.edit',compact('rol'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id)
    {
        $datosRol=request()->except('_token','_method');

       if($request->hasFile('Foto')){
            $datosRol ['Foto']=$request->file('Foto')->store('uploads', 'public');
        }
    
        rol::where('Id','=',$Id)->update($datosRol);
        
        return redirect('rol/')->with('msg','Se actualizo el rol exitosamente');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id)
    {
        //Rol::destroy($Id);
        DB::table('rols')->where('Id','=',$Id)->delete();
        return redirect('rol/')->with('msg','Se elimino el rol exitosamente');
        //
    }
}
