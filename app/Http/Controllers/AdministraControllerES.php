<?php

namespace App\Http\Controllers;
use App\ModelAdministra;
use App\ModelAdministraES;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AdministraControllerES extends Controller
{
    
    public function edit($id = null) {
        if ($id == null){
            $data = ModelAdministraES::get();
            return view('administra.especie.list-familia')->with('data', $data);
        }else{
            

            $input = Input::all();
            if(count(ModelAdministraES::where('administraES_id',$id)->get()) != 0){
                $post = ModelAdministra::find($id);
                $post2 = ModelAdministraES::where('administraES_id',$id)->get()->first();
                $post2 = $this->setAdministra($post, $post2, $input);
                $post->administraES()->save($post2); // Guarda el objeto en la BD
            }else{
                //return "No existeix id";
                $post = ModelAdministra::find($id);
                $post2 = new ModelAdministraES();
                $post2 = $this->setAdministra($post, $post2, $input);
                $post->administraES()->save($post2);
                $post->save(); // Guarda el objeto en la BD
            }            
            return redirect()->action('AdministraController@index');
        }
    }
    public function setAdministra($post, $post2, $input){
        $post2->titol = $input['titol_ES'];
        $post2->llista = $input['llista_ES'];
        $post2->description = $input['descripcio_ES'];
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
