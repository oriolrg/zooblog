<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\ModelPlataformaPagamentEN;
use Session;

class PlataformaPagamentControllerEN extends Controller
{
    public function index() {
        $dataAdministra = ModelPlataformaPagamentEN::get()->first();
        return view('administra.plataformaPagament.list-plataformaPagament')
            ->with('dataAdministra', $dataAdministra);
    }
    public function store($id = null) {
        if($id){
           return "Error";     
        }else{
            $input = Input::all();
            $post = new ModelPlataformaPagamentEN();
            $post = $this->setAdministra($post, $input);
            $post->save(); // Guarda el objeto en la BD
            return redirect()->action('PlataformaPagamentController@index');
        }
        
        
    }
    public function edit($id = null) {
        if ($id == null){
            $data = ModelPlataformaPagamentEN::get();
            return view('administra.especie.list-familia')->with('data', $data);
        }else{
            $input = Input::all();
            if(ModelPlataformaPagamentEN::find($id)){
               $post = ModelPlataformaPagamentEN::find($id); 
            }else{
                $post = new ModelPlataformaPagamentEN();
            }
            $post = $this->setAdministra($post, $input);
            
            $post->save(); // Guarda el objeto en la BD
            return redirect()->action('AdministraController@index');
        }
    }
    public function setAdministra($post, $input){            
        $post->avis_legal = $input['avis_legalEN'];
        $post->condicions = $input['condicionsEN'];
        $post->mode_pagament = $input['mode_pagamentEN'];
        $post->miss_fiCompra = $input['miss_fiCompraEN'];
        $post->miss_detallsFac = $input['miss_detallsFacEN'];
        $post->miss_modePagament = $input['miss_modePagamentEN'];
        return $post;
    }
   
    public function destroy($id) {
        $post = ModelAdministra::find($id);
        if($post == null)
        return "No existe este post";
        else
        $post->delete();
    }
}
