<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelApadrina;
use App\ModelApadrinaEN;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class ApadrinaControllerEN extends Controller
{

  public function update($id = null) {
    $post = ModelApadrina::find($id);
    if(count(ModelApadrinaEN::where('apadrina_id',$id)->get()) != 0){
      $input = Input::all();
      $apadrina = ModelApadrinaEN::where('apadrina_id',$id)->get()->first();
      $apadrina = $this->setApadrina($apadrina, $post, $input); 
    }else{
      $input = Input::all();
      $apadrina = new ModelApadrinaEN();
      $apadrina = $this->setApadrina($apadrina, $post, $input);
       
    }
      
    $post->apadrinaEN()->save($apadrina);
    return redirect()->action('ApadrinaController@index');
  }
  public function setApadrina($apadrina, $post, $input){
    $apadrina->nom = $input['nom'];
    $apadrina->description = $input['description'];
    $apadrina->imatge = $post->imatge;
    $apadrina->preu = $post->preu;
    $apadrina->categoria_id = $post->categoria_id;
    $apadrina->animal_id = $post->animal_id;
    $apadrina->apadrinat = 0;
    $apadrina->status = $post->status; 
    return $apadrina;
  }
  public function destroy($id) {
    $post = ModelApadrina::find($id);
    if($post == null)
       return "error";
    else
       $post->delete();
  }
  
      
}
