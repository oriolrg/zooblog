<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelSeccio;
use App\ModelSeccioEN;
use Illuminate\Support\Facades\Input;

class SeccioControllerEN extends Controller
{
  public function update($id = null) {
    $dataSeccioOR = ModelSeccio::find($id);
    if(count(ModelSeccioEN::where('seccions_id',$id)->get()) != 0){
      $input = Input::all();
      $dataSeccio = ModelSeccioEN::where('seccions_id',$id)->get()->first();
      $dataSeccio = $this->setSeccio($dataSeccio, $dataSeccioOR, $input);
      $dataSeccio->animal_id = $dataSeccioOR->animal_id;
      $dataSeccioOR->seccionsEN()->save($dataSeccio);
    }else{
      $input = Input::all();
      $dataSeccio = new ModelSeccioEN();
      $dataSeccio = $this->setSeccio($dataSeccio, $dataSeccioOR, $input);
      $dataSeccioOR->seccionsEN()->save($dataSeccio);
    }
    return redirect()->action('SeccioController@show', ['id' => $dataSeccio->animal_id]);

  }
  public function setSeccio($dataSeccio, $dataSeccioOR, $input){
    $dataSeccio->title = $input['title'];
  	$dataSeccio->description = nl2br($input['description']);
    $dataSeccio->list = nl2br($input['list']);   
    $dataSeccio->alt_imatge = $input['alt_imatge'];
    $dataSeccio->imatge = $dataSeccioOR->imatge;
    $dataSeccio->status = $dataSeccioOR->status;
    $dataSeccio->ordre = $dataSeccioOR->ordre;
    return $dataSeccio;
  }
  public function destroy($id) {
    $post = ModelSeccioEN::find($id);
    if($post == null)
       return "No existe este post";
    else
       $post->delete();
  }
}
