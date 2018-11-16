<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;
use URL;

class LanguageController extends Controller
{
public function setLocale($locale='en'){
    if (!in_array($locale, ['en', 'ca', 'es'])){
        $locale = 'en';
    }
    Session::put('locale', $locale);
    return redirect()->action('PublicController@indexPublic');
    return redirect(url(URL::previous()));
    }
}