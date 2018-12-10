<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\ModelPlataformaPagamentES;
use Session;

class PlataformaPagamentControllerES extends Controller
{
    public function index() {
        $dataAdministra = ModelPlataformaPagamentES::get()->first();
        return view('administra.plataformaPagament.list-plataformaPagament')
            ->with('dataAdministra', $dataAdministra);
    }
    public function store($id = null) {
        if($id){
           return "Error";     
        }else{
            $input = Input::all();
            $post = new ModelPlataformaPagamentES();
            $post = $this->setAdministra($post, $input);
            $post->save(); // Guarda el objeto en la BD
            return redirect()->action('PlataformaPagamentController@index');
        }
        
        
    }
    public function edit($id = null) {
        if ($id == null){
            $data = ModelPlataformaPagamentES::get();
            return view('administra.especie.list-familia')->with('data', $data);
        }else{
            $input = Input::all();
            if(ModelPlataformaPagamentES::find($id)){
               $post = ModelPlataformaPagamentES::find($id); 
            }else{
                $post = new ModelPlataformaPagamentES();
            }
            $post = $this->setAdministra($post, $input);
            
            $post->save(); // Guarda el objeto en la BD
            return redirect()->action('AdministraController@index');
        }
    }
    public function setAdministra($post, $input){            
        $post->avis_legal = $input['avis_legalES'];
        $post->condicions = $input['condicionsES'];
        $post->mode_pagament = $input['mode_pagamentES'];
        $post->miss_fiCompra = $input['miss_fiCompraES'];
        $post->miss_detallsFac = $input['miss_detallsFacES'];
        $post->miss_modePagament = $input['miss_modePagamentES'];
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
