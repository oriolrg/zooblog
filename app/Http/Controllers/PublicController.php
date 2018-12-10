<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAnimal;
use App\ModelAnimalES;
use App\ModelAnimalEN;
use App\ModelCategoria;
use App\ModelCategoriaES;
use App\ModelCategoriaEN;
use App\ModelSeccio;
use App\ModelApadrina;
use App\ModelApadrinaES;
use App\ModelApadrinaEN;
use App\ModelColaborador;
use App\ModelContacta;
use App\ModelContactaES;
use App\ModelContactaEN;
use App\ModelAdministra;
use App\ModelPlataformaPagament;
use App\ModelPlataformaPagamentES;
use App\ModelPlataformaPagamentEN;
use App\ModelAdministraES;
use App\ModelAdministraEN;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use Lang;

class PublicController extends Controller
{
    public function indexPublic() {
        
        if(Session::get('locale')=='ca'){
            //catala
            $families = ModelCategoria::inRandomOrder()->get()->where('status', 1);
            $apadrina = ModelApadrina::get()->where('status', 1);
            $especies = ModelAnimal::get()->where('status', 1)->sortByDesc('updated_at')->take(4);
            $colaboradors = ModelColaborador::get()->where('status', 1);
            $contacta = ModelContacta::first();
            $administra = ModelAdministra::first();
        }elseif(Session::get('locale')=='es'){
            //TODO castella
            //return "castella";
            $families = ModelCategoriaES::inRandomOrder()->get()->where('status', 1);
            $apadrina = ModelApadrinaES::get()->where('status', 1);
            $especies = ModelAnimalES::get()->sortByDesc('updated_at')->take(4);
            $colaboradors = ModelColaborador::get()->where('status', 1);
            $contacta = ModelContactaES::first();
            $administra = ModelAdministraES::first();
        }else{
            //TODO angles i altres
            $families = ModelCategoriaEN::inRandomOrder()->get()->where('status', 1);
            $apadrina = ModelApadrinaEN::get()->where('status', 1);
            $especies = ModelAnimalEN::get()->sortByDesc('updated_at')->take(4);
            $colaboradors = ModelColaborador::get()->where('status', 1);
            $contacta = ModelContactaEN::first();
            $administra = ModelAdministraEN::first();
        }
        return view('public.index')
            ->with('header', $families->first())
            ->with('families', $families)
            ->with('apadrina', $apadrina->random(count($apadrina)))
            ->with('especies', $especies)
            ->with('colaboradors', $colaboradors)
            ->with('contacta', $contacta)
            ->with('administra', $administra);
	    //return $data;
	}
	public function getAnimals($familia) {
        if(Session::get('locale')=='ca'){
            //Obtenir categories amb nom familia
            $familiaCategoria = ModelCategoria::where('title', $familia)->first();
            $idCategoria = $familiaCategoria->id;
            //return $idCategoria;
            $apadrina = ModelApadrina::get()->where('status', 1)->where('categoria_id', $idCategoria);
            $animals = ModelAnimal::get()->where('status', 1);
            $colaboradors = ModelColaborador::get()->where('status', 1);
            $contacta = ModelContacta::first();
            $families = ModelCategoria::inRandomOrder()->get()->where('status', 1);
            $data = ModelCategoria::where('title', $familia)->first();
            $administra = ModelAdministra::first();
            $data['animals'] = ModelCategoria::find($data->id)->animals;
        }elseif(Session::get('locale')=='es'){
            //TODO castella
            //return "castella";
            //Obtenir animals de la familia
            $data = ModelCategoriaES::where('title', $familia)->first();
            $idCategoria = $data->categoriasES_id;
            $apadrina = ModelApadrinaES::get()->where('status', 1)->where('categoria_id', $idCategoria);
            $animals = ModelAnimalES::get();
            $colaboradors = ModelColaborador::get()->where('status', 1);
            $contacta = ModelContactaES::first();
            $families = ModelCategoriaES::inRandomOrder()->get();
            $data = ModelCategoriaES::where('title', $familia)->first();
            $administra = ModelAdministraES::first();
            $data['animals'] = ModelCategoria::find($data->categoriasES_id)->animalsES;
        }else{
            //TODO angles i altres
            $familiaCategoria = ModelCategoriaEN::where('title', $familia)->first();
            $idCategoria = $familiaCategoria->id;
            $apadrina = ModelApadrinaEN::get()->where('status', 1)->where('categoria_id', $idCategoria);
            $animals = ModelAnimalEN::get();
            $colaboradors = ModelColaborador::inRandomOrder()->get()->where('status', 1);
            $contacta = ModelContactaEN::first();
            $families = ModelCategoriaEN::get();
            $data = ModelCategoriaEN::where('title', $familia)->first();
            $administra = ModelAdministraEN::first();
            $data['animals'] = ModelCategoriaEN::find($data->id)->animals;
        }
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
          
        if(Session::get('locale')=='ca'){
            //catala
            //Obtenir categories amb nom familia
            $especie = ModelAnimal::where('title', $especie)->first();
            //Obtenir id
            $idFamilia = $especie->id;
            $families = ModelCategoria::inRandomOrder()->get()->where('status', 1);
            $apadrina = ModelApadrina::get()->where('status', 1)->where('animal_id', $idFamilia);
            $seccions = ModelAnimal::find($especie->id)->seccions;
            $colaboradors = ModelColaborador::get()->where('status', 1);
            $contacta = ModelContacta::first();
            $administra = ModelAdministra::first();
            $especie['seccions'] = $seccions;
        }elseif(Session::get('locale')=='es'){
            //TODO castella
            //return "castella";
            $especie = ModelAnimalES::where('title', $especie)->first();
            //Obtenir id
            $idFamilia = $especie->animalsES_id;
            $families = ModelCategoriaES::inRandomOrder()->get()->where('status', 1);
            $apadrina = ModelApadrinaES::get()->where('status', 1)->where('animal_id', $idFamilia);
            $seccions = ModelAnimal::find($especie->animalsES_id)->seccions;
            $colaboradors = ModelColaborador::get()->where('status', 1);
            $contacta = ModelContactaES::first();
            $administra = ModelAdministraES::first();
            $especie['seccions'] = $seccions;
        }else{
            //TODO angles i altres
            $especie = ModelAnimalEN::where('title', $especie)->first();
            //Obtenir id
            $idFamilia = $especie->id;
            $families = ModelCategoriaEN::inRandomOrder()->get()->where('status', 1);
            $apadrina = ModelApadrinaEN::get()->where('status', 1)->where('animal_id', $idFamilia);
            $seccions = ModelAnimal::find($especie->id)->seccions;
            $colaboradors = ModelColaborador::get()->where('status', 1);
            $contacta = ModelContactaEN::first();
            $administra = ModelAdministraEN::first();
            $especie['seccions'] = $seccions;
        }
        
        return view('public.especie')
            ->with('families', $families)
            ->with('especie', $especie)
            ->with('apadrina', $apadrina)
            ->with('colaboradors', $colaboradors)
            ->with('contacta', $contacta)
            ->with('administra', $administra);

      }
      public function getApadrina($apadrina) {
        if(Session::get('locale')=='ca'){
            $families = ModelCategoria::inRandomOrder()->get()->where('status', 1);
            $especies = ModelAnimal::get()->where('status', 1)->sortByDesc('updated_at')->take(4);
            $colaboradors = ModelColaborador::get()->where('status', 1);
            $apadrinaAnimal = ModelApadrina::where('nom', $apadrina)->first();
            $contacta = ModelContacta::get();
            $administra = ModelAdministra::first();
            $plataformaPagament = ModelPlataformaPagament::first();
        }elseif(Session::get('locale')=='es'){
            $families = ModelCategoriaES::inRandomOrder()->get()->where('status', 1);
            $especies = ModelAnimalES::get()->where('status', 1)->sortByDesc('updated_at')->take(4);
            $colaboradors = ModelColaborador::get()->where('status', 1);
            $apadrinaAnimal = ModelApadrinaES::where('nom', $apadrina)->first();
            $contacta = ModelContactaES::get();
            $administra = ModelAdministraES::first();
            $plataformaPagament = ModelPlataformaPagamentES::first();
        }else{
            $families = ModelCategoriaEN::inRandomOrder()->get()->where('status', 1);
            $especies = ModelAnimalEN::get()->where('status', 1)->sortByDesc('updated_at')->take(4);
            $colaboradors = ModelColaborador::get()->where('status', 1);
            $apadrinaAnimal = ModelApadrinaEN::where('nom', $apadrina)->first();
            $contacta = ModelContactaEN::get();
            $administra = ModelAdministraEN::first();
            $plataformaPagament = ModelPlataformaPagamentEN::first();
        }
        //Obtenir categories amb nom familia
        //return $apadrinaAnimal->nom;
        return view('public.apadrina')
            ->with('apadrina', $apadrinaAnimal)
            ->with('families', $families)
            ->with('especies', $especies)
            ->with('colaboradors', $colaboradors)
            ->with('contacta', $contacta)
            ->with('administra', $administra)
            ->with('plataformaPagament', $plataformaPagament);

      }
      public function getCarret($id) {
        
        if(Session::get('locale')=='ca'){
            //catala
            $apadrina = ModelApadrina::get()->where('id', $id)->where('status', 1)->first();
            $contacta = ModelContacta::first();
            $administra = ModelAdministra::first();
            $plataformaPagament = ModelPlataformaPagament::first();
        }elseif(Session::get('locale')=='es'){
            //TODO castella
            //return "castella";
            $apadrina = ModelApadrinaES::get()->where('id', $id)->where('status', 1)->first();
            $contacta = ModelContactaES::first();
            $administra = ModelAdministraES::first();
            $plataformaPagament = ModelPlataformaPagamentES::first();
        }else{
            //TODO angles i altres
            $apadrina = ModelApadrinaEN::get()->where('id', $id)->where('status', 1)->first();
            $contacta = ModelContactaEN::first();
            $administra = ModelAdministraEN::first();
            $plataformaPagament = ModelPlataformaPagamentEN::first();
            return $plataformaPagament;
        }
        //return $imatges;
        return view('public.carret')
            ->with('apadrina', $apadrina)
            ->with('contacta', $contacta)
            ->with('administra', $administra)
            ->with('plataformaPagament', $plataformaPagament);
	    //return $data;
    }
}
