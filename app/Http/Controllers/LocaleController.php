<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function set_locale($locale){
        Session::put('locale',$locale);
        return Redirect::back();
    }
}
