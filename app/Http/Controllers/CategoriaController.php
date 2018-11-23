<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelCategoria;
use App\ModelCategoriaES;
use App\ModelCategoriaEN;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class CategoriaController extends Controller
{
  public function index() {
     $data = ModelCategoria::get();
     return view('administra.familia.list-familia')
      ->with('data', $data);
  }
  public function store() {
    $input = Input::all();
    $post = new ModelCategoria();
    $familia = $this->setCategoria($post, $input);
    $post->save(); // Guarda el objeto en la BD
    $data = ModelCategoria::get();
    return view('administra.familia.list-familia')
      ->with('data', $data);
  }
  public function create($id = null) {
    if ($id == null){
      return view('administra.familia.edit-familia');
    }else{
       $data['post'] = ModelCategoria::find($id);
       if($data['post'] == null){
          return 'El post no existe';
       }
       return view('administra.familia.familia.edit-familia', $data);
   }
  }
  public function edit($id = null) {
    if ($id == null){
      return view('administra.familia.edit-post');
    }else{
      $dataES = ModelCategoriaES::where('categoriasES_id',$id)->get()->first();
      $dataEN = ModelCategoriaEN::where('categoriasEN_id',$id)->get()->first();
      $editdata = ModelCategoria::find($id);
      if($editdata == null){
        return 'El post no existe';
      }
      return view('administra.familia.edit-familia')
        ->with('editdata', $editdata)
        ->with('editdataES', $dataES)
        ->with('editdataEN', $dataEN);
    }
  }
  public function update($id = null) {
    if ($id == null){
      $data = ModelCategoria::get();
      return view('administra.familia.list-familia')
        ->with('data', $data);
    }else{
      $input = Input::all();
      $familia = ModelCategoria::find($id);
      $familia = $this->setCategoria($familia, $input);
      $familia->save();
      $data = ModelCategoria::get();
      return redirect()->action('CategoriaController@index');
   }
  }
  public function setCategoria($familia, $input){
    if(isset($input['file1'])){
        $fileprincipal = $input['file1'];
        //obtenir nom imatge principal
        $nomprincipal = $fileprincipal->getClientOriginalName();
        //Guardat imatges en local
        \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
        $familia->imatge = $nomprincipal;
    }
    $familia->title = $input['title'];
    $familia->nomcientific = $input['nomcientific'];
    $familia->description = $input['description'];
    $familia->alt_imatge = $input['alt_imatge'];
    $familia->status = $input['status'];
    return $familia;
  }
  public function destroy($id) {
    $post = ModelCategoria::find($id);
    if($post == null)
       return "error";
    else
       $post->delete();
  }
}
