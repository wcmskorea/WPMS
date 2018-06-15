<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(Request $request)
    {
        $theme = cache('config.theme')->theme ? : 'default';

        // return view("theme.$theme.main");
        return view("welcome");
    }
}
