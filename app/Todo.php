<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'done', 'progress'];
    
    //$guarded = ['title']; //fillable에서 제외 시키기

    public static $rules = [
        'title' => 'required',
        'progress' => 'required|numeric|min:1|max:100',
    ];

    public static $messages = [
        'title.required' => '할일 제목은 필수 입력사항 입니다.',
        'progress.required'  => '중요도는 필수 입력사항 입니다.',
        'progress.numeric'  => '중요도는 숫자만 입력하실 수 있습니다.',
        'progress.min'  => '중요도는 1~100까지 입력하실 수 있습니다.',
        'progress.max'  => '중요도는 1~100까지 입력하실 수 있습니다.',
    ];
}
