<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAnimal;
use App\ModelCategoria;
use Illuminate\Support\Facades\Input;

class AnimalController extends Controller
{
    public function index() {
     
    $dataAnimal = ModelAnimal::get();
    $dataCategoria = ModelCategoria::get();
    return view('administra.animal.list-animal')->with('dataCategoria', $dataCategoria)->with('dataAnimal', $dataAnimal);
     //return $data;
  }
    public function store() {
    $input = Input::all();
    $post = new ModelAnimal();
    $post->title = $input['title'];
    $post->description = $input['description'];
    $post->imatge = $input['imatge'];
    $post->status = $input['status'];
    $post->save(); // Guarda el objeto en la BD
    $dataAnimal = ModelAnimal::get();
    $dataCategoria = ModelCategoria::get();
    return view('administra.animal.list-animal')->with('dataCategoria', $dataCategoria)->with('dataAnimal', $dataAnimal);
    //return view('administra.list-categoria');
  }
  public function edit($id = null) {

    if ($id == null){
      return view('administra.animal.edit-animal');
    }else{
       $data['animal'] = ModelAnimal::find($id);
       if($data['animal'] == null){
          return 'El post no existe';
       }
       return view('administra.animal.edit-animal', $data);
   }
  }
  public function update($id = null) {

    if ($id == null){
      $data = ModelAnimal::get();
      return view('administra.animal.list-categoria')->with('data', $data);
    }else{
      $input = Input::all();
      $animal = ModelAnimal::find($id);
      $animal->title = $input['title'];
      $animal->description = $input['description'];
      $animal->imatge = $input['imatge'];
      $animal->status = $input['status'];
      $animal->save();
      $data = ModelAnimal::get();
      return redirect()->action('AnimalController@index');  
   }
  }
  public function destroy($id) {
    $post = ModelAnimal::find($id);
    if($post == null)
       return "No existe este post";
    else
       $post->delete();
  }
}
