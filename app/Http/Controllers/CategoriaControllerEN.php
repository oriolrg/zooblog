<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelCategoria;
use App\ModelCategoriaEN;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class CategoriaControllerEN extends Controller
{
  public function update($id = null) {
    $post = ModelCategoria::find($id);
    if(count(ModelCategoriaEN::where('categoriasEN_id',$id)->get()) != 0){
      $input = Input::all();
      $familia = ModelCategoriaEN::where('categoriasEN_id',$id)->get()->first();
      $familia = $this->setCategoria($familia, $post, $input);
      $post->familiaEN()->save($familia);
    }else{
      $input = Input::all();
      $familia = new ModelCategoriaEN();
      $familia = $this->setCategoria($familia, $post, $input);
      $post->familiaEN()->save($familia);
      $post->save();
    }
    return redirect()->action('CategoriaController@index');
   
  }
  public function setCategoria($familia, $post, $input){
    $familia->title = $input['title'];
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
