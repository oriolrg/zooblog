<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelQuisom;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;

class QuisomController extends Controller
{
  public function indexPublic() {
     $data = ModelQuisom::get();
     return view('public.quisom.quisom')->with('data', $data);;
     //return $data;
  }
  public function index() {
     $data = ModelQuisom::get();
     return view('administra.quisom.list-quisom')->with('data', $data);
     //return $data;
  }
  public function store() {
    $input = Input::all();
    $post = new ModelQuisom();
    if(isset($input['file1'])){
      $fileprincipal = $input['file1'];
      //obtenir nom imatge principal
      $nomprincipal = $fileprincipal->getClientOriginalName();
      //Guardat imatges en local
      \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
      $post->imatge = $nomprincipal;
    }

    $post->nom = $input['nom'];
    $post->funcions = $input['funcions'];
    $post->twitter = $input['twitter'];
    $post->facebook = $input['facebook'];
    $post->instagram = $input['instagram'];
    $post->linkedin = $input['linkedin'];
    $post->status = $input['status'];
    $post->save(); // Guarda el objeto en la BD
    $data = ModelQuisom::get();
    return view('administra.quisom.list-quisom')->with('data', $data);
    //return view('administra.list-familia');
  }
  public function edit($id = null) {

    if ($id == null){
      return view('administra.familia.edit-post');
    }else{
       $data['editdata'] = ModelQuisom::find($id);
       if($data['editdata'] == null){
          return 'El post no existe';
       }
       return view('administra.quisom.edit-quisom', $data);
   }
  }
  public function update($id = null) {

    if ($id == null){
      $data = ModelQuisom::get();
      return view('administra.quisom.list-quisom')->with('data', $data);
    }else{
      $input = Input::all();
      $post = ModelQuisom::find($id);
      if(isset($input['file1'])){
        $fileprincipal = $input['file1'];
        //obtenir nom imatge principal
        $nomprincipal = $fileprincipal->getClientOriginalName();
        //Guardat imatges en local
        \Storage::disk('public')->put($nomprincipal,  \File::get($fileprincipal));
        $post->imatge = $nomprincipal;
      }

      $post->nom = $input['nom'];
      $post->funcions = $input['funcions'];
      $post->twitter = $input['twitter'];
      $post->facebook = $input['facebook'];
      $post->instagram = $input['instagram'];
      $post->linkedin = $input['linkedin'];
      $post->status = $input['status'];
      $post->save(); // Guarda el objeto en la BD
      $data = ModelQuisom::get();
      return redirect()->action('QuisomController@index');
   }
  }
  public function destroy($id) {
    $post = ModelQuisom::find($id);
    if($post == null)
       return "No existe este post";
    else
       $post->delete();
  }
}
