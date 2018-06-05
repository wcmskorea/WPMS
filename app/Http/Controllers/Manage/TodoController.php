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
        $todos = Todo::orderBy('progress', 'desc')->where('done', '=', 0)->paginate(10);
        foreach($todos as $todo) {
            if($todo['progress'] < 30) {
                array_add($todo, 'color', 'danger');
            } else if($todo['progress'] < 60){
                array_add($todo, 'color', 'warning');
            } else if($todo['progress'] < 90){
                array_add($todo, 'color', 'info');
            } else {
                array_add($todo, 'color', 'success');
            }
        }

        $done = Todo::withTrashed()->orderBy('updated_at', 'desc')->where('done', '=', 1)->paginate(10);
        foreach($todos as $todo) {
            if($todo['progress'] < 30) {
                array_add($todo, 'color', 'danger');
            } else if($todo['progress'] < 60){
                array_add($todo, 'color', 'warning');
            } else if($todo['progress'] < 90){
                array_add($todo, 'color', 'info');
            } else {
                array_add($todo, 'color', 'success');
            }
        }
        
        return view('manage.todo.index', ['todos' => $todos, 'done' => $done]);

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
            $post->done = 0;
            $post->progress = ($post->done == 2) ? 100 : $request->input('progress');   
            $post->save();
        } else {
            // 데이터 신규저장
            $post = new Todo();
            $post->title = $request->input('title');
            $post->done = 0;
            $post->progress = ($post->done == 2) ? 100 : $request->input('progress');        
            $post->save();
        }
     
        return response()->json($post); //Ajax POST
        // return redirect('/manage/dashboard'); //Basic POST

    }

    public function changeStatus(Request $request) 
    {

        $post = Todo::findOrFail($request->input('id'));
        $post->done = (!$post->done) ? 1 : 0;
        $post->save();

        return response()->json($post);
    }

    public function destroy($id)
    {
        $post = Todo::findOrFail($id);
        $post->delete();

        return response()->json($post);
    }
}
