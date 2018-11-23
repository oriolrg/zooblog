<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelCategoria;
use App\ModelCategoriaES;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class CategoriaControllerES extends Controller
{
  public function update($id = null) {
    $post = ModelCategoria::find($id);
    if(count(ModelCategoriaES::where('categoriasES_id',$id)->get()) != 0){
      $input = Input::all();
      $familia = ModelCategoriaES::where('categoriasES_id',$id)->get()->first();
      $familia = $this->setCategoria($familia, $post, $input);
      $post->familiaES()->save($familia);
    }else{
      $input = Input::all();
      $familia = new ModelCategoriaES();
      $familia = $this->setCategoria($familia, $post, $input);
      $post->familiaES()->save($familia);
      $post->save();
    }
    return redirect()->action('CategoriaController@index');
   
  }
  public function setCategoria($familia, $post, $input){
    $familia->title = $input['title'];
    $familia->nomcientific = $input['nomcientific'];
    $familia->description = $input['description'];
    $familia->alt_imatge = $input['alt_imatge'];
    $familia->imatge = $post->imatge;
    $familia->status = $post->status;
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
