<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;
    
    public $todoModel;

    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'done', 'progress'];
    //$guarded = ['title']; //fillable에서 제외 시키기

    public static $rules = [
        'title' => 'required',
        'progress' => 'required|numeric|min:1|max:100',
    ];

    public static $messages = [
        'title.required' => '할일 제목은 필수 입력사항 입니다.',
        'progress.required'  => '진행률은 필수 입력사항 입니다.',
        'progress.numeric'  => '진행률은 숫자만 입력하실 수 있습니다.',
        'progress.min'  => '진행률은 1~100까지 입력하실 수 있습니다.',
        'progress.max'  => '진행률은 1~100까지 입력하실 수 있습니다.',
    ];

    public function checkColor($progress) {
        if($progress < 33) {
            return 'primary';
        } else if($progress < 66){
            return 'warning';
        } else {
            return 'danger';
        }
    }
}
