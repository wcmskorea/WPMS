<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    //
    protected $fillable = ['domain', 'title', 'description'];

    public function site()
    {
        return $this->site = "demo01.wpms.kr";
    }
}
