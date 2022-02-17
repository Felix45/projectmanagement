<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class)->orderBy('created_at','DESC');
    }

    public function excerpt()
    {
        return Str::limit($this->description, 100);
    }
}
