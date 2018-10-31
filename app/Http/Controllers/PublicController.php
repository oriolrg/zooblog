<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAnimal;
use App\ModelCategoria;
use App\ModelSeccio;
use App\ModelApadrina;
use App\ModelColaborador;
use App\ModelContacta;
use App\ModelAdministra;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class PublicController extends Controller
{
    public function indexPublic() {
        $families = ModelCategoria::get()->where('status', 1);
        $apadrina = ModelApadrina::get()->where('status', 1);
        $especies = ModelAnimal::get()->where('status', 1)->sortByDesc('updated_at')->take(4);
        $colaboradors = ModelColaborador::get()->where('status', 1);
        $imatges = ModelCategoria::get()->where('status', 1);
        $contacta = ModelContacta::get();
        $administra = ModelAdministra::first();
        return view('public.index')
            ->with('imatges', $imatges)
            ->with('families', $families)
            ->with('apadrina', $apadrina->random(count($apadrina)))
            ->with('especies', $especies)
            ->with('colaboradors', $colaboradors)
            ->with('contacta', $contacta)
            ->with('administra', $administra);
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
        $families = ModelCategoria::get()->where('status', 1);
        $data = ModelCategoria::where('title', $familia)->first();
        $administra = ModelAdministra::get();
            //$animals = ModelAnimal::where('categoria_id', $familia->id)->get();
            //$seccions = ModelSeccio::where('animal_id', $especie->id)->get();
        $data['animals'] = ModelCategoria::find($data->id)->animals;
        return view('public.familia')
            ->with('families', $families)
            ->with('data', $data)
            ->with('apadrina', $apadrina)
            ->with('animals', $animals)
            ->with('colaboradors', $colaboradors)
            ->with('contacta', $contacta)
            ->with('administra', $administra);
  	}
  	public function getAnimal($familia, $especie) {
        //Obtenir categories amb nom familia
        $especieAnimal = ModelAnimal::where('title', $especie)->get();
        //Obtenir id
        $idFamilia = $especieAnimal[0]->id;
        $families = ModelCategoria::get()->where('status', 1);
        $apadrina = ModelApadrina::get()->where('status', 1)->where('animal_id', $idFamilia);
  		$especie = ModelAnimal::where('title', $especie)->first();
        $seccions = ModelAnimal::find($especie->id)->seccions;
        $colaboradors = ModelColaborador::get()->where('status', 1);
        $contacta = ModelContacta::get();
        $administra = ModelAdministra::get();
  		$especie['seccions'] = $seccions;
        return view('public.especie')
            ->with('families', $families)
            ->with('especie', $especie)
            ->with('apadrina', $apadrina)
            ->with('colaboradors', $colaboradors)
            ->with('contacta', $contacta)
            ->with('administra', $administra);
       	return $especie;

      }
      public function getApadrina($apadrina) {
        //Obtenir categories amb nom familia
        $families = ModelCategoria::get()->where('status', 1);
        $especies = ModelAnimal::get()->where('status', 1)->sortByDesc('updated_at')->take(4);
        $colaboradors = ModelColaborador::get()->where('status', 1);
        $apadrinaAnimal = ModelApadrina::where('nom', $apadrina)->get();
        $contacta = ModelContacta::get();
        $administra = ModelAdministra::get();
        return view('public.apadrina')
            ->with('apadrina', $apadrinaAnimal)
            ->with('families', $families)
            ->with('especies', $especies)
            ->with('colaboradors', $colaboradors)
            ->with('contacta', $contacta)
            ->with('administra', $administra);
       	return $especie;

  	}
}
