<?php

namespace App\Http\Controllers;

use App\Models\productos;
use App\Models\marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['productos']=Productos::join('marcas', 'productos.IdMarca', '=','marcas.Id')
                                    ->select('productos.Id','productos.NombreProduc','productos.Costo',
                                    'productos.Precio','productos.Cantidad','marcas.NombreMarca',
                                    'productos.Foto')
                                    ->paginate(15);
        //return response()->json($datos);
       return view('productos.index',$datos);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marca = Marca::all();
        $data = array("marcas"=>$marca);
        return response()->view('productos.create',$data,200);
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
            'NombreProduc'=>'required|string|max:50',
            'Costo'=>'required|numeric|min:1',
            'Precio'=>'required|numeric|min:1',
            'Cantidad'=>'required|numeric|min:1',
            'Foto'=>'required|mimes:jpg,jpeg,bmp,png|max:500'
        ];
        $this->validate($request,$campos);

        $datosProductos = request()->except('_token','Enviar');
        
        if($request->hasFile('Foto')){
            $datosProductos['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Productos::insert($datosProductos);
        return redirect('productos/')->with('msg','Se inserto el producto exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($Id)
    {
        DB::table('productos')->where('Id', '=', $Id);
        $productos = Productos::findOrFail($Id);
        $IdMarca = $productos['IdMarca'];
        $marcas = Marca::all();
        return view('productos.edit',compact('productos','IdMarca','marcas'));
        //return response()->json($IdMarca);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id)
    {
        $datosProductos=request()->except('_token','_method');

        if($request->hasFile('Foto')){
            $datosProductos ['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }
    
        productos::where('Id','=',$Id)->update($datosProductos);

        return redirect('productos/')->with('msg','Se actualizo el producto exitosamente');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id)
    {
        DB::table('productos')->where('Id','=',$Id)->delete();
        return redirect('productos/')->with('msg','Se elimino el producto exitosamente');
        // 
    }
}
