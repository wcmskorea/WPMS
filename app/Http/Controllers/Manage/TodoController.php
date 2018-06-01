<?php namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Todo;
use Validator;

class TodoController extends Controller
{
    //
    public function index() {

        // $todos = Todo::all();
        $todos = Todo::orderBy('progress', 'asc')->paginate(5);
        return view('manage.todo', ['todos' => $todos]);

    }

    public function store(Request $request) {
        // dd($request->all());
        $validator = Validator::make($request->all(), Todo::$rules, Todo::$messages);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $done = ($request->input('done')) ? $request->input('done') : 1;
        $progress = ($done == 2) ? 100 : $request->input('progress');
        
        Todo::Create([
            'title' => $request->input('title'),
            'done' => $done,
            'progress' => $progress
        ]);

        return redirect('/manage/dashboard');
    }

    public function done($id) {
        $todo = Todo::find($id);
        $todo->done = 2;
        $todo->save();
    }

    public function show($id) {
        $todos = Todo::find($id);
        return view('manage.todo', ['todos' => $todos]);
    }
}
