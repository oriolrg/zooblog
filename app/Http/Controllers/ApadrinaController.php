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
    $post->apadrinat = 0;
    $post->status = $input['status'];
    $post->save(); // Guarda el objeto en la BD
    $dataAnimal = ModelAnimal::get();
    $dataCategoria = ModelCategoria::get();
    $dataApadrina = ModelApadrina::get();
    return view('administra.apadrina.list-apadrina')->with('dataApadrina', $dataApadrina)->with('dataCategoria', $dataCategoria)->with('dataAnimal', $dataAnimal);;
    //return view('administra.list-familia');
  }
  public function destroy($id) {
    $post = ModelApadrina::find($id);
    if($post == null)
       return "error";
    else
       $post->delete();
  }
      
}
