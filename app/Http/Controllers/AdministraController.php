<?php

namespace App\Http\Controllers;

use App\ModelAdministra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AdministraController extends Controller
{
    public function index() {

        $dataAdministra = ModelAdministra::get();
        //return $dataAdministra;
        return view('administra.administra.list-administra')->with('dataAdministra', $dataAdministra);
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
            $post = ModelAdministra::find($id);
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
    /*public function update($id = null) {
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
            return redirect()->action('AdministraController@index');
        }
        
    }*/
    public function destroy($id) {
        $post = ModelAdministra::find($id);
        if($post == null)
        return "No existe este post";
        else
        $post->delete();
    }
}
