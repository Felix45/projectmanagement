<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects(){
        return $this->hasMany(Project::class)->orderBy('created_at','DESC');
    }

    protected static function boot(){
        parent::boot();
        static::created(function($user){
            $user->profile()->create([
                'quote' => '',
                'description' => ''
            ]);
        });
    }

    public function tasks(){
        return $this->hasMany(Task::class)->orderBy('created_at','DESC');
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function assignedTasks(){
        return $this->belongsToMany(Task::class)->orderBy('created_at','DESC');
    }
}
