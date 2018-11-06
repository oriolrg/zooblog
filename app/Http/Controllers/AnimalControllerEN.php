<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAnimal;
use App\ModelAnimalEN;
use App\ModelSeccio;
use Illuminate\Support\Facades\Input;

class AnimalControllerEN extends Controller
{
  public function update($id = null) {
    $post = ModelAnimal::find($id);
    if(count(ModelAnimalEN::where('animalsEN_id',$id)->get()) != 0){
      $input = Input::all();
      $especie = ModelAnimalEN::where('animalsEN_id',$id)->get()->first();
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
      $especie->alt_imatge = $input['alt_imatge'];
      $post->animalsEN()->save($especie);
   }else{
      $input = Input::all();
      $especie = new ModelAnimalEN();
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
      $especie->alt_imatge = $input['alt_imatge'];
      $post->animalsEN()->save($especie);
      $post->save();
   }
  return redirect()->action('AnimalController@index');
  }
  public function destroy($id) {
    $post = ModelAnimal::find($id);
    if($post == null)
       return "No existe este post";
    else
       $post->delete();
  }
}
