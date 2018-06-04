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
        // $todos = Todo::all();
        $todos = Todo::orderBy('created_at', 'desc')->paginate(5);

        if($todos['progress'] < 30) {
            $color = 'danger';
        } else if($todos['progress'] < 60){
            $color = 'warning';
        } else if($todos['progress'] < 90){
            $color = 'info';
        } else {
            $color = 'success';
        }
        
        return view('manage.index', ['todos' => $todos, 'color' => $color]);
        // return view('manage.index', ['title' => 'WPMS v1.0', 'page_title' => 'Dashboard', 'page_description' => 'Control panel'])->with($todos);
    }
}
