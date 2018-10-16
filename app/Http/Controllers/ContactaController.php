<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelContacta;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class ContactaController extends Controller
{
  public function index() {
     $data = ModelContacta::get();
     return view('administra.contacta.list-contacta')->with('data', $data);
     //return $data;
  }
  public function store() {
    $input = Input::all();
    $post = new ModelContacta();
    $post->telefon = $input['telefon'];
    $post->direccio = $input['direccio'];
    $post->latitud = $input['latitud'];
    $post->longitud = $input['longitud'];
    $post->email = $input['email'];
    $post->save(); // Guarda el objeto en la BD
    $data = ModelContacta::get();
    return view('administra.contacta.list-contacta')->with('data', $data);
    //return view('administra.list-familia');
  }
  public function edit($id = null) {

    if ($id == null){
      return view('administra.contacta.edit-contacta');
    }else{
       $data['editdata'] = ModelContacta::find($id);
       if($data['editdata'] == null){
          return 'El post no existe';
       }
       return view('administra.contacta.edit-contacta', $data);
   }
  }
  public function update($id = null) {

    if ($id == null){
      $data = ModelContacta::get();
      return view('administra.contacta.list-contacta')->with('data', $data);
    }else{
      $input = Input::all();
      $post = ModelContacta::find($id);
      $post->telefon = $input['telefon'];
      $post->direccio = $input['direccio'];
      $post->latitud = $input['latitud'];
      $post->longitud = $input['longitud'];
      $post->email = $input['email'];;
      $post->save(); // Guarda el objeto en la BD
      $data = ModelContacta::get();
      return redirect()->action('ContactaController@index');
   }
  }
  public function destroy($id) {
    $post = ModelContacta::find($id);
    if($post == null)
       return "No existe este post";
    else
       $post->delete();
  }
}
