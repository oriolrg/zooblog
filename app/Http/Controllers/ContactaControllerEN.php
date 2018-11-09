<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelContacta;
use App\ModelContactaES;
use App\ModelContactaEN;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class ContactaControllerEN extends Controller
{
  public function edit($id = null) {
        if ($id == null){
            $data = ModelContactaEN::get();
            return view('administra.contacta.list-contacta')->with('data', $data);
        }else{
            $input = Input::all();
            if(count(ModelContactaEN::where('contacta_id',$id)->get()) != 0){
                $post = ModelContacta::find($id);
                $post2 = ModelContactaEN::where('contacta_id',$id)->get()->first();
                $post2->telefon = $post->telefon;
                $post2->direccio = $post->direccio;
                $post2->latitud = $post->latitud;
                $post2->longitud = $post->longitud ;
                $post2->email = $post->email;
                $post2->missAccepto = $input['missAccepto'];
                $post2->missProteccio = $input['missProteccio'];
                $post2->enviar = $input['enviar'];
                $post->contactaEN()->save($post2); // Guarda el objeto en la BD
            }else{
                //return "No existeix id";
                $post = ModelContacta::find($id);
                $post2 = new ModelContactaEN();
                $post2->telefon = $post->telefon;
                $post2->direccio = $post->direccio;
                $post2->latitud = $post->latitud;
                $post2->longitud = $post->longitud;
                $post2->email = $post->email;
                $post2->missAccepto = $input['missAccepto'];
                $post2->missProteccio = $input['missProteccio'];
                $post2->enviar = $input['enviar'];
                $post->contactaEN()->save($post2);
                $post->save(); // Guarda el objeto en la BD
            }            
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
