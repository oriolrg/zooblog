<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelContacta;
use App\ModelContactaES;
use App\ModelContactaEN;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class ContactaControllerES extends Controller
{
  
  public function edit($id = null) {
        if ($id == null){
            $data = ModelContactaES::get();
            return view('administra.contacta.list-contacta')->with('data', $data);
        }else{
            $input = Input::all();
            if(count(ModelContactaES::where('contacta_id',$id)->get()) != 0){
                $post = ModelContacta::find($id);
                $post2 = ModelContactaES::where('contacta_id',$id)->get()->first();
                $post2 = $this->setContacta($post2, $post, $input);
                $post->contactaES()->save($post2); // Guarda el objeto en la BD
            }else{
                //return "No existeix id";
                $post = ModelContacta::find($id);
                $post2 = new ModelContactaES();
                $post2 = $this->setContacta($post2, $post, $input);
                $post->contactaES()->save($post2);
                $post->save(); // Guarda el objeto en la BD
            }            
            return redirect()->action('AdministraController@index');
        }
  }
  public function setContacta($post2, $post, $input){
    $post2->telefon = $post->telefon;
    $post2->direccio = $post->direccio;
    $post2->latitud = $post->latitud;
    $post2->longitud = $post->longitud;
    $post2->email = $post->email;
    $post2->missAccepto = $input['missAccepto'];
    $post2->missProteccio = $input['missProteccio'];
    $post2->enviar = $input['enviar'];
    return $post2;
  }
  public function destroy($id) {
    $post = ModelContactaES::find($id);
    if($post == null)
       return "No existe este post";
    else
       $post->delete();
  }
}
