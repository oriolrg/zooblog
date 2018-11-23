<?php

namespace App\Http\Controllers;
use App\ModelAdministra;
use App\ModelAdministraEN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AdministraControllerEN extends Controller
{
    
    public function edit($id = null) {
        if ($id == null){
            $data = ModelAdministraEN::get();
            return view('administra.especie.list-familia')->with('data', $data);
        }else{
            $input = Input::all();
            if(count(ModelAdministraEN::where('administraEN_id',$id)->get()) != 0){
                return $input;
                $post = ModelAdministra::find($id);
                $post2 = ModelAdministraEN::where('administraEN_id',$id)->get()->first();
                $post2 = $this->setAdministra($post, $post2, $input);  
                $post->administraEN()->save($post2); // Guarda el objeto en la BD
            }else{
                $post = ModelAdministra::find($id);
                $post2 = new ModelAdministraEN();
                $post2 = $this->setAdministra($post, $post2, $input);
                $post->administraEN()->save($post2);
                $post->save(); // Guarda el objeto en la BD
            }            
            return redirect()->action('AdministraController@index');
        }
    }
    public function setAdministra($post, $post2, $input){
        $post2->titol = $input['titol'];
        $post2->llista = $input['llista'];
        $post2->description = $input['descripcio'];
        $post2->imatge = $post->imatge;
        //$post->alt_imatge = $input['alt_imatge'];
        $post2->menu1 = $input['menu1'];
        $post2->menu2 = $input['menu2'];
        $post2->menu3 = $input['menu3'];
        $post2->menu4 = $input['menu4'];
        $post2->menu5 = $input['menu5'];
        $post2->menu6 = $input['menu6'];
        $post2->menu7 = $input['menu7'];
        $post2->politicaPrivacitat = $input['politicaPrivacitat'];
        return $post2;
    }
    public function destroy($id) {
        $post = ModelAdministraES::find($id);
        if($post == null)
        return "No existe este post";
        else
        $post->delete();
    }
}
