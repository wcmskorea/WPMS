<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $page_title = 'Todo List';
    protected $page_description = '우리가 할일을 정리합니다.';

    public static $rules = [
        'title' => 'required',
        'progress' => 'required|numeric|max:3'
    ];

    public static $messages = [
        'title.required' => '할일 제목은 필수 입력사항 입니다.',
        'progress.required'  => '진행률은 필수 입력사항 입니다.',
        'progress.numeric'  => '진행률은 숫자만 입력하실 수 있습니다.',
        'progress.max'  => '진행률은 최대 3자리까지 입력하실 수 있습니다.',
    ];

    //
    protected $fillable = ['title', 'done', 'progress'];
    //$guarded = ['title'];
}
