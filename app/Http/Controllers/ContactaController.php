<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelContacta;
use App\ModelContactaES;
use App\ModelContactaEN;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class ContactaController extends Controller
{
  public function index() {
    $dataContacta = ModelContacta::get()->first();
    $dataContactaES = ModelContactaES::get()->first();
    $dataContactaEN = ModelContactaEN::get()->first();
    return view('administra.contacta.list-contacta')->with('dataContacta', $dataContacta)->with('dataContactaES', $dataContactaES)->with('dataContactaEN', $dataContactaEN);
    
  }
  public function store() {
    $input = Input::all();
    $post = new ModelContacta();
    $post->telefon = $input['telefon'];
    $post->direccio = $input['direccio'];
    $post->latitud = $input['latitud'];
    $post->longitud = $input['longitud'];
    $post->email = $input['email'];
    $post->missAccepto = $input['missAccepto'];
    $post->missProteccio = $input['missProteccio'];
    $post->enviar = $input['enviar'];
    $post->save(); // Guarda el objeto en la BD
    $data = ModelContacta::get();
    return view('administra.contacta.list-contacta')->with('data', $data);
    //return view('administra.list-familia');
  }
  public function edit($id = null) {
    if ($id == null){
      $data = ModelContacta::get();
      return view('administra.contacta.list-contacta')->with('data', $data);
    }else{
      $input = Input::all();
      if(ModelContacta::find($id)){
        $post = ModelContacta::find($id); 
      }else{
        $post = new ModelContacta();
      }
      $post->telefon = $input['telefon'];
      $post->direccio = $input['direccio'];
      $post->latitud = $input['latitud'];
      $post->longitud = $input['longitud'];
      $post->email = $input['email'];
      $post->missAccepto = $input['missAccepto'];
      $post->missProteccio = $input['missProteccio'];
      $post->enviar = $input['enviar'];
      $post->save(); // Guarda el objeto en la BD
      return redirect()->action('ContactaController@index');
    }
  }
  public function update($id = null) {

    if ($id == null){
      $data = ModelContacta::get();
      return view('administra.contacta.list-contacta')->with('data', $data);
    }else{
      $input = Input::all();
      $post = ModelContacta::find($id);
      $post = $this->setContacta($post, $input);
      $post->save(); // Guarda el objeto en la BD
      return redirect()->action('ContactaController@index');
   }
  }
  public function setContacta($post, $input){
    $post->telefon = $input['telefon'];
    $post->direccio = $input['direccio'];
    $post->latitud = $input['latitud'];
    $post->longitud = $input['longitud'];
    $post->email = $input['email'];
    $post->missAccepto = $input['missAccepto'];
    $post->missProteccio = $input['missProteccio'];
    $post->enviar = $input['enviar'];
    return $post;
  }
  public function destroy($id) {
    $post = ModelContacta::find($id);
    if($post == null)
       return "No existe este post";
    else
       $post->delete();
  }
}
