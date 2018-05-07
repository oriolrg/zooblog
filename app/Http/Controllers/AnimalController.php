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
    if(isset($input['file1'])){
      $fileprincipal = $input['file1'];
      //obtenir nom imatge principal
      $nomprincipal = $fileprincipal->getClientOriginalName();
      //Guardat imatges en local
      \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
      $post->imatge = $nomprincipal;
    }
    $post->title = $input['title'];
    $post->nomcientific = $input['nomcientific'];
    $post->ocurrencia = $input['ocurrencia'];
    $post->mida = $input['mida'];
    $post->pes = $input['pes'];
    $post->embaras = $input['embaras'];
    $post->cries = $input['cries'];
    $post->vida = $input['vida'];
    $post->dieta = $input['dieta'];
    $post->proteccio = $input['proteccio'];
    $post->description = $input['description'];
    $post->status = $input['status'];
    $post->categoria_id = $input['categoria'];
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
       $data['editdata'] = ModelAnimal::find($id);
       $dataCategoria = ModelCategoria::get();
       if($data['editdata'] == null){
          return 'El post no existe';
       }
       return view('administra.animal.edit-animal', $data)->with('dataCategoria', $dataCategoria);
   }
  }
  public function update($id = null) {

    if ($id == null){
      $data = ModelAnimal::get();
      return view('administra.animal.list-categoria')->with('data', $data);
    }else{
      $input = Input::all();
      $animal = ModelAnimal::find($id);
      if(isset($input['file1'])){
        $fileprincipal = $input['file1'];
        //obtenir nom imatge principal
        $nomprincipal = $fileprincipal->getClientOriginalName();
        //Guardat imatges en local
        \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
        $animal->imatge = $nomprincipal;
      }
      $animal->title = $input['title'];
      $animal->nomcientific = $input['nomcientific'];
      $animal->ocurrencia = $input['ocurrencia'];
      $animal->mida = $input['mida'];
      $animal->pes = $input['pes'];
      $animal->embaras = $input['embaras'];
      $animal->cries = $input['cries'];
      $animal->vida = $input['vida'];
      $animal->dieta = $input['dieta'];
      $animal->proteccio = $input['proteccio'];
      $animal->description = $input['description'];
      $animal->status = $input['status'];
      $animal->categoria_id = $input['categoria'];
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
