<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelApadrina;
use App\ModelAnimal;
use App\ModelCategoria;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class ApadrinaController extends Controller
{
    public function index() {

    $dataApadrina = ModelApadrina::get();
    $dataAnimal = ModelAnimal::get();
    $dataCategoria = ModelCategoria::get();
    return view('administra.apadrina.list-apadrina')->with('dataApadrina', $dataApadrina)->with('dataCategoria', $dataCategoria)->with('dataAnimal', $dataAnimal);
     //return $data;
    }
    public function store() {

    $input = Input::all();
    $post = new ModelApadrina();
    if(isset($input['file1'])){
      $fileprincipal = $input['file1'];
      //obtenir nom imatge principal
      $nomprincipal = $fileprincipal->getClientOriginalName();
      //Guardat imatges en local
      \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
      $post->imatge = $nomprincipal;
    }

    $post->nom = $input['nom'];
    $post->description = $input['description'];
    $post->preu = $input['preu'];
    $post->categoria_id = $input['familia'];
    $post->animal_id = $input['especie'];
    $post->apadrinat = 0;
    $post->status = $input['status'];
    $post->save(); // Guarda el objeto en la BD
    $dataAnimal = ModelAnimal::get();
    $dataCategoria = ModelCategoria::get();
    $dataApadrina = ModelApadrina::get();
    return view('administra.apadrina.list-apadrina')->with('dataApadrina', $dataApadrina)->with('dataCategoria', $dataCategoria)->with('dataAnimal', $dataAnimal);
    
  }

  public function edit($id = null) {

    if ($id == null){
      index();
    }else{
       $data['editdata'] = ModelApadrina::find($id);
       if($data['editdata'] == null){
          return 'El post no existe';
       }
       $dataAnimal = ModelAnimal::get();
       $dataCategoria = ModelCategoria::get();
       return view('administra.apadrina.edit-apadrina', $data)->with('dataCategoria', $dataCategoria)->with('dataAnimal', $dataAnimal);
   }
  }

  public function update($id = null) {
    if ($id == null){
      $data = ModelApdrina::get();
      return view('administra.apadrina.list-apadrina')->with('data', $data);
    }else{
      $input = Input::all();
      //return $input;
      $post = ModelApadrina::find($id);
      if(isset($input['file1'])){
        $fileprincipal = $input['file1'];
        //obtenir nom imatge principal
        $nomprincipal = $fileprincipal->getClientOriginalName();
        //return $nomprincipal;
        //Guardat imatges en local
        \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
        $post->imatge = $nomprincipal;
      }
      $post->nom = $input['nom'];
      $post->description = $input['description'];
      $post->preu = $input['preu'];
      $post->categoria_id = $input['familia'];
      $post->animal_id = $input['especie'];
      $post->apadrinat = 0;
      $post->status = $input['status'];
      $post->save(); // Guarda el objeto en la BD
      $data = ModelApadrina::get();
      return redirect()->action('ApadrinaController@index');
   }
  }

  public function destroy($id) {
    $post = ModelApadrina::find($id);
    if($post == null)
       return "error";
    else
       $post->delete();
  }
  
      
}
