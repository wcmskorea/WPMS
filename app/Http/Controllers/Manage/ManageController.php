<?php

namespace App\Http\Controllers\Manage;

use App\Http\Request;
use App\Http\Controllers\Controller;

class ManageController extends Controller
{
    //
    public function index() {
        //return view('admin.dashboard');
        return redirect()->route('manage.dashboard');
    }

    public function dashboard() {
        return view('manage.dashboard', ['title' => 'WPMS v1.0', 'page_title' => 'Dashboard']);
    }
}
