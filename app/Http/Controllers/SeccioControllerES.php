<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelSeccio;
use App\ModelSeccioES;
use Illuminate\Support\Facades\Input;

class SeccioControllerES extends Controller
{
  public function update($id = null) {
    $dataSeccioOR = ModelSeccio::find($id);
    if(count(ModelSeccioES::where('seccions_id',$id)->get()) != 0){
      $input = Input::all();
      $dataSeccio = ModelSeccioES::where('seccions_id',$id)->get()->first();
      $dataSeccio->title = $input['title'];
  	  $dataSeccio->description = nl2br($input['description']);
  	  $dataSeccio->list = nl2br($input['list']);
      $dataSeccio->alt_imatge = $input['alt_imatge'];      
      $dataSeccio->imatge = $dataSeccioOR->imatge;
      $dataSeccio->status = $dataSeccioOR->status;
      $dataSeccio->ordre = $dataSeccioOR->ordre;
      $dataSeccio->animal_id = $dataSeccioOR->animal_id;
      $dataSeccioOR->seccionsES()->save($dataSeccio);
    }else{
      $input = Input::all();
      $dataSeccio = new ModelSeccioES();
      $dataSeccio->title = $input['title'];
  	  $dataSeccio->description = nl2br($input['description']);
  	  $dataSeccio->list = nl2br($input['list']); 
      $dataSeccio->alt_imatge = $input['alt_imatge'];
      $dataSeccio->imatge = $dataSeccioOR->imatge;
      $dataSeccio->status = $dataSeccioOR->status;
      $dataSeccio->ordre = $dataSeccioOR->ordre;
      $dataSeccio->animal_id = $dataSeccioOR->animal_id;
      $dataSeccioOR->seccionsES()->save($dataSeccio);
    }
    return redirect()->action('SeccioController@show', ['id' => $dataSeccio->animal_id]);

  }
  public function destroy($id) {
    $post = ModelSeccio::find($id);
    if($post == null)
       return "No existe este post";
    else
       $post->delete();
  }
}
