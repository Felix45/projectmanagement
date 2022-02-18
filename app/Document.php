<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = [];

    public function tasks(){
        return $this->hasMany(Task::class)->orderBy('created_at','DESC');
    }
}
