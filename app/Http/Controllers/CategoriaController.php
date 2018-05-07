<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelCategoria;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class CategoriaController extends Controller
{
  public function indexPublic() {
     $data = ModelCategoria::get();
     return view('public.index')->with('data', $data);;
     //return $data;
  }
  public function index() {
     $data = ModelCategoria::get();
     return view('administra.categoria.list-categoria')->with('data', $data);
     //return $data;
  }
  public function show($id) {
     return "Ver post, se pasa como parámetro la ID para buscarlo".$id;
  }
  public function store() {
    $input = Input::all();
    $post = new ModelCategoria();
    if(isset($input['file1'])){
      $fileprincipal = $input['file1'];
      //obtenir nom imatge principal
      $nomprincipal = $fileprincipal->getClientOriginalName();
      //Guardat imatges en local
      \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
      $post->imatge = $nomprincipal;
    }

    $post->title = $input['title'];
    $post->description = $input['description'];

    $post->status = $input['status'];
    $post->save(); // Guarda el objeto en la BD
    $data = ModelCategoria::get();
    return view('administra.categoria.list-categoria')->with('data', $data);
    //return view('administra.list-categoria');
  }
  public function create($id = null) {

    if ($id == null){
      return view('administra.categoria.edit-categoria');
    }else{
       $data['post'] = ModelCategoria::find($id);
       if($data['post'] == null){
          return 'El post no existe';
       }
       return view('administra.categoria.categoria.edit-categoria', $data);
   }
  }
  public function edit($id = null) {

    if ($id == null){
      return view('administra.categoria.edit-post');
    }else{
       $data['editdata'] = ModelCategoria::find($id);
       if($data['editdata'] == null){
          return 'El post no existe';
       }
       return view('administra.categoria.edit-categoria', $data);
   }
  }
  public function update($id = null) {

    if ($id == null){
      $data = ModelCategoria::get();
      return view('administra.categoria.list-categoria')->with('data', $data);
    }else{
      $input = Input::all();
      $categoria = ModelCategoria::find($id);
      if(isset($input['file1'])){
        $fileprincipal = $input['file1'];
        //obtenir nom imatge principal
        $nomprincipal = $fileprincipal->getClientOriginalName();
        //Guardat imatges en local
        \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
        $categoria->imatge = $nomprincipal;
      }
      $categoria->title = $input['title'];
      $categoria->description = $input['description'];
      $categoria->status = $input['status'];
      $categoria->save();
      $data = ModelCategoria::get();
      return redirect()->action('CategoriaController@index');
   }
  }
  public function destroy($id) {
    $post = ModelCategoria::find($id);
    if($post == null)
       return "No existe este post";
    else
       $post->delete();
  }
}
