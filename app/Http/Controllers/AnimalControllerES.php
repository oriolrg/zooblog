<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAnimal;
use App\ModelAnimalES;
use App\ModelSeccio;
use Illuminate\Support\Facades\Input;

class AnimalControllerES extends Controller
{
  public function update($id = null) {
    $post = ModelAnimal::find($id);
    if(count(ModelAnimalES::where('animalsES_id',$id)->get()) != 0){
      $input = Input::all();
      $especie = ModelAnimalES::where('animalsES_id',$id)->get()->first();
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
      $especie->imatge = $post->imatge;
      $especie->status = $post['status']; 
      $especie->categoria_id = $post['categoria_id']; 
      $post->animalsES()->save($especie);
   }else{
      $input = Input::all();
      $especie = new ModelAnimalES();
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
      $especie->imatge = $post->imatge;
      $especie->status = $post['status']; 
      $especie->categoria_id = $post['categoria_id'];      
      $post->animalsES()->save($especie);
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
