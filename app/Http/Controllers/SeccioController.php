<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAnimal;
use App\ModelSeccio;
use App\ModelSeccioES;
use App\ModelSeccioEN;
use Illuminate\Support\Facades\Input;

class SeccioController extends Controller
{
	public function show($id) {
    	$dataAnimal = ModelAnimal::find($id);
	    $dataSeccio = ModelSeccio::get()->where('animal_id', $id)->sortBy('ordre');
	    return view('administra.especie.seccions.list-seccio')->with('dataSeccio', $dataSeccio)->with('dataAnimal', $dataAnimal);
  	}
  	public function store() {
	    $input = Input::all();
			$dataSeccio = new ModelSeccio();
      if(isset($input['file1'])){
        $fileprincipal = $input['file1'];
        //obtenir nom imatge principal
        $nomprincipal = $fileprincipal->getClientOriginalName();
        //Guardat imatges en local
        \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
        $dataSeccio->imatge = $nomprincipal;
      }
	    $dataAnimal = ModelAnimal::find($input['animal_id']);
	    $dataSeccio->title = $input['title'];
	    $dataSeccio->description = nl2br($input['description']);
	    $dataSeccio->list = nl2br($input['list']);
      $dataSeccio->status = $input['status'];
      $this->reordena($input, $dataSeccio);
      $dataSeccio->animal_id = $input['animal_id'];
      $dataSeccio->alt_imatge = $input['alt_imatge'];
	    $dataSeccio->save(); // Guarda el objeto en la BD
	    $dataSeccio = ModelSeccio::get()->where('animal_id', $input['animal_id']);
			return redirect()->action('SeccioController@show', ['id' => $input['animal_id']]);
	    //return redirect(url()->current().'/'.$input['animal_id']);

  }
  public function edit($id = null) {

    if ($id == null){
      return view('administra.especie.seccions.edit-seccio');
    }else{
      $dataES = ModelSeccioES::where('seccions_id',$id)->get()->first();
      $dataEN = ModelSeccioEN::where('seccions_id',$id)->get()->first();
      $editdata= ModelSeccio::find($id);
      $dataSeccioUpdate = ModelSeccio::where('animal_id',$editdata->animal_id)->get();
      if($editdata == null){
        return 'El post no existe';
      }
      return view('administra.especie.seccions.edit-seccio')->with('editdata', $editdata)->with('editdataES', $dataES)->with('editdataEN', $dataEN)->with('dataSeccioUpdate', $dataSeccioUpdate);
    }
  }
  public function update($id = null) {

    if ($id == null){
      $data = ModelSeccio::get();
      return view('administra.especie.seccions.list-seccio')->with('data', $data);
    }else{
      $input = Input::all();
      $dataSeccio = ModelSeccio::find($id);
      if(isset($input['file1'])){
        $fileprincipal = $input['file1'];
        //obtenir nom imatge principal
        $nomprincipal = $fileprincipal->getClientOriginalName();
        //Guardat imatges en local
        \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
        $dataSeccio->imatge = $nomprincipal;
      }
      $dataSeccio->title = $input['title'];
  	  $dataSeccio->description = nl2br($input['description']);
  	  $dataSeccio->list = nl2br($input['list']);
      $dataSeccio->status = $input['status'];      
      $this->reordena($input, $dataSeccio);
      $dataSeccio->alt_imatge = $input['alt_imatge'];
      $dataSeccio->save();
      if(count(ModelSeccioEN::where('seccions_id',$id)->get()) != 0){
        $dataSeccioEN = ModelSeccioEN::where('seccions_id',$id)->get()->first();    
        $dataSeccioEN->imatge = $dataSeccio->imatge;
        $dataSeccioEN->status = $dataSeccio->status;
        $dataSeccioEN->ordre = $dataSeccio->ordre;
        $dataSeccio->seccionsEN()->save($dataSeccioEN);
      }
      if(count(ModelSeccioES::where('seccions_id',$id)->get()) != 0){
        $dataSeccioES = ModelSeccioES::where('seccions_id',$id)->get()->first();   
        $dataSeccioES->imatge = $dataSeccio->imatge;
        $dataSeccioES->status = $dataSeccio->status;
        $dataSeccioES->ordre = $dataSeccio->ordre;
        $dataSeccio->seccionsES()->save($dataSeccioES);
      }
      return redirect()->action('SeccioController@show', ['id' => $dataSeccio->animal_id]);
   }
  }
  public function reordena($input, $dataSeccio){
    $dataSeccio->ordre = $input['ordre'];
    $dataUpdate = ModelSeccio::get();
    foreach ($dataUpdate as $data){
      if($data->ordre >= $dataSeccio->ordre){
        $data->ordre += 1;
        $data->save();
      }      
    }
    return $dataSeccio;
  }
  public function destroy($id) {
    $post = ModelSeccio::find($id);
    if($post == null)
       return "No existe este post";
    else
       $post->delete();
  }
}
