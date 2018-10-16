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
      $animals = ModelAnimal::get()->where('status', 1)->sortByDesc('updated_at')->take(4);
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
	public function getAnimals($familia) {
    $quisom = ModelQuisom::get()->where('status', 1);
    $animals = ModelAnimal::get()->where('status', 1);
    $colaboradors = ModelColaborador::get()->where('status', 1);
    $contacta = ModelContacta::get();
		$data = ModelCategoria::where('title', $familia)->first();
       	//$animals = ModelAnimal::where('categoria_id', $familia->id)->get();
       	//$seccions = ModelSeccio::where('animal_id', $especie->id)->get();
       	$data['animals'] = ModelCategoria::find($data->id)->animals;
       	return view('public.familia')
        ->with('data', $data)
        ->with('data', $data)
        ->with('quisom', $quisom)
        ->with('animals', $animals)
        ->with('colaboradors', $colaboradors)
        ->with('contacta', $contacta);
       	return $familia;

  	}
  	public function getAnimal($familia, $especie) {
  		$especie = ModelAnimal::where('title', $especie)->first();
  		$seccions = ModelAnimal::find($especie->id)->seccions;
  		$especie['seccions'] = $seccions;
		return view('public.especie')->with('especie', $especie);
       	return $especie;

  	}
}
