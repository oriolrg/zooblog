<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ZooSend;
use App\Mail\ZooResposta;
use App\ModelContacta;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
  public function emailSend(Request $request)

  {
      $dataContacta = ModelContacta::get()->first();
      $objMail = new \stdClass();
      $objMail->telefon = $request->input('phone');
      $objMail->nom = $request->input('name');
      $objMail->receiver = $request->input('email');
      $objMail->email = $request->input('email');
      $objMail->message = $request->input('message');
      $objMail->captcha = $request->input('captcha');
      Mail::to($contacta->email)->send(new ZooSend($objMail));
      //Resposta automàtica al client
      Mail::to($objMail->receiver)->send(new ZooResposta($objMail));
      return $objMail->nom;
      if($objMail->captcha){
        Mail::to($contacta->email)->send(new ZooSend($objMail));
        //Resposta automàtica al client
        Mail::to($objMail->receiver)->send(new ZooResposta($objMail));
        return $objMail->nom;
      }
        //return "Confirma que no ets un robot";
      //$puntuacio->insertPuntuacio($userPuntuacio);
      //return $userPuntuacio->get('nom');
      //return response()->json(['success'=>'Added new records.'. $userPuntuacio]);

  }
}
