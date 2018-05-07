<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAnimal;
use App\ModelCategoria;
use App\ModelSeccio;
use App\ModelQuisom;
use App\ModelColaborador;
use App\ModelContacta;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class PublicController extends Controller
{
    public function indexPublic() {
	    $data = ModelCategoria::get()->where('status', 1);
      $quisom = ModelQuisom::get()->where('status', 1);
      $animals = ModelAnimal::get()->where('status', 1);
      $colaboradors = ModelColaborador::get()->where('status', 1);
      $contacta = ModelContacta::get();
	    return view('public.index')
      ->with('data', $data)
      ->with('quisom', $quisom)
      ->with('animals', $animals)
      ->with('colaboradors', $colaboradors)
      ->with('contacta', $contacta);
	    //return $data;
	}
	public function getAnimals($categoria) {
    $quisom = ModelQuisom::get()->where('status', 1);
    $animals = ModelAnimal::get()->where('status', 1);
    $colaboradors = ModelColaborador::get()->where('status', 1);
    $contacta = ModelContacta::get();
		$data = ModelCategoria::where('title', $categoria)->first();
       	//$animals = ModelAnimal::where('categoria_id', $categoria->id)->get();
       	//$seccions = ModelSeccio::where('animal_id', $animal->id)->get();
       	$data['animals'] = ModelCategoria::find($data->id)->animals;
       	return view('public.animals')
        ->with('data', $data)
        ->with('data', $data)
        ->with('quisom', $quisom)
        ->with('animals', $animals)
        ->with('colaboradors', $colaboradors)
        ->with('contacta', $contacta);
       	return $categoria;

  	}
  	public function getAnimal($categoria, $animal) {
  		$animal = ModelAnimal::where('title', $animal)->first();
  		$seccions = ModelAnimal::find($animal->id)->seccions;
  		$animal['seccions'] = $seccions;
		return view('public.animal')->with('animal', $animal);
       	return $animal;

  	}
}
