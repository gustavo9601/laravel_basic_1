<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Usamos la libreria que contiene la validacion
use Validator;

class ValidacionEntradasController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'title' => 'required|max:255',
            'body' => 'required'
        ];

        $messages_rules = [
            'title.required' => 'El titulo es requerido',
            'title.max' => 'Sobrepaso el limite de 255 caracteres'
        ];

        //Verificamos todos lo que llegue en la peticion y con las reglas su validacion
        $validator = Validator::make($request->all(), $reglas, $messages_rules);

        if($validator->fails()){
            return response()->json([
               'status' => 'error',
                'errors' => $validator->errors()
            ]);
        }else{
            return response()->json([
                'status' => 'success',
                'data' => $request->all()
            ]);}
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
