<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelApadrina;
use App\ModelApadrinaES;
use App\ModelApadrinaEN;
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
    return view('administra.apadrina.list-apadrina')
      ->with('dataApadrina', $dataApadrina)
      ->with('dataCategoria', $dataCategoria)
      ->with('dataAnimal', $dataAnimal);
    }
  public function store() {
    $input = Input::all();
    $post = new ModelApadrina();
    $post = $this->setApadrina($post, $input);
    $post->save(); // Guarda el objeto en la BD
    $dataAnimal = ModelAnimal::get();
    $dataCategoria = ModelCategoria::get();
    $dataApadrina = ModelApadrina::get();
    return view('administra.apadrina.list-apadrina')
      ->with('dataApadrina', $dataApadrina)
      ->with('dataCategoria', $dataCategoria)
      ->with('dataAnimal', $dataAnimal);
  }
  public function edit($id = null) {
    if ($id == null){
      return view('administra.apadrina.edit-apadrina');
    }else{
      $dataES = ModelApadrinaES::where('apadrina_id',$id)->get()->first();
      $dataEN = ModelApadrinaEN::where('apadrina_id',$id)->get()->first();
      $editdata = ModelApadrina::find($id);
      $dataAnimal = ModelAnimal::get();
      $dataCategoria = ModelCategoria::get();
      if($editdata == null){
        return 'El post no existe';
      }
      //return $dataEN;
      return view('administra.apadrina.edit-apadrina')
        ->with('editdata', $editdata)
        ->with('editdataES', $dataES)
        ->with('editdataEN', $dataEN)
        ->with('dataCategoria', $dataCategoria)
        ->with('dataAnimal', $dataAnimal);
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
      $post = $this->setApadrina($post, $input);
      $post->save(); // Guarda el objeto en la BD
      $data = ModelApadrina::get();
      return redirect()->action('ApadrinaController@index');
   }
  }
  public function setApadrina($post, $input){
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
    return $post;
  }
  public function destroy($id) {
    $post = ModelApadrina::find($id);
    if($post == null)
       return "error";
    else
       $post->delete();
  }
  
      
}
