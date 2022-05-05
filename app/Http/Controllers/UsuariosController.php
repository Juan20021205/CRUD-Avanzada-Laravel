<?php

namespace App\Http\Controllers;

use App\Models\estado;
use App\Models\usuarios;
use App\Models\rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['usuarios']=Usuarios::join('rols', 'usuarios.IdRol', '=','rols.Id')
                                    ->join('estados', 'usuarios.IdEstado', '=','estados.Id')
                                    ->select('usuarios.Id','usuarios.Email','usuarios.Contraseña',
                                        'usuarios.Nombre','rols.Nombre as Rol','estados.Estado',
                                        'usuarios.Foto')
                                    ->paginate(15);
        return view('usuarios.index',$datos);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = estado::all();
        $rol = Rol::all();
        return view('usuarios.create',compact('estado','rol'));
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
            'Email'=>'required|string|max:50',
            'Contraseña'=>'required|string|max:50',
            'Nombre'=>'required|string|max:50',
            'Foto'=>'required|mimes:jpg,jpeg,bmp,png|max:500'
        ];
        $this->validate($request,$campos);

        $datosUsuarios = request()->except('_token','Enviar');
        
        if($request->hasFile('Foto')){
            $datosUsuarios['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Usuarios::insert($datosUsuarios);
        return redirect('usuarios/')->with('msg','Se inserto el usuario exitosamente');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($Id)
    {
        DB::table('usuarios')->where('Id', '=', $Id);
        $usuarios = Usuarios::findOrFail($Id);
        $estado = estado::all();
        $IdRol = $usuarios['IdRol'];
        $IdEstado = $usuarios['IdEstado'];
        $rol = Rol::all();
        return view('usuarios.edit',compact('usuarios','IdRol','rol','estado','IdEstado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id)
    {
        $datosUsuarios=request()->except('_token','_method');

        if($request->hasFile('Foto')){
            $datosUsuarios ['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }
    
        Usuarios::where('Id','=',$Id)->update($datosUsuarios);

        return redirect('usuarios/')->with('msg','Se actualizo el usuario exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id)
    {
        DB::table('usuarios')->where('Id','=',$Id)->delete();
        return redirect('usuarios/')->with('msg','Se elimino el usuario exitosamente');
    }
}
