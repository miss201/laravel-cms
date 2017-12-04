<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function change($lang)
    {
        if (isset($lang)) {
            Session::put('lang', $lang);
        }
        return 'success';
    }
}
