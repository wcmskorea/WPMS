<?php 

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Todo;
use Validator;
use Response;

class TodoController extends Controller
{

    // protected $rules = [
    //     'title' => 'required',
    //     'progress' => 'required|numeric|min:1|max:100'
    // ];
    // protected $messages = [
    //     'title.required' => '할일 제목은 필수 입력사항 입니다.',
    //     'progress.required'  => '진행률은 필수 입력사항 입니다.',
    //     'progress.numeric'  => '진행률은 숫자만 입력하실 수 있습니다.',
    //     'progress.min'  => '중요도는 1~100까지 입력하실 수 있습니다.',
    //     'progress.max'  => '중요도는 1~100까지 입력하실 수 있습니다.',
    // ];
    //
    protected $output;

    public function index() {
        // 진행중인 목록
        $todos = Todo::where('done', 0)->orderBy('progress', 'desc')->get();
        foreach($todos as $todo) {
            if($todo['progress'] < 33) {
                array_add($todo, 'color', 'default');
            } else if($todo['progress'] < 66){
                array_add($todo, 'color', 'warning');
            } else {
                array_add($todo, 'color', 'danger');
            }
        }
        // 완료된 목록
        $done = Todo::withTrashed()->orderBy('deleted_at', 'asc')->where('done', '=', 1)->paginate(10);
        foreach($todos as $todo) {
            array_add($todo, 'color', 'success');
        }
        
        return view('manage.todo.index', ['page_title' => 'ToDo', 'page_description' => '진행해야 할 일들을 관리합니다.', 'todos' => $todos, 'done' => $done]);
    }

    public function store(Request $request) {

        // dd($request->all()); //request값 화면에 찍어보자.

        // 데이터 유효성 검사 : Controller 에서 설정할 경우
        // $validator = Validator::make($request->all(), $this->rules, $this->messages);
        // if($validator->fails()) {
        //     // return redirect()->back()->withErrors($validator->errors())->withInput(); //Basic POST
        //     return Response::json(array('errors' => $validator->getMessageBag()->toArray())); //Ajax POST
        // }

        // 데이터 유효성 검사 : model 에서 설정할 경우
        $validator = Validator::make($request->all(), Todo::$rules, Todo::$messages);
        if($validator->fails()) {
            // return redirect()->back()->withErrors($validator->errors())->withInput(); //Basic POST
            return Response::json(array('errors' => $validator->getMessageBag()->toArray())); //Ajax POST
        }

        if($request->input('id')) {
            // 데이터 수정
            $post = Todo::findOrFail($request->input('id'));
            $post->title = $request->input('title');
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

    public function checkNotification(Request $request) {
        
        $output = '';

        // 진행중인 목록
        $todos = Todo::where('done', 0)->orderBy('progress', 'desc')->get();
        foreach($todos as $todo) {
            $output .= '
            <li><!-- Task item -->
                <a href="#">
                <!-- Task title and progress text -->
                <h3>
                    '.$todo['title'].'
                    <small class="pull-right">'.$todo['progress'].'</small>
                </h3>
                <!-- The progress bar -->
                <div class="progress xs">
                    <!-- Change the css width attribute to simulate progress -->
                    <div class="progress-bar progress-bar-warning" style="width: '.$todo['progress'].'%" role="progressbar"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                    <span class="sr-only">'.$todo['progress'].'% Complete</span>
                    </div>
                </div>
                </a>
            </li>
            ';
        }
        return response()->json(array('notification' => $output, 'count' => count($todos)));
    }

    public function changeStatus(Request $request) {

        $post = Todo::findOrFail($request->input('id'));
        $post->done = (!$post->done) ? 1 : 0;
        $post->save();

        return response()->json($post);
    }

    public function destroy($id) {
        $post = Todo::findOrFail($id);
        $post->delete();

        return response()->json($post);
    }

    public function show($id) {
        //
    }
}
