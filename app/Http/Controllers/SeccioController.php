<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAnimal;
use App\ModelSeccio;
use Illuminate\Support\Facades\Input;

class SeccioController extends Controller
{
	public function show($id) {
    	$dataAnimal = ModelAnimal::find($id);
	    $dataSeccio = ModelSeccio::get()->where('animal_id', $id);
	    return view('administra.animal.seccions.list-seccio')->with('dataSeccio', $dataSeccio)->with('dataAnimal', $dataAnimal);
  	}
  	public function store() {
	    $input = Input::all();
      if(isset($input['file1'])){
        $fileprincipal = $input['file1'];
        //obtenir nom imatge principal
        $nomprincipal = $fileprincipal->getClientOriginalName();
        //Guardat imatges en local
        \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
        $dataSeccio->imatge = $nomprincipal;
      }
	    $dataAnimal = ModelAnimal::find($input['animal_id']);
	    $dataSeccio = new ModelSeccio();
	    $dataSeccio->title = $input['title'];
	    $dataSeccio->description = $input['description'];
	    $dataSeccio->list = $input['list'];
	    $dataSeccio->status = $input['status'];
	    $dataSeccio->animal_id = $input['animal_id'];
	    $dataSeccio->save(); // Guarda el objeto en la BD
	    $dataSeccio = ModelSeccio::get();
	    return view('administra.animal.seccions.list-seccio')->with('dataSeccio', $dataSeccio)->with('dataAnimal', $dataAnimal);
	    //return view('administra.list-categoria');
  }
  public function edit($id = null) {

    if ($id == null){
      return view('administra.animal.seccions.edit-seccio');
    }else{
       $data['editdata'] = ModelSeccio::find($id);
       if($data['editdata'] == null){
          return 'El post no existe';
       }
       return view('administra.animal.seccions.edit-seccio', $data);
   }
  }
  public function update($id = null) {

    if ($id == null){
      $data = ModelSeccio::get();
      return view('administra.animal.seccions.list-seccio')->with('data', $data);
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
  	  $dataSeccio->description = $input['description'];
  	  $dataSeccio->list = $input['list'];
  	  $dataSeccio->status = $input['status'];
      $dataSeccio->save();
      return redirect()->action('SeccioController@show', ['id' => $dataSeccio->animal_id]);
   }
  }
  public function destroy($id) {
    $post = ModelSeccio::find($id);
    if($post == null)
       return "No existe este post";
    else
       $post->delete();
  }
}
