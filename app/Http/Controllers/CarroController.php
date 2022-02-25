<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Models\Brands;
use Illuminate\Http\Request;
// use App\Http\Controllers\CarroController;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $carros =   Carro::all();
    
        $datosc['carros'] =  Carro::paginate(4);


     //   return view('Cars.index',compact('carros'));
        return view('Cars.index',$datosc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     //   $marca= Carro::all()->first();
      //  dd($marca->brand_relacion->Name);
         // $marcas= [];
          $marcas = Brands::all()->pluck('Name', 'id');
        //dd($marcas);
    
        return view('Cars.create',compact('marcas'));
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd("dsdsds  ");
     // dd($request->all());
      //   $datoscars= request()->all();

          $validacion_datos=[
          'name'=>'required|string|max:100',
          'model'=>'required|string|max:4'
          ];

          $validacion_mensaje=[
            'name.required' => 'El Nombre es requerido',
            'model.required' => 'El Modelo es requerido',
            'model.max' => 'Maximo 4 caracteres en Modelo'
          ];

          $this->validate($request, $validacion_datos, $validacion_mensaje);


           $onecar= new Carro();
           $onecar->Brand_id=$request->brand_id;
           $onecar->Name=$request->name;
           $onecar->Model=$request->model;
           $onecar->save();

          // $datoscars= request()->except('_token');
         //  Carro::insert($datoscars);

      //   return redirect()->back();  -- Misma pagina 
        return redirect('cars')->with('mensaje','Registro agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $marcas = Brands::all()->pluck('Name', 'id');
        $showcar = Carro::findOrFail($id);

        return view('cars.show', compact('marcas','showcar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $carroedit = Carro::findOrFail($id);
       // $marcas= [];
       $marcas = Brands::all()->pluck('Name', 'id');
       
        
        return view('Cars.edit', compact('marcas','carroedit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validacion_datos=[
            'name'=>'required|string|max:100',
            'model'=>'required|string|max:4'
            ];
  
            $validacion_mensaje=[
              'name.required' => 'El Nombre es requerido',
              'model.required' => 'El Modelo es requerido',
              'model.max' => 'Maximo 4 caracteres en Modelo'
            ];
  
            $this->validate($request, $validacion_datos, $validacion_mensaje);
       
         $carroupdate = Carro::findOrFail($id);

        
        $carroupdate->Brand_id=$request->brand_id;
        $carroupdate->Name=$request->name;
        $carroupdate->Model=$request->model;
        $carroupdate->save();

       
        
       
        Return redirect () ->back ()->with('mensaje','Registro Actualizado');;
    
      //  return view('Cars.edit', compact('marcas','carroedit'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Carro::destroy($id);
        return redirect('cars')->with('mensaje','Registro Eliminado');
    }

    public function getBrand(){
        //
      //  $marcas= Brands::all()->pluck('Name', 'id');
          $marcas= Brands::all();
        return $marcas;
    }
}
