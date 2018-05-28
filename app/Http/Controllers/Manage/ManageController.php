<?php

namespace App\Http\Controllers\Manage;

use App\Http\Request;
use App\Http\Controllers\Controller;
use App\Todo;

class ManageController extends Controller
{
    //
    public function index() {
        //return view('admin.dashboard');
        return redirect()->route('manage.dashboard');
    }

    public function dashboard() {
        $todos['tasks'] = Todo::all();
        return view('manage.index', ['title' => 'WPMS v1.0', 'page_title' => 'Dashboard', 'page_description' => 'Control panel'])->with($todos);
    }
}
