<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests; // para recibir la notificación via request
use Ssheduardo\Redsys\Facades\Redsys; //el controlador de redsys

class RedsysController extends Controller
{
    /**
    * Crear formulario redsys
    *
    */
    public function index($order,$amount,$display=true,$des=false){
        try{
            $order = str_pad($order,12,0,STR_PAD_LEFT);
            $key = config('redsys.key');
            $merchantcode = config('redsys.merchantcode');
            $terminal = config('redsys.terminal');
            $enviroment = config('redsys.enviroment');
            $urlOk = url(config('redsys.url_ok'));
            $urlKo = url(config('redsys.url_ko'));
            $urlNotification= url(config('redsys.url_notification'));
            $tradeName = config('redsys.tradename');
            $titular = config('redsys.titular');
            $description = $des?$des:config('redsys.description');
            Redsys::setAmount($amount);
            Redsys::setOrder($order);
            Redsys::setMerchantcode($merchantcode);
            Redsys::setCurrency('978');
            Redsys::setTransactiontype('0');
            Redsys::setTerminal($terminal);
            Redsys::setMethod('T');
            Redsys::setNotification(config('redsys.url_notification'));
            Redsys::setUrlOk(config('redsys.url_ok'));
            Redsys::setUrlKo(config('redsys.url_ko'));
            Redsys::setVersion('HMAC_SHA256_V1');
            Redsys::setTradeName($tradeName);
            Redsys::setTitular($titular);
            Redsys::setProductDescription($description);
            Redsys::setEnviroment($enviroment);
            $signature = Redsys::generateMerchantSignature($key);
            Redsys::setMerchantSignature($signature);
            if($display==true){
                Redsys::setAttributesSubmit('btn_submit', 'btn_id', 'Enviar', 'display:none');
                return Redsys::executeRedirection();
            }else{
                return Redsys::createForm();
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }


    /**

    * Comprobar respuesta de Redsys

    */
    public function comprobar(Request $request){
        try{
            $key = config('redsys.key');
            $parameters = Redsys::getMerchantParameters($request->input('Ds_MerchantParameters'));
            $DsResponse = $parameters["Ds_Response"];
            $DsResponse += 0;
            if (Redsys::check($key, $request->input()) && $DsResponse <=99) {
                // lo que quieras que haya si es positiva la confirmación de redsys
            } else {
                //lo que quieras que haga si no es positivo
            }
        } catch (\Sermepa\Tpv\TpvException $e) {
            echo $e->getMessage();
        }
    }
}


