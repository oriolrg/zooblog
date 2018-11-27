<?php
return [
    'key'                   => env('REDSYS_KEY','sq7HjrUOBfKmC576ILgskD5srU870gJ7'),
    'url_notification'      => env('REDSYS_URL_NOTIFICATION','http://localhost:8000/apadrina/compra/25'),
    'url_ok'                => env('REDSYS_URL_OK','http://localhost:8000/apadrina/compra/25'),
    'url_ko'                => env('REDSYS_URL_KO','http://localhost:8000/apadrina/compra/25'),
    'merchantcode'          => env('REDSYS_MERCHANT_CODE','999008881'),
    'terminal'              => env('REDSYS_TERMINAL','1'),
    'enviroment'            => env('REDSYS_ENVIROMENT','test'),//test o live
    'tradename'             => env('REDSYS_TRADENAME','Tienda S.L'),
    'titular'               => env('REDSYS_TITULAR','Pedro Risco'),
    'description'           => env('REDSYS_DESCRIPTION','')
];
