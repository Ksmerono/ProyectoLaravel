<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['proyectos']=Proyecto::paginate(5);
        return view('proyecto.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyecto.create');
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
        //

        $campos=[
            'Nombre'=>'required|string|max:150',
            'Area'=>'required|string|max:150',
            'Estado'=>'required|string|max:150',
            'Fecha_Inicio'=>'required|date',
            'Fecha_Final'=>'required|date',
            'id_empleado'=>'required|integer'
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Area.required'=>'La Area es requerida',
            'Fecha_Inicio.required'=>'La Fecha inicial es requerida',
            'Fecha_Final.required'=>'La Fecha finalización es requerida'

        ];

        $this->validate($request,$campos,$mensaje);





        //$datosProyecto = request()->all();
        $datosProyecto = request()->except('_token');

        $idempleado= request()->input('id_empleado');
        $empleado = DB::table('empleados')->where('id',$idempleado)->first();

        

        if(!$empleado){
            
            return redirect('proyecto/create')->with('mensajeAlert','Empleado no existente '."$idempleado" );
        }

        if($empleado){
            Proyecto::insert($datosProyecto);
            return redirect('proyecto')->with('mensaje','Proyecto agregado con éxito'); 
        }
        

        //if ($request->has($idempleado)){
        //Proyecto::insert($datosProyecto);
        //return redirect('proyecto')->with('mensaje','Proyecto agregado con éxito');
        //}

        

        //return response()->json($datosProyecto);


        //return redirect('proyecto')->with('mensajeAlert','Proyecto no agregado con éxito');

        //Proyecto::insert($datosProyecto);
        //return redirect('proyecto')->with('mensaje','Proyecto agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $proyecto=Proyecto::findOrFail($id);

        return view('proyecto.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos=[
            'Nombre'=>'required|string|max:150',
            'Area'=>'required|string|max:150',
            'Estado'=>'required|string|max:150',
            'Fecha_Inicio'=>'required|date',
            'Fecha_Final'=>'required|date',
            'id_empleado'=>'required|integer'
           
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Area.required'=>'La Area es requerida',
            'Fecha_Inicio.required'=>'La Fecha inicial es requerida',
            'Fecha_Final.required'=>'La Fecha finalización es requerida'

        ];

        $this->validate($request,$campos,$mensaje);




        

        $proyecto=Proyecto::findOrFail($id);
        //return view('proyecto.edit', compact('proyecto'));


        $idempleado= request()->input('id_empleado');
        $empleado = DB::table('empleados')->where('id',$idempleado)->first();

        if(!$empleado){
            
            return redirect('proyecto/'.$id.'/edit')->with('mensajeAlert','Empleado no existente '."$idempleado" );
        }

        if($empleado){
            $datosProyecto = request()->except(['_token','_method']);
            Proyecto::where('id','=',$id)->update($datosProyecto);

            return redirect('proyecto')->with('mensaje','Proyecto actualizado con éxito'); 

        }

        //return redirect('proyecto')->with('mensaje','Proyecto Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Proyecto::destroy($id);
        return redirect('proyecto')->with('mensaje','Proyecto Borrado');
    }
}
