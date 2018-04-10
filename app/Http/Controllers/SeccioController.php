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
	    $dataAnimal = ModelAnimal::find($input['animal_id']);
	    $dataSeccio = new ModelSeccio();
	    $dataSeccio->title = $input['title'];
	    $dataSeccio->description = $input['description'];
	    $dataSeccio->list = $input['list'];
	    $dataSeccio->imatge = $input['imatge'];
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
       $data['seccio'] = ModelSeccio::find($id);
       if($data['seccio'] == null){
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
      $dataSeccio->title = $input['title'];
	  $dataSeccio->description = $input['description'];
	  $dataSeccio->list = $input['list'];
	  $dataSeccio->imatge = $input['imatge'];
	  $dataSeccio->status = $input['status'];
      $dataSeccio->save();
      $data = ModelAnimal::get();
      return redirect()->action('AnimalController@index');  
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
