<?php namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Todo;
use Validator;
use Response;

class TodoController extends Controller
{
    protected $rules = [
        'title' => 'required',
        'progress' => 'required|numeric|min:1|max:100'
    ];
    protected $messages = [
        'title.required' => '할일 제목은 필수 입력사항 입니다.',
        'progress.required'  => '진행률은 필수 입력사항 입니다.',
        'progress.numeric'  => '진행률은 숫자만 입력하실 수 있습니다.',
        'progress.min'  => '진행률은 1~100까지 입력하실 수 있습니다.',
        'progress.max'  => '진행률은 1~100까지 입력하실 수 있습니다.',
    ];
    //
    public function index() {

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
        
        return view('manage.todo', ['todos' => $todos, 'color' => $color]);

    }

    public function store(Request $request) {

        // dd($request->all()); //request값 화면에 찍어보자.

        // 데이터 유효성 검사
        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        if($validator->fails()) {
            // return redirect()->back()->withErrors($validator->errors())->withInput(); //Basic POST
            return Response::json(array('errors' => $validator->getMessageBag()->toArray())); //Ajax POST
        }

        if($request->input('id')) {
            // 데이터 수정
            $post = Todo::findOrFail($request->input('id'));
            $post->title = $request->input('title');
            $post->done = ($request->input('done')) ? $request->input('done') : 1;
            $post->progress = ($post->done == 2) ? 100 : $request->input('progress');   
            $post->save();
        } else {
            // 데이터 신규저장
            $post = new Todo();
            $post->title = $request->input('title');
            $post->done = ($request->input('done')) ? $request->input('done') : 1;
            $post->progress = ($post->done == 2) ? 100 : $request->input('progress');        
            $post->save();
        }
     
        return response()->json($post); //Ajax POST
        // return redirect('/manage/dashboard'); //Basic POST

    }

    public function update(Request $request, $id) {
        
    }

    public function show($id) {

        $todos = Todo::find($id);
        return view('manage.todo', ['todos' => $todos]);

    }
}
