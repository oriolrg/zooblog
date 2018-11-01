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
                $post = ModelAdministra::find($id);
                $post2 = ModelAdministraEN::where('administraEN_id',$id)->get()->first();
                //return $post2;
                $post2->titol = $input['titol'];
                $post2->llista = $input['llista'];
                $post2->description = $input['descripcio'];
                $post->administraEN()->save($post2); // Guarda el objeto en la BD
            }else{
                //return "No existeix id";
                $post = ModelAdministra::find($id);
                $post2 = new ModelAdministraEN();
                $post2->titol = $input['titol'];
                $post2->llista = $input['llista'];
                $post2->description = $input['descripcio'];
                $post->administraEN()->save($post2);
                $post->save(); // Guarda el objeto en la BD
            }            
            return redirect()->action('AdministraController@index');
        }
    }
    
    public function destroy($id) {
        $post = ModelAdministraES::find($id);
        if($post == null)
        return "No existe este post";
        else
        $post->delete();
    }
}
