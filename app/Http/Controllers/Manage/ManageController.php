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
        $p = 0;
        $a = Todo::where('done', 0)->orderBy('created_at', 'desc')->paginate(5); // withTrashed(), onlyTrashed() //softdelete된 데이터를 포함할지 여부 함수
        $t = New Todo();
        foreach($a as $b) {
            //진행별 badge 색상
            array_add($b, 'color', $t->checkColor($b['progress']));
            $p += $b['progress'];
        }
        $p = round($p / sizeof($a), 1);

        return view('manage.index', [
            'page_title' => 'Dashboard', 
            'page_description' => '기본 정보 현황', 
            'todos' => $a,
            'todos_count' => sizeof($a),
            'todos_progress' => $p
        ])->with('configWebsite', cache("config.website"));
    }
}
