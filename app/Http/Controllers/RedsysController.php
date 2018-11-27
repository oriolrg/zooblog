<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ssheduardo\Redsys\Facades\Redsys;

class RedsysController extends Controller
{
    //
    public function index($order,$amount,$display=true,$des=false, $language)
    {
        try{
            //return $redsys;
            $key = config('redsys.key');
            
            $merchantcode = config('redsys.merchantcode');
            $terminal = config('redsys.terminal');
            $enviroment = config('redsys.enviroment');
            $urlOk = url(config('redsys.url_ok'));
            $urlKo = url(config('redsys.url_ko'));
            $urlNotification = url(config('redsys.url_notification'));
            $tradeName = config('redsys.tradename');
            $titular = config('redsys.titular');

            Redsys::setAmount($amount);
            Redsys::setOrder($order);//Posar data per identificar comanda1543321428
            Redsys::setMerchantcode($merchantcode); //Reemplazar por el código que proporciona el banco
            Redsys::setCurrency('978');
            Redsys::setTransactiontype('0');
            Redsys::setTerminal($terminal);
            Redsys::setMethod('T'); //Solo pago con tarjeta, no mostramos iupay
            Redsys::setNotification($urlNotification); //Url de notificacion
            Redsys::setUrlOk($urlOk); //Url OK
            Redsys::setUrlKo($urlKo); //Url KO             
            Redsys::setVersion('HMAC_SHA256_V1');
            Redsys::setTradeName($tradeName);
            Redsys::setTitular($titular);
            Redsys::setProductDescription($des);
            Redsys::setLanguage($language);//001 castella, 002 inglès, 003 català
            Redsys::setEnviroment($enviroment); //Entorno test
    
            $signature = Redsys::generateMerchantSignature($key);
            Redsys::setMerchantSignature($signature);
    
            $form = Redsys::executeRedirection();
            //$form1 = Redsys::getParameters();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $form;
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



