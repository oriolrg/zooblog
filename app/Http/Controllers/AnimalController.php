<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAnimal;
use App\ModelAnimalES;
use App\ModelAnimalEN;
use App\ModelCategoria;
use App\ModelSeccio;
use Illuminate\Support\Facades\Input;

class AnimalController extends Controller
{
  public function index() {

    $dataAnimal = ModelAnimal::get();
    $dataCategoria = ModelCategoria::get();
    $dataSeccio = ModelSeccio::get();
    return view('administra.especie.list-especie')
      ->with('dataCategoria', $dataCategoria)
      ->with('dataAnimal', $dataAnimal)
      ->with('dataSeccio', $dataSeccio);
  }
  public function store() {
    $input = Input::all();
    $especie = new ModelAnimal();
    $especie = $this->setAnimal($especie, $input);
    $especie->save(); // Guarda el objeto en la BD
    return redirect()->action('AnimalController@index');
  }
  public function edit($id = null) {
    if ($id == null){
      return view('administra.especie.edit-especie');
    }else{
      $dataES = ModelAnimalES::where('animalsES_id',$id)->get()->first();
      $dataEN = ModelAnimalEN::where('animalsEN_id',$id)->get()->first();
      $editdata = ModelAnimal::find($id);
      $dataCategoria = ModelCategoria::get();
      $dataSeccio = ModelSeccio::get()->where('animal_id', $id);
      if($editdata == null){
        return 'El post no existe';
      }
      //return $dataEN;
      return view('administra.especie.edit-especie')
        ->with('editdata', $editdata)
        ->with('editdataES', $dataES)
        ->with('editdataEN', $dataEN)
        ->with('dataCategoria', $dataCategoria);
    }
  }
  public function update($id = null) {

    if ($id == null){
      $data = ModelAnimal::get();
      return view('administra.especie.list-familia')->with('data', $data);
    }else{
      $input = Input::all();
      $especie = ModelAnimal::find($id);
      $especie = $this->setAnimal($especie, $input);
      $especie->save();
      $data = ModelAnimal::get();
      return redirect()->action('AnimalController@index');
   }
  }
  public function setAnimal($especie, $input){
    if(isset($input['file1'])){
        $fileprincipal = $input['file1'];
        //obtenir nom imatge principal
        $nomprincipal = $fileprincipal->getClientOriginalName();
        //Guardat imatges en local
        \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
        $especie->imatge = $nomprincipal;
      }
      $especie->title = $input['title'];
      $especie->nomcientific = $input['nomcientific'];
      $especie->ocurrencia = $input['ocurrencia'];
      $especie->mida = $input['mida'];
      $especie->pes = $input['pes'];
      $especie->embaras = $input['embaras'];
      $especie->cries = $input['cries'];
      $especie->vida = $input['vida'];
      $especie->dieta = $input['dieta'];
      $especie->proteccio = $input['proteccio'];
      $especie->description = $input['description'];
      $especie->status = $input['status'];
      $especie->categoria_id = $input['familia'];
      $especie->alt_imatge = $input['alt_imatge'];
      return $especie;
  }
  public function destroy($id) {
    $post = ModelAnimal::find($id);
    if($post == null)
       return "No existe este post";
    else
       $post->delete();
  }
}
