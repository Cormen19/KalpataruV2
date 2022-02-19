<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mensaje;
use Illuminate\Support\Facades\Validator;
use Auth;

class MensajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mensajes=Mensaje::all();
        return view('secciones.mensajes',['mensajes'=>$mensajes]);
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
        //Recibir datos
        $datos=$request->all();
        $usuario=Auth::user();
       //Validar datos
       $rules= array (
        'titulo' => 'required',
        'texto' => 'required',
        
       );

       $messages= array (
        'titulo.required' => 'El titulo es obligatorio',
        'texto.required' => 'El texto del mensaje es obligatorio',
        
       );

       $validador= Validator::make($datos,$rules,$messages);
       if($validador->fails()){
            $errors=$validador->messages();
            $errors->add('mierror','El mensaje no se ha creado correctamente');
            \Session::flash('tipoMensaje','danger');
            \Session::flash('mensaje','Error, no se cumplen las validaciones. Compruebe todos los campos');
            //Volver con los errores
            
            return \Redirect::back()->withInput()->withErrors($validador);
        }else{

                //Generar plotter
                $mensaje=new Mensaje();
                $mensaje->titulo=$datos["titulo"];
                
                $mensaje->texto=$datos["texto"];
                $mensaje->usuario_id=$usuario->id;
                
                $mensaje->save();
            try{
                //Almacenar en la BD
                
                
                    //Volver al listado
                    //Mensaje de OK
                    \Session::flash('tipoMensaje','success');
                    \Session::flash('mensaje','Mensaje creado correctamente');
                
            }catch(\Exception $e){
                //echo $e->getMessage();
                //Mensaje de KO
                \Session::flash('tipoMensaje','danger');
                \Session::flash('mensaje','Error al crear el mensaje');


            }
            return \Redirect::back();
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
        //
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
    }
}
