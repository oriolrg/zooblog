<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelApadrina;
use App\ModelContacta;
use App\ModelAdministra;
use Session;
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
}
