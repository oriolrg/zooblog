<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\ModelPlataformaPagament;
use App\ModelPlataformaPagamentES;
use App\ModelPlataformaPagamentEN;
use Session;

class PlataformaPagamentController extends Controller
{
    public function index() {
        $dataAdministra = ModelPlataformaPagament::get()->first();
        $dataAdministraES = ModelPlataformaPagamentES::get()->first();
        $dataAdministraEN = ModelPlataformaPagamentEN::get()->first();
        return view('administra.plataformaPagament.list-plataformaPagament')
            ->with('dataAdministra', $dataAdministra)
            ->with('dataAdministraES', $dataAdministraES)
            ->with('dataAdministraEN', $dataAdministraEN);
    }
    public function store($id = null) {
        if($id){
           return "Error";     
        }else{
            $input = Input::all();
            $post = new ModelPlataformaPagament();
            $post = $this->setAdministra($post, $input);
            $post->save(); // Guarda el objeto en la BD
            return redirect()->action('PlataformaPagamentController@index');
        }
        
        
    }
    public function edit($id = null) {
        if ($id == null){
            $data = ModelPlataformaPagament::get();
            return view('administra.especie.list-familia')->with('data', $data);
        }else{
            $input = Input::all();
            if(ModelPlataformaPagament::find($id)){
               $post = ModelPlataformaPagament::find($id); 
            }else{
                $post = new ModelPlataformaPagament();
            }
            $post = $this->setAdministra($post, $input);
            
            $post->save(); // Guarda el objeto en la BD
            return redirect()->action('AdministraController@index');
        }
    }
    public function setAdministra($post, $input){            
        $post->avis_legal = $input['avis_legal'];
        $post->condicions = $input['condicions'];
        $post->mode_pagament = $input['mode_pagament'];
        $post->miss_fiCompra = $input['miss_fiCompra'];
        $post->miss_detallsFac = $input['miss_detallsFac'];
        $post->miss_modePagament = $input['miss_modePagament'];
        return $post;
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
   
    public function destroy($id) {
        $post = ModelAdministra::find($id);
        if($post == null)
        return "No existe este post";
        else
        $post->delete();
    }
}
