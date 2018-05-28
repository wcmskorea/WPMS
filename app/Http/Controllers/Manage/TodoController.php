<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Todo;

class TodoController extends Controller
{
    //
    public function index() {
        $todos['tasks'] = Todo::all();
        return view('manage.todo')->with($todos);
        //return "todo controller";
    }

    public function store(Request $request) {

        $done = ($request->input('done')) ? $request->input('done') : 1;
        $progress = ($done == 2) ? 100 : $request->intput('progress');
        
        Todo::Create([
            'title' => $request->input('title'),
            'done' => $done,
            'progress' => $request->input('progress')
        ]);
        //dd($request->all());
        return redirect('/manage/dashboard');
    }

    public function done($id) {
        $todo = Todo::find($id);
        $todo->done = 2;
        $todo->save();
    }

    public function show($id) {
        $todos['tasks'] = Todo::find($id);
        return view('manage.todo')->with($todos);
    }
}
