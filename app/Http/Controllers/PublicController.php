<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAnimal;
use App\ModelCategoria;
use App\ModelSeccio;
use App\ModelApadrina;
use App\ModelColaborador;
use App\ModelContacta;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class PublicController extends Controller
{
    public function indexPublic() {
	    $data = ModelCategoria::get()->where('status', 1);
      $apadrina = ModelApadrina::get()->where('status', 1)->random(3);
      $animals = ModelAnimal::get()->where('status', 1)->sortByDesc('updated_at')->take(4);
      $colaboradors = ModelColaborador::get()->where('status', 1);
      $contacta = ModelContacta::get();
	    return view('public.index')
      ->with('data', $data)
      ->with('apadrina', $apadrina)
      ->with('animals', $animals)
      ->with('colaboradors', $colaboradors)
      ->with('contacta', $contacta);
	    //return $data;
	}
	public function getAnimals($familia) {
    //Obtenir categories amb nom familia
    $familiaCategoria = ModelCategoria::where('title', $familia)->get();
    //Obtenir id
    $idCategoria = $familiaCategoria[0]->id;
    $apadrina = ModelApadrina::get()->where('status', 1)->where('categoria_id', $idCategoria);
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
        ->with('apadrina', $apadrina)
        ->with('animals', $animals)
        ->with('colaboradors', $colaboradors)
        ->with('contacta', $contacta);
  	}
  	public function getAnimal($familia, $especie) {
        //Obtenir categories amb nom familia
        $especieAnimal = ModelAnimal::where('title', $especie)->get();
        //Obtenir id
        $idFamilia = $especieAnimal[0]->id;
        $apadrina = ModelApadrina::get()->where('status', 1)->where('animal_id', $idFamilia);
  		$especie = ModelAnimal::where('title', $especie)->first();
        $seccions = ModelAnimal::find($especie->id)->seccions;
        $contacta = ModelContacta::get();
  		$especie['seccions'] = $seccions;
        return view('public.especie')
            ->with('especie', $especie)
            ->with('apadrina', $apadrina)
            ->with('contacta', $contacta);
       	return $especie;

      }
      public function getApadrina($apadrina) {
        //Obtenir categories amb nom familia
        $apadrinaAnimal = ModelApadrina::where('nom', $apadrina)->get();
        return view('public.animals.apadrina')
            ->with('apadrina', $apadrinaAnimal);
       	return $especie;

  	}
}
