<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelColaborador;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class ColaboradorsController extends Controller
{
  public function indexPublic() {
     $data = ModelColaborador::get();
     return view('public.colaboradors.colaboradors')->with('data', $data);;
     //return $data;
  }
  public function index() {
     $data = ModelColaborador::get();
     return view('administra.colaboradors.list-colaboradors')->with('data', $data);
     //return $data;
  }
  public function store() {
    $input = Input::all();
    $post = new ModelColaborador();
    if(isset($input['file1'])){
      $fileprincipal = $input['file1'];
      //obtenir nom imatge principal
      $nomprincipal = $fileprincipal->getClientOriginalName();
      //Guardat imatges en local
      \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
      $post->imatge = $nomprincipal;
    }
    $post->status = $input['status'];
    $post->nom = $input['nom'];
    $post->descripcio = $input['funcions'];
    $post->link = $input['link'];
    $post->save(); // Guarda el objeto en la BD
    $data = ModelColaborador::get();
    return view('administra.colaboradors.list-colaboradors')->with('data', $data);
    //return view('administra.list-categoria');
  }
  public function edit($id = null) {

    if ($id == null){
      return view('administra.colaboradors.edit-colaboradors');
    }else{
       $data['editdata'] = ModelColaborador::find($id);
       if($data['editdata'] == null){
          return 'El post no existe';
       }
       return view('administra.colaboradors.edit-colaboradors', $data);
   }
  }
  public function update($id = null) {

    if ($id == null){
      $data = ModelColaborador::get();
      return view('administra.colaboradors.list-colaboradors')->with('data', $data);
    }else{
      $input = Input::all();
      $post = ModelColaborador::find($id);
      if(isset($input['file1'])){
        $fileprincipal = $input['file1'];
        //obtenir nom imatge principal
        $nomprincipal = $fileprincipal->getClientOriginalName();
        //Guardat imatges en local
        \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
        $post->imatge = $nomprincipal;
      }
      $post->status = $input['status'];
      $post->nom = $input['nom'];
      $post->descripcio = $input['funcions'];
      $post->link = $input['link'];
      $post->save(); // Guarda el objeto en la BD
      $data = ModelColaborador::get();
      return redirect()->action('ColaboradorsController@index');
   }
  }
  public function destroy($id) {
    $post = ModelColaborador::find($id);
    if($post == null)
       return "No existe este post";
    else
       $post->delete();
  }
}
