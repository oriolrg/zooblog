<?php

namespace App\Http\Controllers;

use App\ModelAdministra;
use App\ModelAdministraES;
use App\ModelAdministraEN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AdministraController extends Controller
{
    public function index() {

        $dataAdministra = ModelAdministra::get()->first();
        $dataAdministraES = ModelAdministraES::get()->first();
        $dataAdministraEN = ModelAdministraEN::get()->first();
        //return $dataAdministra;
        return view('administra.administra.list-administra')->with('dataAdministra', $dataAdministra)->with('dataAdministraES', $dataAdministraES)->with('dataAdministraEN', $dataAdministraEN);
        //return $data;
  	}
    public function store($id = null) {
        if($id){
           return "Error";     
        }else{
            $input = Input::all();
            $post = new ModelAdministra();
            if(isset($input['file1'])){
                $fileprincipal = $input['file1'];
                //obtenir nom imatge principal
                $nomprincipal = $fileprincipal->getClientOriginalName();
                //Guardat imatges en local
                \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
                $post->imatge = $nomprincipal;
            }
            $post->titol = $input['titol'];
            $post->llista = $input['llista'];
            $post->description = $input['descripcio'];
            $post->save(); // Guarda el objeto en la BD
            return redirect()->action('AdministraController@index');
        }
        
        
    }
    public function edit($id = null) {
        if ($id == null){
            $data = ModelAdministra::get();
            return view('administra.especie.list-familia')->with('data', $data);
        }else{
            $input = Input::all();
            if(ModelAdministra::find($id)){
               $post = ModelAdministra::find($id); 
            }else{
                $post = new ModelAdministra();
            }
            if(isset($input['file1'])){
                $fileprincipal = $input['file1'];
                //obtenir nom imatge principal
                $nomprincipal = $fileprincipal->getClientOriginalName();
                //Guardat imatges en local
                \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
                $post->imatge = $nomprincipal;
            }
            $post->titol = $input['titol'];
            $post->llista = $input['llista'];
            $post->description = $input['descripcio'];
            $post->save(); // Guarda el objeto en la BD
            return redirect()->action('AdministraController@index');
        }
    }
    public function updateEN($id = null) {
        return "update";
        if ($id == null){
            $data = ModelAnimal::get();
            return view('administra.especie.list-familia')->with('data', $data);
        }else{
            $input = Input::all();
            $post = new ModelAdministra();
            if(isset($input['file1'])){
                $fileprincipal = $input['file1'];
                //obtenir nom imatge principal
                $nomprincipal = $fileprincipal->getClientOriginalName();
                //Guardat imatges en local
                \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
                $post->imatge = $nomprincipal;
            }
            $post->titol = $input['titol'];
            $post->llista = $input['llista'];
            $post->description = $input['descripcio'];
            $post->save(); // Guarda el objeto en la BD
            $post2 = new ModelAdministraES();
            $post2->titol = $input['titol'];
            $post2->llista = $input['llista'];
            $post2->description = $input['descripcio'];
            $post2->save();
            return redirect()->action('AdministraController@index');
        }
        
    }
    public function destroy($id) {
        $post = ModelAdministra::find($id);
        if($post == null)
        return "No existe este post";
        else
        $post->delete();
    }
}
