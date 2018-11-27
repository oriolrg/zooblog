<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelApadrina;
use App\ModelContacta;
use App\ModelAdministra;
use Session;
use App\Http\Controllers\RedsysController;
use Illuminate\Support\Facades\Input;

class CarretController extends Controller
{
    public function indexPublic($id) {
        
        if(Session::get('locale')=='ca'){
            //catala
            $apadrina = ModelApadrina::get()->where('id', $id)->where('status', 1)->first();
            $contacta = ModelContacta::first();
            $administra = ModelAdministra::first();
        }elseif(Session::get('locale')=='es'){
            //TODO castella
            //return "castella";
            $apadrina = ModelApadrinaES::get()->where('id', $id)->where('status', 1);
            $contacta = ModelContactaES::first();
            $administra = ModelAdministraES::first();
        }else{
            //TODO angles i altres
            $apadrina = ModelApadrinaEN::get()->where('id', $id)->where('status', 1);
            $contacta = ModelContactaEN::first();
            $administra = ModelAdministraEN::first();
        }
        //return $imatges;
        return view('public.carret')
            ->with('apadrina', $apadrina)
            ->with('contacta', $contacta)
            ->with('administra', $administra);
	    //return $data;
    }
    public function comprar(){
        $input = Input::all();
        if(Session::get('locale')=='ca'){
            //catala
            $language=003;
        }elseif(Session::get('locale')=='es'){
            //TODO castella
            $language=001;
        }else{
            //TODO angles i altres
            $language=002;
        }
        $redsys= new RedsysController;
        $redsys->index($input['order']+time(),$input['preu'],false,$input['descripcio'],$language);
    }
}
