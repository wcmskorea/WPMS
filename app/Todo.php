<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    // protected $page_title = 'Todo List';
    // protected $page_description = '우리가 할일을 정리합니다.';

    public static $rules = [
        'title' => 'required',
        'progress' => 'required|numeric'
    ];

    public static $messages = [
        'title.required' => '할일 제목은 필수 입력사항 입니다.',
        'progress.required'  => '가중치는 필수 입력사항 입니다.',
        'progress.numeric'  => '가중치는 숫자만 입력하실 수 있습니다.',
        'progress.max'  => '가중치는 최대 3자리까지 입력하실 수 있습니다.',
    ];

    //
    protected $fillable = ['title', 'done', 'progress'];
    //$guarded = ['title'];
}
