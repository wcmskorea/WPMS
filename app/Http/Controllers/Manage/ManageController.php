<?php

namespace App\Http\Controllers\Manage;

use App\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Todo;

class ManageController extends Controller
{
    public function __construct() {

        // $this->middleware('auth', ['only' => ['dashboard']]);

    }
    //
    public function index() {        
        return redirect()->route('manage.dashboard');
    }

    public function dashboard() {

        // $todos = Todo::all();        
        $progress = 0;
        $datas = Todo::where('done', 0)->orderBy('created_at', 'desc')->paginate(5); // withTrashed(), onlyTrashed() //softdelete된 데이터를 포함할지 여부 함수
        $todos = New Todo();
        foreach($datas as $data) {
            //진행별 badge 색상
            array_add($data, 'color', $todos->checkColor($data['progress']));
            $progress += $data['progress'];
        }
        $progress = ($progress) ? round($progress / sizeof($datas), 1) : 0;

        return view('manage.index', [
            'page_title' => 'Dashboard', 
            'page_description' => '기본 정보 현황', 
            'todos' => $datas,
            'todos_count' => sizeof($datas),
            'todos_progress' => $progress
        ])->with('configWebsite', cache("config.website"));
        
    }
}
