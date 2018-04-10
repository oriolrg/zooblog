<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppModelsPost;
use Illuminate\Support\Facades\Input;

class CategoriaController extends Controller
{
  public function index() {
     $data = AppModelsPost::get();
     return view('administra.list-categoria')->with('data', $data);
     //return $data;
  }
  public function show($id) {
     return "Ver post, se pasa como parámetro la ID para buscarlo".$id;
  }
  public function store() {
    $input = Input::all();
    $post = new AppModelsPost();
    $post->title = $input['title'];
    $post->description = $input['description'];
    $post->imatge = $input['imatge'];
    $post->status = $input['status'];
    $post->save(); // Guarda el objeto en la BD
    $data = AppModelsPost::get();
    return view('administra.list-categoria')->with('data', $data);
    //return view('administra.list-categoria');
  }
  public function create($id = null) {

    if ($id == null){
      return view('administra.edit-post');
    }else{
       $data['post'] = AppModelsPost::find($id);
       if($data['post'] == null){
          return 'El post no existe';
       }
       return view('administra.edit-post', $data);
   }
  }
  public function edit($id = null) {

    if ($id == null){
      return view('administra.edit-post');
    }else{
       $data['post'] = AppModelsPost::find($id);
       if($data['post'] == null){
          return 'El post no existe';
       }
       return view('administra.edit-post', $data);
   }
  }
  public function update($id = null) {

    if ($id == null){
      $data = AppModelsPost::get();
      return view('administra.list-categoria')->with('data', $data);
    }else{
      $input = Input::all();
      $categoria = AppModelsPost::find($id);
      $categoria->title = $input['title'];
      $categoria->description = $input['description'];
      $categoria->imatge = $input['imatge'];
      $categoria->status = $input['status'];
      $categoria->save();
      $data = AppModelsPost::get();
      return redirect()->route('/administra');
   }
  }
  public function destroy($id) {
    $post = AppModelsPost::find($id);
    if($post == null)
       return "No existe este post";
    else
       $post->delete();
  }
}
