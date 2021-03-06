<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function documents(){
        return $this->belongsToMany(Document::class);
    }

    public function assignees(){
        return $this->belongsToMany(User::class);
    }
}
