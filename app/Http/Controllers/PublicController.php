<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAnimal;
use App\ModelCategoria;
use App\ModelSeccio;
use App\ModelQuisom;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class PublicController extends Controller
{
    public function indexPublic() {
	    $data = ModelCategoria::get()->where('status', 1);
      $quisom = ModelQuisom::get()->where('status', 1);
	    return view('public.index')->with('data', $data)->with('quisom', $quisom);
	    //return $data;
	}
	public function getAnimals($categoria) {
		$data = ModelCategoria::where('title', $categoria)->first();
       	//$animals = ModelAnimal::where('categoria_id', $categoria->id)->get();
       	//$seccions = ModelSeccio::where('animal_id', $animal->id)->get();
       	$data['animals'] = ModelCategoria::find($data->id)->animals;
       	return view('public.animals')->with('data', $data);
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
