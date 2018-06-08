<?php

namespace App\Http\Controllers\Manage;

use App\Http\Request;
use App\Http\Controllers\Controller;
use App\Todo;

class ManageController extends Controller
{
    //
    public function index() {        
        return redirect()->route('manage.dashboard');
    }

    public function dashboard() {
        // $todos = Todo::all();
        // withTrashed(), onlyTrashed() //softdelete된 데이터를 포함할지 여부 함수
        $todos = Todo::where('done', 0)->orderBy('progress', 'desc')->paginate(5);
        foreach($todos as $todo) {
            if($todo['progress'] < 33) {
                array_add($todo, 'color', 'default');
            } else if($todo['progress'] < 66){
                array_add($todo, 'color', 'warning');
            } else {
                array_add($todo, 'color', 'danger');
            }
        }
        return view('manage.index', ['page_title' => 'Dashboard', 'page_description' => '기본 정보를 확인 합니다.', 'todos' => $todos]);
    }
}
