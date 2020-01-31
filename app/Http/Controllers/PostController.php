<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return $posts->toJson();
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required'
        ];
        $messages = [
            'title.required' => 'El titulo es requerido',
            'title.unique' => 'El titulo debe ser unico',
            'title.max' => 'El titulo excede los 255 caracteres',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ]);
        }

        $post = Post::create($request->all());
        return response()->json(
            [
                'status' => 'success',
                'data' => $post
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);
        return $post->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //Post::destroy($id);
        $post = Post::find($id);

        if($post){

            $post->delete();

            return response()->json([
                'status' => 'success', 'data_deleted' => $post
            ]);
        }else{

            return response()->json([
                'status' => 'error', 'data_deleted' => null, 'errors' => 'El registro no existe'
            ]);
        }


    }
}
