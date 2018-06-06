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
        // withTrashed(), onlyTrashed()
        $todos = Todo::orderBy('progress', 'desc')->where('done', '=', 0)->paginate(10);
        foreach($todos as $todo) {
            if($todo['progress'] < 30) {
                array_add($todo, 'color', 'success');
            } else if($todo['progress'] < 60){
                array_add($todo, 'color', 'info');
            } else if($todo['progress'] < 90){
                array_add($todo, 'color', 'warning');
            } else {
                array_add($todo, 'color', 'danger');
            }
        }
        return view('manage.index', ['todos' => $todos]);
        // return view('manage.index', ['title' => 'WPMS v1.0', 'page_title' => 'Dashboard', 'page_description' => 'Control panel'])->with($todos);
    }
}
